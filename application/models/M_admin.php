<?php

class M_admin extends CI_Model
{
    public function addRole()
    {
        $data = [
            'role' => htmlspecialchars($this->input->post('role', true)),
        ];
        $this->db->insert('user_role', $data);
    }
    public function roleDelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
}
