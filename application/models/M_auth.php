<?php

class M_auth extends CI_Model
{
    public function registrasiUser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'nisn' => htmlspecialchars($this->input->post('nisn', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }
}
