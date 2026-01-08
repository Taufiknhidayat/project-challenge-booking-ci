<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_mysqli_driver $db
 * @property CI_Session $session
 */
class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) { redirect('auth'); }
    }

    public function index() {
        $data['title'] = 'Data Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // Join tabel booking dengan user dan court untuk menampilkan nama
        $this->db->select('bookings.*, user.name as customer_name, courts.name as court_name');
        $this->db->from('bookings');
        $this->db->join('user', 'bookings.user_id = user.id');
        $this->db->join('courts', 'bookings.court_id = courts.id');
        $data['bookings'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/index', $data);
        $this->load->view('templates/footer');
    }
}