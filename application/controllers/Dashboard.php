<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        // Menghitung jumlah data hotel
        $data['total_hotels'] = $this->model_hotel->count_hotels();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
