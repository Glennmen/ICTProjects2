<?php

class Home extends CI_Controller {
    
    public function index()
	{
            $this->load->model('NavigationModel');
            $this->load->model('HomeModel');
            $data['Menu'] = $this->NavigationModel->Menu();
            $data['pageTitle'] = $this->HomeModel->getPageTitle();
            $data['htmlContent'] = "Welkom op onze ticketservice! <br />"
                    . "Bij ons heb je de mogelijkheid om tickets van alle soorten events te bestellen.";
            
            $this->load->view('view', $data);
	}
}
?>