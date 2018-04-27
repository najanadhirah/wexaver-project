<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mainlib {
	// http://www.codeigniter.com/user_guide/general/creating_libraries.html
	protected $CI;

	// We'll use a constructor, as you can't directly call a function
	// from a property definition.
	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();
	}

	public function setSession($uname) {
  		$admin = $this->CI->mymodel->getAdmin($uname);

  		$sess_array = array(
        'id'      => $admin['id'],
        'roles'   => $admin['roles'],
  		);

  		$this->CI->session->set_userdata($sess_array);
  		return;
  	}

}
