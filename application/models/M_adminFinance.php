<?php

class M_adminFinance extends CI_Model
{
    public function addAdminFinance()
    {
        $data = [
            'nisn' => htmlspecialchars($this->input->post('nisn', true)),
            'user_id' => htmlspecialchars($this->input->post('user_id', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'total_tagihan' => htmlspecialchars($this->input->post('total_tagihan', true)),
            'batas_pembayaran' => htmlspecialchars($this->input->post('batas_pembayaran', true)),
            'total_telah_dibayar' => htmlspecialchars($this->input->post('total_telah_dibayar', true)),
            'sisa_tagihan' => htmlspecialchars($this->input->post('sisa_tagihan', true)),

        ];
        $this->db->insert('pembayaran_syahriah', $data);
    }
    public function deletefinance($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pembayaran_syahriah');
    }
    public function cariDataUser_id()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('user_id', $keyword);
        $this->db->or_like('nisn', $keyword);
        return $this->db->get('pembayaran_syahriah')->result_array();
    }
    public function addTransakiBankSantri()
    {
        $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        $bank_santri =  $this->db->get_where('bank_santri', ['id_transaksi' => $idtransaksi])->row_array();
        if ($bank_santri) {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        }
        $data = [
            'id_transaksi' => $idtransaksi,
            'tipe_kas' => 'masuk',
            'nisn' => $this->input->post('nisn'),
            'user_bank' => $this->input->post('user_bank'),
            'kelas' => $this->input->post('kelas'),
            'keterangan' => $this->input->post('keterangan'),
            'tgl_transaksi' => $this->input->post('tanggal'),
            'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
        ];
        $this->db->insert('bank_santri', $data);
    }
    public function tarikTunaiBankSantri()
    {
        $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        $bank_santri =  $this->db->get_where('bank_santri', ['id_transaksi' => $idtransaksi])->row_array();
        if ($bank_santri) {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        }
        $data = [
            'id_transaksi' => $idtransaksi,
            'tipe_kas' => 'keluar',
            'nisn' => $this->input->post('nisn'),
            'user_bank' => $this->input->post('user_bank'),
            'kelas' => $this->input->post('kelas'),
            'keterangan' => $this->input->post('keterangan'),
            'tgl_transaksi' => $this->input->post('tanggal'),
            'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
        ];

        $this->db->insert('bank_santri', $data);
    }
    public function cariDataSantri()
    {
        $keyword = $this->input->post('keyword', true);

        return $this->db->query("SELECT a.id,a.nisn,a.id_transaksi,a.user_bank,a.kelas,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where nisn like '$keyword' order by a.tgl_transaksi asc")->result_array();
    }
}
