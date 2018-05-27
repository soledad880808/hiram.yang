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
		if(!empty($newslist)){
			$this->load->config('back.config');
			$news_type_conf = $this->config->item('news_type');
			foreach($newslist as $key => $value){
				$newslist[$key]['typename'] = isset($news_type_conf[$value['type']]) ? $news_type_conf[$value['type']] : '';
			}
		}
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

	public function changecontact($coname,$address,$phone,$mobile,$email,$coordinate){
		$sql = "insert into contact(id,coname,address,phone,mobile,email,coordinate,updated,created) values(?,?,?,?,?,?,?,?,?) on duplicate key update coname=?,address=?,phone=?,mobile=?,email=?,coordinate=?,updated=?";
		$insertval = array(
			1,
			$coname,
			$address,
			$phone,
			$mobile,
			$email,
			$coordinate,
			time(),
			time(),
			$coname,
			$address,
			$phone,
			$mobile,
			$email,
			$coordinate,
			time()
		);
		$this->db->query($sql,$insertval);
		if($this->db->affected_rows()){
			return array('code' => 1,'desc' => '修改成功');
		}else{
			return array('code' => 0,'desc' => '修改失败');
		}
	}

	public function schemalist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from `schema` limit {$start}," . PAGESIZE;
		$schemalist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from `schema`";
		$total = $this->db->query($sql)->result_array();
		return array('schemalist' => $schemalist,'total' => $total[0]['count']);
	}

	public function schemadetail_id($id){
		$sql = "select * from `schema` where id={$id}";
		$schemadetail = $this->db->query($sql)->result_array();
		$schemadetail = !empty($schemadetail) ? current($schemadetail) : ''; 
		return array('schemadetail' => $schemadetail);
	}

	public function insertschema($param){
		$param['updated'] = time();
		$param['created'] = time();
		$this->db->insert('schema',$param);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function updateschema($id,$param){
		$param['updated'] = time();
		$this->db->where('id',$id);
		$this->db->update('schema',$param);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	public function delschema($id){
		$this->db->where('id',$id);
		$this->db->delete('schema');
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}	
	}

	public function productlist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product limit {$start}," . PAGESIZE;
		$productlist = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from product";
		$total = $this->db->query($sql)->result_array();
		return array('productlist' => $productlist,'total' => $total[0]['count']);
	}

	public function productdetail_id($id){
		$sql = "select * from product where id={$id}";
		$productdetail = $this->db->query($sql)->result_array();
		$productdetail = !empty($productdetail) ? current($productdetail) : ''; 
		return array('productdetail' => $productdetail);
	}

	public function insertproduct($param){
		$param['updated'] = time();
		$param['created'] = time();
		$this->db->insert('product',$param);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function updateproduct($id,$param){
		$param['updated'] = time();
		$this->db->where('id',$id);
		$this->db->update('product',$param);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	public function delproduct($id){
		$this->db->where('id',$id);
		$this->db->delete('product');
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}	
	}

	public function uploadimg($img_name,$path){
		$img = $_FILES[$img_name];
		$pic_ar = explode('.',$img['name']);
		$suffix = array_pop($pic_ar);
		$filename = $img_name . time() . '.' . $suffix;
		$img_path = sprintf(IMG_PATH,$path);
		if(move_uploaded_file($img['tmp_name'],$img_path . $filename)){
			return IMG_URL . $path . '/' . $filename;
		}else{
		  	return false;
		}
	}
}