<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->model('m_employe');
			$this->load->model('m_prov');
	}
	
	public function index(){
		$data['provinsi'] = $this->m_prov->provinsi();
		$data['employe'] = $this->m_employe->showEmploye(10,0);
		$this->load->view('front', $data);
	}

}
