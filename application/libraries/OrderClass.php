<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OrderClass {
    public $sname;
    public $sfname;
    public $sadress;
    public $smail;
    public $spassnumber;
    public $itickets;
    public $sevents;
    public $dppt;
    
    public function getOrderForm($sEventName,$dPpt)
    {
        
        $ci =& get_instance();
        $ci->load->helper('form');
        $ci->load->library('table');
        
        $htmlContent = form_open();
        
         $this->sname = array(
            'name'        => 'customerName',
            'id'          => 'cname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->sfname = array(
            'name'        => 'firstName',
            'id'          => 'fname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->sadress = array(
            'name'        => 'adress',
            'id'          => 'adress',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $this->smail = array(
            'name'        => 'e-mail',
            'id'          => 'email',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        ); 
         
         $this->spassnumber = array(
            'name'        => 'passnumber',
            'id'          => 'pass',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->itickets = array(
            'name'        => 'ticketAmount',
            'id'          => 'tickets',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->sevents = array(
             'name'       => 'event',
             'id'         => 'event',
             'value'      => $sEventName,
             'maxlength'  => '100',
             'size'       => '50',
             'style'      => 'width:50%',
         );
         $this->dppt = array(
             'name'       => 'price',
             'id'         => 'price',
             'value'      => $dPpt,
             'maxlength'  => '100',
             'size'       => '50',
             'style'      => 'width:50%',
         );
         
             
         $ci->table->add_row("Customer name: ","",  form_input($this->sname));
         $ci->table->add_row("First name: ","",  form_input($this->sfname));
         $ci->table->add_row("Adress: ","",  form_input($this->sadress));
         $ci->table->add_row("E-mail: ","",  form_input($this->smail));
         $ci->table->add_row("Passnumber: ","",  form_input($this->spassnumber));
         $ci->table->add_row("Ticketamount: ","", form_input($this->itickets));
         $ci->table->add_row("Event:","", $this->sevents['value']);
         $ci->table->add_row("Price per ticket:","", $this->dppt['value']);
         
         $ci->table->add_row(form_submit('submitOrderbtn','Order'),form_reset('Reset','Reset'));
         
         $htmlContent.=$ci->table->generate();
         $htmlContent.= form_close();
         return $htmlContent;   
   
    }
    
    
    
    public function confirmOrder($aOrder)
    {
       $this->sname = $aOrder['Name'];
       $this->sfname = $aOrder['fName'];
       $this->sadress = $aOrder['Adress'];
       $this->smail = $aOrder['Mail'];
       $this->spassnumber = $aOrder['Pass'];
       $this->itickets = $aOrder['Tickets'];
       $this->sevents = $aOrder['Event'];
       $this->dppt = $aOrder['Price'];
        $ci =& get_instance();
        $htmlContent = form_open();
        if(isset($_POST['submitOrderbtn']))
        {
            
            $ci->load->database('');
            $query = "INSERT INTO orderdatabase (CustomerName,FirstName,Adress,Email,Passnumber,Tickets,EventName,PricePerTicket)"
                    . "VALUES ('$this->sname','$this->sfname','$this->sadress','$this->smail','$this->spassnumber','$this->itickets','$this->sevents','$this->dppt')";
            $ci->db->query($query);
            
            
            $htmlContent .= '<h2>Order is succesvol geplaatst</h2>';
             
        }    
       
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}