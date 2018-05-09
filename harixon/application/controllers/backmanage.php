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
		$param = array(
			'title' => $title,
			'content' => $content
		);
		if(!empty($id)){
			$data = $this->model('backmanage_model')->updatenews($id,$param);
		}else{
			$data = $this->model('backmanage_model')->insertnews($param);
		}
		echo json_encode($data);
	}

	public function newsupload(){
		
	}

	public function contactedit(){
		$contactinfo = $this->model('backmanage_model')->contactinfo();
		$this->backdisplay('contactedit',$contactinfo);
	}

	public function changecontact(){
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$mobile = $this->input->post('mobile');
		$email = $this->input->post('email');
		$result = $this->model('backmanage_model')->changecontact($address,$phone,$mobile,$email);
		echo json_encode($result);
	}
}