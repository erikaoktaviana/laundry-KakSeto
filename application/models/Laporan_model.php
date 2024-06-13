<?php 
class Laporan_model extends CI_Model {

    // Untuk menampilkan Data laporan
    public function getDataLaporan()
    {
        $this->db->select('*'); //Untuk menentukan kolom-kolom apa saja yang akan diambil dari tabel
        $this->db->from('laporan');
        $this->db->join('paket', 'paket.id_paket = laporan.id_paket');
        $this->db->join('customer', 'customer.id_customer = laporan.id_customer');
        $query = $this->db->get();
        return $query->result_array();
    }


    // Menambahkan data Laporan
    public function insert($data)
    {
        
    //Ambil data biaya paket berdasarkan id_paket
        $paket = $this->db->get_where('paket', array('id_paket' => $data['id_paket']))->row();

    //Menghitung total 
        $total = $paket->biaya * $data['berat'];

    //Menambahkan kolom total pada laporan
        $data['total'] = $total;
        return $this->db->insert('laporan', $data);
    }


    //Menampilkan form edit Laporan
    public function getById($id_laporan) {
        
        return $this->db->get_where('laporan', ['id_laporan' => $id_laporan])->row();
    }

    //Proses update Laporan
    public function update($data, $id_laporan)
	{

     //Ambil data biaya paket berdasarkan id_paket
        $paket = $this->db->get_where('paket', array('id_paket' => $data['id_paket']))->row();

    //Menghitung total
        $total = $paket->biaya * $data['berat'];

    //Menambahkan kolom total pada laporan
        $data['total'] = $total;

    
    //Proses update Laporan
		return $this->db->where('id_laporan', $id_laporan)->update('laporan', $data);
	}

    
    //Menghapus data Laporan
    public function deleteLaporan($id_laporan) {
            
		return $this->db->where('id_laporan', $id_laporan)->delete('laporan');
	}

    //Fungsi search Laporan
    public function searchLaporan($keyword) {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->join('paket', 'paket.id_paket = laporan.id_paket');
        $this->db->join('customer', 'customer.id_customer = laporan.id_customer');
        $this->db->like('customer.nama', $keyword);
        $this->db->or_like('laporan.noStruk', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }


}
 ?>