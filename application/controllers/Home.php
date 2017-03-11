<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct();


    }

    public function index()
    {
        if(username()){
            $this->load->view('main',array("view_name"=>"home","page_title"=>"Home Page"));
        }else{
            redirect('welcome');
        }


    }

    public function setting()
    {

            $this->load->view('main',array("view_name"=>"setting","page_title"=>"Setting Page"));



    }



}