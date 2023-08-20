<?php
class Post_Model extends CI_Model
{
    public  $thumbnail,
        $title,
        $content,
        $date,
        $category_id,
        $user_id;

    public function insertPost($data)
    {
        $this->db->insert('posts', $data);
    }

    public function getPost()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');

        return $query->result();
    }

    public function getPostById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('posts');

        return $query->result();
    }

    public function getPostNotById($id)
    {
        $this->db->where('id !=', $id);
        $query = $this->db->get('posts');

        return $query->result();
    }

    public function latestPost()
    {
        $this->db->limit(3);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');

        return $query->result();
    }
}
