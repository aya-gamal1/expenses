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
        $this->load->view('header');

        $this->load->view('Report/createOutcome');

        $this->load->view("footer");

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

}