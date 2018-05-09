<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function contactinfo(){
		$sql = "select * from contact where id=1";
		$contactinfo = $this->db->query($sql)->result_array();
		$contactinfo = !empty($contactinfo) ? current($contactinfo) : $contactinfo;
		return array('contactinfo' => $contactinfo);
	}
}