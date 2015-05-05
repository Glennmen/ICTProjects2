<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class NavigationModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function Menu()
    {
        if($this->session->userdata('logged_in'))
        {
            $sMenu = "<li><a href='/ICTProjects2/trunk/index.php/home' title='home'>Home</a></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/eventscontroller' title='events'>Events</a></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/login/logout' title='logout'>Afmelden</a></li>";
        }
        else
        {
            $sMenu = "<li><a href='/ICTProjects2/trunk/index.php/home' title='home'>Home</a></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/eventscontroller' title='events'>Events</a></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/login' title='login'>Aanmelden</a></li>";
        }
        
        return $sMenu;
    }
}
