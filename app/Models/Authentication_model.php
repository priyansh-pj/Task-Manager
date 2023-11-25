<?php

namespace App\Models;

use CodeIgniter\Model;

class Authentication_model extends Model
{
    public function register_user($name, $email, $password)
    {
        $query = "INSERT INTO user_credentials (name, email, password) VALUES (?, ?, ?)";
        $this->db->query($query, [$name, $email, $password]);
    }
    public function get_user_by_email($email){
        $query = "SELECT * FROM user_credentials WHERE email=?";
        return $this->db->query($query,[$email])->getRow();
    }
}