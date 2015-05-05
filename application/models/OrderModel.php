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
        try {
        $ci =& get_instance();
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
         
         $adress = array(
            'name'        => 'adress',
            'id'          => 'adress',
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
            'required'    => 'required',
        );
         
         $events = array();
         $ci->load->database('');
         $query  = "SELECT * FROM eventsdatabase";
         $sData = $ci->db->query($query);
         
             foreach ($sData->result_array() as $sRow)
             {
                $events[$sRow['EventID']] = $sRow['EventName']; 
             }        
         
             
         $this->table->add_row("Customer name: ",  form_input($name));
         $this->table->add_row("First name: ",  form_input($fname));
         $this->table->add_row("Adress: ",  form_input($adress));
         $this->table->add_row("E-mail: ",  form_input($mail));
         $this->table->add_row("Passnumber: ",  form_input($passnumber));
         $this->table->add_row("Ticketamount: ", form_input($tickets));
         $this->table->add_row("Event", form_dropdown("Events",$events));

         $this->table->add_row(form_submit('submitOrderbtn','Order'),form_reset('Reset','Reset'));
         
         $htmlContent.=$this->table->generate();
         $htmlContent.= form_close();
         return $htmlContent;   
    
     } catch (Exception $oError) {
            echo $oError->getMessage();
        }
    }
    
    public function confirmOrder()
    { 
        $htmlContent = form_open();
        if(isset($_POST['submitOrderbtn']))
        {
            $ci->load->database('');
            $query=("INSERT INTO orderdatabase VALUES('$name','$fname',$adress,$mail,NOW())"); 
            $htmlContent .= '<h2>Order is succesvol geplaatst</h2>';
        }    
       
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}