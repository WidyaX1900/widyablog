<?php
class User_Model extends CI_Model
{
    public $name,
        $email,
        $password,
        $status,
        $photo,
        $role_id;

    public function insertUser($data)
    {
        $this->db->insert('users', $data);
    }
}
