<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
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
		$this->load->view('login');
	}
	public function index2()
	{
		$this->load->view('daftar');
	}
	public function index3()
	{
		$this->load->view('beranda');
	}

	public function Login()
	{
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$cek_login = $this->db->get('tabel_user')->row_array();

		if($cek_login>0){
			redirect(base_url('index.php/Welcome/buku'));
		}else{
			echo "
			<script>
			window.alert('Username atau password salah')
			window.location='../../';
			</script>
			";
		}
	}
	public function Logout()
	{
		redirect(base_url());
	}
	public function Daftar()
	{
		$this->Modeldata->daftar();
		redirect('Welcome/index2');
	}
	public function Buku()
	{
		$this->load->model('Modeldata');
		$data['data_buku']	= $this->Modeldata->get_buku();
		$this->load->view('beranda',$data);
	}
	public function Anggota()
	{
		$this->load->model('Modeldata');
		$data['data_anggota'] = $this->Modeldata->get_anggota();
		$this->load->view('beranda',$data);
	}
	public function Peminjaman()
	{
		$this->load->model('Modeldata');
		$data['data_peminjaman'] = $this->Modeldata->get_peminjaman();
		$this->load->view('beranda',$data);
	}
	public function Simpan_buku()
	{
		$this->load->model('Modeldata');
		$this->Modeldata->Simpan_buku();
		redirect('Welcome/buku');
	}
	public function Simpan_anggota()
	{
		$this->load->model('Modeldata');
		$this->Modeldata->Simpan_anggota();
		redirect('Welcome/anggota');
	}
	public function Simpan_peminjaman()
	{
		$this->load->model('Modeldata');
		$this->Modeldata->Simpan_peminjaman();
		redirect('Welcome/peminjaman');
	}
	public function Getidbuku($id)
	{
		$this->load->model('Modeldata');
		$data = $this->Modeldata->Get_id_buku($id)->row();
		echo json_encode($data);
	}
	public function Hapusbuku()
	{
	$this->load->model('Modeldata');
	$this->Modeldata->hapus_buku();
	redirect('Welcome/buku');
	}
	public function Editbuku($idbuku=null)
	{
		$this->load->model('Modeldata');
		$data['get_id_buku']      =$this->Modeldata->get_id_buku_edit($idbuku);
		$this->load->view('beranda',$data);
	}
	public function updatebuku()
	{
		$id_buku	 	= $this->input->post('id_buku',TRUE);
		$nama_buku 		= $this->input->post('nama_buku',TRUE);
		$jenis_buku 	= $this->input->post('jenis_buku',TRUE);
		$penulis_buku 	= $this->input->post('penulis_buku',TRUE);
		$penerbit_buku 	= $this->input->post('penerbit_buku',TRUE);
		$this->load->model('Modeldata');
		$this->Modeldata->update_buku($id_buku,$nama_buku,$jenis_buku,$penulis_buku,$penerbit_buku);
		redirect('Welcome/buku');
	}
	public function Getidanggota($id)
	{
		$this->load->model('Modeldata');
		$data = $this->Modeldata->get_id_anggota($id)->row();
		echo json_encode($data);
	}
	public function Hapusanggota()
	{
	$this->load->model('Modeldata');
	$this->Modeldata->hapus_anggota();
	redirect('Welcome/anggota');
	}
	public function Editanggota($idanggota=null)
	{
		$this->load->model('Modeldata');
		$data['get_id_anggota']      =$this->Modeldata->get_id_anggota_edit($idanggota);
		$this->load->view('beranda',$data);
	}
	public function updateanggota()
	{
		$id_anggota	 		= $this->input->post('id_anggota',TRUE);
		$nama_anggota 		= $this->input->post('nama_anggota',TRUE);
		$kelas 				= $this->input->post('kelas',TRUE);
		$jenis_kelamin		= $this->input->post('jenis_kelamin',TRUE);
		$no_hp 				= $this->input->post('no_hp',TRUE);
		$alamat 			= $this->input->post('alamat',TRUE);
		$this->load->model('Modeldata');
		$this->Modeldata->update_anggota($id_anggota,$nama_anggota,$kelas,$jenis_kelamin,$no_hp,$alamat);
		redirect('Welcome/anggota');
	}
	public function Getidpeminjaman($id)
	{
		$this->load->model('Modeldata');
		$data = $this->Modeldata->Get_id_peminjaman($id)->row();
		echo json_encode($data);
	}
	public function Hapuspeminjaman()
	{
	$this->load->model('Modeldata');
	$this->Modeldata->hapus_peminjaman();
	redirect('Welcome/peminjaman');
	}
	public function Editpeminjaman($idpeminjaman=null)
	{
		$this->load->model('Modeldata');
		$data['get_id_peminjaman']      =$this->Modeldata->get_id_peminjaman_edit($idpeminjaman);
		$this->load->view('beranda',$data);
	}
	public function updatepeminjaman()
	{
		$id_peminjaman	 		= $this->input->post('id_peminjaman',TRUE);
		$nama_peminjam 			= $this->input->post('nama_peminjam',TRUE);
		$kelas 					= $this->input->post('kelas',TRUE);
		$nama_buku				= $this->input->post('nama_buku',TRUE);
		$tanggal_pinjam 		= $this->input->post('tanggal_pinjam',TRUE);
		$tanggal_kembali 		= $this->input->post('tanggal_kembali',TRUE);
		$tanggal_pengembalian 	= $this->input->post('tanggal_pengembalian',TRUE);
		$telat 					= $this->input->post('telat',TRUE);
		$denda 					= $this->input->post('denda',TRUE);
		$jumlah_pinjam 			= $this->input->post('jumlah_pinjam',TRUE);
		$petugas 				= $this->input->post('petugas',TRUE);
		$this->load->model('Modeldata');
		$this->Modeldata->update_peminjaman($id_peminjaman,$nama_peminjam,$kelas,$nama_buku,$tanggal_pinjam,$tanggal_kembali,$tanggal_pengembalian,$telat,$denda,$jumlah_pinjaman,$petugas);
		redirect('Welcome/peminjaman');
	}
}
