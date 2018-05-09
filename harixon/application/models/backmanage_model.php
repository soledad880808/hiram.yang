<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class backmanage_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function newslist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from news limit {$start}," . PAGESIZE;
		$newslist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from news";
		$total = $this->db->query($sql)->result_array();
		return array('newslist' => $newslist,'total' => $total[0]['count']);
	}

	public function newsdetail_id($id){
		$sql = "select * from news where id={$id}";
		$newsdetail = $this->db->query($sql)->result_array();
		$newsdetail = !empty($newsdetail) ? current($newsdetail) : ''; 
		return array('newsdetail' => $newsdetail);
	}

	public function insertnews($param){
		$param['updated'] = time();
		$param['created'] = time();
		$this->db->insert('news',$param);
		if($this->db->affected_rows()){
			return array('code' => 1,'id' => $this->db->insert_id());
		}else{
			return array('code' => 0,'desc' => '添加失败');
		}
	}

	public function updatenews($id,$param){
		$param['updated'] = time();
		$this->db->where('id',$id);
		$this->db->update('news',$param);
		if($this->db->affected_rows()){
			return array('code' => 1,'id' => $id);
		}else{
			return array('code' => 0,'desc' => '编辑失败');
		}
	}

	public function contactinfo(){
		$sql = "select * from contact where id=1";
		$contactinfo = $this->db->query($sql)->result_array();
		$contactinfo = !empty($contactinfo) ? current($contactinfo) : ''; 
		return array('contactinfo' => $contactinfo);
	}

	public function changecontact($address,$phone,$mobile,$email){
		$sql = "insert into contact(id,address,phone,mobile,email,updated,created) values(?,?,?,?,?,?,?) on duplicate key update address=?,phone=?,mobile=?,email=?,updated=?";
		$insertval = array(
			1,
			$address,
			$phone,
			$mobile,
			$email,
			time(),
			time(),
			$address,
			$phone,
			$mobile,
			$email,
			time()
		);
		$this->db->query($sql,$insertval);
		if($this->db->affected_rows()){
			return array('code' => 1,'desc' => '修改成功');
		}else{
			return array('code' => 0,'desc' => '修改失败');
		}
	}
}