<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        $this->load->model('Jobs_model', 'job', True);

    }

    public function index()
    {

        $list = $this->job->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();

            $row[] = $customers->Id;
            $row[] = $customers->Name;
            $row[] = "<button id='job_".$customers->Id."'class='btn btn-info'>Edit</button>";


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->job->count_all(),
            "recordsFiltered" => $this->job->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);

    }


    public function store()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'name',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            echo validation_errors();
        } else {

            echo  $this->job->insert();


        }
    }






}