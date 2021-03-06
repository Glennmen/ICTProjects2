<?php

class EventsController extends CI_Controller {

    public function index() 
    {
        $this->load->model('EventsModel');
        $this->load->model('NavigationModel');
        $data['pageTitle'] = "Events page";
        $data['Menu'] = $this->NavigationModel->Menu();
        $data['htmlContent'] = $this->EventsModel->getAllEvents();
        
        if(isset($_POST['createEvent']))
        {
            $data['pageTitle'] = "Create event";
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
            $this->form_validation->set_rules('prijsperticket', 'Prijs per ticket', 'trim|required|xss_clean');
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
                $data['pageTitle'] = "Create event";
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
              $data['pageTitle'] = "Events page";
              $data['htmlContent'] = $this->EventsModel->getAllEvents();
            }
        }
        if(isset($_POST['clear']))
        {
            $data['pageTitle'] = "Create event";
            $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        }
        if(isset($_POST['cancel']))
        {
            $data['pageTitle'] = "Events page";
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        }
        if(isset($_POST['allEvents']) || isset($_POST['backToAllEvents']) || isset($_POST['backToEvents']))
        {
            $data['pageTitle'] = "Events page";
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        }    
        if(isset($_POST['button'])) 
        {
            $iEventID = $_POST['button'];
            $data['pageTitle'] = "Event info";
            $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);
        }
        if(isset($_POST['changeForm']))
        {
            $iEventID = $_POST['changeForm'];
            $data['pageTitle'] = "Change event";
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
            $this->form_validation->set_rules('prijsperticket', 'Prijs per ticket', 'trim|required|xss_clean');
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
                $data['pageTitle'] = "Change event";
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
                $data['pageTitle'] = "Event info";
                $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);
            }
        }
        if(isset($_POST['deleteForm']))
        {
           $iEventID = $_POST['deleteForm'];
           $data['pageTitle'] = "Delete event";
           $data['htmlContent'] = $this->EventsModel->deleteEventForm($iEventID);
        }
        if(isset($_POST['delete']))
        {
            $iEventID = $_POST['delete'];
            $data['pageTitle'] = "Delete event";
            $data['htmlContent'] = $this->EventsModel->deleteSelectedEvent($iEventID);
        }
        if(isset($_POST['backToAllEvents']))
        {
            $data['pageTitle'] = "Events page";
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        } 
        if(isset($_POST['cancelDelete']))
        {
            $iEventID = $_POST['cancelDelete'];
            $data['pageTitle'] = "Event info";
            $data['htmlContent'] = $this->EventsModel->getDataSelectedEventModel($iEventID);        
        }
        if(isset($_POST['myEvents']))
        {
            $data['pageTitle'] = "My events";
            $data['htmlContent'] = $this->EventsModel->getMyEventsModel();
        }
        
        
        if(isset($_POST['orderTickets']))
        {
            $this->load->model('OrderModel');
            $data['Menu'] = $this->NavigationModel->Menu();
            
            $iEventID = $_POST['orderTickets'];
            $data['htmlContent'] = $this->OrderModel->getOrderForm($iEventID);
            $data['pageTitle'] = "Order";
        }
            
        if (isset($_POST['Orderbtn']))
        {
           $this->load->model('OrderModel');
           $this->load->library('form_validation');
           $iEventID = $_POST['Orderbtn'];
           
           $this->form_validation->set_rules('ticketAmount','Ticket amount','trim|xss_clean|numeric|is_natural_no_zero');
            
           if($this->form_validation->run() == FALSE)
            {
              if(validation_errors() != "")
              {
                $this->load->library('errorreport');
                  
                $error = $this->errorreport->Error();
                $form = $this->OrderModel->getOrderForm($iEventID);
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
              }
            }
            else
            {    
                $aOrder = array(
                    'Name'           => $_POST['lastname'],
                    'fName'          => $_POST['firstname'],
                    'Pass'           => $_POST['registernumber'],
                    'Mail'           => $_POST['email'],
                    'Street'         => $_POST['street'],
                    'City'           => $_POST['city'],
                    'Citycode'       => $_POST['citycode'],
                    'Phone'          => $_POST['phonenumber'],
                    'Event'          => $_POST['eventname'],
                    'Price'          => $_POST['prijsperticket'],
                    'Tickets'        => $_POST['ticketAmount'],
                    'EventID'        => $iEventID
                );
                $data['htmlContent'] = $this->OrderModel->confirmOrder($aOrder);
            }
        }
        
        $this->load->view('view', $data);
    }
}
