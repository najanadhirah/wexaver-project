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
		$this->load->view('welcome/inc/header');
		$this->load->view('index');
		$this->load->view('welcome/inc/footer');
	}
	public function aboutus()
	{	
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/aboutus');
		$this->load->view('welcome/inc/footer');
	}
	public function fuel()
	{	
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/fuel');
		$this->load->view('welcome/inc/footer');
	}
	public function motor()
	{	
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/motor');
		$this->load->view('welcome/inc/footer');
	}
	public function grocer()
	{	
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/grocer');
		$this->load->view('welcome/inc/footer');
	}
	public function insurance()
	{	
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/insurance');
		$this->load->view('welcome/inc/footer');
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
		
		$this->load->view('welcome/inc/header');
		$this->load->view('welcome/sme');
	}

	public function table(){
		$query = $this->db->get('package');
    	$data['row'] = $query->result_array();
    	//var_dump($data);
    	$this->load->view('inc/header');
		$this->load->view('user/table1',$data);
		$this->load->view('inc/footer');
	}

	public function success(){
		$this->load->view('user/success');
	}


}
