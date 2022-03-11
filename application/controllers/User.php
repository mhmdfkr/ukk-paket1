<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation']);
        $this->load->model(['History', 'daftarUser']);
        is_logged_in();
    }


    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history'] = $this->History->getHistoryUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }


    public function isi_data()
    {
        $data['title'] = 'Insert Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/isi_data', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPerjalanan = [
                'user_id' => $this->session->userdata('id'),
                'tanggal' => date('Y-m-d'),
                'jam' => gmdate('H:i:s', time() + 60 * 60 * 7),
                'lokasi' => $this->input->post('lokasi'),
            ];
            $this->db->insert('dataperjalanan', $dataPerjalanan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Insert data success.</div>');
            redirect('user/history');
        }
    }


    public function history()
    {
        $data['title'] = 'History';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['history'] = $this->History->getHistoryUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/history', $data);
        $this->load->view('templates/footer');
    }


    public function histories()
    {
        $data['title'] = 'Histories';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // PAGINATION
        $this->load->library('pagination');

        // data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config
        $this->db->like('date', $data['keyword']);
        $this->db->from('history');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;


        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['history'] = $this->History->getHistory($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/histories', $data);
        $this->load->view('templates/footer');
    }

    // public function pdf()
    // {
    //     $data['history'] = $this->History->getHistoryUser();
    //     $paper_size = 'A4';
    //     $orientation = 'landscape';
    //     $html = $this->output->get_output();

    //     $this->load->library('dompdf_gen.php');
    //     $this->load->view('laporan_pdf', $data);
    //     $this->dompdf->set_paper($paper_size, $orientation);
    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan.pdf", ['Attachment' => 0]);
    // }
}
