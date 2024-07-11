<?php

class Registrasi extends CI_Controller
{

    public function index()
    {
        $this->load->model('Model_user');

        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama wajib diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required', ['required' => 'Nomor Telepon wajib diisi!']);
        $this->form_validation->set_rules('email_user', 'Email', 'required|valid_email', ['required' => 'Email wajib diisi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('registrasi');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password')); // Menggunakan fungsi md5() untuk mengenkripsi password
            $notelp = $this->input->post('notelp');
            $email_user = $this->input->post('email_user');

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'role_id' => 2,
                'notelp' => $notelp,
                'email_user' => $email_user
            );

            $this->Model_user->tambah_user($data, 'tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan.</div>');
            redirect('auth/login');
        }
    }
}
