<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HomeModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getPageTitle ()
    {
        $sPageTitle = "Home page";
        return $sPageTitle;
    }
}
