<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include APPPATH.'libraries/EncryptPass.php';
class Teachers extends CI_Controller {

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
        //display teacher list page
        $this->load->view('/template/header');
        $this->load->view('teachers/teachers');
        $this->load->view('/template/footer');
    }

    public function add($id = "")
    {
        //set validation of inputs
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('advisory', 'Advisory', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        //set data to be transferred to html page

        $formTitle = 'New Teacher';

        $first_name= $this->input->post('first_name');
        $last_name= $this->input->post('last_name');
        $phone= $this->input->post('phone');
        $advisory= $this->input->post('advisory');
        $subject= $this->input->post('subject');
        $email= $this->input->post('email');

        if($id != ""){
            //edit teacher
            //get teacher data in database
            $formTitle = 'Edit Teacher';
            $info = $this->Query_model->get_row('tbl_teacher','id',$id)->result();

            $first_name= $info[0]->first_name;
            $last_name= $info[0]->last_name;
            $phone= $info[0]->phone;
            $advisory= $info[0]->advisory;
            $email= $info[0]->email;


            //get teacher subjects in database
            $infoS = $this->Query_model->get_row('tbl_teacher_subjects','teacher_id',$id)->result();
            $subject= $infoS[0]->subject_id;

        }

        //set data
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'advisory' => $advisory,
            'subject' => $subject,
            'email' => $email,
            'form_link' => $id == "" ? 'teachers/add' : "teachers/add/".$id,
            'form_title' => $formTitle,
        );

        //run validation
        if ($this->form_validation->run() == FALSE) {
            //if there's an error in validation display form
            $this->load->view('/template/header');
            $this->load->view('teachers/teachers_add',$data);
            $this->load->view('/template/footer');
        } else {

            //set data for saving in database
            $attr = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'advisory' => $this->input->post('advisory'),
             //   'subject_id' => $this->input->post('subject'),
                'email' => $this->input->post('email')
            );

            if($id != ""){
                //edit teacher
                //update teacher info in database
                $this->Query_model->update_model('tbl_teacher', 'id',$id, $attr);
                $teacher_id = $id;
            }else{
                //new teacher
                //save data to databse
                $teacher_id = $this->Query_model->save_model('tbl_teacher',$attr);

                //temporary user login
                $enc = new EncryptPass();

                $dataS = array(
                    'username' => 'teacher_'.$teacher_id,
                    'password' => $enc->pass_crypt('pass-123'),
                    'user_type' => 'teacher',
                    'confirm' => 'yes',
                    'user_id' => $teacher_id
                );

                //save teacher credential in datbase
                $this->Query_model->save_model('tbl_credentials',$dataS);

            }

            //delete existing subjects of teacher
            $this->Query_model->delete_model('tbl_teacher_subjects', 'teacher_id',$id);

            //set teacher subjects
            $attr1 = array(
                   'subject_id' => $this->input->post('subject'),
                   'teacher_id' => $teacher_id,
            );

            //save teacher subjects in database
            $this->Query_model->save_model('tbl_teacher_subjects',$attr1);

            redirect('teachers');
        }

    }


    public function delete($id){
        //delete teacher data
        $this->Query_model->delete_model('tbl_teacher', 'id',$id);

        //delete teacher subjects
        $this->Query_model->delete_model('tbl_teacher_subjects', 'teacher_id',$id);
        redirect('teachers');
    }
}
