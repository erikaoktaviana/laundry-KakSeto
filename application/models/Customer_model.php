<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Customer_model extends CI_Model {

    // Untuk menampilkan Data Barang
        public function getDataCustomer()
    {
        return $this->db->get('customer')->result_array();
    }

    // Untuk relasi Form Input laporan
	public function getAllCustomer() 
	{
		return $this->db->get('customer')->result();
	}

    //Menampilkan form edit Customer
    public function getById($id_customer) {
        return $this->db->get_where('customer', ['id_customer' => $id_customer])->row();
    }

    //Proses Update Customer
    	public function update($data, $id_customer)
	{
		return $this->db->where('id_customer', $id_customer)->update('customer', $data);
	}

    //Menghapus data Customer
        public function deleteCustomer($id_customer) {
            
		return $this->db->where('id_customer', $id_customer)->delete('customer');
	}

    //Fungsi search Customer
    public function searchCustomer($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('customer')->result_array();
    }
		
	}
