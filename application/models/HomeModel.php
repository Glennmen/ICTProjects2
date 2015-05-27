<?php

class HomeModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getHomeContent()
    {
        $htmlContent = "<h3>Welkom to our ticketservice! </h3>";
        $htmlContent .= "<p>We sell tickets to all different kinds of events.</p>";
        $htmlContent .= "<p>It is also possible to sign up as event organiser and create your own events.</p>";
        return $htmlContent;
    }
}
