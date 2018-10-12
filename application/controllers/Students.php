<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class Students extends CI_Controller {

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

        //display student list page
        $this->load->view('/template/header');
        $this->load->view('students/students');
        $this->load->view('/template/footer');
    }

    public function add($id = "")
    {
        //set validations for inputs
        $this->form_validation->set_rules('school_id', 'School ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('guardian_first_name', 'Guardian First Name', 'required');
        $this->form_validation->set_rules('guardian_last_name', 'Guardian Last Name', 'required');
        $this->form_validation->set_rules('guardian_email', 'Guardian Email', 'required');


        //set values of data to be transferred to html page
        $formTitle = 'New Student';

        $school_id= $this->input->post('school_id');
        $first_name= $this->input->post('first_name');
        $last_name= $this->input->post('last_name');
        $middle_name= $this->input->post('middle_name');
        $address= $this->input->post('address');
        $phone= $this->input->post('phone');
        $email= $this->input->post('email');
        $guardian_first_name= $this->input->post('guardian_first_name');
        $guardian_last_name= $this->input->post('guardian_last_name');
        $guardian_email= $this->input->post('guardian_email');

        if($id != ""){

            //edit student
            //get data from database

            $formTitle = 'Edit Student';
            $info = $this->Query_model->get_row('tbl_students','id',$id)->result();

            $school_id= $info[0]->school_id;
            $first_name= $info[0]->first_name;
            $last_name= $info[0]->last_name;
            $middle_name= $info[0]->middle_name;
            $address= $info[0]->address;
            $phone= $info[0]->phone;
            $email= $info[0]->email;

            $infoS = $this->Query_model->get_row('tbl_guardian','student_id',$id)->result();
            $guardian_first_name= $infoS[0]->first_name;
            $guardian_last_name= $infoS[0]->last_name;
            $guardian_email= $infoS[0]->email;

        }

        //$set data
        $data = array(
            'school_id' => $school_id,
            'first_name' =>$first_name,
            'last_name' => $last_name,
            'middle_name' => $middle_name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'guardian_first_name' => $guardian_first_name,
            'guardian_last_name' => $guardian_last_name,
            'guardian_email' => $guardian_email,
            'form_link' => $id == "" ? 'students/add' : "students/add/".$id,
            'form_title' => $formTitle,
        );

        //run validation
        if ($this->form_validation->run() == FALSE) {
            //if there's an error in validation fields, redirect again to form
            $this->load->view('/template/header');
            $this->load->view('students/students_add',$data);
            $this->load->view('/template/footer');
        } else {

            $attr = array(
                'school_id' => $this->input->post('school_id'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'middle_name' => $this->input->post('middle_name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
            );

            if($id != ""){
                //edit student
                //update student info
                $this->Query_model->update_model('tbl_students', 'id',$id, $attr);
                $st_id = $id;
            }else{
                //new student
                //save student info
                $st_id = $this->Query_model->save_model('tbl_students',$attr);

                //temporary user login
                $enc = new EncryptPass();

                $dataS = array(
                    'username' => 'student'.$st_id,
                    'password' => $enc->pass_crypt('pass-123'),
                    'user_type' => 'student',
                    'confirm' => 'yes',
                    'user_id' => $st_id
                );

                //save student credentials to database

                $this->Query_model->save_model('tbl_credentials',$dataS);

            }

            //set guardian data
            $attr1 = array(
                    'first_name' => $this->input->post('guardian_first_name'),
                    'last_name' => $this->input->post('guardian_last_name'),
                    'email' => $this->input->post('guardian_email'),
                   'student_id' => $st_id,
            );


            if($id != ""){
                //edit student
                //update guardian data
                $this->Query_model->update_model('tbl_guardian', 'student_id',$id, $attr1);
            }else{
                //new student
                // save student guardian data to database
                $gdId= $this->Query_model->save_model('tbl_guardian',$attr1);

                //temporary user login
                $enc = new EncryptPass();

                $dataS = array(
                    'username' => 'parent_'.$gdId,
                    'password' => $enc->pass_crypt('pass-123'),
                    'user_type' => 'parent',
                    'confirm' => 'yes',
                    'user_id' => $gdId
                );


                //save guardian credentials to database
                $this->Query_model->save_model('tbl_credentials',$dataS);

            }

            //redirect to student list
            redirect('students');
        }

    }


    public function delete($id){
        //delete student
        $this->Query_model->delete_model('tbl_students', 'id',$id);
        //delete student guardian in database
        $this->Query_model->delete_model('tbl_guardian', 'student_id',$id);
        //redirect to student list
        redirect('students');
    }
}
