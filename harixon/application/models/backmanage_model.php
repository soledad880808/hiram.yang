<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class backmanage_model extends Harixon_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function newslist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from news where is_deleted=0 limit {$start}," . PAGESIZE;
		$newslist = $this->db->query($sql)->result_array();
		if(!empty($newslist)){
			$this->load->config('back.config');
			$news_type_conf = $this->config->item('news_type');
			foreach($newslist as $key => $value){
				$newslist[$key]['typename'] = isset($news_type_conf[$value['type']]) ? $news_type_conf[$value['type']] : '';
			}
		}
		$sql = "select count(*) count from news where is_deleted=0";
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

	public function aboutinfo(){
		$sql = "select * from about where id=1";
		$aboutinfo = $this->db->query($sql)->result_array();
		$aboutinfo = !empty($aboutinfo) ? current($aboutinfo) : ''; 
		return array('aboutinfo' => $aboutinfo);
	}

	public function changeabout($content){
		$sql = "insert into about(id,content,updated,created) values(?,?,?,?) on duplicate key update content=?,updated=?";
		$insertval = array(
			1,
			$content,
			time(),
			time(),
			$content,
			time()
		);
		$this->db->query($sql,$insertval);
		if($this->db->affected_rows()){
			return array('code' => 1,'desc' => '修改成功');
		}else{
			return array('code' => 0,'desc' => '修改失败');
		}
	}

	public function provisioninfo(){
		$sql = "select * from provision where id=1";
		$provisioninfo = $this->db->query($sql)->result_array();
		$provisioninfo = !empty($provisioninfo) ? current($provisioninfo) : ''; 
		return array('provisioninfo' => $provisioninfo);
	}

	public function changeprovision($content){
		$sql = "insert into provision(id,content,updated,created) values(?,?,?,?) on duplicate key update content=?,updated=?";
		$insertval = array(
			1,
			$content,
			time(),
			time(),
			$content,
			time()
		);
		$this->db->query($sql,$insertval);
		if($this->db->affected_rows()){
			return array('code' => 1,'desc' => '修改成功');
		}else{
			return array('code' => 0,'desc' => '修改失败');
		}
	}

	public function joininfo(){
		$sql = "select * from `join` where id=1";
		$joininfo = $this->db->query($sql)->result_array();
		$joininfo = !empty($joininfo) ? current($joininfo) : ''; 
		return array('joininfo' => $joininfo);
	}

	public function changejoin($content){
		$sql = "insert into `join`(id,content,updated,created) values(?,?,?,?) on duplicate key update content=?,updated=?";
		$insertval = array(
			1,
			$content,
			time(),
			time(),
			$content,
			time()
		);
		$this->db->query($sql,$insertval);
		if($this->db->affected_rows()){
			return array('code' => 1,'desc' => '修改成功');
		}else{
			return array('code' => 0,'desc' => '修改失败');
		}
	}

	public function schemacategory($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from schema_category where is_deleted=0 limit {$start}," . PAGESIZE;
		$schemacategory = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from schema_category where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('schemacategory' => $schemacategory,'total' => $total[0]['count']);
	}

	public function schemacategory_id($id){
		$sql = "select * from schema_category where id={$id}";
		$schemadetail = $this->db->query($sql)->result_array();
		$schemadetail = !empty($schemadetail) ? current($schemadetail) : ''; 
		return array('schemadetail' => $schemadetail);
	}

	public function insertschemacategory($param){
		$param['updated'] = time();
		$param['created'] = time();
		$this->db->insert('schema_category',$param);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function updateschemacategory($id,$param){
		$param['updated'] = time();
		$this->db->where('id',$id);
		$this->db->update('schema_category',$param);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	public function schemacategory_config(){
		$sql = "select id,name from schema_category where is_deleted=0";
		$category = $this->db->query($sql)->result_array();
		$category_info = array();
		if(!empty($category)){
			foreach($category as $key => $value){
				$category_info[$value['id']] = $value['name'];
			}
		}
		return $category_info;
	}

	public function schemalist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from `schema` where is_deleted=0 limit {$start}," . PAGESIZE;
		$schemalist = $this->db->query($sql)->result_array();
		$category_conf = $this->schemacategory_config();
		if(!empty($schemalist)){
			foreach($schemalist as $key => $value){
				$schemalist[$key]['typename'] = isset($category_conf[$value['type']]) ? $category_conf[$value['type']] : '';
			}
		}
		$sql = "select count(*) count from `schema` where is_deleted=0";
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

	public function productcategory($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product_category where is_deleted=0 limit {$start}," . PAGESIZE;
		$productcategory = $this->db->query($sql)->result_array();
		$sql = "select count(*) count from product_category where is_deleted=0";
		$total = $this->db->query($sql)->result_array();
		return array('productcategory' => $productcategory,'total' => $total[0]['count']);
	}

	public function productcategory_id($id){
		$sql = "select * from product_category where id={$id}";
		$categorydetail = $this->db->query($sql)->result_array();
		$categorydetail = !empty($categorydetail) ? current($categorydetail) : ''; 
		return array('categorydetail' => $categorydetail);
	}

	public function insertproductcategory($param){
		$param['updated'] = time();
		$param['created'] = time();
		$this->db->insert('product_category',$param);
		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function updateproductcategory($id,$param){
		$param['updated'] = time();
		$this->db->where('id',$id);
		$this->db->update('product_category',$param);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}

	public function productcategory_config(){
		$sql = "select id,name from product_category where is_deleted=0";
		$category = $this->db->query($sql)->result_array();
		$category_info = array();
		if(!empty($category)){
			foreach($category as $key => $value){
				$category_info[$value['id']] = $value['name'];
			}
		}
		return $category_info;
	}

	public function productlist($pageno){
		$start = ($pageno-1)*PAGESIZE;
		$sql = "select * from product where is_deleted=0 limit {$start}," . PAGESIZE;
		$productlist = $this->db->query($sql)->result_array();
		$category_conf = $this->productcategory_config();
		if(!empty($productlist)){
			foreach($productlist as $key => $value){
				$productlist[$key]['typename'] = isset($category_conf[$value['type']]) ? $category_conf[$value['type']] : '';
			}
		}
		$sql = "select count(*) count from product where is_deleted=0";
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

	public function uploadfile($file_name,$path,$file_final_name=''){
		$file = $_FILES[$file_name];
		$file_final = array();
		foreach($file['name'] as $key => $value){
			$file_ar = explode('.',$value);
			$suffix = array_pop($file_ar);
			if(empty($file_final_name)){
				$file_final_name = $file_name;
			}
			$filename = $file_final_name . time() . '_' . $key . '.' . $suffix;
			$file_path = sprintf(IMG_PATH,$path);
			if(move_uploaded_file($file['tmp_name'][$key],$file_path . $filename)){
				$file_final[] = array('filename' => $file['name'][$key],'storename' => $filename,'is_deleted' => 0);
			}
		}
		if(!empty($file_final)){
			return $file_final;
		}else{
			return false;
		}
	}

	public function uploadimg($img_name,$path,$img_final_name=''){
		$img = $_FILES[$img_name];
		$pic_ar = explode('.',$img['name']);
		$suffix = array_pop($pic_ar);
		if(empty($img_final_name)){
			$img_final_name = $img_name;
		}
		$filename = $img_final_name . time() . '.' . $suffix;
		$img_path = sprintf(IMG_PATH,$path);
		if(move_uploaded_file($img['tmp_name'],$img_path . $filename)){
			return IMG_URL . $path . '/' . $filename;
		}else{
		  	return false;
		}
	}
}