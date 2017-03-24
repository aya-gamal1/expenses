<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

    }



    public function get_income_outcome_charts(){
        $this->load->view('main',array("view_name"=>"Report/income_outcome_charts","page_title"=>"Income&Outcome(charts)"));

    }
    public function get_income_outcome_tables(){
        $this->load->view('main',array("view_name"=>"Report/income_outcome_tables","page_title"=>"Income&Outcome(tables)"));

    }

}