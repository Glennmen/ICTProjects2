<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RegistrationClass {
    
    function saveData()
    {
        $ci =& get_instance();
        $ci->load->database();
        
        $AccountType = $_POST['accounttype'];
        $Username= $_POST['username'];
        $Password = $_POST['password'];
        $FirstName = $_POST['firstname'];
        $LastName = $_POST['lastname'];
        $RegisterNumber = $_POST['registernumber'];
        $Email = $_POST['email'];
        $Street = $_POST['street'];
        $CityCode = $_POST['citycode'];
        $City = $_POST['city'];
        $PhoneNumber = $_POST['phonenumber'];
        $ci->db->query("INSERT INTO users VALUES('$AccountType','$Username','$Password','$FirstName','$LastName','$RegisterNumber','$Email','$Street','$CityCode','$City','$PhoneNumber')");
    }
}