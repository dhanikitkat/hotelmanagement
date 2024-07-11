<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_hotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
        $this->load->model('model_hotel');

    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('data_hotel/index');
        $config['total_rows'] = $this->model_hotel->count_hotels();
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

        $data['hotel'] = $this->model_hotel->get_hotel_pagination($config['per_page'], $this->uri->segment(3));
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('data_hotel', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        // Validasi form input
        $this->form_validation->set_rules('nama_hotel', 'Nama Hotel', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('website', 'Website', 'required|valid_url');
        $this->form_validation->set_rules('harga_min', 'Harga Minimum', 'required|numeric');
        $this->form_validation->set_rules('harga_max', 'Harga Maximum', 'required|numeric');

        // Cek apakah form input valid
        if ($this->form_validation->run() == FALSE) {
            // Jika tidak valid, tampilkan form tambah dengan alert Bootstrap
            $this->session->set_flashdata('message', 'Harap isi semua form.');
            $this->load->view('tambah_hotel');
        } else {
            // Jika valid, simpan data ke database
            $nama_hotel = $this->input->post('nama_hotel');
            $alamat = $this->input->post('alamat');
            $fasilitas = $this->input->post('fasilitas');
            $telepon = $this->input->post('telepon');
            $email = $this->input->post('email');
            $website = $this->input->post('website');
            $harga_min = $this->input->post('harga_min');
            $harga_max = $this->input->post('harga_max');

            // Upload gambar
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = $_FILES['gambar_hotel']['name'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_hotel')) {
                // Jika file gambar tidak valid, tampilkan pesan error dengan Bootstrap Alert
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File gambar harus berformat .jpg atau .png.</div>');
                redirect('data_hotel');
            } else {
                // Jika file gambar valid, simpan data ke database
                $gambar_hotel = $this->upload->data('file_name');

                $data = array(
                    'nama_hotel' => $nama_hotel,
                    'alamat' => $alamat,
                    'fasilitas' => $fasilitas,
                    'telepon' => $telepon,
                    'email' => $email,
                    'website' => $website,
                    'harga_min' => $harga_min,
                    'harga_max' => $harga_max,
                    'gambar_hotel' => $gambar_hotel
                );

                $this->model_hotel->tambah_hotel($data, 'tb_hotel');

                // Tampilkan pesan sukses dengan Bootstrap Alert
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data hotel berhasil ditambahkan.</div>');
                redirect('data_hotel');
            }
        }
    }

    public function edit($id)
    {
        $where = array('id_hotel' => $id);
        $data['hotel'] = $this->model_hotel->edit_hotel($where, 'tb_hotel')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_hotel', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_hotel');
        $nama_hotel = $this->input->post('nama_hotel');
        $alamat = $this->input->post('alamat');
        $fasilitas = $this->input->post('fasilitas');
        $telepon = $this->input->post('telepon');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $harga_min = $this->input->post('harga_min');
        $harga_max = $this->input->post('harga_max');
        $gambar_hotel = $_FILES['gambar_hotel']['name'];

        if ($gambar_hotel == '') {
            // Mengambil gambar lama dari database
            $hotel = $this->model_hotel->get_data_hotel_by_id($id)->row();
            $gambar_hotel = $hotel->gambar_hotel;
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            // Pengecekan jenis file gambar
            $file_type = $_FILES['gambar_hotel']['type'];
            if ($file_type != 'image/jpeg' && $file_type != 'image/png') {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis file gambar tidak valid. Harus berupa JPG atau PNG.</div>');
                redirect('data_hotel/edit/' . $id);
            }

            if (!$this->upload->do_upload('gambar_hotel')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gambar gagal diupload: ' . $error['error'] . '</div>');
                redirect('data_hotel/edit/' . $id);
            } else {
                $gambar_hotel = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_hotel' => $nama_hotel,
            'alamat' => $alamat,
            'fasilitas' => $fasilitas,
            'telepon' => $telepon,
            'email' => $email,
            'website' => $website,
            'harga_min' => $harga_min,
            'harga_max' => $harga_max,
            'gambar_hotel' => $gambar_hotel,
        );
        $where = array(
            'id_hotel' => $id
        );
        $this->model_hotel->update_data($where, $data, 'tb_hotel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data hotel berhasil diupdate!</div>');
        redirect('data_hotel');
    }


    public function hapus($id)
    {
        $where = array('id_hotel' => $id);
        $this->model_hotel->hapus_data($where, 'tb_hotel');
        redirect('data_hotel/index');
    }

    public function detail_hotel($id_hotel)
    {
        $data['hotel'] = $this->model_hotel->detail_hotel($id_hotel);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_hotel', $data);
        $this->load->view('templates/footer');
    }

}
