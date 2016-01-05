<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

    private $__data_CMSTables = "cms_tables";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setup_model');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function selectTable()
    {
        $data[$this->__data_CMSTables] = $this->setup_model->getDefaultCMSTable();
        $this->load->view('setup_select_table',$data);
    }

    public function submitTable()
    {
        $this->load->post();
    }


}
