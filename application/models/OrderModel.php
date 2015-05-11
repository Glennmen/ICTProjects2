<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class OrderModel extends CI_Model{
    public $name;
    public $fname;
    public $adress;
    public $mail;
    public $passnumber;
    public $tickets;
    public $events;
    
    
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
        
         $this->name = array(
            'name'        => 'customerName',
            'id'          => 'cname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->fname = array(
            'name'        => 'firstName',
            'id'          => 'fname',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->adress = array(
            'name'        => 'adress',
            'id'          => 'adress',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $this->mail = array(
            'name'        => 'e-mail',
            'id'          => 'email',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
            'required'    => 'required',
        ); 
         
         $this->passnumber = array(
            'name'        => 'passnumber',
            'id'          => 'pass',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
         
         $this->tickets = array(
            'name'        => 'ticketAmount',
            'id'          => 'tickets',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
            'required'    => 'required',
        );
         
         $this->events = array();
         $ci->load->database('');
         $query  = "SELECT * FROM eventsdatabase";
         $sData = $ci->db->query($query);
         
             foreach ($sData->result_array() as $sRow)
             {
                $this->events[$sRow['EventID']] = $sRow['EventName']; 
             }        
         
             
         $this->table->add_row("Customer name: ",  form_input($this->name));
         $this->table->add_row("First name: ",  form_input($this->fname));
         $this->table->add_row("Adress: ",  form_input($this->adress));
         $this->table->add_row("E-mail: ",  form_input($this->mail));
         $this->table->add_row("Passnumber: ",  form_input($this->passnumber));
         $this->table->add_row("Ticketamount: ", form_input($this->tickets));
         $this->table->add_row("Event", form_dropdown("Events",$this->events));

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
       
        $ci =& get_instance();
        $htmlContent = form_open();
        if(isset($_POST['submitOrderbtn']))
        {
            $ci->load->database('');
            $query=("INSERT INTO orderdatabase VALUES('$this->name','$this->fname',$this->adress,$this->mail,$this->passnumber,$this->tickets,,NOW())"); 
            $ci->db->query($query);
            $htmlContent .= '<h2>Order is succesvol geplaatst</h2>';
        }    
       
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}