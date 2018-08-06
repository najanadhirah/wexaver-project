<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function index(){

		$email = $this->session->userdata('email');


		$data['profile'] = $this->myuser->getUser($email);


		if (!empty($this->session->userdata('email'))) {
				
			$this->load->view('user/profile',$data);

		}else{
			$data['error'] = "error";
			$this->load->view('user/login',$data);
		}
		
	}

	public function funcForgot(){
		$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[5]|max_length[12]|matches[password]');

		if ($this->form_validation->run() === TRUE) {
			$password = $this->input->post('password');
			$email = $this->input->post('email');

			$this->myuser->update_password($email,$password);

			$data['error'] = "success";
			$this->load->view('user/login',$data);
		}else{
			$data['error'] = "";
			$this->load->view('user/login',$data);
		}
	}

	public function forgotPass(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_checkEmail');

		if ($this->form_validation->run() === TRUE) {
			$data['css_page_level_plugins'] = 
			'
				<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] = '';
			$data['js_page_level_plugins'] = '';
			$data['js_page_level_scripts'] = '';

			$data['Email'] = $this->input->post('email'); 

			$this->load->view('user/forgotPassword',$data);

		}else{
			$data['error'] = "";
			$this->load->view('user/login',$data);
		}
	}

	public function login(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_checkUser');

		if ($this->form_validation->run() == TRUE) {

			$email 	  = $this->input->post('email');

			$this->mainlib->setSessionUser($email);

			if (!empty($this->session->userdata('email'))) {
				
				$this->index();
			}

		}else{
			$data['error'] = "";
			$this->load->view('user/login',$data);
		}
	}

	public function editProfile($id){

		$this->form_validation->set_rules('fullName', 'Full Name', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('firstTel', 'firstTel', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('secondTel', 'secondTel', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('dob', 'dob', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('street', 'street', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('city', 'city', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('state', 'state', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('address', 'address', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('postcode', 'postcode', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('country', 'country', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == TRUE) {
			$this->input->post('fullName');
			$this->input->post('firstTel');
			$this->input->post('secondTel');
			$this->input->post('email');
			$this->input->post('dob');
			$this->input->post('street');
			$this->input->post('city');
			$this->input->post('state');
			$this->input->post('address');
			$this->input->post('postcode');
			$this->input->post('country');
		}else{
			$id = $this->session->userdata('id');
			$query = $this->db->get_where('membership', array('id' => $id));
    		$data['row'] = $query->row_array();
			$this->load->view('profile',$data);
		}
	}


	public function userByebye(){
		$this->session->sess_destroy();
    	redirect('Welcome/loginUser', 'refresh');
	}

	public function userPdf($date){
		$id = $this->session->userdata('id');
		$query = $this->db->get_where('membership', array('id' => $id));
    	$data = $query->row_array();
    	$w_id = $data['w_id'];
		$this->load->library('Pdf');
      	//$data  = $this->mymodel->getTemps($w_id);
      	$query =  $this->db->get_where('log', array('w_id' => $w_id,'upload_date' => $date));
      	$data2 = $query->result_array();
      	$query =  $this->db->get_where('log', array('w_id' => $w_id,'upload_date' => $date));
      	$data3 =  $query->row_array();
      	$data4 = $this->mymodel->select_sump($w_id);
      	$data5 = $this->mymodel->select_sumr($w_id);
      	$data6  = $this->mymodel->getTemps($w_id);

      	//$parent_data = array('user' => $data,'summaries'=> $data2, 'summary' => $data3);
      	$parent_data = array('row'=>$data6,'user' => $data,'summaries'=> $data2, 'summary' => $data3,'reload'=>$data5,'purchase'=>$data4);
		$this->load->view('userPdf',$parent_data);
	}


	/*callbacks*/

	public function checkUser(){
		$ispassOk = $this->mymodel->userLogin($this->input->post('email'),$this->input->post('password'));
        if ($ispassOk) {
          return TRUE;
        }
        else{
        	$this->form_validation->set_message('checkUser', 'You have input the wrong password');
          return FALSE;
        }
	}

	public function checkEmail(){
  		$issaemailoK = $this->myuser->checkEmail($this->input->post('email'));
  		if ($issaemailoK) {
          	return TRUE;
        }
        else{
        	$this->form_validation->set_message('checkEmail', 'You have input the wrong Email');
          	return FALSE;
        }
  	}
}