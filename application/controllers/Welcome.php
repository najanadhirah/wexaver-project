<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function home()
	{	
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	public function aboutus()
	{	
		$this->load->view('header');
		$this->load->view('aboutUs');

	}
	public function fuel()
	{	
		$this->load->view('header');
		$this->load->view('fuel');
		$this->load->view('footer');
	}
	public function motor()
	{	
		$this->load->view('header');
		$this->load->view('motor');
		$this->load->view('footer');
	}
	public function grocer()
	{	
		$this->load->view('header');
		$this->load->view('grocer');
		$this->load->view('footer');
	}
	public function insurance()
	{	
		$this->load->view('header');
		$this->load->view('insurance');
		$this->load->view('footer');
	}

	public function sme(){
		//1)validate form
		$this->form_validation->set_rules('company_name','Company Name','trim|required');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('phone_number','Phone Number','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('postcode','Postcode','trim|required');
		$this->form_validation->set_rules('petrol_spend','Petrol Spend','trim|required');

		if ($this->form_validation->run() === TRUE) {
			$company_name = $this->input->post('company_name');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone_number = $this->input->post('phone_number');
			$address = $this->input->post('address');
			$postcode = $this->input->post('postcode');
			$petrol_spend = $this->input->post('petrol_spend');

			$this->mymodel->insertSme($company_name,$name,$email,$phone_number,$address,$postcode,$petrol_spend);
			redirect('welcome/success','refresh');
		}
		
		$this->load->view('header');
		$this->load->view('sme');
	}

	public function table(){
		$query = $this->db->get('package');
    	$data['row'] = $query->result_array();
    	//var_dump($data);
    	$this->load->view('header');
		$this->load->view('table1',$data);
		$this->load->view('footer');
	}

	public function profile(){
		$id = $this->session->userdata('id');
		$query = $this->db->get_where('membership', array('id' => $id));
    	$data = $query->row_array();
    	$w_id = $data['w_id'];
    	$data1 = $this->mymodel->select_upload($w_id);
    	$parent_data = array('row'=>$data,'user' => $data1);
		$this->load->view('profile',$parent_data);
	}

	public function loginUser(){
		// 1) validate all from input
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_checkUser');
		// 2) checking the validation input run true or not
		if ($this->form_validation->run() === TRUE) {
			// 1) delcare the variable from form input 
			$email = $this->input->post('email');
			//2)*** set sessions based on username
      		$this->mainlib->setSessionUser($email);
      		//3)*** redirect to welcome page
            $this->profile();
		}
		else{
			$this->load->view('loginUser');
		}
		//$this->load->view('loginUser');
	}

	public function success(){
		$this->load->view('success');
	}
	/****************
	**  CALLBACKS  ** 
	*****************/

	public function checkUser(){
    	$ispassOk = $this->mymodel->userLogin($this->input->post('email'),$this->input->post('password'));
        if ($ispassOk) {
          return TRUE;
        }
        else{
        	$this->form_validation->set_message('checkAdmin', 'You have input the wrong password');
          return FALSE;
        }
  	}

}
