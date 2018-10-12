<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->library('form_validation');

        $this->load->model('Query_model');

    }

    public function logout()
    {
        //add log out user log in database
        $result = $this->session->userdata('logged_in');

        $log = array(
            'user_id' => $result['user_id'],
            'user_type' => $result['user_type'],
            'transaction' => 'logged out'
        );

        //save user log
        $this->Query_model->save_model('tbl_user_logs',$log);

        //destroy session
        $this->session->sess_destroy();

        //redirect to homepage
        redirect(base_url());
    }

    public function login()
    {
        //class used in ecrypting password
        $enc = new EncryptPass();

        //set validations for inputs
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        //entered data
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        if ($this->form_validation->run() == FALSE) {
            //check if there's a user that logged in
            if(isset($this->session->userdata['logged_in'])){
                //if there is redirect to dashboard
                redirect('dashboard');
            }else{
                //if none display log in page
                $this->load->view('/template/header');
                $this->load->view('login',$data);
                $this->load->view('/template/footer');
            }
        } else {

            //set data in array for where condition of query
            $attr = array(
                'username' => $this->input->post('username'),
                'password' => $enc->pass_crypt($this->input->post('password')),
                'confirm' => 'yes'
            );

            //check if account exist
            $result = $this->Query_model->get_rows_where("tbl_credentials ",$attr)->result_array();

            if (!empty($result)) {

                //if account exist, get the user credentials and profile info in database
                $profile = array();
                if($result[0]['user_type'] == "admin"){
                    $user = $this->Query_model->get_row('tbl_admin','id',$result[0]['user_id'])->result_array();
                    $profile = $user[0];
                }else if($result[0]['user_type'] == "teacher"){
                    $user = $this->Query_model->get_row('tbl_teacher','id',$result[0]['user_id'])->result_array();
                    $profile = $user[0];
                }else if($result[0]['user_type'] == "student"){
                    $user = $this->Query_model->get_row('tbl_students','id',$result[0]['user_id'])->result_array();
                    $profile = $user[0];
                }else if($result[0]['user_type'] == "parent"){
                    $user = $this->Query_model->get_row('tbl_guardian','id',$result[0]['user_id'])->result_array();
                    $profile = $user[0];
                }

                //add logged in user log
                $log = array(
                    'user_id' => $result[0]['user_id'],
                    'user_type' => $result[0]['user_type'],
                    'transaction' => 'logged in'
                );

                //save user log to database
                $this->Query_model->save_model('tbl_user_logs',$log);

                //set session for logged in user
                $this->session->set_userdata('logged_in', $result[0]);
                $this->session->set_userdata('profile', $profile);

                //redirect to dashboard
                redirect('dashboard');
            } else {

                //if there's an error in logging in set message

                $data['error_message'] =  'Invalid Username or Password';

                //redirect to log in page
                $this->load->view('/template/header');
                $this->load->view('login',$data);
                $this->load->view('/template/footer');
            }
        }

    }
}
