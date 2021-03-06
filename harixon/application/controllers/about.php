<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends Harixon_Controller {

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
	public function introduction()
	{
		$aboutinfo = $this->model('about_model')->aboutinfo();
		$this->display('about',$aboutinfo);
	}

	public function certificate()
	{
		//$aboutinfo = $this->model('about_model')->aboutinfo();
		$this->display('certificate',array());
	}

	public function cooperate()
	{
		//$aboutinfo = $this->model('about_model')->aboutinfo();
		$this->display('cooperate',array());
	}

	public function provision()
	{
		$provisioninfo = $this->model('about_model')->provisioninfo();
		$this->display('provision',$provisioninfo);
	}
}