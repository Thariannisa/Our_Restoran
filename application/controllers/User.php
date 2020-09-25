<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	// method construct yang isinya akan mempengaruhi isi dari semua method di kelas ini
	public function __construct()
	{
		// memanggil method construct dari kelas parent atau yang di extends
		parent::__construct();
		// memanggil library model dari file ProdukModel.php di folder models
		$this->load->model('ProdukModel');
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
		// untuk title dari halaman user
		$data['title'] = 'Home';
		// untuk menyimpan arah file view mana yang ingin ditampilkan
		$data['view'] = 'user/index';

		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();

		// menyimpan isi dari method get_data file ProdukModel folder models
		$data['data']['query'] =  $this->ProdukModel->get_data();

		// untuk masuk ke views/layout/user.php serta mengirim data dari variabel $data juga ke user.php
		$this->load->view('layout/user', $data);
	}
	public function menu()
	{
		// mengecek yang masuk selain user yang role member atau bukan 
		if ($this->session->userdata('role_id') != 2)
			// mengembalikan ke controller Auth.php
			redirect('auth');


		if (!$this->input->get()) {
			// untuk title dari halaman user
			$data['title'] = 'Menu';
			// untuk menyimpan arah file view mana yang ingin ditampilkan
			$data['view'] = 'user/menu';
			// ini sama seperti select * from user where email=$_session['email']
			$data['user'] = $this->db->get_where(
				'user',
				['email' => $this->session->userdata('email')]
			)->row_array();
			// menyimpan isi dari method get_data file ProdukModel folder models
			$data['data']['produk'] =  $this->ProdukModel->get_data();

			// untuk masuk ke views/layout/user.php serta mengirim data dari variabel $data juga ke user.php
			$this->load->view('layout/user', $data);
		} else {
			$produk_id = $this->input->get('produk_id');
			$data = [
				'user_id' => $this->session->userdata('id'),
				'produk_id' => $produk_id,
				'status' => "memesan"
			];
			$this->db->insert('menu', $data);
			redirect('user/menu');
		}
	}

	public function cart()
	{
		// mengecek yang masuk selain user yang role member atau bukan 
		if ($this->session->userdata('role_id') != 2)
			// mengembalikan ke controller Auth.php
			redirect('auth');

		$this->form_validation->set_rules('nomor_meja', 'Meja', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['total'] = $this->db->get_where('cart', ['user_id' => $this->session->userdata('id')])->row_array();
			// untuk title dari halaman user
			$data['title'] = 'Cart';
			// untuk menyimpan arah file view mana yang ingin ditampilkan
			$data['view'] = 'user/cart';
			// ini sama seperti select * from user where email=$_session['email']
			$data['user'] = $this->db->get_where(
				'user',
				['email' => $this->session->userdata('email')]
			)->row_array();
			// menyimpan isi dari method get_data file ProdukModel folder models
			$data['data']['data'] =  $this->db->query("select * from menu inner join produk on menu.produk_id=produk.id where menu.status='memesan' AND menu.user_id=" . $this->session->userdata('id'));

			// untuk masuk ke views/layout/user.php serta mengirim data dari variabel $data juga ke user.php
			$this->load->view('layout/user', $data);
		} else {
			$produk = $this->db->query('select  menu.*,produk.harga from menu inner join produk on menu.produk_id=produk.id where user_id=' . $this->session->userdata('id'));
			$nomor_meja = $this->input->post('nomor_meja');
			$data = [
				'nomor_meja' => $nomor_meja,
				'user_id' => $this->session->userdata('id'),
				'status' => "konfirmasi"
			];
			$this->db->insert('cart', $data);

			$i = 0;
			$total = 0;
			foreach ($produk->result() as $item) {
				$quantity = $_POST['quantity'][$i++];
				$total += $item->harga * $quantity;
				$this->db->set('meja_id', $nomor_meja);
				$this->db->set('jumlah_pesanan', $quantity);
				$this->db->set('status', 'konfirmasi');
				$this->db->where('produk_id', $item->produk_id);
				$this->db->update('menu');
			}
			$petunjuk = $this->db->query('select * from cart where user_id=' . $this->session->userdata('id'))->row_array();
			$this->db->set('total_harga', $total);
			$this->db->where('id', $petunjuk['id']);
			$this->db->update('cart');

			$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
			Pesanan akan diantar dalam 15 menit
			</div>
            ');

			redirect('user/cart');
		}
	}

	public function about()
	{
		// untuk title dari halaman user
		$data['title'] = 'About';
		// untuk menyimpan arah file view mana yang ingin ditampilkan
		$data['view'] = 'user/about';
		// ini sama seperti select * from user where email=$_session['email']
		$data['user'] = $this->db->get_where(
			'user',
			['email' => $this->session->userdata('email')]
		)->row_array();
		// menyimpan isi dari method get_data file ProdukModel folder models
		$data['data']['query'] =  $this->ProdukModel->get_data();

		// untuk masuk ke views/layout/user.php serta mengirim data dari variabel $data juga ke user.php
		$this->load->view('layout/user', $data);
	}

	public function cancel()
	{
		$this->db->query('delete from menu where produk_id=' . $this->input->get('id'));
		redirect('user/cart');
	}
}
