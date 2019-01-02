<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_employe extends CI_Model{
	
	function __construct(){
	}
	
	
	function searchEmploye($keyword){
  	$this->db->like('last',$keyword);
  	$this->db->or_like('first',$keyword);
  	$this->db->or_like('position',$keyword);
  	$this->db->or_like('bank',$keyword);
    $query  =   $this->db->get('employe');
    return $query->result();
	}
	
	public function ktp($id) {
		$this->db->select('ktpfname,pathktp');
		$this->db->from('employe');
		$this->db->where('id', $id);	
		
		$query = $this->db->get();
		return $query->row();
	}
	
	function showEmploye($limit, $offset){
		$this->db->select('*');
		$this->db->from('employe');
		$this->db->order_by('date', 'desc'); 
		$this->db->limit($limit, $offset);
		
		$query = $this->db->get();
		return $query;
	}
	
	public function getEmploye($id){
		//$query = $this->db->query('SELECT * FROM employe INNER JOIN provinsi ON provinsi.id_prov = employe.provinsi INNER JOIN kota_kab ON kota_kab.id_kota_kab = employe.kota WHERE id = $id');
		//return $query;
		$this->db->select('*');
		$this->db->from('employe');
		$this->db->join('provinsi', 'provinsi.id_prov = employe.provinsi');
		$this->db->join('kota_kab', 'kota_kab.id_kota_kab = employe.kota');
		$this->db->where('id', $id); 
		
		$query = $this->db->get();
		return $query;
	}
	
	public function updateEmploye($id){
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
		$date			= date("Y-m-d H:i:s");
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
									'position'	=> $position,
									'bank' 			=> $bank,
									'n_bank' 		=> $n_bank,
									'date' 			=> $date
								);
		$this->db->where('id', $id);
		$this->db->update('employe', $data);
	}
	
	public function deleteEmploye($id){
		$this->db->where('id', $id);
		$this->db->delete('employe');
	}
	
}