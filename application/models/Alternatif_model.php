<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Alternatif_model extends CI_Model {

        public function tampil()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('alternatif', $data);
            return $result;
        }

        public function show($id_alternatif)
        {
            $this->db->where('id_alternatif', $id_alternatif);
            $query = $this->db->get('alternatif');
            return $query->row();
        }

        public function update($id_alternatif, $data = [])
        {
            $ubah = array(
                'kode_alternatif'  => $data['kode_alternatif'],
                'nama_alternatif'  => $data['nama_alternatif'],
                'gambar_alternatif'  => $data['gambar_alternatif']
            );

            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->update('alternatif', $ubah);
        }


        public function delete($id_alternatif)
        {
            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->delete('alternatif');
        }

        // Semua kode di bawah Untuk Detail Alternatif
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->query("SELECT * FROM alternatif");
            return $query->result();
        }

        public function data_penilaian($id_alternatif,$id_kriteria)
        {
            $query = $this->db->query("SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
            return $query->row_array();
        }
		public function data_sub_kriteria($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai_sub_kriteria DESC;");
			return $query->result_array();
		}

        // Kode untuk mendapatkan filename / gambar_alternatif
        public function get_gambar_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT gambar_alternatif FROM alternatif WHERE id_alternatif=$id_alternatif;");
			return $query->result_array();
		}

        // Kode untuk menghapus gambar alternatif
        public function hapus_gambar($id_alternatif, $data = [])
        {
            $hapus = array(
                'gambar_alternatif'  => NULL
            );

            $this->db->where('id_alternatif', $id_alternatif);
            $this->db->update('alternatif', $hapus);
        }

        // Kode untuk mendapatkan kode_alternatif
        public function get_kode_nama_alternatif($id_alternatif)
        {
            $query = $this->db->query("SELECT kode_alternatif, nama_alternatif FROM alternatif WHERE id_alternatif=$id_alternatif;");
            return $query->result_array();
        }
    }
    
    