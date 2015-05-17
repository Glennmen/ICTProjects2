<?php if(!defined('BASEPATH')) exit('no direct script acces allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventsClass {
     public $sEventName;
     public $sEventOrganizer;
     public $sStartDate;
     public $sEndDate;
     public $sStartTime;
     public $sEndTime;
     public $iAvailableTickets;
     public $sDescription;
     public $sLocation;
     public $iEventID;
     public $iOrganizerID;
     public $iSessionID;
     public $iAccountType;
     public $dPrijs;
     
     
     public function getAllEventsData()
     {   
         $ci =& get_instance();
         $ci->load->helper('form');
         try
         {
         $aUserData = $ci->session->userdata('logged_in');
         $this->iSessionID = $aUserData['id'];
         $this->iAccountType = $aUserData['clientType'];
         $sEventsList = form_open();
         if(($this->iAccountType == 2) || $this->iAccountType == 1)
             {
                 $sEventsList .= "<div class='form-group'>
                    <div class='col-sm-10'><p class='form-control-static'><input type='submit' name='myEvents' class='btn btn-default' value='Show my events' /></div></div>";
             } 
         $sEventsList .= "<div class='form-group'>
                    <div class='col-sm-12'><p class='form-control-static'><table class='table table-hover table-bordered'><thead><tr><th>Event name</th><th>Organizer</th><th>Start date</th>"
                 . "<th>End date</th><th>Description</th></tr></thead><tbody>";
         $ci->load->database('');
         $sQuery = "SELECT * FROM eventsdatabase";
         $sData = $ci->db->query($sQuery);
         foreach($sData->result_array() as $sRow)
         {
             $sEventsList .= "<tr><td>";
             $sEventsList .= $sRow['EventName'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EventOrganizer'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['StartDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EndDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= "<button name='button' class='btn btn-default' value='".$sRow['EventID']."'>View description</button>";
             $sEventsList .= "</td></tr>";
         }
         $sEventsList .= "</tbody></table></div></div>";
           
         $sEventsList .= form_close();
         return $sEventsList;
         } 
         catch (Exception $oError) 
         {
            echo $oError->getMessage();
         }     
     }
     
     public function getDataSelectedEvent($iEventID)
     {
         $ci =& get_instance();
         try
         {
             $aUserData = $ci->session->userdata('logged_in');
             $this->iSessionID = $aUserData['id'];
             $this->iAccountType = $aUserData['clientType'];
             $ci->load->helper('form');
             $form = array(
              'class'       => 'form-horizontal'  
            );
             
             $sHtmlEventList = form_open('', $form);
             $ci->load->database('');
             $sQuery = "SELECT * FROM eventsdatabase WHERE EventID = ".$iEventID;
             $sData = $ci->db->query($sQuery);
             foreach($sData->result_array() as $sRow)
             {
             $this->iOrganizerID = $sRow['OrganizerID'];
             $this->iAvailableTickets = $sRow['AvailableTickets'];
             $sHtmlEventList .= "<div class='form-group'>
                    <label for='eventname' class='col-sm-2 control-label'>Event name:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['EventName']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='eventorganizer' class='col-sm-2 control-label'>Event organizer:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['EventOrganizer']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='startdate' class='col-sm-2 control-label'>Start date:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['StartDate']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='enddate' class='col-sm-2 control-label'>End date:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['EndDate']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='starttime' class='col-sm-2 control-label'>Start time:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['StartTime']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='endtime' class='col-sm-2 control-label'>End time:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['EndTime']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='availabletickets' class='col-sm-2 control-label'>Available tickets:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['AvailableTickets']."</p></div></div>"
                     ."<div class='form-group'>
                    <label for='prijsperticket' class='col-sm-2 control-label'>Prijs per ticket:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['PrijsPerTicket']."€</p></div></div>"
                    ."<div class='form-group'>
                    <label for='location' class='col-sm-2 control-label'>Location:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['Location']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='description' class='col-sm-2 control-label'>Description:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['Description']."</p></div></div>"
                     . "<div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'>";
             if(($this->iOrganizerID == $this->iSessionID) || $this->iAccountType == 1)
             {
                 $sHtmlEventList .= "<button name='changeForm' class='btn btn-default' value='".$sRow['EventID']."'>Change data</button>";
             $sHtmlEventList .= "<button name='deleteForm' class='btn btn-default' value='".$sRow['EventID']."'>Delete event</button>";
             }
             if(($ci->session->userdata('logged_in')) & ($this->iAvailableTickets != 0))
             {
             $sHtmlEventList .= "<button name='orderTickets' class='btn btn-default' value='".$sRow['EventID']."'>Order tickets</button>";
             }
             }
             $sHtmlEventList .= "</div></div><div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'><input type='submit' name='backToEvents' class='btn btn-default' value='Eventslist' /></div></div>";
             $sHtmlEventList .= form_close();
             
             return $sHtmlEventList;
         } 
         catch (Exception $oError) 
         {
             echo $oError->getMessage();
         }
     }
     
     public function saveChanges($iEventID, $aEventsData)
     {
         $ci =& get_instance();
         try
         {
             $this->sEventName = $aEventsData['EventName'];
             $this->sEventOrganizer = $aEventsData['EventOrganizer'];
             $this->sStartDate = $aEventsData['StartDate'];
             $this->sEndDate = $aEventsData['EndDate'];
             $this->sStartTime = $aEventsData['StartTime'];
             $this->sEndTime = $aEventsData['EndTime'];
             $this->iAvailableTickets = $aEventsData['AvailableTickets'];
             $this->dPrijsPrijs = $aEventsData['PrijsPerTicket'];
             $this->sLocation = $aEventsData['Location'];
             $this->sDescription = $aEventsData['Description'];
             $ci->load->database('');
             $sQuery = "UPDATE eventsdatabase SET EventName = '$this->sEventName', "
                     . "EventOrganizer = '$this->sEventOrganizer', StartDate = '$this->sStartDate', "
                     . "EndDate = '$this->sEndDate', StartTime = '$this->sStartTime', "
                     . "EndTime = '$this->sEndTime', AvailableTickets = '$this->iAvailableTickets', "
                     . "PrijsPerTicket = '$this->dPrijs', "
                     . "Location = '$this->sLocation', Description = '$this->sDescription' "
                     . "WHERE EventID = '$iEventID'";
             $ci->db->query($sQuery);  
         } 
         catch (Exception $oError) 
         {
             echo $oError->getMessage();
         }
     }
     
     public function deleteEvent($iEventID)
     {
         try
         {
             $ci =& get_instance();
             $ci->load->helper('form');
             $ci->load->database('');
             $this->iEventID = $iEventID;
             $sQuery = "DELETE FROM eventsdatabase WHERE EventID = '$this->iEventID'";
             $ci->db->query($sQuery);
             $sResult = form_open();
             $sResult .= "<p>Het event is verwijderd</p>"
                     . "<input type='submit' name='backToAllEvents' class='btn btn-default' value='Eventslist' />";
             $sResult .= form_close();
             return $sResult;
         } 
         catch (Exception $oError) 
         {
             echo $oError->getMessage();
         }
     }
     
     public function saveNewEventData($aEventsData)
     {
         try
         {
         $ci =& get_instance();
         $ci->load->database('');
         $this->sEventName = $aEventsData['EventName'];
         $this->sEventOrganizer = $aEventsData['EventOrganizer'];
         $this->sStartDate = $aEventsData['StartDate'];
         $this->sEndDate = $aEventsData['EndDate'];
         $this->sStartTime = $aEventsData['StartTime'];
         $this->sEndTime = $aEventsData['EndTime'];
         $this->iAvailableTickets = $aEventsData['AvailableTickets'];
         $this->dPrijs = $aEventsData['PrijsPerTicket'];
         $this->sLocation = $aEventsData['Location'];
         $this->sDescription = $aEventsData['Description'];
         $aUserData = $ci->session->userdata('logged_in');
         $this->iOrganizerID = $aUserData['id'];
         $sQuery = "INSERT INTO eventsdatabase (EventName,EventOrganizer,OrganizerID,StartDate,EndDate,StartTime,EndTime,AvailableTickets,PrijsPerTicket,Location,Description)"
                 . "VALUES ('$this->sEventName','$this->sEventOrganizer','$this->iOrganizerID','$this->sStartDate','$this->sEndDate','$this->sStartTime','$this->sEndTime','$this->iAvailableTickets','$this->dPrijs','$this->sLocation','$this->sDescription')";
         $ci->db->query($sQuery);
         }
         catch(PDOException $oError)
         {
             echo $oError->getMessage();
         }
     }
     
     public function getMyEvents()
     {
         $ci =& get_instance();
         $ci->load->helper('form');
         try
         {
         $aUserData = $ci->session->userdata('logged_in');
         $this->iOrganizerID = $aUserData['id'];
         $sEventsList = form_open();
         $sEventsList .= "<div class='form-group'>
                    <div class='col-sm-10'><p class='form-control-static'><input type='submit' name='backToEvents' class='btn btn-default' value='Eventslist' /></div></div>";
         $sEventsList .= "<div class='form-group'>
                    <div class='col-sm-12'><p class='form-control-static'><table class='table table-hover table-bordered'><thead><tr><th>Event name</th><th>Organizer</th><th>Start date</th>"
                 . "<th>End date</th><th>Description</th></tr></thead><tbody>";
         $ci->load->database('');
         $sQuery = "SELECT * FROM eventsdatabase WHERE OrganizerID = '$this->iOrganizerID'";
         $sData = $ci->db->query($sQuery);
         foreach($sData->result_array() as $sRow)
         {
             $sEventsList .= "<tr><td>";
             $sEventsList .= $sRow['EventName'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EventOrganizer'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['StartDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EndDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= "<button name='button' class='btn btn-default' value='".$sRow['EventID']."'>View description</button>";
             $sEventsList .= "</td></tr>";
         }
         $sEventsList .= "</tbody></table></div></div>";
         $sEventsList .= form_close();
         return $sEventsList;
         } 
         catch (Exception $oError) 
         {
            echo $oError->getMessage();
         }     
     }
}