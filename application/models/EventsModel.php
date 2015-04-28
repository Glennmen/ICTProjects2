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
        $this->load->library('table');
        
        $htmlContent = form_open();
        
        $name = array(
            'name'        => 'eventname',
            'id'          => 'name',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $organizer = array(
            'name'        => 'eventorganizer',
            'id'          => 'organizer',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $startDate = array(
            'name'        => 'startdate',
            'id'          => 'startDate',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $endDate = array(
            'name'        => 'enddate',
            'id'          => 'endDate',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $startTime = array(
            'name'        => 'starttime',
            'id'          => 'startTime',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $endTime = array(
            'name'        => 'endtime',
            'id'          => 'endTime',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $availableTickets = array(
            'name'        => 'availabletickets',
            'id'          => 'availableTickets',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $location = array(
            'name'        => 'location',
            'id'          => 'location',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $description = array(
            'name'        => 'description',
            'id'          => 'description',
            'value'       => '',
            'rows'        => '4',
            'cols'        => '25',
        );
        
        $this->table->add_row("Event name: ", form_input($name));
        $this->table->add_row("Event organizer: ", form_input($organizer));
        $this->table->add_row("Start date: ", form_input($startDate));
        $this->table->add_row("End date: ", form_input($endDate));
        $this->table->add_row("Start time: ", form_input($startTime));
        $this->table->add_row("End time: ", form_input($endTime));
        $this->table->add_row("Available tickets: ", form_input($availableTickets));
        $this->table->add_row("Location: ", form_input($location));
        $this->table->add_row("Description: ", form_textarea($description));

        $this->table->add_row(form_submit('toevoegen', 'Add'));
        
        $htmlContent .= $this->table->generate();
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
    
    public function createEvent($aEventsData)
    {
        $this->load->library('eventsclass');
        $this->eventsclass->saveNewEventData($aEventsData);
    }
}
