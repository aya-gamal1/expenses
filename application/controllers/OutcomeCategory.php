<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutcomeCategory extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        $this->load->model('OutcomeCategories_model', 'outcome_category', True);

    }

    public function index()
    {
        $list = $this->outcome_category->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();

            $row[] = $customers->Id;
            $row[] = $customers->Name;
            $row[] = "<button id='outcomeCategory_".$customers->Id."'class='btn btn-info job' data-toggle='modal' data-name='".$customers->Name."'  data-id='".$customers->Id."' data-target='#generalModal'>Edit</button>";
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->outcome_category->count_all(),
            "recordsFiltered" => $this->outcome_category->count_filtered(),
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

            echo  $this->outcome_category->insert();
        }
    }

    public function update(){
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
            echo  $this->outcome_category->update();
        }


    }






}