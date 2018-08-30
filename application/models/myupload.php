<?php 
	
	/**
	 *  upload model
	 */
	class myupload extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function insertMembers($acc,$card_numb,$w_numb,$ic_number,$card_pass,$name,$email,$phone_no,$address,$state,$postcode,$fuel_type,$avg_spend,$grocer_brand,$name_bnf,$ic_bnf,$hp_bnf,$relationship,$w_id,$introducer,$date_joined,$agent_name,$agent_no){
      		$data = array(
        		'account'       =>$acc,
        		'card_numb'     =>$card_numb,
        		'w_numb'        =>$w_numb,
        		'card_pass'     =>$card_pass,
        		'name'          =>$name,
        		'nric'          =>$ic_number,
        		'email'         =>$email,
        		'phone_no'      =>$phone_no,
        		'address'       =>$address,
        		'state'         =>$state,
        		'poscode'       =>$postcode,
       		 	'type'          =>$fuel_type,
        		'avg_fuel'      =>$avg_spend,
        		'grocer_brand'  =>$grocer_brand,
        		'name_bnf'      =>$name_bnf,
        		'nric_bnf'      =>$ic_bnf,
        		'phone_no_bnf'  =>$hp_bnf,
        		'relationship'  =>$relationship,
        		'w_id'          =>$w_id,
        		'introducer'    =>$introducer,
        		'date_joined'   =>$date_joined,
        		'agent_name'    =>$agent_name,
        		'agent_no'      =>$agent_no,
      		);
    		$this->db->insert('membership',$data);
  		}

  		public function insertUnassigned($acc,$card_numb,$w_numb,$ic_number,$card_pass,$name,$email,$phone_no,$address,$state,$postcode,$fuel_type,$avg_spend,$grocer_brand,$name_bnf,$ic_bnf,$hp_bnf,$relationship,$w_id,$introducer,$date_joined,$agent_name,$agent_no){
      		$data = array(
        		'account'       =>$acc,
        		'card_numb'     =>$card_numb,
        		'w_numb'        =>$w_numb,
        		'card_pass'     =>$card_pass,
        		'name'          =>$name,
        		'nric'          =>$ic_number,
        		'email'         =>$email,
        		'phone_no'      =>$phone_no,
        		'address'       =>$address,
        		'state'         =>$state,
        		'poscode'       =>$postcode,
        		'type'          =>$fuel_type,
        		'avg_fuel'      =>$avg_spend,
        		'grocer_brand'  =>$grocer_brand,
        		'name_bnf'      =>$name_bnf,
        		'nric_bnf'      =>$ic_bnf,
        		'phone_no_bnf'  =>$hp_bnf,
        		'relationship'  =>$relationship,
        		'w_id'          =>$w_id,
        		'introducer'    =>$introducer,
        		'date_joined'   =>$date_joined,
        		'agent_name'    =>$agent_name,
        		'agent_no'      =>$agent_no,
      		);
    		$this->db->insert('unassigned',$data);
  		}

		public function insertLog($date,$time,$tx_type,$card_numb,$w_numb,$tx_amount,$st_name,$odometer,$litre,$product,$type,$udate,$month){
			$data = array(
      			'date'        => $date,
      			'time'        => $time,
      			'tx_type'     => $tx_type,
      			'card_numb'   => $card_numb,
      			'w_id'        => $w_numb,
      			'tx_amount'   => $tx_amount,
      			'st_name'     => $st_name,
      			'odometer'    => $odometer,
      			'litre'       => $litre,
      			'product'     => $product,
      			'type'        => $type,
      			'upload_date' => $udate,
            'refer_date'  => $month,
      		);
    		$this->db->insert('log',$data);
		}

		public function insertFuel($image_path,$name,$price,$month){
			$data = array(
				'brand_name'     => $name,
				'price_perlitre' => $price,
				'upload_date'    => $month,
				'image_path'	 => $image_path,
			);
			$this->db->insert('fuel',$data);
		}

		public function insertGrocery($image_path,$name,$price,$month){
			$data = array(
				'brand_name'     => $name,
				'price_perlitre' => $price,
				'upload_date'    => $month,
				'image_path'	 => $image_path,
			);
			$this->db->insert('grocery',$data);
		}
	}