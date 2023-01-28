<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (session()->get('name')) {
            return redirect()->to('/');
        }
        return view(
            'auth/login',
            [
                'title' => 'Login'
            ]
        );
    }
    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $pw = $data->password;
            $authPw = password_verify($password, $pw);
            // if password match
            if ($authPw) {
                $setData = [
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email,
                    'is_admin' => $data->is_admin,
                    'isLoggedIn' => TRUE
                ];
                session()->set($setData);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Login Invalid');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Login Invalid');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
