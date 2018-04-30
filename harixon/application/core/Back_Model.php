<?php
class Harixon_Model extends CI_Model {
    function __construct() {
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
}
/*  vim: set ts=4 sw=4 sts=4 tw=100 noet: */
