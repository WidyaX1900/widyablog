<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model', 'categories');
        $this->load->model('post_model', 'posts');
    }

    public function index()
    {
        $data['title'] = 'Blogs';
        $data['page'] = 'blog';
        $data['post'] = $this->posts->getPost();
        $data['category'] = $this->categories->getCategory();

        $this->load->view('templates/header', $data);
        $this->load->view('blog/index');
        $this->load->view('templates/footer');
    }

    public function single($id)
    {
        $data['page'] = 'blog';
        $data['post'] = $this->posts->getPostById($id);
        $data['suggest'] = $this->posts->getPostNotById($id);

        $data['title'] = $this->posts->getPostById($id)[0]->title;

        $this->load->view('templates/header', $data);
        $this->load->view('blog/single', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['category'] = $this->categories->getCategory();

        $this->load->view('blog/create', $data);
    }

    public function store()
    {
        $config =
            [
                [
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your Post Title'
                    ]
                ],
                [
                    'field' => 'content',
                    'label' => 'Content',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please write some content'
                    ]
                ],

            ];


        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()) {
            $this->create();
        } else {

            $data = [
                'thumbnail' => $this->upload(),
                'title' => htmlspecialchars($this->input->post('title')),
                'content' => htmlspecialchars($this->input->post('content')),
                'date' => date("F j, Y, g:i a"),
                'category_id' => $this->input->post('category_id'),
                'user_id' => 1

            ];

            $this->posts->insertPost($data);

            $this->session->set_flashdata('success', 'success');
            $this->session->set_flashdata('result', 'Successful');
            $this->session->set_flashdata('action', 'Add a Post');
            return redirect('/blog');
        }
    }

    public function upload()
    {
        $fileName = '';

        $config['upload_path'] = './assets/thumbnail/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $config['file_ext_tolower'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('thumbnail')) {
            $fileName = $this->upload->data('file_name');
        } else {
            $data['error'] = $this->upload->display_errors();
            $data['title'] = 'Error Page';

            $this->load->view('templates/header', $data);
            $this->load->view('errors/error', $data);
            $this->load->view('templates/footer');
        }

        return $fileName;
    }

    public function show($id)
    {
        $query = $this->posts->getPostById($id);

        $data['post'] = $query;
        $data['category'] = $this->categories->getCategoryNotById($query[0]->category_id);
        $data['current'] = $this->categories->getCategoryById($query[0]->category_id);

        $data['title'] = 'Edit ' . $this->posts->getPostById($id)[0]->title;

        $this->load->view('blog/edit', $data);
    }

    public function update($id)
    {
        $file = $this->input->post('defaultThumbnail');

        if ($_FILES['thumbnail']['error'] === 0) {
            $file = $this->upload();
        }

        $config =
            [
                [
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your Post Title'
                    ]
                ],
                [
                    'field' => 'content',
                    'label' => 'Content',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please write some content'
                    ]
                ],

            ];


        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()) {
            $this->show($id);
        } else {

            $data = [
                'thumbnail' => $file,
                'title' => htmlspecialchars($this->input->post('title')),
                'content' => htmlspecialchars($this->input->post('content')),
                'date' => date("F j, Y, g:i a"),
                'category_id' => $this->input->post('category_id'),
                'user_id' => 1

            ];

            $this->posts->updatePost($id, $data);

            $this->session->set_flashdata('success', 'success');
            $this->session->set_flashdata('result', 'Successful');
            $this->session->set_flashdata('action', 'Edit a Post');
            return redirect('/blog');
        }
    }

    public function search()
    {
        if ($this->input->get('keyword') === '') {
            redirect('/blog');
        } else {
            $data['title'] = 'Blogs';
            $data['page'] = 'blog';

            $data['post'] = $this->posts->searchPost($this->input->get('keyword'));
            $data['category'] = $this->categories->getCategory();

            $this->load->view('templates/header', $data);
            $this->load->view('blog/index');
            $this->load->view('templates/footer');
        }
    }
}
