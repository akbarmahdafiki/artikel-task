<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{

    public function index()
    {
        helper(['form']);
    }

    public function save()
    {
        helper(['form']);
        $modelAdmin = new ModelAdmin();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            $modelAdmin->save($data);
            return redirect()->to(base_url('/'));
        }
        else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }

    public function auth()
    {
        $modelAdmin = new ModelAdmin();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $data = $modelAdmin->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verif = password_verify($password, $pass);
            if ($verif) {
                $sess = [
                    'username' => $data['username'],
                    'loged' => TRUE
                ];

                session()->set($sess);
                return redirect()->to(base_url('admin'));
            }
            else {
                session()->setFlashdata('error', 'Password salah');
                return redirect()->to(base_url('/'));
            }
        }
        else {
            session()->setFlashdata('error', 'Username tidak terdaftar');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function login()
    {
        helper(['form']);
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
