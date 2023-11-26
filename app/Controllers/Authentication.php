<?php

namespace App\Controllers;

class Authentication extends BaseController
{
    private $model;    
    private $session;


    public function __construct()
    {
        
        $this->model = new \App\Models\Authentication_model();
        $this->session = \Config\Services::session();

    }


    public function index()
    {
        if ($this->session->has('user')) {
            
            return redirect()->to('dashboard');
        }
        return view('authentication');
    }
    
    public function register()
    {
        if ($this->session->has('user')) {
            
            return redirect()->to('dashboard');
        }
        return view('register');
    }

    public function register_user()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $this->model->register_user($name, $email, $password);
        $user = $this->model->get_user_by_email($email);

        $this->session->set('user', $user);

        return redirect()->to('dashboard/')->with('success','Account Created Successfully!');
    }

    public function login_validate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->get_user_by_email($email);

        if (!$user->status){
            return redirect()->to('')->with('failed', 'Login Disabled');
        }

        if ($user && password_verify($password, $user->password)) {
            $this->session->set('user', $user);
            return redirect()->to('dashboard/')->with('success', 'Logged in Successfully');
        } else {
            return redirect()->to('')->with('failed', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('')->with('success', 'Logged out Successfully');
    }
    

}
