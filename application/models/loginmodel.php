<?php
class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
        
        public function getLoginForm(/*$username, $password*/)
        {
            $this->load->helper('form');
            
            $data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => 'johndoe',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
            
            echo form_input($data);
            
            $this->load->library('table');
            
            $this->table->set_heading('<b>Login</b>', '<b>Password</b>');
            
            $this->table->add_row('<p><input type="text" name="login" value="" placeholder="Username or Email"></p>', '<p><input type="password" name="password" value="" placeholder="Password"></p>');

            echo $this->table->generate();
        }
}