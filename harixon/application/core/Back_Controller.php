<?php
class Back_Controller extends CI_Controller{

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
	public function display($template=null,$data=array()){
        $this->load->config('nav.config');
        $data['nav'] = $this->config->item('nav');
		$this->load->view('templates/back/header',$data);
		$this->load->view('templates/back/left');
        $this->load->view('pages/back' . $template);
		$this->load->view('templates/back/footer');
	}
}