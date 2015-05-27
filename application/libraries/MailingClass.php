<?php
class MailingClass {
    public function sendMail($to, $message, $subject)
    {
        $ci =& get_instance();
        $ci->load->library('email');
        
        $ci->email->from('ticketserviceict@gmail.com', 'TicketService');
        $ci->email->to($to);
        $ci->email->subject($subject);
        
        $ci->email->message($message); 
        
        $ci->email->send();
    }
    
}
