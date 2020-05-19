<?php

namespace Phalcon\Init\Dokter\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Request;
use Phalcon\Init\Models\Users as User;
use Phalcon\Init\Models\Jadwal_dokter as Jadwal;

class DokterController extends Controller
{
    public function beforeExecuteRoute()
    {
    	if(!$this->session->has('user_aktif')){
    		return $this->response->redirect('login');
    	}
    }

    public function dataDokterAction()
    {
        $dokters = User::find('jenis_user=2');
        $this->view->dokters = $dokters;
        $this->view->pick('dokter/dataDokter');
    }

    public function jadwalAction()
    {
        $jadwal = null;
        if ($this->session->get('user_aktif')['jenis_user'] == 2){
            $dokter = User::findFirst("email = '{$this->session->get('user_aktif')['email']}'");
            $jadwal = Jadwal::find("id_dokter = {$dokter->id_user}");
        }
        else{
            $jadwal = Jadwal::find();
        }
        $this->view->jadwal = $jadwal;
        return $this->view->pick('dokter/jadwalDokter');
    }

    public function addjadwalAction()
    {
        $jadwal_add = new Jadwal();
        $dokter = User::findFirst("email = '{$this->session->get('user_aktif')['email']}'");
        $jadwal_add->id_dokter = $dokter->id_user;
        $jadwal_add->hari = $this->request->getPost('hari');
        $jadwal_add->jam_mulai = $this->request->getPost('jam_mulai');
        $jadwal_add->jam_selesai = $this->request->getPost('jam_selesai');
        $jadwal_add->save();
        $this->response->redirect('/jadwal-dokter');
    }

    public function addDokterAction()
    {
        $dokter_baru = new User();
        $dokter_baru->nama = $this->request->getPost('nama');
        $dokter_baru->email = $this->request->getPost('email');
        $dokter_baru->password = $this->security->hash($this->request->getPost('password'));
        $dokter_baru->jenis_kelamin = $this->request->getPost('jk');
        $dokter_baru->tgl_lahir = $this->request->getPost('tgl');
        $dokter_baru->alamat = $this->request->getPost('alamat');
        $dokter_baru->jenis_user = 2;
        $dokter_baru->poli = $this->request->getPost('poli');
        $same_email = User::findFirst("email = '{$dokter_baru->email}'");
        if(!$same_email){
            $dokter_baru->save();
        }
        $this->response->redirect('/data-dokter');
    }

}