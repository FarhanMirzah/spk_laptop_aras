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
                'nama'  => $data['nama']
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
			$query = $this->db->query("SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria' ORDER BY nilai DESC;");
			return $query->result_array();
		}
    }
    
    