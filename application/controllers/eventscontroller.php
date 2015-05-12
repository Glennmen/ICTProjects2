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
        $data['htmlContent'] = $this->EventsModel->getAllEvents();
        
        if(isset($_POST['createEvent']))
        {
            $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        }
        if(isset($_POST['toevoegen']))
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('eventname', 'Event name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('eventorganizer', 'Event organizer', 'trim|required|xss_clean');
            $this->form_validation->set_rules('startdate', 'Start date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('enddate', 'End date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('starttime', 'Start time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('endtime', 'End time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('availabletickets', 'Available tickets', 'trim|required|xss_clean|is_natural_no_zero');
            $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
              if(validation_errors() != "")
              {
                $this->load->library('errorreport');
                  
                $error = $this->errorreport->Error();
                $form = $this->EventsModel->getEventCreateForm();
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
              }
                             
            }
            else
            {
              $aEventsData = array (
                  'EventName' => $_POST['eventname'],
                  'EventOrganizer' => $_POST['eventorganizer'],
                  'StartDate' => $_POST['startdate'],
                  'EndDate' => $_POST['enddate'],
                  'StartTime' => $_POST['starttime'],
                  'EndTime' => $_POST['endtime'],
                  'AvailableTickets' => $_POST['availabletickets'],
                  'PrijsPerTicket' => $_POST['prijsperticket'],
                  'Location' => $_POST['location'],
                  'Description' => $_POST['description']
              );
              $this->EventsModel->createEvent($aEventsData);
              $data['htmlContent'] = $this->EventsModel->getAllEvents();
            }
        }
        if(isset($_POST['clear']))
        {
            $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        }
        if(isset($_POST['cancel']))
        {
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
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
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('eventname', 'Event name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('eventorganizer', 'Event organizer', 'trim|required|xss_clean');
            $this->form_validation->set_rules('startdate', 'Start date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('enddate', 'End date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('starttime', 'Start time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('endtime', 'End time', 'trim|required|xss_clean');
            $this->form_validation->set_rules('availabletickets', 'Available tickets', 'trim|required|xss_clean|is_natural_no_zero');
            $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
            
            if($this->form_validation->run() == FALSE)
            {
              if(validation_errors() != "")
              {
                $this->load->library('errorreport');
                $iEventID = $_POST['change']; 
                
                $error = $this->errorreport->Error();
                $form = $this->EventsModel->changeEventForm($iEventID);
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
              }
                             
            }
            else
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
                    'PrijsPerTicket' => $_POST['prijsperticket'],
                    'Location' => $_POST['location'],
                    'Description' => $_POST['description']
                );
                $this->EventsModel->saveChangesModel($iEventID, $aEventsData);
                $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);
            }
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
