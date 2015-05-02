<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EventsController extends CI_Controller {
    //session_start() => eerste commando van de pagina
    public function index() 
    {
        //session_start() => eerste commando van de pagina in het index.php bestand
        //redbeans
        $this->load->model('EventsModel');
        $this->load->model('NavigationModel');
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
        if(isset($_POST['allEvents']))
        {
            $data['htmlContent'] = $this->EventsModel->getAllEvents();
        }       
        $this->load->view('view', $data);
    }
}
