a<?php
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
            if (!$this->session->userdata('userData')) {
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
            if (!$this->session->userdata('userData')) {
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
            if ($this->session->userdata('userData')) {
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

                $email = $this->input->post('email');
                $data = [
                    'name' => htmlspecialchars($this->input->post('name')),
                    'email' => htmlspecialchars($email),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'status' => 'verify',
                    'photo' => 'default.png',
                    'role_id' => 2

                ];

                // token
                $token = base64_encode(random_bytes(40));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->users->insertUser($data);
                $this->db->insert('user_tokens', $user_token);

                $this->send_email($email, $token, 'activate');

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('result', 'Successful');
                $this->session->set_flashdata('action', 'Create an account. Please activate!');
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
                        $this->db->select('id, name, photo, role_id');
                        $this->db->where('email', $email);
                        $query = $this->db->get('users');

                        $this->session->set_userdata('userData', $query->result());
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
            $this->session->unset_userdata('userData');

            $this->session->set_flashdata('logout', 'Logout Success');
            $this->session->set_flashdata('message', 'You"ve been logged out');
            return redirect('auth/login');
        }

        private function send_email($email, $token, $type)
        {
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'widyablog26@gmail.com',
                'smtp_pass' => 'zbexthvufrwsqyrn',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];

            $this->load->library('email');
            $this->email->initialize($config);

            $this->email->from('widyablog26@gmail.com', 'Admin Widya Blog');
            $this->email->to($email);

            if ($type === 'activate') {
                $this->email->subject('Account Activation');
                $this->email->message('Click this link to activate your account: 
                <a href="' . base_url() . 'auth/activate?email=' . $email . '&token='
                    . urlencode($token) . '">Activate</a>');
            } else if ($type === 'forgot') {
                $this->email->subject('Reset Password');
                $this->email->message('Click this link to reset your password: 
                <a href="' . base_url() . 'auth/reset?email=' . $email . '&token='
                    . urlencode($token) . '">Reset</a>');
            }

            $this->email->send();
        }

        public function activate()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            // Email Check
            $user_email = $this->db->get_where('user_tokens', ['email' => $email])
                ->row_array();

            if ($user_email) {
                // Token Check
                $user_token = $this->db->get_where('user_tokens', ['token' => $token])
                    ->row_array();

                if ($user_token) {
                    // Time Check
                    if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                        $this->db->set('status', 'active');
                        $this->db->where('email', $email);
                        $this->db->update('users');

                        $this->db->delete('user_tokens', ['token' => $token]);

                        $this->session->set_flashdata('success', 'success');
                        $this->session->set_flashdata('result', 'Successful');
                        $this->session->set_flashdata('action', 'Your Account has been activated. Please Login!');
                        return redirect('auth/login');
                    } else {
                        $this->db->delete('users', ['email' => $email]);
                        $this->db->delete('user_tokens', ['token' => $token]);

                        $this->session->set_flashdata('failed', 'Activation Failed');
                        $this->session->set_flashdata('action', 'Activation Failed! Token Expired');
                        return redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Activation Failed');
                    $this->session->set_flashdata('action', 'Activation Failed! Wrong Token');
                    return redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('failed', 'Activation Failed');
                $this->session->set_flashdata('action', 'Activation Failed! Wrong Email');
                return redirect('auth/login');
            }
        }

        public function users()
        {
            if (!$this->session->userdata('userData')) {
                return redirect('auth/login');
                die;
            }

            $data['title'] = 'user';
            $data['users'] = $this->users->getUsers();
            $data['user_role'] = $this->users->userRoles();

            $this->load->view('auth/header', $data);
            $this->load->view('auth/users', $data);
            $this->load->view('auth/footer');
        }

        public function forgot_form()
        {
            $this->load->view('auth/forgot_form');
        }

        public function forgot_password()
        {
            $email = $this->input->post('email');

            // Email Check
            $user_email = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user_email) {
                //Create a Token 
                $token = base64_encode(random_bytes(40));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => 0
                ];

                $this->db->insert('user_tokens', $user_token);

                $this->send_email($email, $token, 'forgot');

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('result', 'Successful');
                $this->session->set_flashdata('action', 'Send Reset Password Request. Please check your email');
                return redirect('auth/login');
            } else {
                $this->session->set_flashdata('failed', 'Reset Failed');
                $this->session->set_flashdata('action', 'This email is not registered');
                return redirect('auth/login');
            }
        }

        public function reset()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            // Check Email
            $user_email = $this->db->get_where('user_tokens', ['email' => $email])->row_array();

            if ($user_email) {
                // Check Token
                if ($token === $user_email['token']) {
                    //  Direct to Password reset form
                    $this->session->set_userdata('email', $email);
                    $this->load->view('auth/reset');
                } else {
                    $this->session->set_flashdata('failed', 'Reset Failed');
                    $this->session->set_flashdata('action', 'Reset Failed! Wrong Token');
                    return redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('failed', 'Reset Failed');
                $this->session->set_flashdata('action', 'Reset Failed! Wrong Email');
                return redirect('auth/login');
            }
        }

        public function reset_password()
        {
            $email = $this->session->userdata('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            // Check Email
            $user_email = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user_email) {
                // Change Password
                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('users');

                $this->db->delete('user_tokens', ['email' => $email]);

                $this->session->unset_userdata('email');

                $this->session->set_flashdata('success', 'success');
                $this->session->set_flashdata('result', 'Successful');
                $this->session->set_flashdata('action', 'Reset Password. Please login');
                return redirect('auth/login');
            } else {
                $this->session->set_flashdata('failed', 'Reset Failed');
                $this->session->set_flashdata('action', 'Reset Failed! This email is not registered');

                $this->session->unset_userdata('email');
                return redirect('auth/login');
            }
        }
    }
