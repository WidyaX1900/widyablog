<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', 'comment');
    }

    public function store($post_id)
    {
        if (!$this->session->userdata('userData')) {
            return redirect('auth/login');
            die;
        }

        $data = [
            'user_id' => $this->session->userdata('userData')[0]->id,
            'post_id' => $post_id,
            'comment' => $this->input->post('comment')
        ];

        $this->comment->insertComment($data);

        $this->session->set_flashdata('success', 'success');
        $this->session->set_flashdata('result', 'Successful');
        $this->session->set_flashdata('action', 'Comment a post');
        return redirect('blog/single/' . $post_id);
    }
}
