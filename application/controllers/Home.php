<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Income_model', 'income', True);
        $this->load->model('Outcome_model', 'outcome', True);


    }

    public function index()
    {
        if(username()){
            $income=$this->income->findAll();
            $outcome=$this->outcome->findAll();


            $this->load->view('main',array("view_name"=>"home","page_title"=>"Home Page",'incomes'=>$income,'outcomes'=>$outcome));
        }else{
            redirect('welcome');
        }


    }

    public function setting()
    {

            $this->load->view('main',array("view_name"=>"setting","page_title"=>"Setting Page"));



    }



}