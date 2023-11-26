<?php

namespace App\Controllers;

class Admin extends BaseController
{
    private $model;
    private $session;

    public function __construct()
    {
        
        $this->model = new \App\Models\Admin_Model();
        $this->session = \Config\Services::session();

    }


    public function manage_user()
    {
        $data['profile'] = $this->session->get("user");
        $data['users'] = $this->model->get_users($this->session->get("user")->email);
        // print_r($data);
        // die();

        echo view('header', $data);
        echo view('manage_user');
        echo view('footer');
    }

    public function user_task()
    {
        $data['profile'] = $this->session->get("user");
        $data['users'] = $this->model->get_all_user();
        $data['metrics'] = $this->model->metrics();

        echo view('header', $data);
        echo view('user_task');
        echo view('footer');
    }

    public function update_user_status($id){
        if($this->session->get("user")->is_admin){
            $this->model->UpdateUserStatus($id);
        }
    }
    
    public function update_admin_status($id){
        if($this->session->get("user")->is_admin){
            $this->model->UpdateAdminStatus($id);
        }
    }

}
