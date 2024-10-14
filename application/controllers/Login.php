<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('User_model');
    }
    public function index()
    {
        if($this->Login_model->logged_id())
		{
			redirect('Login/home');
		}else{
			$this->load->view('login');
		}
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // Kode lama
        // $passwordx = md5($password);
        // $set = $this->Login_model->login($username, $passwordx);
        $set = $this->Login_model->login($username, $password);
        if($set){ 
            $log = [
                'id_user' => $set->id_user,
                'username' => $set->username,
                'id_user_level' => $set->id_user_level,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);            
            redirect('Login/home');
          
        }else{
            $this->session->set_flashdata('message', 'Username atau Password Salah');
            redirect('Login');
        }
        
    }

    public function masuk_user()
    {
        $id_user_level = 2;
        $username = implode(',', $this->Login_model->get_username_user($id_user_level));
        $password = implode(',', $this->Login_model->get_password_user($id_user_level));

        // Kode lama 1
        // $username = "user";
        // $password = "user";

        // Kode lama 2
        // $passwordx = md5($password);
        // $set = $this->Login_model->login($username, $passwordx);
        
        $set = $this->Login_model->login($username, $password);
        if($set){ 
            $log = [
                'id_user' => $set->id_user,
                'username' => $set->username,
                'id_user_level' => $set->id_user_level,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);            
            redirect('Login/home');
          
        }else{
            $this->session->set_flashdata('message', 'Username atau Password Salah');
            redirect('Login');
        }
        
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function home()
    { 
        $data['page'] = "Dashboard";
		$this->load->view('admin/index', $data);
    }
}

/* End of file Login.php */
?>
