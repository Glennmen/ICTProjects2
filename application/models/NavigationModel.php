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
        $aUserData = $this->session->userdata('logged_in');
        $this->iAccountType = $aUserData['clientType'];
        $iAccountName = $aUserData['username'];
        
        if(($this->iAccountType == 2) || ($this->iAccountType == 1))
        {
            $sMenu = "<ul class='nav navbar-nav'>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/home' title='home'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Home</a></li>";
            $sMenu .= "<li role='presentation' class='dropdown'><a href='#' class='dropdown-toggle' aria-controls='events-dropdown' role='tab' data-toggle='dropdown' title='events'>Events</a>
                       <ul class='dropdown-menu' role='menu' id='events-dropdown'>
                       <form action='http://localhost/ICTProjects2/trunk/index.php/eventscontroller' method='post' accept-charset='utf-8'>
                        <li><input type='submit' name='allEvents' value='Eventslist' class='btn btn-default btn-block' /></li>
                        <li><input type='submit' name='myEvents' value='Show my events' class='btn btn-default btn-block' /></li>
                        <li><input type='submit' name='createEvent' value='Create Event' class='btn btn-default btn-block' /></li>
                        </form>
                       </ul></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/login/logout' title='logout'>Logout</a></li></ul>";
            $sMenu .= "<ul class='nav navbar-nav navbar-right'><li>";
            $sMenu .= "<a><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Welcome " .$iAccountName."</a>";
            $sMenu .= "</li></ul>";
        }
        else if($this->iAccountType == 3)
        {
            $sMenu = "<ul class='nav navbar-nav'>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/home' title='home'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Home</a></li>";
            $sMenu .= "<li role='presentation' class='dropdown'><a href='#' class='dropdown-toggle' aria-controls='events-dropdown' role='tab' data-toggle='dropdown' title='events'>Events</a>
                       <ul class='dropdown-menu' role='menu' id='events-dropdown'>
                       <form action='http://localhost/ICTProjects2/trunk/index.php/eventscontroller' method='post' accept-charset='utf-8'>
                        <li><input type='submit' name='allEvents' value='Eventslist' class='btn btn-default btn-block' /></li>
                        </form>
                       </ul></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/login/logout' title='logout'>Logout</a></li></ul>";
            $sMenu .= "<ul class='nav navbar-nav navbar-right'><li>";
            $sMenu .= "<a><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Welcome " .$iAccountName."</a>";
            $sMenu .= "</li></ul>";
        }
        else
        {
            $sMenu = "<ul class='nav navbar-nav'>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/home' title='home'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Home</a></li>";
            $sMenu .= "<li role='presentation' class='dropdown'><a href='#' class='dropdown-toggle' aria-controls='events-dropdown' role='tab' data-toggle='dropdown' title='events'>Events</a>
                       <ul class='dropdown-menu' role='menu' id='events-dropdown'>
                       <form action='http://localhost/ICTProjects2/trunk/index.php/eventscontroller' method='post' accept-charset='utf-8'>
                        <li><input type='submit' name='allEvents' value='Eventslist' class='btn btn-default btn-block' /></li>
                        </form>
                       </ul></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/login' title='login'>Login</a></li>";
            $sMenu .= "<li><a href='/ICTProjects2/trunk/index.php/registrationcontroller' title='Register'>Register</a></li></ul>";
        }
        
        return $sMenu;
    }
}
