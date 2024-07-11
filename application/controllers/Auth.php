<?php

class Auth extends CI_Controller
{

    public function login()
    {
        $this->load->model('model_user');

        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_login');
        } else {
            $password = md5($this->input->post('password'));
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('error', 'Username atau Password Salah!');
                redirect('auth/login');
            } else {
                $user_data = array(
                    'id_user' => $auth->id_user,
                    'username' => $auth->username,
                    'role_id' => $auth->role_id,
                    'nama' => $auth->nama,
                    'notelp' => $auth->notelp,
                    'email_user' => $auth->email_user,
                    // data lainnya
                );
                $this->session->set_userdata($user_data);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('auth/login');
    }
    public function forgot_password()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', ['required' => 'Email wajib diisi!', 'valid_email' => 'Email tidak valid!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_forgot_password');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $user = $this->model_auth->get_user_by_username_email($username, $email);

            if (!$user) {
                $this->session->set_flashdata('error', 'Username atau Email tidak terdaftar!');
                redirect('auth/forgot_password');
            }

            $this->session->set_userdata('reset_user_id', $user->id_user);
            redirect('auth/reset_password/' . $user->id_user);
        }
    }

    public function reset_password($id_user)
    {
        if (!$id_user) {
            $this->session->set_flashdata('error', 'Permintaan reset password tidak valid.');
            redirect('auth/forgot_password');
        }

        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]', ['required' => 'Password Baru wajib diisi!', 'min_length' => 'Password Baru minimal terdiri dari 8 karakter!']);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'required|matches[new_password]', ['required' => 'Konfirmasi Password Baru wajib diisi!', 'matches' => 'Konfirmasi Password Baru tidak cocok dengan Password Baru!']);

        if ($this->form_validation->run() == FALSE) {
            $data['id_user'] = $id_user;
            $this->load->view('form_reset_password', $data);
        } else {
            $newPassword = $this->input->post('new_password');

            // Update password pengguna
            $newPasswordHash = $this->model_user->md5_password($newPassword); // Menggunakan model md5_password
            $this->model_auth->update_password($id_user, $newPasswordHash);

            $this->session->set_flashdata('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
            redirect('auth/login');
        }
    }


}
