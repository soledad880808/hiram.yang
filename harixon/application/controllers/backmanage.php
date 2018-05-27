<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class backmanage extends Harixon_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function newslist()
	{
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$newslist = $this->model('backmanage_model')->newslist($pageno);
		$newslist['showpage'] = showpage($pageno,PAGESIZE,$newslist['total']);
		$this->backdisplay('newslist',$newslist);
	}

	public function newsedit(){
		$id = $this->input->get('id');
		if(empty($id)){
			$newsdetail = array();
		}else{
			$newsdetail = $this->model('backmanage_model')->newsdetail_id($id);
		}
		$newsdetail['id'] = $id;
		$this->load->config('back.config');
		$newsdetail['news_type_conf'] = $this->config->item('news_type');
		$this->backdisplay('newsedit',$newsdetail);
	}

	public function newscontent(){
		$id = $this->input->get('id');
		if(empty($id)){
			redirect('backmanage/newslist');
		}
		$newscontent = $this->model('backmanage_model')->newsdetail_id($id);
		$this->backdisplay('newscontent',$newscontent);
	}

	public function changenews(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$type = $this->input->post('type');
		$param = array(
			'title' => $title,
			'content' => $content,
			'type' => $type
		);
		if(!empty($id)){
			$data = $this->model('backmanage_model')->updatenews($id,$param);
		}else{
			$data = $this->model('backmanage_model')->insertnews($param);
		}
		echo json_encode($data);
	}

	public function contactedit(){
		$contactinfo = $this->model('backmanage_model')->contactinfo();
		$this->backdisplay('contactedit',$contactinfo);
	}

	public function changecontact(){
		$coname = $this->input->post('coname');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$coordinate = $this->input->post('coordinate');
		$result = $this->model('backmanage_model')->changecontact($coname,$address,$phone,$mobile,$email,$coordinate);
		echo json_encode($result);
	}

	public function schemalist(){
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$schemalist = $this->model('backmanage_model')->schemalist($pageno);
		$schemalist['showpage'] = showpage($pageno,PAGESIZE,$schemalist['total']);
		$this->backdisplay('schemalist',$schemalist);
	}

	public function schemaedit(){
		$id = $this->input->get('id');
		if(empty($id)){
			$schemadetail = array();
		}else{
			$schemadetail = $this->model('backmanage_model')->schemadetail_id($id);
		}
		$schemadetail['id'] = $id;
		$this->backdisplay('schemaedit',$schemadetail);
	}

	public function addschema(){
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$upload_result = $this->model('backmanage_model')->uploadimg('title_pic','schema');
		if($upload_result){
			$param = array(
				'title' => $title,
				'content' => $content,
				'title_pic' => $upload_result
			);
			if($this->model('backmanage_model')->insertschema($param)){
				$result = array('code' => 1);
			}else{
				$result = array('code' => 0,'desc' => '添加失败');
			}
		}else{
			$result = array('code' => 0,'desc' => '上传失败');
		}
		echo json_encode($result);
	}

	public function updateschema(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$upload_result = false;
		if(!empty($_FILES['title_pic']['name'])){
			$upload_result = $this->model('backmanage_model')->uploadimg('title_pic','schema');
		}
		$param = array(
			'title' => $title,
			'content' => $content
		);
		if($upload_result){
			$param['title_pic'] = $upload_result;
		}
		if($this->model('backmanage_model')->updateschema($id,$param)){
			$result = array('code' => 1,'desc' => '编辑成功');
		}else{
			$result = array('code' => 0,'desc' => '编辑失败');
		}
		echo json_encode($result);
	}

	public function delschema(){
		$id = $this->input->post('id');
		if($this->model('backmanage_model')->delschema($id)){
			$result = array('code' => 1);
		}else{
			$result = array('code' => 0,'desc' => '删除失败');
		}
		echo json_encode($result);
	}

	public function schemacontent(){
		$id = $this->input->get('id');
		if(empty($id)){
			redirect('backmanage/schemalist');
		}
		$schemacontent = $this->model('backmanage_model')->schemadetail_id($id);
		$this->backdisplay('schemacontent',$schemacontent);
	}

	public function productlist(){
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$productlist = $this->model('backmanage_model')->productlist($pageno);
		$productlist['showpage'] = showpage($pageno,PAGESIZE,$productlist['total']);
		$this->backdisplay('productlist',$productlist);
	}

	public function productedit(){
		$id = $this->input->get('id');
		if(empty($id)){
			$productdetail = array();
		}else{
			$productdetail = $this->model('backmanage_model')->productdetail_id($id);
		}
		$productdetail['id'] = $id;
		$this->backdisplay('productedit',$productdetail);
	}

	public function addproduct(){
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$benefit = $this->input->post('benefit');
		$param = array(
			'title' => $title,
			'content' => $content,
			'benefit' => $benefit
		);
		foreach($_FILES as $key => $value){
			$upload_result = $this->model('backmanage_model')->uploadimg($key,'product');
			if($upload_result){
				$param[$key] = $upload_result;
			}
		}
		if($this->model('backmanage_model')->insertproduct($param)){
			$result = array('code' => 1);
		}else{
			$result = array('code' => 0,'desc' => '添加失败');
		}
		echo json_encode($result);
	}

	public function updateproduct(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$benefit = $this->input->post('benefit');
		$param = array(
			'title' => $title,
			'content' => $content,
			'benefit' => $benefit
		);
		foreach($_FILES as $key => $value){
			$upload_result = $this->model('backmanage_model')->uploadimg($key,'product');
			if($upload_result){
				$param[$key] = $upload_result;
			}
		}
		if($this->model('backmanage_model')->updateproduct($id,$param)){
			$result = array('code' => 1,'desc' => '编辑成功');
		}else{
			$result = array('code' => 0,'desc' => '编辑失败');
		}
		echo json_encode($result);
	}

	public function delproduct(){
		$id = $this->input->post('id');
		if($this->model('backmanage_model')->delproduct($id)){
			$result = array('code' => 1);
		}else{
			$result = array('code' => 0,'desc' => '删除失败');
		}
		echo json_encode($result);
	}
}