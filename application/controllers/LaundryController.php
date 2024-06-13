<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LaundryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Laporan_model');
    }
        
    // Menampilkan halaman Awal
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer', $data);
    }

    // Menampilkan data Paket
    public function tampilpaket()
    {
        $this->load->model('Paket_model');
        $data['title'] = 'PAKET LAUNDRY';


        $this->load->view('templates/header', $data);
        $data['paket'] = $this->Paket_model->getDataPaket();
        $this->load->view('paket/tampilpaket', $data);
        $this->load->view('templates/footer', $data);
    }

    // Menampilkan data Customer
    public function tampilcustomer()
    {
        $this->load->model('Customer_model');
        $data['title'] = 'DATA CUSTOMER';

        $this->load->view('templates/header', $data);
        $data['customer'] = $this->Customer_model->getDataCustomer();
        $this->load->view('customer/tampilcustomer', $data);
        $this->load->view('templates/footer', $data);
    }
        
    // Menampilkan halaman laporan
    public function tampillaporan()
    {
        $data['title'] = 'DATA LAPORAN';
        $data['laporan'] = $this->Laporan_model->getDataLaporan();
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/tampillaporan', $data);
        $this->load->view('templates/footer', $data);
    }
    
        
        
    // Menampilkan Input Paket
    public function inputpaket()
    {
        $data['title'] = 'INPUT PAKET LAUNDRY';

        $this->load->view('templates/header', $data);
        $this->load->view('paket/inputpaket', $data);
        $this->load->view('templates/footer', $data);
    }

    
    // Proses simpan Input Paket
    function simpanPaket()
    {
        $simpanPaket = array(
            'id_paket' => $this->input->post('id_paket'),
            'jenisPaket' => $this->input->post('jenisPaket'),
            'biaya' => $this->input->post('biaya'),
            'ket' => $this->input->post('ket'),

        );
        $simpan = $this->db->insert('paket', $simpanPaket);
        if ($simpan) {
            $this->session->set_flashdata('alert', 'Data berhasil ditambah');
        } else {
            $this->session->set_flashdata('alert', 'Data gagal ditambah');
        }

        redirect('LaundryController/tampilpaket');
    }

    // Menampilkan Input Customer
    public function inputcustomer()
    {
        $data['title'] = 'INPUT DATA CUSTOMER';

        $this->load->view('templates/header', $data);
        $this->load->view('customer/inputcustomer', $data);
        $this->load->view('templates/footer', $data);
    }

    
    // Proses simpan Input Customer
    function simpanCustomer()
    {
        $simpanCustomer = array(
            'id_customer' => $this->input->post('id_customer'), //Akan diisi dengan nilai dari input form dengan nama 'id_customer'
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),

        );
        $simpan = $this->db->insert('customer', $simpanCustomer);
         if ($simpan) {
            $this->session->set_flashdata('alert', 'Data berhasil ditambah');
        } else {
            $this->session->set_flashdata('alert', 'Data gagal ditambah');
        }

        redirect('LaundryController/tampilcustomer');
    }

    // Menampilkan Input Laporan
    public function inputlaporan()
    {
        $this->load->model('Paket_model');
        $this->load->model('Customer_model');

        $data['title'] = 'INPUT DATA LAPORAN';
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['customer'] = $this->Customer_model->getAllCustomer();

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/inputlaporan', $data);
        $this->load->view('templates/footer', $data);
    }


    // Proses simpan Input Laporan
    public function simpanLaporan()
    {
        $this->load->model('Laporan_model');
        
        $noStruk = $this->input->post('noStruk');
        $id_customer = $this->input->post('id_customer');
        $tglTransaksi = $this->input->post('tglTransaksi');
        $id_paket = $this->input->post('id_paket');
        $berat = $this->input->post('berat');
        $status = $this->input->post('status');

        $data = [
            'noStruk' => $noStruk,
            'id_customer' => $id_customer,
            'tglTransaksi' => $tglTransaksi,
            'id_paket' => $id_paket,
            'berat' => $berat,
            'status' => $status,
        ];

        $simpan = $this->Laporan_model->insert($data);
        if ($simpan) {
            $this->session->set_flashdata('alert', 'Data berhasil ditambah');
        } else {
            $this->session->set_flashdata('alert', 'Data gagal ditambah');
        }
        redirect('LaundryController/tampillaporan');
    }


    // Menampilkan Form Edit Paket
    public function formUpdatePaket($id_paket)
	{
		$this->load->model('Paket_model');

    //Ambil data Paket dari database
       $data['paket'] = $this->Paket_model->getById($id_paket);

    // Menampilkan Form Update Paket
        $data['title'] = 'UPDATE DATA PAKET';
        
        $this->load->view('templates/header', $data);
        $this->load->view('paket/updatepaket', $data);
        $this->load->view('templates/footer', $data);
		}

    //Proses Update Paket
        public function updatePaket(){

            $this->load->model('Paket_model');

            $id_paket = $this->input->post('id_paket');
            $jenisPaket = $this->input->post('jenisPaket');
            $biaya = $this->input->post('biaya');
            $ket = $this->input->post('ket');

                $data = [
                    'jenisPaket' => $jenisPaket,
                    'biaya' => $biaya,
                    'ket' => $ket
                ];

        $update = $this->Paket_model->update($data, $id_paket);

        if ($update) {
            $this->session->set_flashdata('alert', 'Data berhasil diedit');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil diedit');
        }


        redirect('LaundryController/tampilpaket');
    }

    // Menampilkan Form Edit Customer
    public function formUpdateCustomer($id_customer)
	{
	    $this->load->model('Customer_model');

    //Ambil data Customer dari database
       $data['customer'] = $this->Customer_model->getById($id_customer);

    // Menampilkan Form Update Customer
        $data['title'] = 'UPDATE DATA CUSTOMER';
        
        $this->load->view('templates/header', $data);
        $this->load->view('customer/updatecustomer', $data);
        $this->load->view('templates/footer', $data);
		}


    //Proses Update Customer
    public function updateCustomer()
    {

    $this->load->model('Customer_model');

    $id_customer = $this->input->post('id_customer');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $telp = $this->input->post('telp');

                $data = [
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'telp' => $telp
                ];

        $update = $this->Customer_model->update($data, $id_customer);
        if ($update) {
            $this->session->set_flashdata('alert', 'Data berhasil diedit');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil diedit');
        }

        redirect('LaundryController/tampilcustomer');
    }

    // Menampilkan Form Edit Laporan
    public function formUpdateLaporan($id_laporan)
	{
		$this->load->model('Paket_model');
		$this->load->model('Customer_model');
		$this->load->model('Laporan_model');

    //Ambil data laporan dari database
        $data['paket'] = $this->Paket_model->getAllPaket();
        $data['customer'] = $this->Customer_model->getAllCustomer();
        $data['laporan'] = $this->Laporan_model->getById($id_laporan);

    // Menampilkan Form Update Laporan
        $data['title'] = 'UPDATE DATA LAPORAN';
        
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/updatelaporan', $data);
        $this->load->view('templates/footer', $data);
		}



    //Proses Update Laporan
        public function updateLaporan(){
            $this->load->model('Laporan_model');
            $this->load->model('Paket_model');
            $this->load->model('Customer_model');
            

            $id_laporan = $this->input->post('id_laporan');
            $tglTransaksi = $this->input->post('tglTransaksi');
            $noStruk = $this->input->post('noStruk');
            $id_customer = $this->input->post('id_customer');
            $id_paket = $this->input->post('id_paket');
            $berat = $this->input->post('berat');
            $status = $this->input->post('status');

                $data = [
                    'noStruk' => $noStruk,
                    'tglTransaksi' => $tglTransaksi,
                    'id_customer' => $id_customer,
                    'id_paket' => $id_paket,
                    'berat' => $berat,
                    'status' => $status
                ];

        $update = $this->Laporan_model->update($data, $id_laporan);
        if ($update) {
            $this->session->set_flashdata('alert', 'Data berhasil diedit');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil diedit');
        }

        redirect('LaundryController/tampillaporan');
    }


    
    //Menghapus data Paket
    public function deletePaket($id_paket) {
        
        $this->load->model('Paket_model');
        $deletePaket = $this->Paket_model->deletePaket($id_paket);

        if ($this->Paket_model->deletePaket($id_paket)) {
            $this->session->set_flashdata('alert', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil dihapus');
        }

        redirect('LaundryController/tampilpaket');
    }

    //Menghapus data Customer
    public function deleteCustomer($id_customer) {
         
        $this->load->model('Customer_model');
        $deleteCustomer = $this->Customer_model->deleteCustomer($id_customer);

        if ($this->Customer_model->deleteCustomer($id_customer)) {
            $this->session->set_flashdata('alert', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil dihapus');
        }

        redirect('LaundryController/tampilcustomer');
    }

    //Menghapus data Laporan
    public function deleteLaporan($id_laporan) {
         
        $this->load->model('Laporan_model');
        $deleteLaporan = $this->Laporan_model->deleteLaporan($id_laporan);

        if ($this->Laporan_model->deleteLaporan($id_laporan)) {
            $this->session->set_flashdata('alert', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('alert', 'Data tidak berhasil dihapus');
        }


        redirect('LaundryController/tampillaporan');
    }


    // Search Paket
    public function searchPaket()
	{
        $this->load->model('Paket_model');

    //Ambil data keyword dari form pencarian
        $keyword = $this->input->post('keyword');

    //Cari data paket berdasarkan keyword
        $data['paket'] = $this->Paket_model->searchPaket($keyword);

    //Menampilkan halaman paket berdasarkan keyword yang dicari
        $data['title'] = 'DATA PAKET';
        $this->load->view('templates/header', $data);
        $this->load->view('paket/tampilpaket', $data);
        $this->load->view('templates/footer', $data);
    }



    // Search Customer
    public function searchCustomer()
	{
        $this->load->model('Customer_model');

    //Ambil data keyword dari form pencarian
        $keyword = $this->input->post('keyword');

    //Cari data customer berdasarkan keyword
        $data['customer'] = $this->Customer_model->searchCustomer($keyword);

    //Menampilkan halaman customer berdasarkan keyword yang dicari
        $data['title'] = 'DATA PAKET';
        $this->load->view('templates/header', $data);
   
        $this->load->view('customer/tampilcustomer', $data);
        $this->load->view('templates/footer', $data);
    }

    // Search Paket
    public function searchLaporan()
	{
        $this->load->model('Laporan_model');
        $this->load->model('Paket_model');
        $this->load->model('Customer_model');

    //Ambil data keyword dari form pencarian
        $keyword = $this->input->post('keyword');

    //Cari data Laporan berdasarkan keyword
        $data['laporan'] = $this->Laporan_model->searchLaporan($keyword);

    //Menampilkan halaman laporan berdasarkan keyword yang dicari
        $data['title'] = 'DATA LAPORAN';
        $this->load->view('templates/header', $data);
        $this->load->view('laporan/tampillaporan', $data);
        $this->load->view('templates/footer', $data);
    }

}

 