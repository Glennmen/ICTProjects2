<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Database extends CI_Controller {
    public function index()
    {
        $this->load->model('EventsModel');
        
        $data['htmlContent'] = $this->EventsModel->getEventCreateForm();
        
        if(isset($_POST['toevoegen']))
        {
            $this->EventsModel->createEvent();
        }
        
        $this->load->view('view', $data);
    }
}