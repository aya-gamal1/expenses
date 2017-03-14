<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

    }

    public function login(){
        $email=$this->input->post('email');
        $password=sha1($this->input->post('password'));
        $query = $this->db->get_where('users', array('Email' => $email,'Password'=>$password), 1);
        return $query->result_array();
    }



    public function insert()
    {
        $this->FirstName    = $this->input->post('firstname');
        $this->LastName  = $this->input->post('lastname');
        $this->UserName     = $this->input->post('username');
        $this->Email    = $this->input->post('email');
        $this->Gender  = $this->input->post('gender');
        $this->BirthDate     = $this->input->post('birthdate');
        $this->Password     = sha1($this->input->post('password'));
        $this->JobId     = $this->input->post('JobId');

        $this->db->insert('users', $this);
        $this->Id = $this->db->insert_id();

        return $this;
    }

    public function get_current_user(){
        $this->db->from('users');
        $this->db->where('users.Id=' , $this->session->userdata("id"));
        $this->db->join('jobs', 'users.JobId = jobs.Id');
        return $this->db->get()->result_array();
    }

    public function update(){
        $this->FirstName    = $this->input->post('firstname');
        $this->LastName  = $this->input->post('lastname');
        $this->Email    = $this->input->post('email');
        $this->Gender  = $this->input->post('gender');
        $this->BirthDate     = $this->input->post('birthdate');
        $this->Password     = sha1($this->input->post('password'));
        $this->JobId     = $this->input->post('JobId');

        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('users', $this);

        return $this;
    }

}