<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // method construct yang isinya akan mempengaruhi isi dari semua method di kelas ini

    public function __construct()
    {
        // memanggil method construct dari kelas parent atau yang di extends
        parent::__construct();
        // memanggil library model dari file UserModel.php di folder models
        $this->load->model('UserModel');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // untuk membuat rule atau validasi dari input user dengan data name="email"
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // untuk membuat rule atau validasi dari input user dengan data name="password"
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // untuk mengecek apakah rule atau validasi terpenuhi atau tidak. jika tidak masuk ke if
        if ($this->form_validation->run() == false) {
            // untuk title dari halaman auth
            $data['title'] = 'Login';
            // untuk menyimpan arah file view mana yang ingin ditampilkan
            $data['view'] = 'auth/login';

            // untuk masuk ke views/layout/auth.php serta mengirim data dari variabel $data juga ke auth.php
            $this->load->view('layout/auth', $data);
        } else {
            // memanggil method login dari file UserModel folder models
            $this->UserModel->login();
        }
    }

    public function register()
    {
        // untuk membuat rule atau validasi dari input user dengan data name="username"
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        // untuk membuat rule atau validasi dari input user dengan data name="email"
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        // untuk membuat rule atau validasi dari input user dengan data name="password"
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

        // untuk mengecek apakah rule atau validasi terpenuhi atau tidak. jika tidak masuk ke if
        if ($this->form_validation->run() == false) {
            // untuk title dari halaman auth
            $data['title'] = 'Register';
            // untuk menyimpan arah file view mana yang ingin ditampilkan
            $data['view'] = 'auth/register';
            // untuk masuk ke views/layout/auth.php serta mengirim data dari variabel $data juga ke auth.php
            $this->load->view('layout/auth', $data);
        } else {
            // memanggil method add_data dari file UserModel.php folder models
            $this->UserModel->add_data();

            // untuk membuat flashdata atau notifikasi yang nama variabelnya message
            $this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
			data berhasil ditambahkan
			</div>
            ');

            // mengembalikan/pergi ke controller Auth.php
            redirect('auth');
        }
    }

    public function logout()
    {
        // untuk mendestroy $_SESSION['email'] biar hilang dari variabel superglobal $_SESSION
        $this->session->unset_userdata('email');
        // untuk mendestroy $_SESSION['role_id'] biar hilang dari variabel superglobal $_SESSION
        $this->session->unset_userdata('role_id');
        // untuk membuat flashdata atau notifikasi yang nama variabelnya message
        $this->session->set_flashdata('message', '
        <div class="alert alert-success" role="alert">
        kamu telah logout
        </div>
        ');

        // mengembalikan/pergi ke controller Auth.php
        redirect('auth');
    }
}
