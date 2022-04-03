<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_finance');
    }
    public function index()
    {
        $data['title'] = 'Pembayaran Syahriah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['pembayaran'] = $this->db->get('pembayaran_syahriah')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('finance/index', $data);
        $this->load->view('templates/footer');
    }
    public function bankSantri()
    {
        $data['title'] = 'Bank Santri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->db->get('pembayaran_syahriah')->result_array();

        $data['kas_masuk'] = $this->db->query("SELECT sum(nominal) as nominal FROM bank_santri where tipe_kas = 'masuk'")->row_array();

        // $data['jurnal'] = $this->db->query("SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.id = b.id_jurnal order by a.tgl_transaksi asc")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('finance/bank-santri', $data);
        $this->load->view('templates/footer');
    }
}
