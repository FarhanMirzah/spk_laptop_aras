<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login_model extends CI_Model {
		
		function logged_id()
		{
			return $this->session->userdata('id_user');
		}
		
        public function login($username, $passwordx)
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $passwordx);
            return $this->db->get()->row();
        }

        // Kode untuk masuk sebagai user (tanpa login)
        public function get_username_user($id_user_level)
        {
            $query = $this->db->query("SELECT username FROM user WHERE id_user_level = $id_user_level;");
            return $query->row_array();
        }

        public function get_password_user($id_user_level)
        {
            $query = $this->db->query("SELECT password FROM user WHERE id_user_level = $id_user_level;");
            return $query->row_array();
        }
    }
