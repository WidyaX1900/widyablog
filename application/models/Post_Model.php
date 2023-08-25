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

    public function updatePost($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('posts', $data);
    }

    public function searchPost($keyword)
    {
        $this->db->like('title', $keyword, 'both');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');

        return $query->result();
    }

    public function postCount()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');

        return $query->num_rows();
    }

    public function postCategory()
    {
        $this->db->select('category_id, categories.name');
        $this->db->from('posts');
        $this->db->join('categories', 'posts.category_id=categories.id');
        $this->db->order_by('posts.id', 'DESC');

        $query = $this->db->get();

        return $query->result();
    }

    public function deletePost($id)
    {
        $this->db->delete('posts', ['id' => $id]);
    }
}
