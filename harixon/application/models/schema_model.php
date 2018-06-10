<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schema_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function schemalist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from `schema` where is_deleted=0 limit {$start}," . PAGESIZE;
		$schemalist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from `schema` where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('schemalist' => $schemalist,'total' => $total[0]['count']);
	}

	public function schemadetail($id){
		$sql = "select * from `schema` where id={$id}";
		$schemadetail = $this->db->query($sql)->result_array();
		$schemadetail = !empty($schemadetail) ? current($schemadetail) : $schemadetail;
		return array('schemadetail' => $schemadetail);
	}
}