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
         $this->load->database('eventsdatabase');
         
         $sQuery = "";
     }
     
     public function getDataSelectedEvent()
     {
         
     }
     
     public function saveChanges()
     {
         
     }
     
     public function deleteEvent()
     {
         
     }
     
     public function saveNewEventData()
     {
         try
         {
         $this->load->database('eventsdatabase');
         
         $sQuery = "INSERT INTO events(EventName,StartDate,EndDate,StartTime,EndTime,Location,Description,EventOrganizer)"
                 . "VALUES ('EventTest','27/04/2015','27/04/2015','17:00','18:00','Hamont-Achel','test','Michiel')";
         $this->db->query($sQuery);
         }
         catch(PDOException $oError)
         {
             echo $oError->getMessage();
         }
     }
}