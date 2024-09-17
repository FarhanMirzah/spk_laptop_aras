<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Profile extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Profile_model');
        }

        public function index()
        {
            $id_user = $this->session->userdata('id_user');
			$profile = $this->Profile_model->show($id_user);
            $data = [
                'page' => "Profile",
				'profile' => $profile
            ];
            $this->load->view('profile/index', $data);
        }
    
        public function update($id_user)
        {
            $id_user = $this->input->post('id_user');
            $data = array(
				'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

            // Validasi update data  (https://stackoverflow.com/questions/27621250/is-unique-in-codeigniter-for-edit-function) Ellix4u's solution
            $id = $this->uri->segment(3);
            $this->form_validation->set_rules('username', 'Username', 'required|edit_unique[user.username.id_user.'.$id.']');
            if ($this->form_validation->run() != false) {
                $this->Profile_model->update($id_user, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
                // Jika ganti profile session sekarang, update username session ke username yang di inputkan 
                $this->session->set_userdata('username',$data['username']);
                redirect('Profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tersebut sudah diambil. Coba yang lain.</div>');
                redirect('Profile');
            }
            
            // $this->Profile_model->update($id_user, $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update!</div>');
			// redirect('Profile');
        }
    
        
    
    }
    