<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventsController extends CI_Controller {

    public function index() 
    {
        $this->load->model('EventsModel');
        $this->load->model('NavigationModel');
        $data['pageTitle'] = $this->EventsModel->getPageTitle();
        $data['Menu'] = $this->NavigationModel->Menu();
        $data['htmlContent'] = $this->EventsModel->eventsHomePage();
        
        if(isset($_POST['createEvent']))
        {
            $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        }
        if(isset($_POST['toevoegen']))
        {
            $aEventsData = array (
                'EventName' => $_POST['eventname'],
                'EventOrganizer' => $_POST['eventorganizer'],
                'StartDate' => $_POST['startdate'],
                'EndDate' => $_POST['enddate'],
                'StartTime' => $_POST['starttime'],
                'EndTime' => $_POST['endtime'],
                'AvailableTickets' => $_POST['availabletickets'],
                'Location' => $_POST['location'],
                'Description' => $_POST['description']
            );
            $this->EventsModel->createEvent($aEventsData);
        }
        if(isset($_POST['clear']))
        {
            $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        }
        if(isset($_POST['cancel']))
        {
            $data['htmlContent'] = $this->EventsModel->eventsHomePage();
        }
        if(isset($_POST['allEvents']) || isset($_POST['backToAllEvents']) || isset($_POST['backToEvents']))
        {
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        }    
        if(isset($_POST['button'])) 
        {
            $iEventID = $_POST['button'];
            $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);
        }
        if(isset($_POST['changeForm']))
        {
            $iEventID = $_POST['changeForm'];
            $data['htmlContent'] = $this->EventsModel->changeEventForm($iEventID);
        }
        if(isset($_POST['change']))
        {
            $iEventID = $_POST['change'];
            $aEventsData = array (
                'EventName' => $_POST['eventname'],
                'EventOrganizer' => $_POST['eventorganizer'],
                'StartDate' => $_POST['startdate'],
                'EndDate' => $_POST['enddate'],
                'StartTime' => $_POST['starttime'],
                'EndTime' => $_POST['endtime'],
                'AvailableTickets' => $_POST['availabletickets'],
                'Location' => $_POST['location'],
                'Description' => $_POST['description']
            );
            $this->EventsModel->saveChangesModel($iEventID, $aEventsData);
            $data['htmlContent'] = $this->EventsModel->eventsHomePage();
        }
        if(isset($_POST['deleteForm']))
        {
           $iEventID = $_POST['deleteForm'];
           $data['htmlContent'] = $this->EventsModel->deleteEventForm($iEventID);
        }
        if(isset($_POST['delete']))
        {
            $iEventID = $_POST['delete'];
            $data['htmlContent'] = $this->EventsModel->deleteSelectedEvent($iEventID);
        }
        if(isset($_POST['backToAllEvents']))
        {
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        } 
        if(isset($_POST['cancelDelete']))
        {
            $iEventID = $_POST['cancelDelete'];
            $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);        
        }
        if(isset($_POST['myEvents']))
        {
            $data['htmlContent'] = $this->EventsModel->getMyEventsModel();
        }
        $this->load->view('view', $data);
    }
}
