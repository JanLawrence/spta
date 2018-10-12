<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class User_Logs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->library('form_validation');

        $this->load->model('Query_model');

    }

	public function index(){

        //display user logs page
        $this->load->view('/template/header');
        $this->load->view('user_logs');
        $this->load->view('/template/footer');
    }

}
