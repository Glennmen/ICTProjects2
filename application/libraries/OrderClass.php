<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class OrderClass {
    public $sname;
    public $sfname;
    public $sstreet;
    public $scity;
    public $scitycode;
    public $smail;
    public $spassnumber;
    public $sphone;
    public $itickets;
    public $sevents;
    public $dppt;
    
    public function getOrderForm($iEventID)
    {
        
        $ci =& get_instance();
        $ci->load->helper('form');
        
        $ci->load->database('');
        $sQuery = "SELECT * FROM eventsdatabase WHERE EventID = ".$iEventID;
        $sData = $ci->db->query($sQuery);
        foreach($sData->result_array() as $sRow)
             {
                $this->sevents = $sRow['EventName'];
                $this->dppt = $sRow['PrijsPerTicket'];
             }
        
         $tickets = array(
            'name'        => 'ticketAmount',
            'id'          => 'tickets',
            'value'       => '',
            'maxlength'   => '100',
            'class'       => 'form-control',
            'required' => 'required'
        );
         $form = array(
              'class'       => 'form-horizontal'  
        );
         $submit = array(
                'name'      => 'Orderbtn',
                'class'     => 'btn btn-default',
        );
         
        $htmlContent = form_open('', $form); 
        
        $aUserData = $ci->session->userdata('logged_in');
        $sID = $aUserData['id'];
        $sQuery = "SELECT * FROM users WHERE  ID = ".$sID;     
        $sData = $ci->db->query($sQuery);
        foreach($sData->result_array() as $sRow)
             {
                $htmlContent .= "<div class='form-group'>
                    <label for='lastname' class='col-sm-2 control-label'>Last name:</label>
                    <div class='col-sm-10'><input type='text' name='lastname' class='form-control' value='".$sRow['Lastname']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='firstname' class='col-sm-2 control-label'>First name:</label>
                    <div class='col-sm-10'><input type='text' name='firstname' class='form-control' value='".$sRow['Firstname']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='registernumber' class='col-sm-2 control-label'>Register number:</label>
                    <div class='col-sm-10'><input type='text' name='registernumber' class='form-control' value='".$sRow['Registernumber']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='email' class='col-sm-2 control-label'>E-mail</label>
                    <div class='col-sm-10'><input type='text' name='email' class='form-control' value='".$sRow['Email']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='street' class='col-sm-2 control-label'>Street:</label>
                    <div class='col-sm-10'><input type='text' name='street' class='form-control' value='".$sRow['Street']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='city' class='col-sm-2 control-label'>City:</label>
                    <div class='col-sm-10'><input type='text' name='city' class='form-control' value='".$sRow['City']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='citycode' class='col-sm-2 control-label'>Citycode:</label>
                    <div class='col-sm-10'><input type='text' name='citycode' class='form-control' value='".$sRow['Citycode']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='phonenumber' class='col-sm-2 control-label'>Phone number:</label>
                    <div class='col-sm-10'><input type='text' name='phonenumber' class='form-control' value='".$sRow['Phonenumber']."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='eventname' class='col-sm-2 control-label'>Event name:</label>
                    <div class='col-sm-10'><input type='text' name='eventname' class='form-control' value='".$this->sevents."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='prijsperticket' class='col-sm-2 control-label'>PrijsPerTicket:</label>
                    <div class='col-sm-10'><input type='text' name='prijsperticket' class='form-control' value='".$this->dppt ."' /></div></div>";
                $htmlContent .= "<div class='form-group'>
                    <label for='ticketAmount' class='col-sm-2 control-label'>Amount tickets:</label><div class='col-sm-10'>";
                $htmlContent .= form_input($tickets);
                $htmlContent .= "</div></div>";
             } 
         
         $htmlContent .= "<div class='form-group'><div class='col-sm-offset-2 col-sm-10'><button name='Orderbtn' class='btn btn-default' value='".$iEventID."'>Order tickets</button></div></div>";
         
         $htmlContent.= form_close();
         return $htmlContent;   
    }
    
    public function confirmOrder($aOrder)
    {
       $this->sname = $aOrder['Name'];
       $this->sfname = $aOrder['fName'];
       $this->spassnumber = $aOrder['Pass'];
       $this->smail = $aOrder['Mail'];
       $this->sstreet = $aOrder['Street'];
       $this->scity = $aOrder['City'];
       $this->scitycode = $aOrder['Citycode'];
       $this->sphone = $aOrder['Phone'];
       $this->itickets = $aOrder['Tickets'];
       $this->sevents = $aOrder['Event'];
       $this->dppt = $aOrder['Price'];
       $iEventID = $aOrder['EventID'];
       $mail = $this->smail;
       
        $ci =& get_instance();
            
        $ci->load->database('');
        $query1 = "INSERT INTO orderdatabase (Lastname,Firstname,Registernumber,Email,Street,City,Citycode,Phonenumber,EventName,PrijsPerTicket,AmountTickets)"
                . "VALUES ('$this->sname','$this->sfname','$this->spassnumber','$this->smail','$this->sstreet','$this->scity','$this->scitycode','$this->sphone','$this->sevents','$this->dppt','$this->itickets')";
        $query2 = "SELECT * FROM eventsdatabase WHERE EventID = ".$iEventID;
        
        $ci->db->trans_start();
        $sData = $ci->db->query($query2);
        foreach($sData->result_array() as $sRow)
            {
                if($sRow['AvailableTickets'] >= $this->itickets)
                {
                $ci->db->query($query1);
                $newAmount = $sRow['AvailableTickets'] - $this->itickets;
                }
                else
                {
                    return '<p>Not enough tickets available.</p>';
                }
            }
        $query3 = "UPDATE eventsdatabase SET AvailableTickets = '$newAmount'"
        . "WHERE EventID = '$iEventID'";
        $ci->db->query($query3);
        $ci->db->trans_complete();

        
        if ($ci->db->trans_status() === FALSE)
        {
            return '<p>Something went wrong, please try again.</p>';
        }
        
        $ci->load->library('mailingclass');
        
        $message = "Dear ".$aOrder['Name']." ".$aOrder['fName']."\r\n\r\n";
        $message .= "You have purchased ".$aOrder['Tickets']." tickets for the event: ".$aOrder['Event']."\r\n";
        $message .= "Your order has been added to our database.\r\n\r\n";
        $message .= "Thank you for using our TicketService.";
        
        $ci->mailingclass->sendMail($mail, $message);
            
        $htmlContent = '<p>Order has been placed.</p>';
        
        return $htmlContent;
    }
}