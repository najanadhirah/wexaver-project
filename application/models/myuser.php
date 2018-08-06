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
	}