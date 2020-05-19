<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
// use Phalcon\Session\Exception;
// use Phalcon\Session\Manager;
use Phalcon\Init\Models\Users;
use Phalcon\Init\Models\Janji;

class DashboardController extends Controller
{

    protected function initialize()
    {
        if(!$this->session->has('user_aktif')) {
            $this->response->redirect('/login');
        }
    }
    
    public function indexAction()
    {
        $db = $this->getDI()->get('db');

        $sql = "Select * from users";

        $result = $db->fetchAll($sql);

        echo var_dump($result);
        $this->view->disable();
    }

    

    public function dashboardAction()
    {
        $daftar_poli = array("Poli Umum","Poli Gigi","Poli Psikologi","Balai Kesehatan Ibu dan Anak","Estetiderma");
        $antri = null;
        foreach($daftar_poli as $poli){
            $dokters = array_map(function($v) {
                return $v['id_user'];
            }, Users::find(["poli = '{$poli}'",'columns' => 'id_user',])->toArray());
            $antrian_kita = null;
            $antrian_sekarang = null;
            if(!empty($dokters)){
                $antri[$poli] = null;
                $ada = Janji::findFirst([
                    'id_dokter IN ({dokter:array}) AND tgl = :tanggal:',
                    'bind' => [
                        'dokter' => $dokters,
                        'tanggal' => date("Y-m-d"),
                    ]               
                ]);
                if($ada){
                    $antrian_sekarang = Janji::find([
                        'id_dokter IN ({dokter:array}) AND tgl = :tanggal: AND status = "Selesai"',
                        'bind' => [
                            'dokter' => $dokters,
                            'tanggal' => date("Y-m-d"),
                        ]               
                    ]);
                    $janji_kita =  Janji::findFirst([
                        'id_dokter IN ({dokter:array}) AND tgl = :tanggal: AND status = "Menunggu" AND id_pasien = :pasien:',
                        'bind' => [
                            'dokter' => $dokters,
                            'tanggal' => date("Y-m-d"),
                            'pasien' => Users::findFirst("email = '{$this->session->get('user_aktif')['email']}'")->id_user
                        ]               
                    ]);
                    if($janji_kita){
                        $antrian_kita = Janji::find([
                            'id_dokter IN ({dokter:array}) AND tgl = :tanggal: AND status = "Menunggu" AND id_janji < :janjiku:',
                            'bind' => [
                                'dokter' => $dokters,
                                'tanggal' => date("Y-m-d"),
                                'janjiku' => $janji_kita->id_janji
                            ]               
                        ]); 
                        $antri[$poli]['kita'] = count($antrian_sekarang)+1+count($antrian_kita);
                    }
                    $antri[$poli]['sekarang'] = count($antrian_sekarang)+1; 
                }
            }
        }
        $this->view->antri = $antri;
        $this->view->daftar_poli = $daftar_poli;
        $this->view->pick('dashboard/dashboard');
    }   

    public function storeAction()
    {
        $user = new Users();
        $user->id_jabatan = '2';
        $user->username = $this->request->getPost('username');
        $user->nama = $this->request->getPost('nama');
        $user->email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user->password = $this->security->hash($password);
        $user->usia = $this->request->getPost('usia');
        $user->alamat = $this->request->getPost('alamat');
        $user->notelp = $this->request->getPost('notelp');  
        $user->flag = '0';
        $nama = Users::findFirst("username = '$user->username'");
        if($nama){
            echo "username sudah digunakan";
        }
        else{
            $user->save();
            $this->response->redirect('/login');
        }        
    }
    public function loginAction(){

    }

    public function postloginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = Users::findFirst("username='$username'");

        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                $this->session->set(
                    'auth',
                    [
                        'id' => $user->id,
                        'username' => $user->username,
                    ]
                );
                $this->response->redirect('/dashboard');
            }
            else{
                $this->security->hash(rand());
                $this->response->redirect('/');
            }
        }
        else{
            $this->response->redirect('/');
        }
        
    }

    public function logoutAction()
    {
        $this->session->destroy();
        // $this->flashSession->success('Anda telah logout');
        print_r('logout berhasil');
        $this->response->redirect('/');
        
    }

    public function jabatanAction(){

    }

    public function addJabatanAction(){

        $jabatan = new Jabatan();
        $jabatan->jabatan = $this->request->getPost('jabatan');
        $jabatan->save();
        $this->response->redirect('/');
    }

    
}   