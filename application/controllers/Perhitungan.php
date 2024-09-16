<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {	
			$data = [
                'page' => "Perhitungan",
                'kriterias'=> $this->Perhitungan_model->get_kriteria(),
                'alternatifs'=> $this->Perhitungan_model->get_alternatif(),
            ];
			
            $this->load->view('perhitungan/perhitungan', $data);
        }
		
		public function hasil()
        {
            $data = [
                'page' => "Hasil",
                'kriteria'=> $this->Perhitungan_model->get_kriteria(),
				'alternatif'=> $this->Perhitungan_model->get_alternatif(),
				'hasil'=> $this->Perhitungan_model->get_hasil()
            ];
			
            $this->load->view('perhitungan/hasil', $data);
        }
    
    }
    
    