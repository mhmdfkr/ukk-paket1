<?php

class daftarUser extends CI_Model
{

    public function getHistoryUsers()
    {
        return $this->db->get('history')->result_array();
    }

    public function getHistory($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('date', $keyword);
            $this->db->or_like('time', $keyword);
            $this->db->or_like('location', $keyword);
        }
        return $this->db->get('history', $limit, $start)->result_array();
    }

    public function countAllHistory()
    {
        return $this->db->get('history')->num_rows();
    }
}
