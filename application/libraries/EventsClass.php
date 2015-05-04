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
     
     public function getAllEventsData()
     {      
         $ci =& get_instance();
         try
         {
         $sEventsList = "<table border='1'><th><td>Event name</td><td>Organizer</td><td>Start date</td>"
                 . "<td>End date</td><td>Start time</td><td>End time</td><td>Available tickets</td>"
                 . "<td>Location</td><td>Description</td></th>";
         $ci->load->database('databaseprojects');
         $sQuery = "SELECT * FROM eventsdatabase";
         $sData = $ci->db->query($sQuery);
         foreach($sData->result_array() as $sRow)
         {
             $sEventsList .= "<tr><td></td><td>";
             $sEventsList .= $sRow['EventName'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EventOrganizer'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['StartDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EndDate'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['StartTime'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['EndTime'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['AvailableTickets'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['Location'];
             $sEventsList .= "</td><td>";
             $sEventsList .= $sRow['Description'];
             $sEventsList .="</td><td>";
             $sEventsList .= "<input type='submit' name='delete' value='Delete'";
             $sEventsList .= "</td></tr>";
         }
         $sEventsList .= "</table>";
         return $sEventsList;
         } 
         catch (Exception $oError) 
         {
            echo $oError->getMessage();
         }
         
     }
     
     public function getDataSelectedEvent()
     {
         
     }
     
     public function saveChanges()
     {
         $ci =& get_instance();
         try
         {
             $ci->load->database('databaseprojects');
             $sQuery = "UPDATE";
         } 
         catch (Exception $oError) 
         {
             echo $oError->getMessage();
         }
     }
     
     public function getDescription()
     {
         
     }
     
     public function deleteEvent()
     {
         $ci =& get_instance();
         try
         {
             
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
         $ci->load->database('databaseprojects');
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