<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Alternatif extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Alternatif_model');

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
                'page' => "Alternatif",
                'kriteria'=> $this->Alternatif_model->get_kriteria(),
				'alternatif'=> $this->Alternatif_model->get_alternatif(),
            ];
            $this->load->view('alternatif/index', $data);
        }
        
        //menampilkan view create
        public function create()
        {
            $data['page'] = "Alternatif";
            $this->load->view('alternatif/create',$data);
        }

        // menambahkan data ke database
        public function store()
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xbm|tif|jfif|ico|tiff|gif|svg|jpeg|svgz|jpg|webp|png|bmp|pjp|apng|pjpeg|avif';
            $this->load->library('upload', $config);
            
            $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|is_unique[alternatif.kode_alternatif]');  
            $this->form_validation->set_rules('nama_alternatif', 'Nama', 'required|is_unique[alternatif.nama_alternatif]');               

            if ($this->form_validation->run() != false) {
                // Upload Gambar (di create Alternatif)
                if (!$this->upload->do_upload('userfile')) {
                    if ($this->upload->data('file_name') == NULL){
                        goto skip_file_type_create_alternatif;
                    }
                    if ($this->upload->data('file_type') != 'image'){
                        goto skip_upload_create_alternatif;
                    }
                    if ($this->upload->data('file_type') == 'image'){
                        goto go_upload_create_alternatif;
                    }
                    skip_file_type_create_alternatif:
                    $data = [
                        'kode_alternatif' => $this->input->post('kode_alternatif'),
                        'nama_alternatif' => $this->input->post('nama_alternatif')
                    ];
                    $result = $this->Alternatif_model->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alternatif '.$this->input->post('nama_alternatif').' ('.$this->input->post('kode_alternatif').') berhasil disimpan! (tanpa gambar)</div>');
                    redirect('Alternatif');
                }
                else {
                    if ($this->upload->data('file_type') == 'image'){
                        skip_upload_create_alternatif:
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan! File yang di upload harus berupa gambar.</div>');
                        redirect('Alternatif/create');
                    }
                    else {
                        go_upload_create_alternatif:
                        $data = array('upload_data' => $this->upload->data());
                        $data = [
                            'kode_alternatif' => $this->input->post('kode_alternatif'),
                            'nama_alternatif' => $this->input->post('nama_alternatif'),
                            'gambar_alternatif' => $this->upload->data("file_name")
                        ];
                        $result = $this->Alternatif_model->insert($data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alternatif '.$this->input->post('nama_alternatif').' ('.$this->input->post('kode_alternatif').') berhasil disimpan! (dengan gambar)</div>');
                        redirect('Alternatif');
                    }
                }
            }
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan! Kode atau Nama Alternatif sudah ada di database.</div>');
                redirect('Alternatif/create');
            }
        }

        public function edit($id_alternatif)
        {
            $alternatif = $this->Alternatif_model->show($id_alternatif);
            $data = [
                'page' => "Alternatif",
				'alternatif' => $alternatif
            ];
            $this->load->view('alternatif/edit', $data);
        }
    
        public function update($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') == "1") {
                $action = $this->input->post('action');
                if($action == 'update') {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'xbm|tif|jfif|ico|tiff|gif|svg|jpeg|svgz|jpg|webp|png|bmp|pjp|apng|pjpeg|avif';
                    $this->load->library('upload', $config);
                    
                    $id_alternatif = $this->input->post('id_alternatif');
        
                    // Validasi update data  (https://stackoverflow.com/questions/27621250/is-unique-in-codeigniter-for-edit-function) Ellix4u's solution
                    $id = $this->uri->segment(3);
                    $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|edit_unique[alternatif.kode_alternatif.id_alternatif.'.$id.']');
                    $this->form_validation->set_rules('nama_alternatif', 'Nama', 'required|edit_unique[alternatif.nama_alternatif.id_alternatif.'.$id.']');
        
                    if ($this->form_validation->run() != false) {
                        // Upload Gambar (di edit Alternatif)
                        if (!$this->upload->do_upload('userfile')) {
                            if ($this->upload->data('file_name') == NULL){
                                goto skip_file_type_edit_alternatif;
                            }
                            if ($this->upload->data('file_type') != 'image'){
                                goto skip_upload_edit_alternatif;
                            }
                            if ($this->upload->data('file_type') == 'image'){
                                goto go_upload_edit_alternatif;
                            }
                            skip_file_type_edit_alternatif:
                            $gambar_alternatif = implode(',', (array_column($this->Alternatif_model->get_gambar_alternatif($id_alternatif), 'gambar_alternatif')));
                            $data = array(
                                'kode_alternatif' => $this->input->post('kode_alternatif'),
                                'nama_alternatif' => $this->input->post('nama_alternatif'),
                                'gambar_alternatif' => $gambar_alternatif
                            );

                            $this->Alternatif_model->update($id_alternatif, $data);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update! (tanpa update gambar)</div>');
                            redirect('Alternatif/edit/'.$id_alternatif);
                        }
                        else {
                            if ($this->upload->data('file_type') == 'image'){
                                skip_upload_edit_alternatif:
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal di update! File yang di upload harus berupa gambar.</div>');
                                redirect('Alternatif/edit/'.$id_alternatif);
                            }
                            else {
                                go_upload_edit_alternatif:
                                $data = array('upload_data' => $this->upload->data());
                                $data = [
                                    'kode_alternatif' => $this->input->post('kode_alternatif'),
                                    'nama_alternatif' => $this->input->post('nama_alternatif'),
                                    'gambar_alternatif' => $this->upload->data("file_name")
                                ];
                                $this->Alternatif_model->update($id_alternatif, $data);
                                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update! (dengan update gambar)</div>');
                                redirect('Alternatif/edit/'.$id_alternatif);
                            }
                        }
                    }
                    else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal di update! Kode atau Nama Alternatif sudah ada di database.</div>');
                        redirect('Alternatif/edit/'.$id_alternatif);
                    }
                }
                // Hapus Gambar (di edit Alternatif)
                if($action == 'hapus') {
                    $id_alternatif = $this->input->post('id_alternatif');
                    $this->Alternatif_model->hapus_gambar($id_alternatif, $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gambar alternatif berhasil dihapus!</div>');
                    redirect('Alternatif/edit/'.$id_alternatif);
                }
            }
        }
    
        public function destroy($id_alternatif)
        {
            if ($this->session->userdata('id_user_level') == "1") {
                $kode_alternatif = implode(',', (array_column($this->Alternatif_model->get_kode_nama_alternatif($id_alternatif), 'kode_alternatif')));
                $nama_alternatif = implode(',', (array_column($this->Alternatif_model->get_kode_nama_alternatif($id_alternatif), 'nama_alternatif')));

                $this->Alternatif_model->delete($id_alternatif);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Alternatif '.$nama_alternatif.' ('.$kode_alternatif.') berhasil dihapus!</div>');
                redirect('Alternatif');
            }
        }
    }