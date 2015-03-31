<?php
class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
        
        public function getLoginForm()
        {
            $this->load->helper('form');
            
            $username = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
            
            $password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
            
            $this->load->library('table');
            
            $htmlContent = form_open();
            
            $this->table->add_row("login:",form_input($username));
            $this->table->add_row("password:",form_password($password));
            $this->table->add_row(form_submit("login", "Aanmelden"),form_reset("reset", "Reset"));
            

            $htmlContent .= $this->table->generate();
            
            $htmlContent .= form_close();
                    
            return $htmlContent;
        }
}