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
        $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        
        $this->load->view('view', $data);
    }
}
