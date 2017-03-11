<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutcomeReport extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Outcome_model', 'outcome', True);
    }

    public function index()
    {

    }

    public function create()
    {
        $this->load->view('main',array("view_name"=>"Report/createOutcome","page_title"=>"Create Outcome"));

    }

    public function store()
    {
        $config = array(
            array(
                'field' => 'moneyAmount',
                'label' => 'money amount',
                'rules' => 'required'
            ),
            array(
                'field' => 'categoryId',
                'label' => 'Category',
                'rules' => 'required',

            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|min_length[10]'
            ),
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            echo validation_errors();
        } else {

            echo  $this->outcome->insert();


        }
    }


    public function get_outcome_charts(){
        $this->load->view('main',array("view_name"=>"Report/outcome_charts","page_title"=>"Outcome(charts)"));

    }
    public function get_outcome_tables(){
        $this->load->view('main',array("view_name"=>"Report/outcome_tables","page_title"=>"Outcome(tables)"));

    }

}