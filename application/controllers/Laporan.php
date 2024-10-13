<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Laporan extends CI_Controller {
    
        public function __construct()
        {
            parent ::__construct();
            $this->load->model('Perhitungan_model');

            if ($this->session->userdata('id_user_level') != "1") {
            ?>
                <script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
            }
        }

		public function index()
		{
			$data = [
                'kriteria'=> $this->Perhitungan_model->get_kriteria(),
				'alternatif'=> $this->Perhitungan_model->get_alternatif(),
				'hasil'=> $this->Perhitungan_model->get_hasil()
            ];
			
            $this->load->view('laporan', $data);
		} 
    }
    