<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class Subjects extends CI_Controller {

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
        //display subject list
        $this->load->view('/template/header');
        $this->load->view('subjects/subjects');
        $this->load->view('/template/footer');
    }

    public function add($id = "")
    {
        //set validations for inputs
        $this->form_validation->set_rules('subject', 'Subject', 'required');

        //set values of data to be transferred to html page
        $formTitle = 'New Subject';

        $subject_name = $this->input->post('subject');

        if($id != ""){
            //edit subject
            //get data from database
            $formTitle = 'Edit Subject';
            $info = $this->Query_model->get_row('tbl_subject','id',$id)->result();
            $subject_name = $info[0]->subject_name;

        }

        //$set data
        $data = array(
            'subject' => $subject_name,
            'form_link' => $id == "" ? 'subjects/add' : "subjects/add/".$id,
            'form_title' => $formTitle,
        );

        //run validation
        if ($this->form_validation->run() == FALSE) {
            //if there's an error in validation fields, redirect again to form
            $this->load->view('/template/header');
            $this->load->view('subjects/subjects_add',$data);
            $this->load->view('/template/footer');
        } else {

            $attr = array(
                'subject_name' => $this->input->post('subject'),
            );

            if($id != ""){
                //edit subject
                //update subject data
                $this->Query_model->update_model('tbl_subject', 'id',$id, $attr);
            }else{
                //new subject
                //save subject data
                $this->Query_model->save_model('tbl_subject',$attr);
            }

            //redirect to subject list
            redirect('subjects');
        }

    }


    public function delete($id){
        //delete subject in database
        $this->Query_model->delete_model('tbl_subject', 'id',$id);

        //redirect to subject list
        redirect('subjects');
    }
}
