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
    public function find(){

        echo  json_encode($this->income->find())    ;

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

            echo  $this->income->update();


        }
    }


    public function get_income_charts(){
        $this->load->view('main',array("view_name"=>"Report/income_charts","page_title"=>"Income(charts)"));

    }
    public function open_income_tables(){
        $this->load->view('main',array("view_name"=>"Report/income_tables","page_title"=>"Income(tables)"));

    }
    public function get_income_tables(){
//       $data= $this->income->get_current_user_income();
//
//        $output = array(
//            "draw" => 1,
//            "recordsTotal" => count($data),
//            "recordsFiltered" => count($data),
//            "data" => $data,
//        );
//        echo json_encode($output);
        $list = $this->income->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();


            $row[] = $customers->Date;
            $row[] = $customers->MoneyAmount;
            $row[] = $customers->Name;
            $row[] = "<button id='incomeCategory_".$customers->incomeId."'class='btn btn-info ' data-id='".$customers->incomeId."' data-toggle='modal'  data-target='#generalModal'>Edit</button>";



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->income->count_all(),
            "recordsFiltered" => $this->income->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }






}