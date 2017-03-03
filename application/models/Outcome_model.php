<?php
class Outcome_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function insert()
    {
        $this->MoneyAmount    = $this->input->post('moneyAmount');
        $this->categoryId  = $this->input->post('categoryId');
        $this->Date     = $this->input->post('date');
        $this->Description    = $this->input->post('description');
        $this->UserId     = $this->session->userdata('id');

        return $this->db->insert('outcome', $this);


    }



}