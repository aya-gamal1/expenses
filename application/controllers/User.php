<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user', True);
    }
    public function login()
    {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $data['users']=$this->user->login();

            if( count($data['users'] )>0) {

                $data = array(
                    'firstname' => $data['users'][0]['FirstName'],
                    'lastname' => $data['users'][0]['LastName'],
                    'username' => $data['users'][0]['UserName'],
                    'email' => $data['users'][0]['Email'],
                    'id' => $data['users'][0]['Id'],
                    'loggedIn' => true,
                );
                $this->session->set_userdata($data);
                echo 1;
            }

        }

    }
    public function register(){

        $config = array(
            array(
                'field' => 'firstname',
                'label' => 'First name',
                'rules' => 'required|min_length[3]|max_length[50]'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Last name',
                'rules' => 'required|min_length[3]|max_length[50]',

            ),
            array(
                'field' => 'username',
                'label' => 'UserName',
                'rules' => 'required|alpha_dash|is_unique[users.UserName]|min_length[3]|max_length[50]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.Email]|min_length[12]|max_length[50]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'passwordConfirmation',
                'label' => 'password confirmation',
                'rules' => 'required|matches[password]'
            ),
//            array(
//
//                'field' => 'birthdate',
//                'label' => 'BirthDate',
//                'rules' => 'required'
//            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required|max_length[1]'
            ),
            array(
                'field' => 'JobId',
                'label' => 'Job',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {

            echo validation_errors();
        } else {

            $data['users']=$this->user->insert();

            if( count($data['users'] )>0) {

                $data = array(
                    'firstname' => $data['users']->FirstName,
                    'lastname' => $data['users']->LastName,
                    'username' => $data['users']->UserName,
                    'email' => $data['users']->Email,
                    //'id' => $data['users']->Id,
                    'loggedIn' => true,
                );
                $this->session->set_userdata($data);
            }
            echo 1;
        }


    }
    public function get_profile(){

    }
    public function update_profile(){

    }
}
