<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncomeReport extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Income_model', 'income', True);
    }

    public function index()
    {

    }

    public function create()
    {
        $this->load->view('main',array("view_name"=>"Report/createIncome","page_title"=>"Create Income"));


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

            echo  $this->income->insert();


        }
    }

    public function get_income_charts(){
        $this->load->view('main',array("view_name"=>"Report/income_charts","page_title"=>"Income(charts)"));

    }
    public function get_income_tables(){
        $this->load->view('main',array("view_name"=>"Report/income_tables","page_title"=>"Income(tables)"));

    }



}