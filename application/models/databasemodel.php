<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class DatabaseModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insertEvent()
    {
        try
        {
        $this->load->database();
        $sQuery = "INSERT INTO test (EventName,StartDate,EndDate,StartTime,EndTime,Location,Description)"
                . "VALUES ('Event test','17 april 2015','18 april 2015','14:00','18:00','Hamont-Achel','test')";
        $this->db->query($sQuery);
        }
        catch(PDOException $oError)
        {
            echo $oError->getMessage();
        }
    }
    
    public function htmlForm()
    {
        $this->load->helper('form');
        $this->load->library('table');
        
        $htmlContent = form_open();
        
        $this->table->add_row(form_submit('toevoegen', 'Add'));
        
        $htmlContent .= $this->table->generate();
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}
