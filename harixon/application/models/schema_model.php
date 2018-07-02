<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schema_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function categorylist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from schema_category where is_deleted=0 order by `order` asc limit {$start}," . PAGESIZE;
		$categorylist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from schema_category where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('categorylist' => $categorylist,'total' => $total[0]['count']);
	}

	public function schemalist($type,$pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from `schema` where type={$type} and is_deleted=0 limit {$start}," . PAGESIZE;
		$schemalist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from `schema` where type={$type} and is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('schemalist' => $schemalist,'total' => $total[0]['count']);
	}

	public function schemadetail($id){
		$sql = "select * from `schema` where id={$id}";
		$schemadetail = $this->db->query($sql)->result_array();
		$schemadetail = !empty($schemadetail) ? current($schemadetail) : $schemadetail;
		return array('schemadetail' => $schemadetail);
	}

	public function schemacategory_index(){
		$sql = "select * from schema_category where is_index=1 and is_deleted=0 order by `order` asc limit 6";
		return $this->db->query($sql)->result_array();
	}
}