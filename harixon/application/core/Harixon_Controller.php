<?php
class Harixon_Controller extends CI_Controller{

    function __construct(){
        parent::__construct();    
    }

      /**
     * model
     *
     * @param mixed $model
     * @access public
     * @return mixed
     */
    public function model($model){
        $this->load->model($model);

        if (($last_slash = strrpos($model, '/')) !== FALSE)
        {
            $model = substr($model, $last_slash + 1);
        }

        return $this->$model;
    }

/**
	 * 页面展示，支持加载多模板，多个模板之间用“,”号隔开
	 * @access public
	 * @author yanghua
	 */
	public function display($templates=null,$data=''){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/left');
        $this->load->view($template);
		$this->load->view('templates/footer');
	}
}