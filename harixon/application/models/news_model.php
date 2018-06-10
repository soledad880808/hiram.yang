<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function newslist($type,$pageno,$pagesize){
		$start = ($pageno-1)*$pagesize;
		$sql = "select * from news where type={$type} and is_deleted=0 order by updated desc limit {$start}," . $pagesize;
		$newslist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from news where type={$type} and is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('newslist' => $newslist,'total' => $total[0]['count']);
	}

	public function newsdetail($id){
		$sql = "select * from news where id={$id}";
		$newsdetail = $this->db->query($sql)->result_array();
		$newsdetail = !empty($newsdetail) ? current($newsdetail) : $newsdetail;
		return array('newsdetail' => $newsdetail);
	}
}