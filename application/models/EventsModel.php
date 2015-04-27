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
            'name'        => 'eventName',
            'id'          => 'name',
            'value'       => '',
            'maxlength'   => '100',
            'size'        => '50',
            'style'       => 'width:50%',
        );
        
        $this->table->add_row("Event name: ", form_input($name));
        $this->table->add_row("Start date: ", form_input());
        $this->table->add_row("End date: ", form_input());
        $this->table->add_row("Start time: ", form_input());
        $this->table->add_row("End time: ", form_input());
        $this->table->add_row("Available tickets: ", form_input());
        $this->table->add_row("Description: ", form_input());

        $this->table->add_row(form_submit('toevoegen', 'Add'));
        
        $htmlContent .= $this->table->generate();
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
    
    public function createEvent()
    {
        $this->load->library('EventsClass');
        $this->EventsClass->saveNewEventData();
    }
}
