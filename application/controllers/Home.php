<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model', 'post');
        $this->load->model('category_model', 'categories');
    }

    public function index()
    {
        $data['title'] = 'Widya Blog';
        $data['page'] = 'home';
        $data['post'] = $this->post->latestPost();
        $data['categories'] = $this->categories->getCategoryLimit();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
