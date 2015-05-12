<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegistrationModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getRegistrationForm()
    {
        $this->load->helper('form');
        
        $AccountType = array(
              '3'          => 'Client',
              '2'  => 'Event organiser',
            );
        
        $AccountTypeClass = 'class = "form-control"';
        
        $Username = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Username',
            );
        
        $Password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Password',
            );
        
        $ConfirmPassword = array(
              'name'        => 'confirmpassword',
              'id'          => 'confirmpassword',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Confirm password',
            );
        
        $FirstName = array(
              'name'        => 'firstname',
              'id'          => 'firstname',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'First name',
            );
        
        $LastName = array(
              'name'        => 'lastname',
              'id'          => 'lastname',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Last name',
            );
        
        $RegisterNumber = array(
              'name'        => 'registernumber',
              'id'          => 'registernumber',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Register number',
            );
        
        $Email = array(
              'name'        => 'email',
              'id'          => 'email',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'E-mail',
            );
        
        $Street = array(
              'name'        => 'street',
              'id'          => 'street',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Street',
            );
        
        $CityCode = array(
              'name'        => 'citycode',
              'id'          => 'citycode',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'City code',
            );
        
        $City = array(
              'name'        => 'city',
              'id'          => 'city',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'City',
            );
        
        $PhoneNumber = array(
              'name'        => 'phonenumber',
              'id'          => 'phonenumber',
              'value'       => '',
              'class'       => 'form-control',
              'placeholder' => 'Phone number',
            );
        
        $Register = array(
                'name'      => 'register',
                'class'     => 'btn btn-default',
            );
        
        $form = array(
              'class'       => 'form-horizontal'  
            );
        
        $htmlContent = form_open('registrationcontroller/saveInput',$form);
        $htmlContent .= 
            '<div class="form-group">
                <label for="accounttype" class="col-sm-2 control-label">Account type</label>
                <div class="col-sm-10">';
        $htmlContent .= form_dropdown('accounttype', $AccountType, 'client', $AccountTypeClass);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($Username);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">';
        $htmlContent .= form_password($Password);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="confirmpassword" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">';
        $htmlContent .= form_password($ConfirmPassword);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First name</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($FirstName);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last name</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($LastName);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="registernumber" class="col-sm-2 control-label">Register number</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($RegisterNumber);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($Email);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="street" class="col-sm-2 control-label">Street</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($Street);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($City);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="citycode" class="col-sm-2 control-label">City code</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($CityCode);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <label for="phonenumber" class="col-sm-2 control-label">Phone number</label>
                <div class="col-sm-10">';
        $htmlContent .= form_input($PhoneNumber);
        $htmlContent .= 
                '</div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">';
            $htmlContent .=  form_submit($Register, "Register");
            $htmlContent .= 
                '</div>
            </div>';
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}