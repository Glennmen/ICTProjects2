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
     
     public function getAllEventsData()
     {   
         $ci =& get_instance();
         $ci->load->helper('form');
         try
         {
         $sEventsList = "<table border='1'><tr><th>Event name</th><th>Organizer</th><th>Start date</th>"
                 . "<th>End date</th><th>Description</th></tr>";
         $ci->load->database('');
         $sQuery = "SELECT * FROM eventsdatabase";
         $sData = $ci->db->query($sQuery);
         $sEventsList .= form_open('eventscontroller/');
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
             $sEventsList .= "<button name='button' value='".$sRow['EventID']."'>View description</button>";
             $sEventsList .= "</td></tr>";
         }
         $sEventsList .= form_close();
         $sEventsList .= "</table>";
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
             $sHtmlEventList = "<table border='1'><tr><th>Event name</th><th>Organizer</th><th>Start date</th>"
                 . "<th>End date</th><th>Start time</th><th>End time</th>"
                     . "<th>Availabla tickets</th><th>Location</th><th>Description</th></tr>";
             $ci->load->database('');
             $sQuery = "SELECT * FROM eventsdatabase WHERE EventID = ".$iEventID;
             $sData = $ci->db->query($sQuery);
             $sHtmlEventList .= form_open('eventscontroller/');
             foreach($sData->result_array() as $sRow)
             {
             $sHtmlEventList .= "<tr><td>";
             $sHtmlEventList .= $sRow['EventName'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['EventOrganizer'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['StartDate'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['EndDate'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['StartTime'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['EndTime'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['AvailableTickets'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['Location'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= $sRow['Description'];
             $sHtmlEventList .= "</td><td>";
             $sHtmlEventList .= "<button name='changeForm' value='".$sRow['EventID']."'>Change data</button>";
             $sHtmlEventList .= "<button name='deleteForm' value='".$sRow['EventID']."'>Delete event</button>";
             $sHtmlEventList .= "</td></tr>";
//                     . "<td>" + $sRow['EventName'] + "</td>"
//                     . "</tr>";
             }
             $sHtmlEventList .= "</table>";
             $sHtmlEventList .= "<br /><input type='submit' name='backToEvents' value='Eventslist' />";
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
             $this->sLocation = $aEventsData['Location'];
             $this->sDescription = $aEventsData['Description'];
             $ci->load->database('');
             $sQuery = "UPDATE eventsdatabase SET EventName = '$this->sEventName', "
                     . "EventOrganizer = '$this->sEventOrganizer', StartDate = '$this->sStartDate', "
                     . "EndDate = '$this->sEndDate', StartTime = '$this->sStartTime', "
                     . "EndTime = '$this->sEndTime', AvailableTickets = '$this->iAvailableTickets', "
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
             $sResult .= "Het event is verwijderd"
                     . "<br />"
                     . "<input type='submit' name='backToAllEvents' value='Eventslist' />";
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
         $this->sLocation = $aEventsData['Location'];
         $this->sDescription = $aEventsData['Description'];
         $sQuery = "INSERT INTO eventsdatabase (EventName,EventOrganizer,StartDate,EndDate,StartTime,EndTime,AvailableTickets,Location,Description)"
                 . "VALUES ('$this->sEventName','$this->sEventOrganizer','$this->sStartDate','$this->sEndDate','$this->sStartTime','$this->sEndTime','$this->iAvailableTickets','$this->sLocation','$this->sDescription')";
         $ci->db->query($sQuery);
         }
         catch(PDOException $oError)
         {
             echo $oError->getMessage();
         }
     }
}