<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    public function get_users($email)
    {
        $query = "SELECT * FROM user_credentials WHERE email = ?";
        return $this->db->query($query, [$email])->getResult();
    }

    public function get_all_user()
    {
        $query = "SELECT
            user.id,
            user.name,
            user.email,
            COUNT(CASE WHEN tasks.status = 1 THEN 1 END) AS completed,
            COUNT(tasks.id) AS total
        FROM
            user_credentials AS user
        LEFT JOIN
            tasks ON user.id = tasks.user_id AND user.status = 1
        GROUP BY
            user.id, user.name, user.email;
        ";
        return $this->db->query($query)->getResult();
    }
    public function metrics()
    {
        $query = "SELECT
            COUNT(DISTINCT user.id) AS users,
            COUNT(CASE WHEN tasks.status = 1 THEN 1 END) AS completed,
            COUNT(tasks.id) AS task
        FROM
            user_credentials AS user
        LEFT JOIN
            tasks ON user.id = tasks.user_id AND user.status = 1
        WHERE
            user.status = 1";

        return $this->db->query($query)->getRow();
    }
    

    public function UpdateUserStatus($id){
        $query = "UPDATE user_credentials SET status = NOT status WHERE id = ?";
        $this->db->query($query,[$id]);
    }
    public function UpdateAdminStatus($id){
        $query = "UPDATE user_credentials SET is_admin = NOT status WHERE id = ?";
        $this->db->query($query,[$id]);
    }
}
