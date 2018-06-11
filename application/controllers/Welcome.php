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
	public function index()
	{	
		$data['css_page_level_plugins'] = '
		<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
		';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '';
		//1)if set session success and get roles session equal to 1
		if ($this->session->userdata('roles') == 'admin') {
			$this->load->view('admin/header',$data);
			$this->load->view('admin/welcome_message',$data);
			$this->load->view('admin/footer',$data);
		}
		//2)if set session success and get roles session not equal to 1
		else{
			show_404();
		}
	}

	public function home()
	{
		$this->load->view('index');
	}
	public function aboutus()
	{
		$this->load->view('aboutUs');
	}
	public function fuel()
	{
		$this->load->view('fuel');
	}
	public function motor()
	{
		$this->load->view('motor');
	}
	public function grocer()
	{
		$this->load->view('grocer');
	}
	public function insurance()
	{
		$this->load->view('insurance');
	}
	public function sme()
	{
		$this->load->view('sme');
	}

	public function table(){
		$query = $this->db->get('package');
    	$data['row'] = $query->result_array();
    	//var_dump($data);
		$this->load->view('table1',$data);


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
