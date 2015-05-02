<?php

class Login extends CI_Controller {
    
    function __construct()
    {
            parent::__construct();
            $this->load->library('LoginClass');

    }
        
    function index()
    {
          //This method will have the credentials validation
          $this->load->library('form_validation');
          $this->load->model('LoginModel');

          $data['pageTitle'] = 'Aanmelden';
          $data['htmlContent'] = $this->LoginModel->getLoginForm(); 
          
          $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_checkLoginAndPassword');

          if($this->form_validation->run() == FALSE)
          {
            //Field validation failed.  User redirected to login page
            $this->load->view('view', $data);   
          }
          else
          {
            //Go to private area
            redirect('home', 'refresh');
          }

    }
    
    public function checkLoginAndPassword()
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->LoginClass->loginQuery($username, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                'id' => $row->id,
                'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
             $this->form_validation->set_message('check_database', 'Invalid username or password');
             return false;
        }

    }
}
?>