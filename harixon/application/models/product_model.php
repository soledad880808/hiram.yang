<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function categorylist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product_category where is_deleted=0 order by `order` asc limit {$start}," . PAGESIZE;
		$categorylist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from product_category where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('categorylist' => $categorylist,'total' => $total[0]['count']);
	}

	public function productlist($type,$pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product where type={$type} and is_deleted=0 limit {$start}," . PAGESIZE;
		$productlist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from product where type={$type} and is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('productlist' => $productlist,'total' => $total[0]['count']);
	}

	public function productdetail($id){
		$sql = "select * from product where id={$id}";
		$productdetail = $this->db->query($sql)->result_array();
		$productdetail = !empty($productdetail) ? current($productdetail) : $productdetail;
		return array('productdetail' => $productdetail);
	}

	public function productcategory_index(){
		$sql = "select * from product_category where is_index=1 and is_deleted=0 order by `order` asc limit 3";
		return$this->db->query($sql)->result_array();
	}
}