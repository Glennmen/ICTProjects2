<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegistrationController extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('registrationclass');
        $this->load->model('RegistrationModel');
        $this->load->model('NavigationModel');
    }
    
    function index()
    {        
        $data['pageTitle'] = 'Register';
        $data['Menu'] = $this->NavigationModel->Menu();
        $data['htmlContent'] = $this->RegistrationModel->getRegistrationForm();
        
        $this->load->view('view', $data);
        
    }
    
    function saveInput()
    {
        $data['pageTitle'] = 'Register';
        $data['Menu'] = $this->NavigationModel->Menu();
        $this->load->database();
        
        $this->load->library('form_validation');
            
        $this->form_validation->set_rules('accounttype', 'Account type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|max_length[20]|is_unique[users.Username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[confirmpassword]|max_length[20]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|required|xss_clean|max_length[20]');
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean|max_length[20]');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean|max_length[20]');
        $this->form_validation->set_rules('registernumber', 'Register number', 'trim|required|xss_clean|numeric|exact_length[11]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('street', 'street', 'trim|required|xss_clean|max_length[32]');
        $this->form_validation->set_rules('citycode', 'City code', 'trim|required|xss_clean|numeric|exact_length[4]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean|max_length[32]');
        $this->form_validation->set_rules('phonenumber', 'Phone number', 'trim|required|xss_clean');
            
        if($this->form_validation->run() == FALSE)
        {
            if(validation_errors() != "")
                {
                $this->load->library('errorreport');
                
                $error = $this->errorreport->Error();
                $form = $this->RegistrationModel->getRegistrationForm();
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
                
                $this->load->view('view', $data);
                }
            }
            else
                {
                $this->registrationclass->saveData();
                redirect('home', 'refresh');
                }
    }
}