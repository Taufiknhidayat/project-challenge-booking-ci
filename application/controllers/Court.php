<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_mysqli_driver $db
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 */
class Court extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) { redirect('auth'); }
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Data Lapangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['courts'] = $this->db->get('courts')->result_array();

        $this->form_validation->set_rules('name', 'Nama Lapangan', 'required');
        $this->form_validation->set_rules('type', 'Tipe Lapangan', 'required');
        $this->form_validation->set_rules('price_per_hour', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('court/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'price_per_hour' => $this->input->post('price_per_hour'),
                'status' => 'available'
            ];
            $this->db->insert('courts', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Lapangan baru berhasil ditambah!</div>');
            redirect('court');
        }
    }

    // Fungsi hapus lapangan (biar lengkap CRUD-nya)
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('courts');
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Lapangan berhasil dihapus!</div>');
        redirect('court');
    }
}