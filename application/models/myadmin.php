<?php 
	
	/**
	 * 
	 */
	class myadmin extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/
		public function getAdmin($username){
			$query = $this->db->get_where('admin',array('username' => $username));
			return $query->row_array();
		}

		public function getFuel(){
			$query = $this->db->get('fuel');
			return $query->result_array();
		}

		public function getGrocery(){
			$query = $this->db->get('grocery');
			return $query->result_array();
		}

		public function check($username,$password){
			$query = $this->db->get_where('admin', array('username' => $username));
    		$row = $query->row();
    		if ($password == "") {
      			return FALSE; // wrong password
    		}else if (isset($row)){
      			$cpass = $row->password;
        			if ($cpass == $password) {
          				return TRUE;
        			}else{
          				return FALSE;
        			}
    		}else{
      			return FALSE;
    		}
		}

		public function checkUsername($username){
			$query = $this->db->get_where('admin', array('username' => $username));
    		$row = $query->row();
    		if (isset($row)){
    			return TRUE;
    		}else{
    			return FALSE;
    		}
		}

		public function update_members($name,$email,$phone_number,$card_numb){
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone_no' => $phone_number,
			);
			$this->db->set('name','email','phone_number');
			$this->db->where('card_numb',$card_numb);
			$this->db->update('membership',$data);
		}

		public function update_password($username,$password){
			$data = array(
        		'password'      =>$password
      		);
      		$this->db->set('password');
     		$this->db->where('username',$username);
      		$this->db->update('admin',$data);
		}
	}
