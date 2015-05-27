<?php

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
    
    public function getOrderForm($iEventID)
    {
        try{
        $this->load->library('orderclass');
        $sOrder = $this->orderclass->getOrderForm($iEventID);
        return $sOrder;
    
     } catch (Exception $oError) {
            echo $oError->getMessage();
        }
    
    }
    
    public function confirmOrder($aOrder)
    { 
       $this->load->library('orderclass');
       $sOrder = $this->orderclass->confirmOrder($aOrder);
       return $sOrder;
       
    }
}