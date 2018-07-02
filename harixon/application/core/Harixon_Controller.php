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
	 * @access public
	 * @author yanghua
	 */
	public function display($template=null,$data=array()){
        $this->load->config('nav.config');
        $data['nav'] = $this->config->item('nav');
    $data['_product_category'] = $this->model('backmanage_model')->productcategory_config();
    $data['_schema_category'] = $this->model('backmanage_model')->schemacategory_config();
		$this->load->view('templates/harixon/header',$data);
		$this->load->view('templates/harixon/left');
        $this->load->view('pages/harixon/' . $template);
		$this->load->view('templates/harixon/footer');
	}

    public function backdisplay($template=null,$data=array()){
        $this->load->config('nav.config');
        $data['_back_left'] = $this->config->item('_back_left');
        $this->load->view('templates/back/header',$data);
        $this->load->view('templates/back/left');
        $this->load->view('pages/back/' . $template);
        $this->load->view('templates/back/footer');
    }
}