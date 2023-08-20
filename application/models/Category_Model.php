<?php
class Category_Model extends CI_Model
{
    public $id;
    public $name;
    public $picture;

    public function getCategory()
    {
        $query = $this->db->get('categories');

        return $query->result();
    }

    public function getCategoryLimit()
    {
        $this->db->where('id !=', 1);
        $this->db->limit(3);
        $query = $this->db->get('categories');

        return $query->result();
    }
}
