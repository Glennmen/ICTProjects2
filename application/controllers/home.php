<?php

class Home extends CI_Controller {
    
    public function index()
	{
            $this->load->model('NavigationModel');
            $data['Menu'] = $this->NavigationModel->Menu();
            $data['htmlContent'] = "";
            
            $this->load->view('view', $data);
	}
}
?>