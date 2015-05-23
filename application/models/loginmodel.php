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
              'class'       => 'form-control',
              'placeholder' => 'Login',
                'required' => 'required'
            );
            
            $password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Password',
                'required' => 'required'
            );
            
            $submit = array(
                'name'      => 'login',
                'class'     => 'btn btn-default',
            );
            
            $form = array(
              'class'       => 'form-horizontal'  
            );
            
            $htmlContent = form_open('',$form);
            
            $htmlContent .= 
            '<div class="form-group">
                <label for="username" class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">';
            $htmlContent .= form_input($username);
            $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">';
            $htmlContent .= form_password($password);
            $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">';
            $htmlContent .=  form_submit($submit, "Login");
            $htmlContent .= 
                '</div>
            </div>';
            
            $htmlContent .= form_close();
                    
            return $htmlContent;
        }
}
?>