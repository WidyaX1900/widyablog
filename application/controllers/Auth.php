<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model', 'posts');
        $this->load->model('user_model', 'users');
    }

    public function index()
    {
        if (!$this->session->userdata('name')) {
            return redirect('auth/login');
            die;
        }

        $data['title'] = 'index';
        $data['post'] = $this->posts->postCount();

        $this->load->view('auth/header', $data);
        $this->load->view('auth/index');
        $this->load->view('auth/footer');
    }

    public function post()
    {
        if (!$this->session->userdata('name')) {
            return redirect('auth/login');
            die;
        }

        $data['title'] = 'post';
        $data['posts'] = $this->posts->getPost();
        $data['categories'] = $this->posts->postCategory();

        $this->load->view('auth/header', $data);
        $this->load->view('auth/post', $data);
        $this->load->view('auth/footer');
    }

    public function register()
    {
        if ($this->session->userdata('name')) {
            return redirect('auth');
            die;
        }

        $this->load->view('forms/register');
    }

    public function login()
    {
        if ($this->session->userdata('name')) {
            return redirect('auth');
            die;
        }

        $this->load->view('forms/login');
    }

    public function create_account()
    {
        $config =
            [
                [
                    'field' => 'name',
                    'label' => 'Full Name',
                    'rules' => 'required|trim',
                    'errors' => [
                        'required' => 'Please enter your Full Name'
                    ]
                ],
                [
                    'field' => 'email',
                    'label' => 'E-mail',
                    'rules' => 'required|valid_email|is_unique[users.email]|trim',
                    'errors' => [
                        'required' => 'Please enter your E-mail',
                        'is_unique' => 'This e-mail already registered'
                    ]
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]|matches[confirm]',
                    'errors' => [
                        'required' => 'Please enter a password',
                        'min_length' => 'Password too short',
                        'matches' => 'Password not match'
                    ]
                ],
                [
                    'field' => 'confirm',
                    'label' => 'Confirm',
                    'rules' => 'required|min_length[6]|matches[password]',
                    'errors' => [
                        'required' => 'Please retype your password',
                        'min_length' => 'Password too short',
                        'matches' => 'Password not match',
                    ]
                ],

            ];

        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()) {
            $this->register();
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'status' => 'verify',
                'photo' => 'default.png',
                'role_id' => 2

            ];

            // $this->users->insertUser($data);

            $this->send_email();

            $this->session->set_flashdata('success', 'success');
            $this->session->set_flashdata('result', 'Successful');
            $this->session->set_flashdata('action', 'Create an account');
            return redirect('auth/login');
        }
    }

    public function login_account()
    {
        $config =
            [
                [
                    'field' => 'email',
                    'label' => 'E-mail',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your E-mail'
                    ]
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter a password'
                    ]
                ]

            ];

        $this->form_validation->set_rules($config);

        if (!$this->form_validation->run()) {
            $this->login();
        } else {
            $this->login_function();
        }
    }

    private function login_function()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email]);

        // Cek Email
        if ($user->num_rows() > 0) {

            // Cek Password
            $userData = $user->row_array();
            if (password_verify($password, $userData['password'])) {

                // Cek Aktivasi
                if ($userData['status'] === 'active') {
                    $this->session->set_userdata('name', $userData['name']);
                    $this->session->set_userdata('role', $userData['role_id']);
                    $this->session->set_userdata('profile', $userData['photo']);
                    return redirect('auth');
                } else {
                    $this->session->set_flashdata('failed', 'Login Failed');
                    $this->session->set_flashdata('action', 'Your account is not active. Please verify your account!');
                    return redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('failed', 'Login Failed');
                $this->session->set_flashdata('action', 'Wrong Password!');
                return redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('failed', 'Login Failed');
            $this->session->set_flashdata('action', 'This email is not registered');
            return redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('name', $userData['name']);
        $this->session->unset_userdata('role', $userData['role_id']);

        $this->session->set_flashdata('logout', 'Logout Success');
        $this->session->set_flashdata('message', 'You"ve been logged out');
        return redirect('auth/login');
    }

    private function send_email()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'widyablog26@gmail.com',
            'smtp_pass' => 'zbexthvufrwsqyrn',
            'smtp_port' => 465,
            'mailtype' => 'hmtl',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('widyablog26@gmail.com', 'Admin Widya Blog');
        $this->email->to('ranggawidyasastra@gmail.com');
        $this->email->subject('Test email');
        $this->email->message('Test email with google smtp');

        if ($this->email->send()) {
            echo "Success";
            die;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
