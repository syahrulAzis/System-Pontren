<?php

class M_user extends CI_Model
{
    public function editUser()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        // cek Jika ada gambar yang di upload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/images/profile/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '2048';
            // $config['max_width'] = '1024';
            // $config['max_height'] = '768';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/images/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        // End Proses

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
