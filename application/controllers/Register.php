<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	1) Upload (admin)

*/

class Register extends CI_Controller {
	/* BEGIN REGISTER PART */
	public function registerOnline(){
		$this->load->view('registerOnline');
	}
	/* END OF REGISTER*/

	public function registerOffline(){
		$this->load->view('registerOffline');
	}

	public function ajaxOnline()
	{		

			header('Content-Type: application/json');

			$partner 			= $this->input->post('partner');
			$fullname 			= $this->input->post('fullname');
			$email 	  			= $this->input->post('email');
			$phone 				= $this->input->post('phone');
			$password    		= $this->input->post('password');
			$address  			= $this->input->post('address');
			$city     			= $this->input->post('city');
			$poscode 			= $this->input->post('poscode');
			$fuel_brand 		= $this->input->post('fuel_brand');
			$average_usage 	  	= $this->input->post('average_usage');
			$grocer_brand 		= $this->input->post('grocer_brand');
			$reference			= $this->input->post('reference');
			$bnf_name    		= $this->input->post('bnf_name');
			$bnf_ic  			= $this->input->post('bnf_ic');
			$bnf_hp     		= $this->input->post('bnf_hp');
			$bnf_relay     		= $this->input->post('bnf_relay');
			$reg_type 			= 1;
			$mark 	  			= 1;
			$date_joined 		= $date = date('d-M-y');
			$country_list = $this->input->post('country_list');

			if ($fuel_brand == 'Petron') {
							$regPetron  = $this->mymodel->getUpt();
							$acc 		= $regPetron['account'];
							$card_numb 	= $regPetron['card_numb'];
							$w_numb 	= $regPetron['w_numb'];
							$pass  		= $regPetron['card_pass'];
							$w_id 		= 'WEXR'.$w_numb;
							//echo "<pre>";
							//print_r($regPetron);
							$this->mymodel->updateUnassignedPetron($acc,$card_numb,$w_numb,$pass,$fullname,$email,$phone,$address,$city,$poscode,$fuel_brand,$average_usage,$grocer_brand,$bnf_name,$bnf_ic,$bnf_hp,$bnf_relay,$w_id,$reference,$date_joined,$reg_type,$password,$mark);							
						}else{
							$regPetronas  = $this->wexaver_db->getUnassigned();
							$acc 		= $regPetronas['account'];
							$card_numb 	= $regPetronas['card_numb'];
							$w_numb 	= $regPetronas['w_numb'];
							$pass  		= $regPetronas['card_pass'];
							$w_id 		= 'WXR'.$w_numb;
							//echo "<pre>";
							//print_r($regPetronas);
							$this->mymodel->updateUnassigned($acc,$card_numb,$w_numb,$pass,$name,$email,$hp_no,$address,$state,$poscode,$petrol_brand,$petrol_spend,$grocer_brand,$name_bnf,$nric_bnf,$hp_bnf,$relationship,$w_id,$reference,$date_joined,$reg_type,$password,$mark);
						}

			echo json_encode(array(
				'status' 		=> 'Success',
			));
		
	}
}