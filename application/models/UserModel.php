<?php

class UserModel extends CI_Model
{
    // method untuk menampilkan seluruh data dari tabel user
    public function get_data()
    {
        // syntax berikut sama seperti SELECT * FROM user
        return $this->db->get('user');
    }

    // method untuk mengecek user untuk login dan mengklasifikasi apakah yang login admin ataukan member
    public function login()
    {
        // mengambil isi dari input yang name="email" dari file frontend login.php yang berada di folder views/auth
        $email = $this->input->post('email');
        // mengambil isi dari input yang name="password" dari file frontend login.php yang berada di folder views/auth
        $password = $this->input->post('password');

        // mengambil data dari tabel dengan syntax sama seperti SELECT * FROM user WHERE email=$email
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // untuk mengecek apakah user yang berusaha login ada datanya di tabel user atau tidak
        if ($user) {
            // untuk mencocokkan password yang diinput user dengan password dari tabel user
            if (password_verify($password, $user['password'])) {
                // membuat penyimpanan untuk menyimpan data dari tabel user berupa role_id dan email
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'id' => $user['id']
                ];

                // membuat variabel super global dan mengirimkan isi data dari variabel $data
                // sama seperti $_SESSION['']
                $this->session->set_userdata($data);

                // mengecek apakah role_id dari user yang login merupakan role_id 1 atau bukan
                // jika 1 maka akan dimasukkan kehalaman admin. jika 2 maka dimasukkan kehalaman user
                if ($user['role_id'] == 1) {
                    // untuk pergi kembali ke controller yang nama filenya Admin.php
                    redirect('admin');
                } else {
                    // untuk pergi kembali ke controller yang nama filenya User.php
                    redirect('user');
                }
            }
            // jika pada saat di cek password ternyata salah akan masuk ke else
            else {
                // untuk membuat flashdata atau notifikasi yang nama variabelnya message
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                password salah
                </div>
				');
                // untuk pergi kembali ke controller yang nama filenya Auth.php
                redirect('auth');
            }
        }
        // jika saat login ternyata emailnya tidak ditemukan di tabel user
        else {
            // untuk membuat flashdata atau notifikasi yang nama variabelnya message
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
            user tidak ditemukan
			</div>
			');
            // untuk pergi kembali ke controller yang nama filenya Auth.php
            redirect('auth');
        }
    }

    // method untuk menambah data ke tabel user
    public function add_data()
    {
        // membuat penyimpanan untuk memasukkan semua data yang diinput user saat register
        $data = [
            // htmlspecialchars merupakan suatu method untuk mencegah terjadinya bug saat ada user yang sengaja mengisi tag html
            'username' => htmlspecialchars($this->input->post('username')),
            'email' => htmlspecialchars($this->input->post('email')),
            // merupakan default dari gambar profil user karena saat daftar user belum mempunyai gambar
            'image' => 'default.jpg',
            // password hash untuk membuat enkripsi dari inputan user pada password
            // jenisnya password_default adalah untuk membuat algoritma enkripsi 1 arah yang bisa di encrypt tapi tidak bisa di decrypt kembali
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            // untuk menandakan dia adalah member bukan admin
            'role_id' => 2,
            // untuk mengisi kapan si user mendaftar
            'date_created' => time()
        ];

        // ini merupakan syntax yang sama seperti 
        // INSERT INTO user ('username','email','image','password','role_id','date_created') 
        // VALUES ($data)
        $this->db->insert('user', $data);
    }

    // method untuk merubah profil si user
    public function update_data()
    {
        // mengambil isi dari input yang name="name" dari file frontend editprofil.php yang berada di folder views/admin
        $name = $this->input->post('name');
        // mengambil isi dari input yang name="email" dari file frontend editprofil.php yang berada di folder views/admin
        $email = $this->input->post('email');
        // mengambil isi dari input yang name="password" dari file frontend editprofil.php yang berada di folder views/admin
        // password hash untuk membuat enkripsi dari inputan user pada password
        // jenisnya password_default adalah untuk membuat algoritma enkripsi 1 arah yang bisa di encrypt tapi tidak bisa di decrypt kembali
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        // mengambil data dari variabel superglobal file yang name="image" dari file frontend editprofil.php yang berada di folder views/admin
        $image = $_FILES['image'];

        // mengecek apakah file ada dikirim pada saat choose file atau tidak
        if ($image) {
            // membuat peraturan file yang ingin dimasukkan kedalam library framework

            // hanya memperbolehkan file berformat .gif,.jpg,.png
            $config['allowed_types'] = 'gif|jpg|png';
            // hanya memperbolehkan file dibawah 2048 kb
            $config['max_size'] = '2048';
            // mengalokasikan file yang akan dimasukkan kedalam framework yang akan disimpan di folder assets/img
            $config['upload_path'] = './assets/img/';

            // memanggil library upload dan memasukkan peraturannya
            $this->load->library('upload', $config);

            // mengecek apakah data yang diupload ada atau tidak setelah melewati peraturan dari $config
            if ($this->upload->do_upload('image')) {
                // mengambil nama file tersebut. contoh a.jpg
                $new_image = $this->upload->data('file_name');
                // mengubah image dari tabel user
                $this->db->set('image', $new_image);
            } else {
                // jika tidak sesuai maka akan menampilkan jenis errornya
                echo $this->upload->display_errors();
            }
        }
        // mengubah username dari tabel user
        $this->db->set('username', $name);
        // mengubah password dari tabel user
        $this->db->set('password', $password);
        // mencari email dari tabel user yang berisi data dari $email
        $this->db->where('email', $email);
        // ini sama seperti syntax mysql tentang UPDATE
        $this->db->update('user');
    }
}
