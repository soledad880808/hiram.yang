<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends Harixon_Controller {

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
		$this->load->config('nav.config');
		$data['_nav'] = $this->config->item('nav');
		$data['_product_category'] = $this->model('backmanage_model')->productcategory_config();
		$data['_schema_category'] = $this->model('backmanage_model')->schemacategory_config();
		$newslist = $this->model('news_model')->newslist(1,1,3);
		$data['company_newslist'] = $newslist['newslist'];
		$newslist = $this->model('news_model')->newslist(2,1,3);
		$data['industry_newslist']= $newslist['newslist'];
		$data['_product_index'] = $this->model('product_model')->productcategory_index();
		$data['_schema_index'] = $this->model('schema_model')->schemacategory_index();
		$this->load->view('pages/harixon/index',$data);
	}
}
