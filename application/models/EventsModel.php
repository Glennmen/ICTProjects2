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
        
    public function getPageTitle()
    {
        $sPageTitle = "Events page";
        return $sPageTitle;
    }
        
    public function eventsHomePage()
    {
        $this->load->helper('form');
        
        $sEventsHome = form_open();
        
        $sEventsHome .= "<table>"
                . "<tr><td><input type='submit' name='createEvent' value='Create Event' />"
                . "<input type='submit' name='allEvents' value='Eventslist' /></td></tr>"
                . "</table>";
        
        $sEventsHome .= form_close();
        
        return $sEventsHome;
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
            $ci->load->database('');
             $sQuery = "SELECT * FROM eventsdatabase WHERE EventID =";
             $sQuery .= $iEventID;
             $sData = $ci->db->query($sQuery);
             $htmlChangeForm = form_open();
             foreach($sData->result_array() as $sRow)
             {
                $htmlChangeForm .= "<table>"
                    ."<tr><td>Event name: </td><td><input type='text' name='eventname' value='".$sRow['EventName']."' /></td></tr>"
                    ."<tr><td>Event organizer: </td><td><input type='text' name='eventorganizer' value='".$sRow['EventOrganizer']."' /></td></tr>"
                    ."<tr><td>Start date: </td><td><input type='text' name='startdate' value='".$sRow['StartDate']."' /></td></tr>"
                    ."<tr><td>End date: </td><td><input type='text' name='enddate' value='".$sRow['EndDate']."' /></td></tr>"
                    ."<tr><td>Start time: </td><td><input type='text' name='starttime' value='".$sRow['StartTime']."' /></td></tr>"
                    ."<tr><td>End time: </td><td><input type='text' name='endtime' value='".$sRow['EndTime']."' /></td></tr>"
                    ."<tr><td>Available tickets: </td><td><input type='text' name='availabletickets' value='".$sRow['AvailableTickets']."' /></td></tr>"
                    ."<tr><td>Location: </td><td><input type='text' name='location' value='".$sRow['Location']."' /></td></tr>"
                    ."<tr><td>Description: </td><td><textarea name='description' placeholder='".$sRow['Description']."' rows='4' cols='40' ></textarea></td></tr>"
                    ."<tr><td colspan='2'><button name='change' value='".$sRow['EventID']."'>Change</button><input type='submit' name='clear' value='Clear' />"
                    . "<input type='submit' name='annuleren' value='Cancel' /></td></tr>"
                    . "</table>";
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
             $sHtmlEventList .= "</td></tr>";
             }
             $sHtmlEventList .= "</table>";
             $sHtmlEventList .= "<br /> Weet u zeker dat u ".$sRow['EventName']." wilt verwijderen?"
                     . "<br /> <button name='delete' value='".$sRow['EventID']."'>Delete event</button>"
                     . "<button name='cancelDelete' value='".$sRow['EventID']."'>Cancel</button>";
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
        
        $htmlContent = form_open();
        
        $htmlContent .= "<table>"
                ."<tr><td>Event name: </td><td><input type='text' name='eventname' /></td></tr>"
                ."<tr><td>Event organizer: </td><td><input type='text' name='eventorganizer' /></td></tr>"
                ."<tr><td>Start date: </td><td><input type='text' name='startdate' /></td></tr>"
                ."<tr><td>End date: </td><td><input type='text' name='enddate' /></td></tr>"
                ."<tr><td>Start time: </td><td><input type='text' name='starttime' /></td></tr>"
                ."<tr><td>End time: </td><td><input type='text' name='endtime' /></td></tr>"
                ."<tr><td>Available tickets: </td><td><input type='text' name='availabletickets' /></td></tr>"
                ."<tr><td>Location: </td><td><input type='text' name='location' /></td></tr>"
                ."<tr><td>Description: </td><td><textarea name='description' rows='4' cols='40' ></textarea></td></tr>"
                ."<tr><td colspan='2'><input type='submit' name='toevoegen' value='Add' /><input type='submit' name='clear' value='Clear' />"
                . "<input type='submit' name='annuleren' value='Cancel' /></td></tr>"
                . "</table>";
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
    
    public function createEvent($aEventsData)
    {
        $this->load->library('eventsclass');
        $this->eventsclass->saveNewEventData($aEventsData);
    }
}
