<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function aboutinfo(){
		$sql = "select * from about where id=1";
		$aboutinfo = $this->db->query($sql)->result_array();
		$aboutinfo = !empty($aboutinfo) ? current($aboutinfo) : $aboutinfo;
		return array('aboutinfo' => $aboutinfo);
	}
}