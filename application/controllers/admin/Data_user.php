<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
        $this->load->model('model_user');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/data_user/');
        $config['total_rows'] = $this->model_user->count_users();
        $config['per_page'] = 10;

        // Konfigurasi untuk tampilan pagination dengan kotak
        $config['full_tag_open'] = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul>
        </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['users'] = $this->model_user->get_user_pagination($config['per_page'], $this->uri->segment(3));
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }

     public function tambah_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email_user', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'Harap isi semua form.');
            $this->load->view('tambah_user');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->model_user->md5_password($this->input->post('password'));
            $role_id = $this->input->post('role_id');
            $notelp = $this->input->post('notelp');
            $email_user = $this->input->post('email_user');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id,
                'notelp' => $notelp,
                'email_user' => $email_user
            );

            $this->model_user->tambah_user($data, 'tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil ditambahkan.</div>');
            redirect('admin/data_user');
        }
    }

    public function edit($id)
    {
        $where = array('id_user' => $id);
        $data['user'] = $this->model_user->edit_user($where, 'tb_user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');
        $notelp = $this->input->post('notelp');
        $email_user = $this->input->post('email_user');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'role_id' => $role_id,
            'notelp' => $notelp,
            'email_user' => $email_user
        );

        if (!empty($password)) {
            $password = $this->model_user->md5_password($password);
            $data['password'] = $password;
        }

        $where = array(
            'id_user' => $id
        );

        $this->model_user->update_user($where, $data, 'tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil diupdate!</div>');
        redirect('admin/data_user');
    }

    public function hapus($id)
    {
        $where = array('id_user' => $id);
        $this->model_user->hapus_user($where, 'tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil dihapus!</div>');
        redirect('admin/data_user');
    }

    public function detail_user($id_user)
    {
        $data['user'] = $this->model_user->detail_user($id_user);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_user', $data);
        $this->load->view('templates_admin/footer');
    }

    
}