<?php

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
            
        $this->form_validation->set_rules('accounttype', 'Account type', 'trim|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|max_length[20]|is_unique[users.Username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|matches[confirmpassword]|max_length[20]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|xss_clean|max_length[20]');
        $this->form_validation->set_rules('firstname', 'First name', 'trim|xss_clean|max_length[20]');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim|xss_clean|max_length[20]');
        $this->form_validation->set_rules('registernumber', 'Register number', 'trim|xss_clean|exact_length[15]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|xss_clean|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('street', 'street', 'trim|xss_clean|max_length[32]');
        $this->form_validation->set_rules('citycode', 'City code', 'trim|xss_clean|numeric|exact_length[4]');
        $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[32]');
        $this->form_validation->set_rules('phonenumber', 'Phone number', 'trim|xss_clean');
            
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