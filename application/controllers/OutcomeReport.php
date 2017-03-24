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

    public function find(){

        echo  json_encode($this->outcome->find())    ;

    }

    public function update()
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

            echo  $this->outcome->update();


        }
    }

    public function get_outcome_charts(){
        $this->load->view('main',array("view_name"=>"Report/outcome_charts","page_title"=>"Outcome(charts)"));

    }
    public function open_outcome_tables(){
        $this->load->view('main',array("view_name"=>"Report/outcome_tables","page_title"=>"Outcome(tables)"));

    }
    public function get_outcome_tables(){

        $list = $this->outcome->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $customers->Date;
            $row[] = $customers->MoneyAmount;
            $row[] = $customers->Name;
            $row[] = "<button id='outcomeCategory_".$customers->outcomeId."'class='btn btn-info ' data-id='".$customers->outcomeId."' data-toggle='modal'  data-target='#generalModal'>Edit</button>";

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->outcome->count_all(),
            "recordsFiltered" => $this->outcome->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


}