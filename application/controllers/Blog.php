<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Blogs';
        $data['page'] = 'blog';
        $this->load->view('templates/header', $data);
        $this->load->view('blog/index');
        $this->load->view('templates/footer');
    }
}
