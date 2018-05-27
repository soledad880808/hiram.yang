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
		if(!empty($contactinfo['coordinate'])){
			$coordinate_ar = explode(',',$contactinfo['coordinate']);
			$contactinfo['x_coordinate'] = $coordinate_ar[0];
			$contactinfo['y_coordinate'] = $coordinate_ar[1];
		}else{
			$contactinfo['x_coordinate'] = '';
			$contactinfo['y_coordinate'] = '';
		}
		return array('contactinfo' => $contactinfo);
	}
}