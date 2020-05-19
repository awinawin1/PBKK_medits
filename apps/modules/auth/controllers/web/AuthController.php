<?php

namespace Phalcon\Init\Auth\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Init\Models\Users as User;
// use Phalcon\Session\Exception;
// use Phalcon\Session\Manager;

class AuthController extends Controller
{
    
    public function homeAction()
    {
        $this->view->pick('auth/home');
    }

    public function loginAction()
    {
        $this->view->pick('auth/login');
    }

    public function registerAction()
    {
        $this->view->pick('auth/register');   
    }  

    public function postRegisterAction()
    {
        $user_baru = new User();
        $user_baru->nama = $this->request->getPost('nama');
        $user_baru->email = $this->request->getPost('email');
        $user_baru->password = $this->security->hash($this->request->getPost('password'));
        $user_baru->jenis_kelamin = $this->request->getPost('jk');
        $user_baru->tgl_lahir = $this->request->getPost('tgl');
        $user_baru->alamat = $this->request->getPost('alamat');
        $user_baru->jenis_user = 3;
        $user_baru->poli = NULL;
        $same_email = User::findFirst("email = '".$user_baru->email."'");
        if(!$same_email){
            $user_baru->save();
        }
        $this->response->redirect('login');
    }

    public function postLoginAction()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user_di_database = User::findFirst("email='$email'");
        if($user_di_database){
            if($this->security->checkHash($password,$user_di_database->password)){
                $data['nama'] = $user_di_database->nama;
                $data['id_user'] = $user_di_database->id_user;
                $data['email'] = $user_di_database->email;
                $data['jenis_user'] = $user_di_database->jenis_user;
                $data['poli'] = $user_di_database->poli;
                $this->session->set('user_aktif',$data);
                return $this->response->redirect('/dashboard');
            }
        }
        return $this->response->redirect('/login');
    }

    public function logoutAction()
    {
        $this->session->destroy();
        // $this->flashSession->success('Anda telah logout');
        $this->response->redirect('/');
        
    }

}   