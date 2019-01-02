<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_prov');
		$this->load->model('m_employe');
	}

	public function index(){
		redirect("project");
	}

	public function get_kota_kab(){
			$this->load->model('m_prov');
		// Ambil data ID Provinsi yang dikirim via ajax post
    $id_provinsi = $this->input->post('id_provinsi');
    $kota = $this->m_prov->kota_kab($id_provinsi);
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>---Pilih---</option>";
    foreach($kota as $data){
      $lists .= "<option value=".$data->id_kota_kab.">".$data->kota_kab."</option>"; // Tambahkan tag option ke variabel $lists
    }
    $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    echo json_encode($callback);
	}
	
	function searchEmploye(){
    $keyword    =   $this->input->post('search');
    $data['search']	=   $this->m_employe->searchEmploye($keyword);
    $this->load->view('search',$data);
	}

	public function add_employe(){
		$data['provinsi'] = $this->m_prov->provinsi();
		$this->load->view('add', $data);
	}

	public function postEmploye(){
		$this->form_validation->set_rules('first', 'First Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|is_natural');
		$this->form_validation->set_rules('ktp', 'KTP number', 'trim|required|is_natural');
		$this->form_validation->set_rules('n_bank', 'Bank Account Number', 'trim|is_natural');
		if($this->form_validation->run() == FALSE){
			$data['provinsi'] = $this->m_prov->provinsi();
			$this->load->view('add', $data);
		}else{
			$config['upload_path']    = './ktp/';
			$config['allowed_types']	= 'gif|jpg|png|pdf';
			$config['max_size']       = 150000;
			$config['encrypt_name']		= TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('userfile')){
				$data			= $this->upload->data();
				$fname		= $data['file_name'];
				$path			= $data['file_path'];
				$first 		= $this->input->post('first');
				$last 		= $this->input->post('last');
				$birth 		= $this->input->post('birth');
				$phone 		= $this->input->post('phone');
				$email 		= $this->input->post('email');
				$provinsi	= $this->input->post('provinsi');
				$kota 		= $this->input->post('kota');
				$address 	= $this->input->post('address');
				$zip 			= $this->input->post('zip');
				$ktp 			= $this->input->post('ktp');
				$position	= $this->input->post('position');
				$bank 		= $this->input->post('bank');
				$n_bank		= $this->input->post('n_bank');
				$date		= date("Y-m-d H:i:s");
				$data 		= array(
											'first' 		=> $first,
											'last' 			=> $last,
											'birth' 		=> $birth,
											'phone' 		=> $phone,
											'email' 		=> $email,
											'provinsi'	=> $provinsi,
											'kota'			=> $kota,
											'address'		=> $address,
											'zip' 			=> $zip,
											'ktp' 			=> $ktp,
											'ktpfname' 	=> $fname,
											'pathktp' 	=> $path,
											'position'	=> $position,
											'bank' 			=> $bank,
											'n_bank' 		=> $n_bank,
											'date' 			=> $date
										);
				$this->db->insert('employe', $data); //insert ke tabel employe
				$this->session->set_flashdata('message', '<div class="alert alert-info"><button class="close" data-dismiss="alert">&times;</button><strong>Sukses!</strong> 1 User berhasil di Tambah.</div>');
				redirect('project');
			}
		}
	}
	
	public function updateEmploye($id){
		$data['provinsi'] = $this->m_prov->provinsi();
		$data['update'] = $this->m_employe->getEmploye($id);
		$this->load->view('update', $data);
	}
	
	public function postUpdateEmploye($id){
		$this->form_validation->set_rules('first', 'First Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|is_natural');
		$this->form_validation->set_rules('ktp', 'KTP number', 'trim|required|is_natural');
		$this->form_validation->set_rules('n_bank', 'Bank Account Number', 'trim|is_natural');
		if($this->form_validation->run() == FALSE){
			$data['provinsi'] = $this->m_prov->provinsi();
			$this->load->view('add', $data);
		}else{
			$file = $_FILES['userfile']['name'];
			if(empty($file)){
				$this->m_employe->updateEmploye($id);
				$this->session->set_flashdata('message', '<div class="alert alert-info"><button class="close" data-dismiss="alert">&times;</button><strong>Sukses!</strong> 1 User berhasil di edit.</div>');
				redirect('project');
			}else{
				$data['get'] = $this->m_employe->ktp($id);
				$config['upload_path']    = './ktp/';
				$config['allowed_types']	= 'gif|jpg|png|pdf';
				$config['max_size']       = 150000;
				$config['encrypt_name']		= TRUE;
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('userfile')){
					@unlink($data['get']->pathktp. $data['get']->ktpfname);
					$data			= $this->upload->data();
					$fname		= $data['file_name'];
					$path			= $data['file_path'];
					$first 		= $this->input->post('first');
					$last 		= $this->input->post('last');
					$birth 		= $this->input->post('birth');
					$phone 		= $this->input->post('phone');
					$email 		= $this->input->post('email');
					$provinsi	= $this->input->post('provinsi');
					$kota 		= $this->input->post('kota');
					$address 	= $this->input->post('address');
					$zip 			= $this->input->post('zip');
					$ktp 			= $this->input->post('ktp');
					$position	= $this->input->post('position');
					$bank 		= $this->input->post('bank');
					$n_bank		= $this->input->post('n_bank');
					$date		= date("Y-m-d H:i:s");
					$data 		= array(
												'first' 		=> $first,
												'last' 			=> $last,
												'birth' 		=> $birth,
												'phone' 		=> $phone,
												'email' 		=> $email,
												'provinsi'	=> $provinsi,
												'kota'			=> $kota,
												'address'		=> $address,
												'zip' 			=> $zip,
												'ktp' 			=> $ktp,
												'ktpfname' 	=> $fname,
												'pathktp' 	=> $path,
												'position'	=> $position,
												'bank' 			=> $bank,
												'n_bank' 		=> $n_bank,
												'date' 			=> $date
											);
					$this->db->where('id', $id);
					$this->db->update('employe', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-info"><button class="close" data-dismiss="alert">&times;</button><strong>Sukses!</strong> 1 User berhasil di Tambah.</div>');
					redirect('project');
				}
			}
		}
	}
	
	public function deleteEmploye($id){
		$data['get'] = $this->m_employe->ktp($id);
		@unlink($data['get']->pathktp. $data['get']->ktpfname);
		$this->m_employe->deleteEmploye($id);
		$this->session->set_flashdata('message', '<div class="alert alert-info"><button class="close" data-dismiss="alert">&times;</button><strong>Sukses!</strong> 1 User berhasil di Tambah.</div>');
		redirect('project');
	}
	
	
	public function detailEmploye($id){
		$data['employe'] = $this->m_employe->getEmploye($id);
		$this->load->view('detail', $data);
	}
	
	
}
