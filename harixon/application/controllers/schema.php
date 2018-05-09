<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class schema extends Harixon_Controller {

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
	public function index()
	{
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$newslist = $this->model('schema_model')->newslist($pageno);
		$newslist['pageno'] = $pageno;
		$newslist['pagetotal'] = ceil($newslist['total']/PAGESIZE);
		$this->display('schemalist',$newslist);
	}

	public function schemadetail(){
		$id = $this->input->get('id');
		$schemadetail = $this->model('schema_model')->schemadetail($id);
		$this->display('newsdetail',$newsdetail);
	}
}