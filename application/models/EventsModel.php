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
    
    public function getDataSelectedEventModel()
    {
        
    }
    
    public function saveChangesModel()
    {
        
    }
    
    public function deleteSelectedEvent()
    {
        
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
