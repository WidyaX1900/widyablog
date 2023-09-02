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

    public function getUsers()
    {
        $this->db->select('id, name, email, status, role_id');
        $query = $this->db->get('users');

        return $query->result();
    }

    public function userRoles()
    {
        $this->db->select('role_id, roles.name');
        $this->db->from('users');
        $this->db->join('roles', 'role_id=roles.id');

        $query = $this->db->get();

        return $query->result();
    }

    public function getUserById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');

        return $query->result();
    }

    public function getRoleById($role_id)
    {
        $this->db->select('name');
        $this->db->where('id', $role_id);
        $query = $this->db->get('roles');

        return $query->result();
    }
}
