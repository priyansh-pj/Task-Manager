<?php

namespace App\Controllers;

class Dashboard extends BaseController
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
        $data['profile'] = $this->session->get("user")->name;
        $data['admin'] = $this->session->get("user")->is_admin;

        echo view('header', $data);
        echo view('dashboard');
        echo view('footer');
    }

    

}
