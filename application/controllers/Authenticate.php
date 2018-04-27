<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	1) login (admin)

*/

class Authenticate extends CI_Controller {

	//1)*Login Function 
	public function Login() {
		//1)** Validate form 
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_checkAdmin');
    	//2)** if form validate true
    	if ($this->form_validation->run() == TRUE) {
    		//1)*** declare varirable data
      		$uname  = $this->input->post('username');
      		$pass   = $this->input->post('password');
      		//2)*** set sessions based on username
      		$this->mainlib->setSession($uname);
      		//3)*** redirect to welcome page
            redirect('welcome','refresh'); 
    	}else{
    		$this->load->view('login');	
    	}
	}

	public function seeYaa(){
		$this->session->sess_destroy();
    	redirect('Authenticate/login', 'refresh');
	}

	/****************
	**  CALLBACKS  ** 
	*****************/

	public function checkAdmin(){
    	$ispassOk = $this->mymodel->adminLogin($this->input->post('username'),$this->input->post('password'));
        if ($ispassOk) {
          return TRUE;
        }
        else{
        	$this->form_validation->set_message('checkAdmin', 'You have input the wrong password');
          return FALSE;
        }
  	}

}