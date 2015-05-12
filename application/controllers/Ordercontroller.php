<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ordercontroller extends CI_Controller{
    
    public function index(){
        $this->load->model('OrderModel');
        $this->load->model('NavigationModel');
        $data['Menu'] = $this->NavigationModel->Menu();
        $sEventname = "Test";
        $dPpt  = 50;
        $data['htmlContent'] = $this->OrderModel->getOrderForm($sEventname,$dPpt);
        $data['pageTitle'] = "Order";
        
       if (isset($_POST['submitOrderbtn']))
        {
           $this->load->library('form_validation');
           
           $this->form_validation->set_rules('customerName','Customer Name','trim|xss_clean|alpha|required');
           $this->form_validation->set_rules('firstName','First Name','trim|xss_clean|alpha|required');
           $this->form_validation->set_rules('adress','Adress','trim|xss_clean|required');
           $this->form_validation->set_rules('e-mail','E-Mail','trim|xss_clean|valid_email|required');
           $this->form_validation->set_rules('passnumber','PassNumber','trim|xss_clean|numeric|required');
           $this->form_validation->set_rules('ticketAmount','Ticket Amount','trim|xss_clean|numeric|is_natural_no_zero|required');
            
           if($this->form_validation->run() == FALSE)
            {
              if(validation_errors() != "")
              {
                $this->load->library('errorreport');
                  
                $error = $this->errorreport->Error();
                $form = $this->OrderModel->getOrderForm();
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
                
              }
            }
            
            else
            {
                
           $aOrder = array(
               'Name'           => $_POST['customerName'],
               'fName'          => $_POST['firstName'],
               'Adress'         => $_POST['adress'],
               'Mail'           => $_POST['e-mail'],
               'Pass'           => $_POST['passnumber'],
               'Tickets'        => $_POST['ticketAmount'],
               'Event'          => $_POST['event'],
               'Price'          => $_POST['price'],
           );
           $data['htmlContent'] = $this->OrderModel->confirmOrder($aOrder);
            }
        }
        $this->load->view('view',$data);
    }
    
}
