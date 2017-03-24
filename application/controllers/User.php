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
                    'picture' => $data['users'][0]['Picture'],
                    'loggedIn' => true,
                );
                $this->session->set_userdata($data);
                echo 1;
            }else{
                echo "email or password is not correct";
            }

        }

    }
    public function register(){

        $con['upload_path']          = FCPATH.'upload/images/users';
        $con['allowed_types']        = 'gif|jpg|png';
        $con['max_size']             = 100;
//        $con['max_width']            = 1024;
//        $con['max_height']           = 768;
        $con['file_name'] = sha1($this->input->post('username').time());


        $this->upload->initialize($con);


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
            array(

                'field' => 'birthdate',
                'label' => 'BirthDate',
                'rules' => 'required'
            ),
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

            if ( ! $this->upload->do_upload('picture'))
            {
                echo $this->upload->display_errors();

            }
            else
            {
                $data['users']=$this->user->insert();

                if( count($data['users'] )>0) {

                    $data = array(
                        'firstname' => $data['users']->FirstName,
                        'lastname' => $data['users']->LastName,
                        'username' => $data['users']->UserName,
                        'email' => $data['users']->Email,
                        'id' => $data['users']->Id,
                        'picture' => $data['users']->Picture,
                        'loggedIn' => true,
                    );
                    $this->session->set_userdata($data);
                    echo 1;
                }
            }



        }


    }
    public function get_profile(){

        $data['users']=$this->user->get_current_user();
        $data["page_title"]="Profile Page";
        $data["view_name"]="User/profile";
        $this->load->view('main',$data);

    }
    public function update_profile(){
        $data['users']=$this->user->get_current_user();
        $data["page_title"]="Edit Profile";
        $data["view_name"]="User/edit_profile";
        $this->load->view('main',$data);

    }
    public function save_update_profile()
    {
        $con['upload_path']          = FCPATH.'upload/images/users';
        $con['allowed_types']        = 'gif|jpg|png';
        $con['max_size']             = 100;
//        $con['max_width']            = 1024;
//        $con['max_height']           = 768;
        $con['file_name'] = sha1($this->input->post('email').time());
        $this->upload->initialize($con);

        $original_value = $this->session->userdata("email");
        if($this->input->post('email') != $original_value) {
            $is_unique =  '|is_unique[users.EMAIL]';
        } else {
            $is_unique =  '';
        }
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
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|min_length[12]|max_length[50]xss_clean'.$is_unique
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
            array(

                'field' => 'birthdate',
                'label' => 'BirthDate',
                'rules' => 'required'
            ),
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

            if ( ! $this->upload->do_upload('picture'))
            {
                echo $this->upload->display_errors();

            }
            else {

                $data['users'] = $this->user->update();

                if (count($data['users']) > 0) {
                    $data = array(
                        'firstname' => $data['users']->FirstName,
                        'lastname' => $data['users']->LastName,
                        'username' => $this->session->userdata('username'),
                        'email' => $data['users']->Email,
                        'id' => $this->session->userdata('id'),
                        'picture' => $data['users']->Picture,

                        'loggedIn' => true,
                    );
                    $this->session->set_userdata($data);
                    echo 1;
                }
            }

        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
