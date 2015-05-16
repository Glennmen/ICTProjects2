<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class EventsModel extends CI_Model {
    
    public function __construct()
	{
		parent::__construct();
	}
            
    public function getAllEvents()
    {
        $this->load->library('eventsclass');
        $sEventsList = $this->eventsclass->getAllEventsData();
        return $sEventsList;
    }
    
    public function getDataSelectedEventModel($iEventID)
    {
        $this->load->library('eventsclass');
        $sEvent = $this->eventsclass->getDataSelectedEvent($iEventID);
        return $sEvent;
    }
    
    public function saveChangesModel($iEventID, $aEventsData)
    {
        $this->load->library('eventsclass');
        $sEvent = $this->eventsclass->saveChanges($iEventID, $aEventsData);
        return $sEvent;
    }
    
    public function changeEventForm($iEventID)
    {
        $this->load->helper('form');
        $ci =& get_instance();
        
        try 
        {
            $form = array(
              'class'       => 'form-horizontal'  
            );
            
            $ci->load->database('');
             $sQuery = "SELECT * FROM eventsdatabase WHERE EventID =";
             $sQuery .= $iEventID;
             $sData = $ci->db->query($sQuery);
             $htmlChangeForm = form_open('', $form);
             foreach($sData->result_array() as $sRow)
             {
                $htmlChangeForm .= "<div class='form-group'>
                    <label for='eventname' class='col-sm-2 control-label'>Event name:</label>
                    <div class='col-sm-10'><input type='text' name='eventname' class='form-control' value='".$sRow['EventName']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='eventorganizer' class='col-sm-2 control-label'>Event organizer:</label>
                    <div class='col-sm-10'><input type='text' name='eventorganizer' class='form-control' value='".$sRow['EventOrganizer']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='startdate' class='col-sm-2 control-label'>Start date:</label>
                    <div class='col-sm-10'><input type='date' name='startdate' class='form-control' value='".$sRow['StartDate']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='enddate' class='col-sm-2 control-label'>End date:</label>
                    <div class='col-sm-10'><input type='date' name='enddate' class='form-control' value='".$sRow['EndDate']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='starttime' class='col-sm-2 control-label'>Start time:</label>
                    <div class='col-sm-10'><input type='time' name='starttime' class='form-control' value='".$sRow['StartTime']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='endtime' class='col-sm-2 control-label'>End time:</label>
                    <div class='col-sm-10'><input type='time' name='endtime' class='form-control' value='".$sRow['EndTime']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='availabletickets' class='col-sm-2 control-label'>Available tickets:</label>
                    <div class='col-sm-10'><input type='text' name='availabletickets' class='form-control' value='".$sRow['AvailableTickets']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='prijsperticket' class='col-sm-2 control-label'>Prijs per ticket:</label>
                    <div class='col-sm-10'><input type='text' name='prijsperticket' class='form-control' value='".$sRow['PrijsPerTicket']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='location' class='col-sm-2 control-label'>Location:</label>
                    <div class='col-sm-10'><input type='text' name='location' class='form-control' value='".$sRow['Location']."' /></div></div>"
                    ."<div class='form-group'>
                    <label for='description' class='col-sm-2 control-label'>Description:</label>
                    <div class='col-sm-10'><textarea name='description' class='form-control' rows='4' cols='40' >".$sRow['Description']."</textarea></div></div>"
                    ."<div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'><button name='change' class='btn btn-default' value='".$sRow['EventID']."'>Change</button><input type='submit' name='clear' class='btn btn-default' value='Clear' />"
                    . "<input type='submit' name='annuleren' class='btn btn-default' value='Cancel' /></div></div>";
             }
        $htmlChangeForm .= form_close();
        
        return $htmlChangeForm;
        } 
        catch (Exception $oError) 
        {
            echo $oError->getMessage();
        }
    }
    
    public function deleteSelectedEvent($iEventID)
    {
        $this->load->library('eventsclass');
        $sEvent = $this->eventsclass->deleteEvent($iEventID);
        return $sEvent;
    }
    
    public function deleteEventForm($iEventID)
    {
        $ci =& get_instance();
         try
         {
            $form = array(
              'class'       => 'form-horizontal'  
            );
             
             $sHtmlEventList = form_open('', $form);
             $ci->load->database('');
             $sQuery = "SELECT * FROM eventsdatabase WHERE EventID = ".$iEventID;
             $sData = $ci->db->query($sQuery);
             foreach($sData->result_array() as $sRow)
             {
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
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['PrijsPerTicket']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='location' class='col-sm-2 control-label'>Location:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['Location']."</p></div></div>"
                    ."<div class='form-group'>
                    <label for='description' class='col-sm-2 control-label'>Description:</label>
                    <div class='col-sm-10'><p class='form-control-static'>".$sRow['Description']."</p></div></div>";
             }
             $sHtmlEventList .= "<div class='form-group'><div class='col-sm-offset-2 col-sm-10'><p class='form-control-static'>Weet u zeker dat u ".$sRow['EventName']." wilt verwijderen?</p></div></div>"
                     . "<div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'><button name='delete' class='btn btn-default' value='".$sRow['EventID']."'>Delete event</button>"
                     . "<button name='cancelDelete' class='btn btn-default' value='".$sRow['EventID']."'>Cancel</button></div></div>";
             $sHtmlEventList .= form_close();
             return $sHtmlEventList;
         } 
         catch (Exception $oError) 
         {
             echo $oError->getMessage();
         }
    }
    
    public function getEventCreateForm()
    {
        $this->load->helper('form');
        $form = array(
              'class'       => 'form-horizontal'  
            );
        
        $htmlContent = form_open('', $form);
        
        $htmlContent .= "<div class='form-group'>
                    <label for='eventname' class='col-sm-2 control-label'>Event name:</label>
                    <div class='col-sm-10'><input type='text' name='eventname' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='eventorganizer' class='col-sm-2 control-label'>Event organizer:</label>
                    <div class='col-sm-10'><input type='text' name='eventorganizer' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='startdate' class='col-sm-2 control-label'>Start date:</label>
                    <div class='col-sm-10'><input type='date' name='startdate' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='enddate' class='col-sm-2 control-label'>End date:</label>
                    <div class='col-sm-10'><input type='date' name='enddate' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='starttime' class='col-sm-2 control-label'>Start time:</label>
                    <div class='col-sm-10'><input type='time' name='starttime' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='endtime' class='col-sm-2 control-label'>End time:</label>
                    <div class='col-sm-10'><input type='time' name='endtime' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='availabletickets' class='col-sm-2 control-label'>Available tickets:</label>
                    <div class='col-sm-10'><input type='text' name='availabletickets' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='prijsperticket' class='col-sm-2 control-label'>Prijs per ticket:</label>
                    <div class='col-sm-10'><input type='text' name='prijsperticket' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='location' class='col-sm-2 control-label'>Location:</label>
                    <div class='col-sm-10'><input type='text' name='location' class='form-control' /></div></div>"
                    ."<div class='form-group'>
                    <label for='description' class='col-sm-2 control-label'>Description:</label>
                    <div class='col-sm-10'><textarea name='description' class='form-control' rows='4' cols='40' ></textarea></div></div>"
                    ."<div class='form-group'>
                    <div class='col-sm-offset-2 col-sm-10'><input type='submit' name='toevoegen' class='btn btn-default' value='Add' /><input type='submit' name='clear' class='btn btn-default' value='Clear' />"
                    . "<input type='submit' name='annuleren' class='btn btn-default' value='Cancel' /></div></div>";
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
    
    public function createEvent($aEventsData)
    {
        $this->load->library('eventsclass');
        $this->eventsclass->saveNewEventData($aEventsData);
    }
    
    public function getMyEventsModel()
    {
        $this->load->library('eventsclass');
        $sMyEvents = $this->eventsclass->getMyEvents();
        return $sMyEvents;
    }
}
