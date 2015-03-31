<?php

class Login extends CI_Controller {
    
    public function index()
	{
                $this->load->model('LoginModel');
                
                $data['htmlContent'] = $this->LoginModel->getLoginForm();
                
                $this->load->view('view', $data);
                
                
	}
}
?>