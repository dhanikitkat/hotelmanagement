<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Memeriksa apakah pengguna telah login dan memiliki role_id 2 (sesuai permintaan)
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }

        $this->load->model('Model_user');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id_user');
        $data['user'] = $this->Model_user->get_user_by_id($user_id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('profile_view', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $user_id = $this->session->userdata('id_user');
        $data['user'] = $this->Model_user->get_user_by_id($user_id);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_profile_view', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $user_id = $this->session->userdata('id_user');

        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $notelp = $this->input->post('notelp');
        $email = $this->input->post('email');

        $data = array(
            'nama' => $nama,
            'notelp' => $notelp,
            'email_user' => $email
        );

        $where = array('id_user' => $user_id);
        $this->Model_user->update_user($where, $data);

        redirect('profile');
    }

    public function change_password()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('change_password_view');
        $this->load->view('templates/footer');
    }

    public function update_password()
    {
        // Mengambil input password saat ini, password baru, dan konfirmasi password baru
        $currentPassword = $this->input->post('current_password');
        $newPassword = $this->input->post('new_password');
        $confirmPassword = $this->input->post('confirm_password');

        // Melakukan validasi terhadap input
        if ($newPassword !== $confirmPassword) {
            // Jika password baru dan konfirmasi password baru tidak cocok, tampilkan pesan error
            $this->session->set_flashdata('error', 'Konfirmasi password baru tidak cocok.');
            redirect('profile/change_password');
        }

        // Memeriksa apakah password saat ini sesuai dengan password yang ada dalam database
        $user_id = $this->session->userdata('id_user');
        $user = $this->Model_user->get_user_by_id($user_id);
        if (md5($currentPassword) !== $user->password) {
            // Jika password saat ini tidak cocok, tampilkan pesan error
            $this->session->set_flashdata('error', 'Password saat ini tidak benar.');
            redirect('profile/change_password');
        }

        // Mengubah password pengguna
        $newPasswordHash = md5($newPassword);
        $data = array('password' => $newPasswordHash);
        $where = array('id_user' => $user_id);
        $this->Model_user->update_user($where, $data);

        // Menampilkan pesan sukses dan mengarahkan pengguna ke halaman profile
        $this->session->set_flashdata('success', 'Password berhasil diubah.');
        redirect('profile/change_password');
    }


}
