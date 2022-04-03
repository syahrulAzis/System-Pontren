<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminFinance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_adminFinance');
        //is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Management Syahriah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->db->get('pembayaran_syahriah')->result_array();

        if ($this->input->post('keyword')) {
            $data['pembayaran'] = $this->M_adminFinance->cariDataUser_id();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin-finance/index', $data);
        $this->load->view('templates/footer');
    }
    public function addAdminFinance()
    {
        $data['title'] = 'Management Syahriah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // looping data menu
        $data['user_id'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim');
        $this->form_validation->set_rules('user_id', 'Name', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Class', 'required|trim');
        $this->form_validation->set_rules('total_tagihan', 'Total Tagihan', 'required|trim');
        $this->form_validation->set_rules('batas_pembayaran', 'Batas Pembayaran', 'required|trim');
        $this->form_validation->set_rules('total_telah_dibayar', 'Total Telah dibayar', 'required|trim');
        $this->form_validation->set_rules('sisa_tagihan', 'Sisa Tagihan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin-finance/addAdmin-finance', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_adminFinance->addAdminFinance();
            $this->session->set_flashdata('message', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
             Success Add New Transaktion !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('adminfinance');
        }
    }
    public function deletefinance($id)
    {
        $this->M_adminFinance->deletefinance($id);
        $this->session->set_flashdata('message', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
             Success Delete Finance Transaktion !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('adminfinance');
    }
    public function bankSantriManagement()
    {
        $data['title'] = 'Bank Santri Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_id'] = $this->db->get('user')->result_array();

        $data['jurnal'] = $this->db->query("SELECT a.id,a.nisn,a.id_transaksi,a.user_bank,a.kelas,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.id = b.id_jurnal order by a.tgl_transaksi asc")->result_array();

        if ($this->input->post('keyword')) {
            $data['jurnal'] = $this->M_adminFinance->cariDataSantri();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin-finance/bankSantri-management', $data);
        $this->load->view('templates/footer');
    }

    public function setorTunaiBankSantri()
    {
        $data['title'] = 'Bank Santri Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_id'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nisn', 'Nisn', 'required');
        $this->form_validation->set_rules('user_bank', 'Name', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin-finance/bankSantri-management', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_adminFinance->addTransakiBankSantri();
            $this->session->set_flashdata('message', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                 Success Add Finance Transaktion !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('adminfinance/bankSantriManagement');
        }
    }

    public function tarikTunaiBankSantri()
    {
        $data['title'] = 'Bank Santri Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user_id'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nisn', 'Nisn', 'required');
        $this->form_validation->set_rules('user_bank', 'Name', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin-finance/bankSantri-management', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_adminFinance->tarikTunaiBankSantri();
            $this->session->set_flashdata('message', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Success</span>
                 Success Add Finance Transaktion !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('adminfinance/bankSantriManagement');
        }
    }
}
