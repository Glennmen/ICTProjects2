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
        $data['htmlContent'] = $this->OrderModel->getOrderForm();
        $data['pageTitle'] = "Order";
        
       if (isset($_POST['submitOrderbtn']))
        {
           $data['htmlContent'] = $this->OrderModel->confirmOrder();
        }
        $this->load->view('view',$data);
    }
    
}
