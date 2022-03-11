<?php

class Dashboard extends CI_Model
{
    public function getDataUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getHistoryUser($id)
    {
        return $this->db->get_where('dataperjalanan', ['user_id' => $id])->result_array();
    }

    public function all()
    {
        $this->db->select('user.*, user_role.role')
            ->from('user')
            ->join('user_role', 'user.role_id=user_role.id');
        return $this->db->get()->result_array();
    }

    public function activity()
    {
        return $this->db->get('dataperjalanan')->result_array();
    }
}
