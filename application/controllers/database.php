<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Database extends CI_Controller {
    public function index()
    {
        $this->load->model('DatabaseModel');
        
        $data['htmlContent'] = $this->DatabaseModel->htmlForm();
        
        if(isset($_POST['toevoegen']))
        {
            $this->DatabaseModel->insertEvent();
        }
        
        $this->load->view('view', $data);
    }
}
