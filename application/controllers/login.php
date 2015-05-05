<?php

class Login extends CI_Controller {
    
    function __construct()
    {
            parent::__construct();
            $this->load->library('loginclass');

    }
        
    function index()
    {
          //This method will have the credentials validation
          $this->load->library('form_validation');
          $this->load->model('LoginModel');
          $this->load->model('NavigationModel');

          $data['pageTitle'] = 'Login';
          $data['Menu'] = $this->NavigationModel->Menu();
          $data['htmlContent'] = $this->LoginModel->getLoginForm(); 
          
          $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_checkLoginAndPassword');

          if($this->form_validation->run() == FALSE)
          {
              if(validation_errors() != "")
              {
                //Field validation failed.  User redirected to login page
                $error = $this->LoginModel->loginError();
                $form = $this->LoginModel->getLoginForm();
                $array = array($error, $form);
                $data['htmlContent'] = join("", $array);
                $this->load->view('view', $data);
              }
              else 
              {
                  $this->load->view('view', $data);
              }
               
          }
          else
          {
            //Go to private area
            redirect('home', 'refresh');
          }

    }
    
    public function checkLoginAndPassword($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->loginclass->loginQuery($username, $password);

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
             $this->form_validation->set_message('checkLoginAndPassword', 'Invalid username or password');
             return false;
        }

    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('home', 'refresh');
    }
}
?>