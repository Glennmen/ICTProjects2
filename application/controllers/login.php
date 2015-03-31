<?php

class Login extends CI_Controller {
    
    public function index()
	{
                $this->load->model('LoginModel');
                $this->LoginModel->getLoginForm();
	}
}
?>