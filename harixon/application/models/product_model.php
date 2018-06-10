<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function productlist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product where is_deleted=0 limit {$start}," . PAGESIZE;
		$productlist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from product where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('productlist' => $productlist,'total' => $total[0]['count']);
	}

	public function productdetail($id){
		$sql = "select * from product where id={$id}";
		$productdetail = $this->db->query($sql)->result_array();
		$productdetail = !empty($productdetail) ? current($productdetail) : $productdetail;
		return array('productdetail' => $productdetail);
	}
}