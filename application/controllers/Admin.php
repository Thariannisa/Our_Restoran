<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

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

	// method construct yang isinya akan mempengaruhi isi dari semua method di kelas ini
	public function __construct()
	{
		// memanggil method construct dari kelas parent atau yang di extends
		parent::__construct();
		// memanggil library model dari file ProdukModel.php di folder models
		$this->load->model('ProdukModel');
		// memanggil library model dari file UserModel.php di folder models
		$this->load->model('UserModel');

		// mengecek apakah role_id yang masuk kesini merupakan 1 atau bukan 
		if ($this->session->userdata('role_id') != 1)
			// jika bukan maka yang berusaha masuk ke halaman admin akan dikembalikan ke controller User.php
			redirect('user');
	}

	public function index()
	{
		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// mengambil data dari method get_data yang berada di file ProdukModel di folder models
		$data['produk'] = $this->ProdukModel->get_data();

		// untuk menyimpan arah file view mana yang ingin ditampilkan
		$data['view'] = "admin/menu_view";

		// untuk masuk ke views/layout/main.php serta mengirim data dari variabel $data juga ke main.php
		$this->load->view('layout/main', $data);
	}

	public function update()
	{
		// untuk mengecek apakah $_GET['id'] berisi atau tidak
		if ($this->input->get('id')) {
			$id = ['id' => $this->input->get('id')];
			// untuk mengeset session untuk data dari $_SESSION['id']
			$this->session->set_userdata($id);
		}

		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// untuk membuat rule atau validasi dari input user dengan data name="nama"
		$this->form_validation->set_rules('nama', 'Produk', 'required|trim');
		// untuk membuat rule atau validasi dari input user dengan data name="harga"
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');

		// ini sama seperti select * from produk where id=$_session['id']
		$data['produk'] = $this->db->get_where('produk', ['id' => $this->session->userdata('id')])->row_array();

		// untuk mengecek apakah rule atau validasi terpenuhi atau tidak. jika tidak masuk ke if
		if ($this->form_validation->run() == false) {

			// untuk menyimpan arah file view mana yang ingin ditampilkan
			$data['view'] = "admin/updateproduk";
			// untuk masuk ke views/layout/main.php serta mengirim data dari variabel $data juga ke main.php
			$this->load->view('layout/main', $data);
		} else {
			// untuk memanggil method update_data dari file ProdukModel.php di folder models
			$this->ProdukModel->update_data();

			// untuk mendestroy $_SESSION['id'] biar hilang dari variabel superglobal $_SESSION
			$this->session->unset_userdata('id');

			// untuk membuat flashdata atau notifikasi yang nama variabelnya message
			$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
			kamu berhasil mengedit produk
			</div>
			');

			// mengembalikan ke controller file Admin.php
			redirect('admin');
		}
	}

	public function delete()
	{
		// mengambil data dari $_GET['id']
		$id = $this->input->get('id');
		// memanggil method delete_data dari file ProdukModel.php di folder models
		$this->ProdukModel->delete_data($id);

		// untuk membuat flashdata atau notifikasi yang nama variabelnya message
		$this->session->set_flashdata('message', '
		<div class="alert alert-success" role="alert">
		kamu berhasil menghapus produk
		</div>
		');
		// mengembalikan ke controller file Admin.php
		redirect('admin');
	}

	public function edit()
	{
		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// untuk membuat rule atau validasi dari input user dengan data name="name"
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		// untuk membuat rule atau validasi dari input user dengan data name="password"
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		// untuk mengecek apakah rule atau validasi terpenuhi atau tidak. jika tidak masuk ke if
		if ($this->form_validation->run() == false) {
			// untuk menyimpan arah file view mana yang ingin ditampilkan
			$data['view'] = "admin/editprofil";
			// untuk masuk ke views/layout/main.php serta mengirim data dari variabel $data juga ke main.php
			$this->load->view('layout/main', $data);
		} else {
			//  memanggil method update_data dari file UserModel.php di folder models
			$this->UserModel->update_data();
			// mengembalikan ke controller file Admin.php
			redirect('admin');
		}
	}

	public function add_data()
	{
		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// untuk membuat rule atau validasi dari input user dengan data name="menu"
		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');
		// untuk membuat rule atau validasi dari input user dengan data name="harga"
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');

		// untuk mengecek apakah rule atau validasi terpenuhi atau tidak. jika tidak masuk ke if
		if ($this->form_validation->run() == false) {
			// untuk menyimpan arah file view mana yang ingin ditampilkan
			$data['view'] = "admin/adddata_view";
			// untuk masuk ke views/layout/main.php serta mengirim data dari variabel $data juga ke main.php
			$this->load->view('layout/main', $data);
		} else {
			// memanggil method add_data dan mengiri data dari $data['user'] ke method tersebut. ini berada di file ProdukModel folder models
			$this->ProdukModel->add_data($data['user']);

			// untuk membuat flashdata atau notifikasi yang nama variabelnya message
			$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
				kamu berhasil menambahkan produk
				</div>
				');
			// mengembalikan ke controller file Admin.php
			redirect('admin');
		}
	}

	public function notification()
	{
		$data['query'] = $this->db->get_where('cart', ['status' => 'konfirmasi']);
		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// untuk menyimpan arah file view mana yang ingin ditampilkan
		$data['view'] = "admin/notification_view";
		// untuk masuk ke views/layout/main.php serta mengirim data dari variabel $data juga ke main.php
		$this->load->view('layout/main', $data);
	}

	public function konfirmasi()
	{
		$id = $this->db->get_where('cart', ['id' => $this->input->get('id')])->row_array();

		$this->db->query("delete from menu where meja_id=" . $id['nomor_meja']);
		$this->db->query("delete from cart where id=" . $id['id']);

		redirect('admin/notification');
	}
}
