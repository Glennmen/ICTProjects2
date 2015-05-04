<?php

class Home extends CI_Controller {
    
    public function index()
	{
            $this->load->model('NavigationModel');
            $this->load->model('HomeModel');
            $data['Menu'] = $this->NavigationModel->Menu();
            $data['pageTitle'] = $this->HomeModel->getPageTitle();
            $data['htmlContent'] = "";
            
            $this->load->view('view', $data);
	}
}
?>