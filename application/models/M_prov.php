<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_prov extends CI_Model{
	
	function __construct(){
	}

	public function provinsi(){

		// ambil data dari tabel provinsi
		$this->db->order_by('provinsi', 'asc');
		$tampil = $this->db->get('provinsi');
		return $tampil;
	}

	public function kota_kab($id_prov){
		
		$this->db->where('id_prov', $id_prov);
    $result = $this->db->get('kota_kab')->result(); // Tampilkan semua data kota berdasarkan id provinsi
    
    return $result;
	}
}