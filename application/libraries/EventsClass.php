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
         try
         {
         $ci =& get_instance();
         $ci->load->database('databaseprojects');
         $sQuery = "SELECT * FROM eventsdatabase";
         $oData = $this->db->query($sQuery);
         foreach ($oData as $oDataItem)
         {
             
         }
         } 
         catch (Exception $ex) 
         {

         }
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
     
     public function saveNewEventData($aEventsData)
     {
         try
         {
         $ci =& get_instance();
         $ci->load->database('databaseprojects');
         $sEventName = $aEventsData['EventName'];
         $sEventOrganizer = $aEventsData['EventOrganizer'];
         $sStartDate = $aEventsData['StartDate'];
         $sEndDate = $aEventsData['EndDate'];
         $sStartTime = $aEventsData['StartTime'];
         $sEndTime = $aEventsData['EndTime'];
         $sAvailableTickets = $aEventsData['AvailableTickets'];
         $sLocation = $aEventsData['Location'];
         $sDescription = $aEventsData['Description'];
         $sQuery = "INSERT INTO eventsdatabase (EventName,EventOrganizer,StartDate,EndDate,StartTime,EndTime,AvailableTickets,Location,Description)"
                 . "VALUES ('$sEventName','$sEventOrganizer','$sStartDate','$sEndDate','$sStartTime','$sEndTime','$sAvailableTickets','$sLocation','$sDescription')";
         $ci->db->query($sQuery);
         }
         catch(PDOException $oError)
         {
             echo $oError->getMessage();
         }
     }
}