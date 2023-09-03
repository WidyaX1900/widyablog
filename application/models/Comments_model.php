<?php
class Comments_model extends CI_Model
{
    public $user_id,
        $post_id,
        $comment;


    public function insertComment($data)
    {
        $this->db->insert('comments', $data);
    }

    public function getComments($post_id)
    {
        $this->db->select('user_id, comment');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('comments');

        return $query->result();
    }

    public function commentedUser($post_id)
    {
        $this->db->select('user_id, users.name, users.photo');
        $this->db->from('comments');
        $this->db->join('users', 'comments.user_id=users.id');
        $this->db->where('comments.post_id', $post_id);

        $query = $this->db->get();

        return $query->result();
    }

    public function getCommentsCount()
    {
        $query = $this->db->get('comments');

        return $query->num_rows();
    }
}
