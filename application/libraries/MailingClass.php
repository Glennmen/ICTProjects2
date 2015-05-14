<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MailingClass {
    public function sendMail($to, $message)
    {
        $ci =& get_instance();
        $ci->load->library('email');
        
        $ci->email->from('ticketserviceict@gmail.com', 'TicketService');
        $ci->email->to($to);
        $ci->email->subject('Order received');
        
        $ci->email->message($message); 
        
        $ci->email->send();
    }
    
}
