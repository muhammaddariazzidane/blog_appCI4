<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
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
        $data = [
            'title' => 'Register',
            'pesan' => \Config\Services::validation()
        ];

        return view('auth/register', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]',
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation->hasError('name'));
            // return redirect()->to('/register')->withInput()->with('validation', $validation);
            return redirect()->back()->withInput()->with('message', $validation->listErrors());
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        // dd($data);
        $this->userModel->save($data);
        session()->setFlashdata('message', 'Registration Success, please login!');
        return redirect()->to('/login');
        // echo "ini store";
    }
}
