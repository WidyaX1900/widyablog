<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model', 'posts');
    }

    public function index()
    {
        $data['title'] = 'index';
        $data['post'] = $this->posts->postCount();

        $this->load->view('auth/header', $data);
        $this->load->view('auth/index');
        $this->load->view('auth/footer');
    }

    public function post()
    {
        $data['title'] = 'post';
        $data['posts'] = $this->posts->getPost();
        $data['categories'] = $this->posts->postCategory();

        $this->load->view('auth/header', $data);
        $this->load->view('auth/post', $data);
        $this->load->view('auth/footer');
    }
}
