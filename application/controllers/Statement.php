<?php

	/**
	 * statement controller
	 */
	class Statement extends CI_Controller
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/


		/* View Data Only */

		public function selectmonth(){
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

			$month = $this->input->post('month');
			$year  = $this->input->post('year');

			$upload_date = $month.' '.$year;

			$data['upload_date'] = $upload_date;
			$data['month']  = $month;
			$data['result'] = $this->mystatement->getMonthlyView($upload_date);


			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/statement/monthly',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		public function monthly(){
			$data['css_page_level_plugins'] ='';
			$data['css_page_level_styles'] = '';
			$data['js_page_level_plugins'] = '';
			$data['js_page_level_scripts'] = '<script src="/assets/custom/js/year.js" type="text/javascript"></script>';

			$query 	= $this->db->query('select month from month');
			$data['month'] = $query->result_array();

			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/statement/formMonthly',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		public function Summary(){
			$data['css_page_level_plugins'] = 
			'
				<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        		<link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
			';
			$data['css_page_level_styles'] =
			'
				<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
			';
			$data['js_page_level_plugins'] = 
			'
        		<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        		<script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
			';
			$data['js_page_level_scripts'] = 
			'
				<script src="/assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
			';

			$month = $this->input->post('month');

			$query = $this->db->get_where('rebate', array('refer_date' =>$month));

			$data['result'] = $query->result_array();

			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/statement/summary',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}	

		/*This the normal form upload*/
		public function promo(){

			$data['css_page_level_plugins'] =
			'<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        	 <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />';
			$data['css_page_level_styles'] = '<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />';
			$data['js_page_level_plugins'] = 
			'<script src="/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
        	 <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>';
			$data['js_page_level_scripts'] = '<script src="/assets/pages/scripts/portlet-ajax.min.js" type="text/javascript"></script>';

			$month = $this->input->post('month');

			$upload_date = $this->input->post('upload_date');

			$data['upload_date'] = $upload_date;

			$data['month'] = $month;;

			//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/inc/header',$data);
				$this->load->view('admin/statement/formPromo',$data);
				$this->load->view('admin/inc/footer',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

		/*End of View Data */


		/*Calculation*/ 


		public function Calcpromo(){

			/*noted
				total_transaction = sum of total amount where transaction type = purchase
				total_topup 	  = sum total amount where transaction type = reload
				total_litre		  = sum total litre of petrol gas amount 
			*/

			// Declaration Data
			$rebate = 0.03;
			$rebate_topup = 0;

			$this->form_validation->set_rules('min_amount', 'Minimum Topup', 'trim|required');
      		$this->form_validation->set_rules('rebate_amount', 'Topup Rebate', 'trim|required');
        	$this->form_validation->set_rules('min_petrol', 'Minimum Petrol', 'trim|required');
        	$this->form_validation->set_rules('rebate_petrol', 'Petrol Rebate', 'trim|required');
        	// 1)validate form input
       	 	if ($this->form_validation->run() === TRUE){

        		$min_topup     = $this->input->post('min_amount');
        		$topup_rebate  = $this->input->post('rebate_amount');
        		$min_petrol    = $this->input->post('min_petrol');
        		$petrol_rebate = $this->input->post('rebate_petrol');
        		$upload_date = $this->input->post('upload_date');
        		$month = $this->input->post('month');
        		// 2)mkae sure there's no past data by delete the table
        		$this->db->delete('rebate', array('refer_date' => $month));
        		// 3)create table 
        		$this->mystatement->create();

        		//4)select diff data only from table log
        		$all_user = $this->mystatement->select_distinct($upload_date);

        		
        		if ($all_user != NULL) {
        			
        			foreach ($all_user as $key => $value) {
        				$card_numb = $value['card_numb'];

        				$query = $this->db->get_where('membership', array('card_numb' => $card_numb));
    					$select_master = $query->result_array();

    					$this->mystatement->insertRebate($card_numb,$month,$upload_date);

    					foreach ($select_master as $key => $value) {
    						$introducer = $value['introducer'];
    						$wexaver_id = $value['w_id'];
    						$email 		= $value['email'];
    						$card_number= $value['card_numb'];

    						/*echo "<pre>";
    						print_r($select_master);
    						echo "<br>";
        					print_r($card_number);*/

        					$this->mystatement->updateRebate($introducer,$wexaver_id,$email,$card_number);
    					}

        				$result_array = $this->mystatement->sum_total($card_numb,$upload_date);	
        				foreach ($result_array as $key => $value) {
        					$total_litre = $value['total_litre'];
        					$total_transaction = $value['total_transaction'];
        					/*echo "<pre>";
        					print_r($total_litre);
        					echo "<br>";
        					print_r($total_transaction);*/

        					if ($total_litre > $min_petrol) {
        						$rebate_petrol = ( $total_litre * $rebate ) + $petrol_rebate;
        					}else{
        						$rebate_petrol = ( $total_litre * $rebate);
        					}

        					$this->mystatement->updateRebate_totalUsage($total_litre,$total_transaction,$rebate_petrol,$card_numb);
        				}

        				$result_topup = $this->mystatement->sum_topup($card_numb,$upload_date);
        				foreach ($result_topup as $key => $value) {
        					$total_topup = $value['total_topup'];
        					/*echo "<pre>";
        					print_r($result_topup);
        					echo "<br>";*/

        					if ($total_topup > $min_topup) {
        						$rebate_topup = $topup_rebate;
        					}else{
        						$rebate_topup = $rebate_topup;
        					}

        					$this->mystatement->updateRebate_totalTopup($total_topup,$rebate_topup,$card_numb);
        				}
        			}
	        	}
	        	$this->summary();
	        	//redirect('statement/summary','refresh');
        	}else{
        		$this->promo();
        	}
		}


		/*PDF File */
		public function pdf($card_numb){
			$month = end($this->uri->segment_array());
			$this->load->library('Pdf');

			$query = $this->db->get_where('rebate', array('card_numb' => $card_numb, 'refer_date' => $month));
			$data['rebate'] = $query->row_array();

			$query = $this->db->get_where('membership', array('card_numb' => $card_numb));
    		$data['profile'] = $query->row_array();

    		$query = $this->db->get_where('log', array('card_numb' => $card_numb,'refer_date' => $month));
    		$data['usage']   = $query->result_array();

    		//1)if set session success and get roles session equal to 1
			if ($this->session->userdata('roles') === 'admin') {
				$this->load->view('admin/statement/pdf.php',$data);
			}else{
				$this->session->sess_destroy();
				redirect('admin/login','refresh');
			}
		}

	}