<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegistrationController extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('RegistrationClass');
    }
    
    function index()
    {
        $this->load->model('RegistrationModel');
        $this->load->model('NavigationModel');

        $data['pageTitle'] = 'Registreren';
        $data['Menu'] = $this->NavigationModel->Menu();
        $data['htmlContent'] = $this->RegistrationModel->getRegistrationForm();
        
        $this->load->view('view', $data);
    }
}