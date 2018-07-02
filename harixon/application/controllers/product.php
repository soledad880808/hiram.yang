<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends Harixon_Controller {

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
	public function productcategory(){
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$categorylist = $this->model('product_model')->categorylist($pageno);
		$categorylist['pageno'] = $pageno;
		$categorylist['pagetotal'] = ceil($categorylist['total']/PAGESIZE);
		$this->display('productcategory',$categorylist);
	}

	public function productlist()
	{
		$type = qp('type','int','1');
		$pageno = $this->input->get('pageno');
		$pageno = !empty($pageno) ? $pageno : 1;
		$productlist = $this->model('product_model')->productlist($type,$pageno);
		$productlist['pageno'] = $pageno;
		$productlist['type'] = $type;
		$productlist['pagetotal'] = ceil($productlist['total']/PAGESIZE);
		$this->display('productlist',$productlist);
	}

	public function productdetail(){
		$id = $this->input->get('id');
		$productdetail = $this->model('product_model')->productdetail($id);
		$this->display('productdetail',$productdetail);
	}

	public function downloadfile(){
		$storename = $this->input->get('storename','string');
		$filename = $this->input->get('filename','string');
		$file_path = sprintf(IMG_PATH,'product_file');
		$file = fopen($file_path . $storename,"rb");
		header("Content-Type: application/octet-stream");
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".filesize($file_path . $storename));
		header("Content-Disposition: attachment; filename=" . $filename);
		echo fread($file,filesize($file_path . $storename));
		fclose($file);
	}
}