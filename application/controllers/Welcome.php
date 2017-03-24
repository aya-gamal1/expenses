<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


//	public function __construct(){
//		parent:: __construct();
//		$this->load->helper('url');
//	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('main',array("view_name"=>"User/login","page_title"=>"Login Page"));
	}

	public function welcome_message()
	{
//		var_dump(FCPATH.'/upload/images/users');
		$config['upload_path']          = FCPATH.'upload/images/users';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
//		$config['max_width']            = 1024;
//		$config['max_height']           = 768;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			echo $this->upload->display_errors();

//			$this->load->view('User/demo', $error);
		}
		else
		{
			echo "done";
//echo $data;
			//$this->load->view('User/login', $data);
		}

	}
	public function demo()
	{
		$this->load->view('main',array('view_name'=>'User/demo'));


	}
}
