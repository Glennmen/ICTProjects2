<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

class RegistrationClass {
    
    function saveData()
    {
        $ci =& get_instance();
        $ci->load->database();
        
        
        $AccountType = $_POST['accounttype'];
        $Username= $_POST['username'];
        $Password = MD5($_POST['password']);
        $FirstName = $_POST['firstname'];
        $LastName = $_POST['lastname'];
        $RegisterNumber = $_POST['registernumber'];
        $Email = $_POST['email'];
        $Street = $_POST['street'];
        $CityCode = $_POST['citycode'];
        $City = $_POST['city'];
        $PhoneNumber = $_POST['phonenumber'];
        $ci->db->query("INSERT INTO users VALUES(null, '$AccountType','$Username','$Password','$FirstName','$LastName','$RegisterNumber','$Email','$Street','$City','$CityCode','$PhoneNumber')");
        
        $ci->load->library('mailingclass');
        
        $message = "Dear ".$LastName." ".$FirstName."\r\n\r\n";
        $message .= "You have succesfully been registerd to our site.\r\n\r\n";
        $message .= "Thank you for joining our TicketService.";
        
        $ci->mailingclass->sendMail($Email, $message, 'Registation TicketService');
    }
}