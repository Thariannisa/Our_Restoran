<?php

class ProdukModel extends CI_Model
{
    // method untuk menampilkan seluruh data dari tabel produk
    public function get_data()
    {
        // syntax berikut sama seperti SELECT * FROM produk
        return $this->db->get('produk');
    }

    public function add_data($data)
    {
        // mengambil isi dari input yang name="menu" dari file frontend adddata_view.php yang berada di folder views/admin
        $menu = $this->input->post('menu');
        // mengambil isi dari input yang name="harga" dari file frontend adddata_view.php yang berada di folder views/admin
        $harga = $this->input->post('harga');
        // mengambil data dari variabel superglobal file yang name="image" dari file frontend adddata_view.php yang berada di folder views/admin
        $image = $_FILES['image'];

        // mengecek apakah file ada dikirim pada saat choose file atau tidak
        if ($image) {
            // membuat peraturan file yang ingin dimasukkan kedalam library framework

            // hanya memperbolehkan file berformat .gif,.jpg,.png
            $config['allowed_types'] = 'gif|jpg|png';
            // hanya memperbolehkan file dibawah 2048 kb
            $config['max_size'] = '2048';
            // mengalokasikan file yang akan dimasukkan kedalam framework yang akan disimpan di folder assets/assets/images
            $config['upload_path'] = './assets/assets/images/';

            // memanggil library upload dan memasukkan peraturannya
            $this->load->library('upload', $config);

            // mengecek apakah data yang diupload ada atau tidak setelah melewati peraturan dari $config
            if ($this->upload->do_upload('image')) {
                // mengambil nama file tersebut. contoh a.jpg
                $new_image = $this->upload->data('file_name');
                // mengisi nama file gambarnya seperti a.jpg
                $data['gambar'] = $new_image;
            } else {
                // jika tidak sesuai maka akan menampilkan jenis errornya
                echo $this->upload->display_errors();
            }
        }
        // membuat penyimpanan untuk memasukkan semua data yang diinput user saat register
        $data = [
            // htmlspecialchars merupakan suatu method untuk mencegah terjadinya bug saat ada user yang sengaja mengisi tag html
            'nama' => htmlspecialchars($this->input->post('menu')),
            'harga' => htmlspecialchars($this->input->post('harga')),
            'admin_id' => $data['id']
        ];

        // sama seperti syntax mysql insert into
        $this->db->insert('produk', $data);
    }

    // method untuk menghapus data dari id yang ditekan admin
    public function delete_data($id)
    {
        // sytaxnya sama seperti delete di mysql
        $this->db->query("DELETE FROM produk WHERE id=$id");
    }

    // method untuk merubah data produk
    public function update_data()
    {
        // mengambil isi dari input yang name="nama" dari file frontend editproduk.php yang berada di folder views/admin
        $nama = $this->input->post('nama');
        // mengambil isi dari input yang name="harga" dari file frontend editproduk.php yang berada di folder views/admin
        $harga = $this->input->post('harga');
        // mengambil data dari variabel superglobal file yang name="gambar" dari file frontend editproduk.php yang berada di folder views/admin
        $image = $_FILES['gambar'];

        // mengecek apakah file ada dikirim pada saat choose file atau tidak
        if ($image) {
            // membuat peraturan file yang ingin dimasukkan kedalam library framework

            // hanya memperbolehkan file berformat .gif,.jpg,.png
            $config['allowed_types'] = 'gif|jpg|png';
            // hanya memperbolehkan file dibawah 2048 kb
            $config['max_size'] = '2048';
            // mengalokasikan file yang akan dimasukkan kedalam framework yang akan disimpan di folder assets/assets/images
            $config['upload_path'] = './assets/assets/images/';

            // memanggil library upload dan memasukkan peraturannya
            $this->load->library('upload', $config);

            // mengecek apakah data yang diupload ada atau tidak setelah melewati peraturan dari $config
            if ($this->upload->do_upload('gambar')) {
                // mengambil nama file tersebut. contoh a.jpg
                $new_image = $this->upload->data('file_name');
                // mengubah gambar dari tabel produk
                $this->db->set('gambar', $new_image);
            } else {
                // jika tidak sesuai maka akan menampilkan jenis errornya
                echo $this->upload->display_errors();
            }
        }
        // mengubah harga dari tabel produk
        $this->db->set('harga', $harga);
        // mengubah nama dari tabel produk
        $this->db->set('nama', $nama);
        // mencari id dari tabel produk yang berisi data dari $_SESSION['id']
        $this->db->where('id', $this->session->userdata('id'));
        // ini sama seperti syntax mysql tentang UPDATE
        $this->db->update('produk');
    }
}
