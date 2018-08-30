<?php

	/**
	 * 
	 */
	class myuser extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getUser($email){
			$query = $this->db->get_where('membership',array('email' => $email));
			return $query->row_array();
		}

		public function getInfo($card_numb){
			$this->db->distinct();
			$this->db->select('refer_date,upload_date');
			$query = $this->db->get_where('log',array('card_numb'=>$card_numb));
			return $query->result_array();
		}

		public function checkEmail($email){
			$query = $this->db->get_where('membership', array('email' => $email));
    		$row = $query->row();
    		if (isset($row)){
    			return TRUE;
    		}else{
    			return FALSE;
    		}
		}

		public function update_password($email,$password){
			$data = array(
        		'card_pass'      =>$password
      		);
      		$this->db->set('card_pass');
     		$this->db->where('email',$email);
      		$this->db->update('membership',$data);
		}

		public function insertRebate($card_numb,$month){
      		$data = array(
        		'card_numb'   => $card_numb,
        		'upload_date' => $month,
      		);
     		$this->db->insert('pdf',$data);
    	}

    	public function updateRebate($introducer,$wexaver_id,$email,$card_number){
      		$data = array(
        		'introducer_id' => $introducer,
        		'wexaver_id' => $wexaver_id,
        		'card_numb' => $card_number,
        		'email' => $email,
      		);
      		$this->db->set('introducer_id','wexaver_id','email');
      		$this->db->where('card_numb',$card_number);
      		$this->db->update('pdf',$data);
    	}

    	public function updateRebate_totalTopup($total_topup,$rebate_topup,$card_numb){
      		$data = array(
        		'total_topup' =>$total_topup,
        		'rebate_topup'=>$rebate_topup,
      		);
      		$this->db->set('total_topup','rebate_topup');
      		$this->db->where('card_numb',$card_numb);
      		$this->db->update('rebate',$data);
    	}

    	public function updateRebate_totalUsage($total_litre,$total_transaction,$rebate_petrol,$card_numb){
      		$data = array(
        		'total_litre'      =>$total_litre,
        		'total_transaction'=>$total_transaction,
        		'rebate_petrol'    =>$rebate_petrol, 
      		);
      		$this->db->set('total_litre','total_transaction','rebate_petrol');
      		$this->db->where('card_numb',$card_numb);
      		$this->db->update('rebate',$data);
    	}		

	}