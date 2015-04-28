<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OrderModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getOrderForm()
    {
        $this->load->helper('form');
        $this->load->library('table');
        
        $htmlContent = form_open();
        
         $name = array(
            'name'        => 'customerName',
            'id'          => 'cname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $fname = array(
            'name'        => 'firstName',
            'id'          => 'fname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $address = array(
            'name'        => 'address',
            'id'          => 'address',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $mail = array(
            'name'        => 'e-mail',
            'id'          => 'email',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
            'required'    => 'required',
        ); 
         
         $passnumber = array(
            'name'        => 'passnumber',
            'id'          => 'pass',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $tickets = array(
            'name'        => 'ticketAmount',
            'id'          => 'tickets',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         $events = array(
           'event1'       => 'Event 1',
           'event2'       => 'Event 2',
         );
         
         $this->table->add_row("Customer name: ",  form_input($name));
         $this->table->add_row("First name: ",  form_input($fname));
         $this->table->add_row("Adress: ",  form_input($address));
         $this->table->add_row("E-mail: ",  form_input($mail));
         $this->table->add_row("Passnumber: ",  form_input($passnumber));
         $this->table->add_row("Ticketamount: ", form_input($tickets));
         $this->table->add_row("Event", form_dropdown("Events",$events));
         
         $this->table->add_row(form_submit('Bestellen','Order'));
         
         $htmlContent.= '<h1>Order Form</h1>';
         $htmlContent.=$this->table->generate();
         $htmlContent.= form_close();
         return $htmlContent;   
    }
    
    public function confirmOrder()
    {
        
    }
}