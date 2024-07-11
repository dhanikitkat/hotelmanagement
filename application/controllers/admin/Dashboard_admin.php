<?php   
 class Dashboard_admin extends CI_Controller
 {
    public function index()
    {
        // Menghitung jumlah pengguna aktif dengan role_id "2"
        $data['active_users'] = $this->model_user->count_users();

        // Menghitung jumlah data hotel
        $data['total_hotels'] = $this->model_hotel->count_hotels();

        // Menghitung jumlah pengguna aktif dengan role_id "2"
        $data['active_admins'] = $this->model_user->count_users_admin();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }

 }
 