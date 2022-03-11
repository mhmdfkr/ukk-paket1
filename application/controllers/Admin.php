<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Dashboard', 'History', 'daftarUser']);
        is_logged_in();
    }


    public function home()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['member'] = $this->db->get('user')->result_array();
        $data['dashboard'] = $this->Dashboard->getDataUser();
        $data['users'] = $this->Dashboard->all();
        $data['activity'] = $this->Dashboard->activity();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/home');
        $this->load->view('templates/footer');
    }

    public function detail_history($id)
    {
        $data['title'] = 'History';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['history'] = $this->Dashboard->getHistoryUser($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_history', $data);
        $this->load->view('templates/footer');
    }


    public function users()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->db->get('user')->result_array();

        // PAGINATION
        // $this->load->library('pagination');

        // data keyword
        // if ($this->input->post('submit')) {
        //     $data['keyword'] = $this->input->post('keyword');
        //     $this->session->set_userdata('keyword', $data['keyword']);
        // } else {
        //     $data['keyword'] = $this->session->userdata('keyword');
        // }

        // config
        // $this->db->like('date', $data['keyword']);
        // $this->db->from('user');
        // $config['total_rows'] = $this->db->count_all_results();
        // $data['total_rows'] = $config['total_rows'];
        // $config['per_page'] = 5;


        // initialize
        // $this->pagination->initialize($config);

        // $data['start'] = $this->uri->segment(3);
        // $data['history'] = $this->daftarUser->getHistory($config['per_page'], $data['start'], $data['keyword']);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->db->delete('user', ['id' => $id]);
        redirect('admin/users');
    }
}
