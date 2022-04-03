<?php

class M_menu extends CI_Model
{
    public function addMenu()
    {
        $data = [
            'menu' => htmlspecialchars($this->input->post('menu', true)),
        ];
        $this->db->insert('user_menu', $data);
    }
    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }
    public function get_subMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        
        ";
        return $this->db->query($query)->result_array();
    }
    public function addSubmenu()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
            'url' => htmlspecialchars($this->input->post('url', true)),
            'icon' => htmlspecialchars($this->input->post('icon', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true)),

        ];
        $this->db->insert('user_sub_menu', $data);
    }
    public function deleteSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
