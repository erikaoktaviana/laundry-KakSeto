<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Paket_model extends CI_Model {

    // Untuk menampilkan Data Paket
    public function getDataPaket()
    {
        return $this->db->get('paket')->result_array();
    }


    // Untuk relasi Form Input laporan
	public function getAllPaket() 
	{
		return $this->db->get('paket')->result();
	}


    //Menampilkan form edit Paket
    public function getById($id_paket) {
        return $this->db->get_where('paket', ['id_paket' => $id_paket])->row();
    }

    //Proses update Paket
    public function update($data, $id_paket)
	{
		return $this->db->where('id_paket', $id_paket)->update('paket', $data);
	}

        
    //Menghapus data Paket
    public function deletePaket($id_paket) {
            
		return $this->db->where('id_paket', $id_paket)->delete('paket');
	}

    //Fungsi search Paket
    public function searchPaket($keyword) {
        $this->db->like('jenisPaket', $keyword);
        return $this->db->get('paket')->result_array();
    }
		
	}
