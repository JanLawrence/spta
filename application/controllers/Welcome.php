<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));

    }
	public function index()
	{
//        $enc = new EncryptPass();
//	    echo $enc->pass_crypt('parent-123');
//		$this->load->view('welcome_message');

        redirect('home/login');
	}
}
