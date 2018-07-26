<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	1) Upload (admin)

*/

class Register extends CI_Controller {
	
	
	public function personalInfo(){
		$this->load->view('personalInfo');
	}
	/* BEGIN REGISTER PART */
	public function registerOnline($package){
		$data = $this->uri->segment(3);
		echo $data;
		$this->load->view('registerOnline',$data);
	}
	/* END OF REGISTER*/

	public function registerOffline(){
		$this->load->view('registerOffline');
	}

	public function ajaxOnline()
	{		

			header('Content-Type: application/json');

			$fullname 			= $this->input->post('fullname');
			$ic 			= $this->input->post('ic');
			$email 	  			= $this->input->post('email');
			$phone 				= $this->input->post('phone');
			$package    		= $this->input->post('package');
			$password  			= $this->input->post('password');
			$average     			= $this->input->post('average_list');
			$address 			= $this->input->post('address');
			$city 		= $this->input->post('city');
			$postcode 	  	= $this->input->post('postcode');
			$vmodel 		= $this->input->post('vmodel');
			$radio2			= $this->input->post('radio2');
			$vcc    		= $this->input->post('cc');
			$vplate  			= $this->input->post('vplate');
			$vmanufatured     		= $this->input->post('vmanufactured');
			$road_tax     		= $this->input->post('road_tax');
			$reg_type 			= 1;
			$mark 	  			= 1;
			$date_joined 		= $date = date('d-M-y');
			//$country_list = $this->input->post('country_list');

			if ($package == 'Free') {
							$regPetron  = $this->mymodel->getUpt();
							$acc 		= $regPetron['account'];
							$card_numb 	= $regPetron['card_numb'];
							$w_numb 	= $regPetron['w_numb'];
							$pass  		= $regPetron['card_pass'];

							//$w_id 		= 'WEXR'.$w_numb;
							//echo "<pre>";
							/*print_r($regPetron);
							echo $acc;*/
							$this->mymodel->updateFree($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$date_joined,$mark);							
						}else{
							$regPetronas  = $this->mymodel->getUpt();
							$acc 		= $regPetronas['account'];
							$card_numb 	= $regPetronas['card_numb'];
							$w_numb 	= $regPetronas['w_numb'];
							$pass  		= $regPetronas['card_pass'];
							$w_id 		= 'WXR'.$w_numb;
							//echo "<pre>";
							//print_r($regPetronas);
							$this->mymodel->updateNotFree($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$w_id,$date_joined,$mark);
						}

			echo json_encode(array(
				'status' 		=> 'Success',
			));
		
	}

	public function ajaxOffline()
	{		

			header('Content-Type: application/json');

			$fullname 			= $this->input->post('fullname');
			$ic 			= $this->input->post('ic');
			$email 	  			= $this->input->post('email');
			$phone 				= $this->input->post('phone');
			$package    		= $this->input->post('package');
			$reference			= $this->input->post('reference');
			$password  			= $this->input->post('password');
			$average     			= $this->input->post('average_list');
			$address 			= $this->input->post('address');
			$city 		= $this->input->post('city');
			$postcode 	  	= $this->input->post('postcode');
			$vmodel 		= $this->input->post('vmodel');
			$radio2			= $this->input->post('radio2');
			$vcc    		= $this->input->post('cc');
			$vplate  			= $this->input->post('vplate');
			$vmanufatured     		= $this->input->post('vmanufactured');
			$road_tax     		= $this->input->post('road_tax');
			$reg_type 			= 1;
			$mark 	  			= 1;
			$date_joined 		= $date = date('d-M-y');
			//$country_list = $this->input->post('country_list');

			if ($package == 'Free') {
							$regPetron  = $this->mymodel->getUpt();
							$acc 		= $regPetron['account'];
							$card_numb 	= $regPetron['card_numb'];
							$w_numb 	= $regPetron['w_numb'];
							$pass  		= $regPetron['card_pass'];

							//$w_id 		= 'WEXR'.$w_numb;
							//echo "<pre>";
							/*print_r($regPetron);
							echo $acc;*/
							$this->mymodel->updateFreeOffline($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$date_joined,$mark,$reference);							
						}else{
							$regPetronas  = $this->mymodel->getUpt();
							$acc 		= $regPetronas['account'];
							$card_numb 	= $regPetronas['card_numb'];
							$w_numb 	= $regPetronas['w_numb'];
							$pass  		= $regPetronas['card_pass'];
							$w_id 		= 'WXR'.$w_numb;
							//echo "<pre>";
							//print_r($regPetronas);
							$this->mymodel->updateNotFreeOffline($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$w_id,$date_joined,$mark,$reference);
						}

			echo json_encode(array(
				'status' 		=> 'Success',
			));
		
	}

	public function pricing(){
		$this->load->view('pricing');
	}

}