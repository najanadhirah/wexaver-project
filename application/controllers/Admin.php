<?php

	/**
	 *  controller for admin
	 */
	class Admin extends CI_Controller
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		/*form*/
		public function Logout(){
			$this->session->sess_destroy();
    		redirect('admin/login', 'refresh');
		}

		public function Login(){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
    		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_checkAdmin');

    		if ($this->form_validation->run()  === TRUE) {
    			$username = $this->input->post('username');
    			$password = $this->input->post('password');

    			$this->mainlib->setSession($username);
      			//3)*** redirect to welcome page
      			if ($this->session->userdata('roles') === 'admin') {
            		redirect('admin/index','refresh');
            	}elseif($this->session->userdata('roles') === 'master'){
            		redirect('upload/master','refresh');
            	}
    		}
    		
    		$data['success'] = "";

			$this->load->view('admin/login',$data);
		}

		public function funcForgot(){
			$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[5]|max_length[12]|matches[password]');

			if ($this->form_validation->run() === TRUE) {
				$password = $this->input->post('password');
				$username = $this->input->post('username');

				$this->myadmin->update_password($username,$password);

				$data['success'] = "success";
				$this->load->view('admin/login',$data);
			}
		}

		public function forgotPass(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_checkUsername');

			if ($this->form_validation->run() === TRUE) {
				$data['css_page_level_plugins'] = 
				'
					<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
				';
				$data['css_page_level_styles'] = '';
				$data['js_page_level_plugins'] = '';
				$data['js_page_level_scripts'] = '';

				$data['username'] = $this->input->post('username'); 

				$this->load->view('admin/forgotPassword',$data);

			}else{
				$this->load->view('admin/login');
			}
		}

		public function editProfile($card_numb){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[8]|max_length[255]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|min_length[10]|max_length[11]');

			if ($this->form_validation->run() === TRUE ) {
				$name  			= $this->input->post('name');
				$email 			= $this->input->post('email');
				$phone_nunmber  = $this->input->post('phone_nunmber');

				$this->myadmin->update_members($name,$email,$phone_nunmber,$card_numb);

				redirect('admin/tableMembers','refresh');
			}else{
				$data['css_page_level_plugins'] = 
				'
					<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        			<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
				';
				$data['css_page_level_styles'] = '';
				$data['js_page_level_plugins'] = '';
				$data['js_page_level_scripts'] = '';

				$query = $this->db->get_where('membership',array('card_numb'=>$card_numb));
				$data['member'] = $query->row_array();

				//1)if set session success and get roles session equal to 1
				if ($this->session->userdata('roles') === 'admin') {
					$this->load->view('admin/inc/header',$data);
					$this->load->view('admin/editProfile',$data);
					$this->load->view('admin/inc/footer',$data);
				}else{
					$this->session->sess_destroy();
					redirect('admin/login','refresh');
				}
			}		
		}

		/*Dashboard*/
		public function index(){
			$data['css_page_level_plugins'] = 
			'
				<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] = '';
			$data['js_page_level_plugins'] = '';
			$data['js_page_level_scripts'] = '';
			
			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/dashboard',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		/* 2) table members */
		public function tableMembers(){
			$data['css_page_level_plugins'] = '
				<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] = '
				<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
			';
			$data['js_page_level_plugins'] = '
        		<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
			';
			$data['js_page_level_scripts'] = '<script src="/assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>';
			$data['acc_type']	= "admin";

			$data['result'] = $this->mymodel->getMembers();

			if ($this->session->userdata('roles') === 'admin' || 'master') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/tableMembers',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		/* 5) table fuel */
		public function tableFuel(){
			$data['css_page_level_plugins'] = '
				<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] = '
				<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
			';
			$data['js_page_level_plugins'] = '
        		<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
			';
			$data['js_page_level_scripts'] = '<script src="/assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>';
			$data['acc_type']	= "admin";

			$data['result'] = $this->myadmin->getFuel();

			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
			$this->load->view('admin/inc/header',$data);
			$this->load->view('admin/tableFuel',$data);
			$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}
		/* 6) table grocery */
		public function tableGrocery(){
			$data['css_page_level_plugins'] = '
				<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] = '
				<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
			';
			$data['js_page_level_plugins'] = '
        		<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
			';
			$data['js_page_level_scripts'] = '<script src="/assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>';
			$data['acc_type']	= "admin";

			$data['result'] = $this->myadmin->getGrocery();

			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
			$this->load->view('admin/inc/header',$data);
			$this->load->view('admin/tableGrocery',$data);
			$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		



		/*callback*/
		public function checkAdmin(){
    		$ispassOk = $this->myadmin->check($this->input->post('username'),$this->input->post('password'));
        	if ($ispassOk) {
          		return TRUE;
        	}
        	else{
        		$this->form_validation->set_message('checkAdmin', 'You have input the wrong password');
          		return FALSE;
        	}
  		}

  		public function checkUsername(){
  			$issausernameOk = $this->myadmin->checkUsername($this->input->post('username'));
  			if ($issausernameOk) {
          		return TRUE;
        	}
        	else{
        		$this->form_validation->set_message('checkUsername', 'You have input the wrong Username');
          		return FALSE;
        	}
  		}
	}