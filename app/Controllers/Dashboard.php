<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    private $model;
    private $admin;
    private $session;

    public function __construct()
    {
        
        $this->model = new \App\Models\Dashboard_model();
        $this->admin = new \App\Models\Admin_model();
        $this->session = \Config\Services::session();

    }


    public function index()
    {
        $data['profile'] = $this->session->get("user");

        echo view('header', $data);
        echo view('dashboard');
        echo view('footer');
    }

    public function task($user)
    {
        if (!(($this->session->get("user")->id == $user) || $this->session->get("user")->is_admin)){
            return redirect()->to('dashboard');
        }

        $data['profile'] = $this->session->get("user");
        $data['tasks'] = $this->model->get_task($user);
        $data['completed'] = $this->model->get_completed_task($user);
        $data['user'] = $user;

        echo view('header', $data);
        echo view('task');
        echo view('footer');
    }
    public function create_task(){
        $user = $_POST['user'];
        $task = $_POST['task'];
        $priority = $_POST['priority'];
        $date = $_POST['date'];
        $this->model->create_task($user,$task,$priority,$date);
        return redirect()->to('Task/'.$user);
    }

    public function update_task_status($id){
        $this->model->UpdateTaskStatus($id);
    }

    public function deleteTask($id){
        $this->model->DeleteTask($id);
    }
}
