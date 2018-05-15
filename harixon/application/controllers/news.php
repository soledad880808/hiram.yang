<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news extends Harixon_Controller {

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
		$type = qp('type','int','1');
		$pageno = qp('pageno','int','1');
		$newslist = $this->model('news_model')->newslist($type,$pageno,PAGESIZE);
		$newslist['pageno'] = $pageno;
		$newslist['pagetotal'] = ceil($newslist['total']/PAGESIZE);
		$this->display('newslist',$newslist);
	}

	public function newsdetail(){
		$id = $this->input->get('id');
		$newsdetail = $this->model('news_model')->newsdetail($id);
		$this->display('newsdetail',$newsdetail);
	}
}