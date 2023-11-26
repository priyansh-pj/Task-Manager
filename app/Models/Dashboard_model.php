<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_model extends Model
{
    public function get_task($user)
    {
        $query = "SELECT * FROM tasks WHERE user_id = ? AND status=0 ORDER BY date ASC";
        return $this->db->query($query,[$user])->getResult();
    }
    public function get_completed_task($user){
        $query = "SELECT * FROM tasks WHERE user_id = ? AND status=1 ORDER BY date ASC";
        return $this->db->query($query,[$user])->getResult();
    }
    public function create_task($user,$task,$priority,$date)
    {
        $query = "INSERT INTO `tasks` (`user_id`, `task`, `date`, `priority`, `status`) VALUES (?, ?, ?, ?, '0')";
        $this->db->query($query,[$user,$task,$date,$priority]);
    }
    public function UpdateTaskStatus($id){
        $query = "UPDATE tasks SET status = NOT status WHERE id = ?";
        $this->db->query($query,[$id]);
    }
    
    public function DeleteTask($id){
        $query = "DELETE FROM tasks WHERE tasks.id = ?";
        $this->db->query($query,[$id]);
    }
}