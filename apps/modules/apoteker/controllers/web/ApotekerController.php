<?php

namespace Phalcon\Init\Apoteker\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Request;
use Phalcon\Init\Models\Users as User;
use Phalcon\Init\Models\Jadwal_dokter as Jadwal;

class ApotekerController extends Controller
{
    public function beforeExecuteRoute()
    {
    	if(!$this->session->has('user_aktif')){
    		return $this->response->redirect('login');
    	}
    }

    public function dataApotekerAction()
    {
        $apotekers = User::find('jenis_user=4');
        $this->view->apotekers = $apotekers;
        $this->view->pick('apoteker/dataApoteker');
    }

    public function addApotekerAction()
    {
        $apoteker_baru = new User();
        $apoteker_baru->nama = $this->request->getPost('nama');
        $apoteker_baru->email = $this->request->getPost('email');
        $apoteker_baru->password = $this->security->hash($this->request->getPost('password'));
        $apoteker_baru->jenis_kelamin = $this->request->getPost('jk');
        $apoteker_baru->tgl_lahir = $this->request->getPost('tgl');
        $apoteker_baru->alamat = $this->request->getPost('alamat');
        $apoteker_baru->jenis_user = 4;
        $same_email = User::findFirst("email = '{$apoteker_baru->email}'");
        if(!$same_email){
            $apoteker_baru->save();
        }
        $this->response->redirect('/data-apoteker');
    }
    

}