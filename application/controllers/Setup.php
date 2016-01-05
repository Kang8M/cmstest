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
        if(is_null($this->input->post())) {
            return "error, input null!";
        } else {
            $tables = $this->input->post();
            $fields = $this->setup_model->getCMSField();            
            $fields_key = $this->setup_model->getCMSFieldKey();            
            
            foreach ($tables["push_tables"] as $table) {
                $this->setup_model->setCMSField( $fields[$table] );    
                $this->setup_model->setCMSFieldKey( $fields_key[$table] );    
                $this->setup_model->setupCMSTable($table);
            }

            redirect('/setup/success');
        }
    }

    public function success()
    {
        $this->load->view("setup_success");
    }
}
