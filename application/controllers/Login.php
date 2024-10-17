<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('user_login_access') == 1) {
            redirect(base_url() . 'dashboard');
        }
        $this->load->view('login');
    }

    public function Login_Auth() {
        $this->form_validation->set_rules('email', 'User Email', 'trim|xss_clean|required|min_length[7]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('feedback', 'Email or Password is Invalid');
            redirect(base_url() . 'login', 'refresh');        
        } else {
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password')); // Consider stronger hashing for production
            
            $remember = $this->input->post('remember');
            $login_status = $this->validate_login($email, $password);
            
            if ($login_status == 'success') {
                if ($remember) {
                    setcookie('email', $email, time() + (86400 * 30), "/", "", true, true);
                    setcookie('password', $this->input->post('password'), time() + (86400 * 30), "/", "", true, true);
                } else {
                    setcookie('email', '', time() - 3600, "/");
                    setcookie('password', '', time() - 3600, "/");
                }
                redirect(base_url() . 'dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('feedback', 'Email or Password is Invalid');
                redirect(base_url() . 'login', 'refresh');
            }
        }
    }

    private function validate_login($email, $password) {
        $credential = array('em_email' => $email, 'em_password' => $password, 'status' => 'ACTIVE');
        $query = $this->login_model->getUserForLogin($credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata(array(
                'user_login_access' => '1',
                'user_login_id' => $row->em_id,
                'name' => $row->first_name,
                'email' => $row->em_email,
                'user_image' => $row->em_image,
                'user_type' => $row->em_role
            ));
            return 'success';
        }
        return 'failure';
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'You have logged out.');
        redirect(base_url(), 'refresh');
    }

    // Additional methods for password recovery and confirmation can be added here
}
