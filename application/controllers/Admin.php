<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	1) Upload (admin)

*/

class Admin extends CI_Controller {

	/*This is form upload that contains picture or image to be upload*/
	public function masterUpload(){
		$data['css_page_level_plugins'] ='';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '<script src="/assets/custom/js/year.js" type="text/javascript"></script>';

		$this->load->view('admin/header',$data);
		$this->load->view('admin/masterUpload',$data);
		$this->load->view('admin/footer',$data);
	}

	public function uploadMonthly(){
		$data['css_page_level_plugins'] ='';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '<script src="/assets/custom/js/year.js" type="text/javascript"></script>';

		$query 	= $this->db->query('select month from month');
		$data['month'] = $query->result_array();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/upload',$data);
		$this->load->view('admin/footer',$data);
	}

	public function uploadFuel(){
		$data['css_page_level_plugins'] ='';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '<script src="/assets/custom/js/year.js" type="text/javascript"></script>';

		$query 	= $this->db->query('select name from month');
		$data['month'] = $query->result_array();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/fuel',$data);
		$this->load->view('admin/footer',$data);
	}

	public function uploadGrocery(){
		$data['css_page_level_plugins'] ='';
		$data['css_page_level_styles'] = '';
		$data['js_page_level_plugins'] = '';
		$data['js_page_level_scripts'] = '<script src="/assets/custom/js/year.js" type="text/javascript"></script>';

		$query 	= $this->db->query('select name from month');
		$data['month'] = $query->result_array();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/grocery',$data);
		$this->load->view('admin/footer',$data);
	}

	/*This the normal form upload*/
	public function promo(){
		$data['css_page_level_plugins'] =
		'<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />';
		$data['css_page_level_styles'] = '<link href="/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />';
		$data['js_page_level_plugins'] = '
		<script src="/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>';
		$data['js_page_level_scripts'] = '<script src="/assets/pages/scripts/portlet-ajax.min.js" type="text/javascript"></script>';

		$query 	= $this->db->query('select month from month');
		$data['month'] = $query->result_array();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/promo',$data);
		$this->load->view('admin/footer',$data);
	}

	/*this part contains all table in admin 
		- members
		- unassigned
		- log
		- summary
		- fuel
		- grocery
		- receipt 
	*/

	/* 1) table summary */
	public function tableSummary(){
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

		$data['result'] = $this->mymodel->getSummary();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableSummary',$data);
		$this->load->view('admin/footer',$data);
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

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableMembers',$data);
		$this->load->view('admin/footer',$data);
	}
	/* 2) table members */
	public function tableUnassigned(){
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

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableUnassigned',$data);
		$this->load->view('admin/footer',$data);
	}
	/* 4) table logs*/
	public function tableLogs(){
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

		$data['result'] = $this->mymodel->getLog();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableLogs',$data);
		$this->load->view('admin/footer',$data);
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

		$data['result'] = $this->mymodel->getFuel();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableFuel',$data);
		$this->load->view('admin/footer',$data);
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

		$data['result'] = $this->mymodel->getGrocery();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableGrocery',$data);
		$this->load->view('admin/footer',$data);
	}
	/* 7) table receipt */
	public function tableReceipt(){
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

		$data['result'] = $this->mymodel->getReceipt();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/tableReceipt',$data);
		$this->load->view('admin/footer',$data);
	}
	/* end of table function */

	/* view PDF */
	//Summary Details Page
  	public function viewPDF($w_id){
  		$this->load->library('Pdf');
      	$data  = $this->mymodel->getTemps($w_id);
      	$data1 = $this->mymodel->getMemberships($w_id);
      	$data2 = $this->mymodel->getlogs($w_id);
      	$data3 = $this->mymodel->getlog_row($w_id);
      	$data4 = $this->mymodel->select_sump($w_id);
      	$data5 = $this->mymodel->select_sumr($w_id);

      	$parent_data = array('row'=>$data,'user' => $data1,'summaries'=> $data2, 'summary' => $data3,'reload'=>$data5,'purchase'=>$data4);
      	$this->load->view('admin/viewPdf.php',$parent_data);
  	}
	/*end of pdf */

	public function formpromo(){
		$this->form_validation->set_rules('min_amount', 'Minimum Topup', 'trim|required');
      	$this->form_validation->set_rules('rebate_amount', 'Topup Rebate', 'trim|required');
        $this->form_validation->set_rules('min_petrol', 'Minimum Petrol', 'trim|required');
        $this->form_validation->set_rules('rebate_petrol', 'Petrol Rebate', 'trim|required');
        // 1)validate form input
        if ($this->form_validation->run() === TRUE){
       	// 2)declare variable
		$min_topup     = $this->input->post('min_amount');
        $topup_rebate  = $this->input->post('rebate_amount');
        $min_petrol    = $this->input->post('min_petrol');
        $petrol_rebate = $this->input->post('rebate_petrol');
        // 3)mkae sure there's no past data by delete the table
        $this->mymodel->delTemp();
        $rebate = '0.03';
        // 4)select all diff data only
        $data_user= $this->mymodel->select_distinct();

        	foreach ($data_user as $key => $value) {
        		$w_id = $value['w_id'];
        		$card_numb = $value['card_numb'];
        		var_dump($w_id);
        		$data = $this->mymodel->select_master($w_id,$card_numb);
        		               echo "<pre>";
       						var_dump($data);
        	}
    	}
	}

	/* functions start here */

	public function funcPromo(){
		$this->form_validation->set_rules('min_amount', 'Minimum Topup', 'trim|required');
      	$this->form_validation->set_rules('rebate_amount', 'Topup Rebate', 'trim|required');
        $this->form_validation->set_rules('min_petrol', 'Minimum Petrol', 'trim|required');
        $this->form_validation->set_rules('rebate_petrol', 'Petrol Rebate', 'trim|required');
        // 1)validate form input
        if ($this->form_validation->run() === TRUE){
       	// 2)declare variable
		$min_topup     = $this->input->post('min_amount');
        $topup_rebate  = $this->input->post('rebate_amount');
        $min_petrol    = $this->input->post('min_petrol');
        $petrol_rebate = $this->input->post('rebate_petrol');
        // 3)mkae sure there's no past data by delete the table
        $this->mymodel->delTemp();
        $rebate = '0.03';
        // 4)select all diff data only
        $data_user= $this->mymodel->select_distinct();
               

        if ($data_user != NULL) {
        // 5)create table 
        $this->mymodel->create();
        foreach ($data_user as $key => $value) {
        $w_id = $value['w_id'];
        $card_numb = $value['card_numb'];
        // 6)sum all data base on id and card numb
        $data_litre = $this->mymodel->select_suml($w_id,$card_numb);
        foreach ($data_litre as $key => $value) {
        $total_litre  = $value['total_litre'];
        // 7)sum total reload based on id and card number
        $data_reload = $this->mymodel->select_reload($w_id,$card_numb);
        foreach ($data_reload as $key => $value) {
        $total_topup  = $value['total_topup'];
        // 8)select all user from master based on id and card numb
        $data = $this->mymodel->select_master($card_numb);
        foreach ($data as $key => $value) {
        $email = $value['email'];
        $w_id = $value['w_numb'];
        $introducer = $value['introducer'];
        // 9)insert into temp table 1
        $this->mymodel->insertTemp($w_id,$total_litre,$total_topup,$email);

        if ($total_topup > $min_topup) {
        $total_topup_rebate =  $topup_rebate;
        }else{
        $total_topup_rebate =  0;
        }

        // 10)select temp table 
        $data = $this->mymodel->select_temp($w_id);

        if ($data != NULL) {
        $this->mymodel->update_temp($w_id,$total_litre,$total_topup,$introducer);
        //checking either downline introducer reload reach limit or not
        $data = $this->mymodel->sum_introducer($introducer);
        foreach ($data as $key => $val) {
        $sum_litre = $val['total_litre'];
        if ($sum_litre < $min_petrol) {
        	$total_amount = ($total_litre * $rebate) + $total_topup_rebate;
        	$this->mymodel->update_tamount($total_amount,$w_id,$petrol_rebate,$total_topup_rebate);
        }else {
        	$total_amount = ($total_litre * $rebate) + $petrol_rebate + $total_topup_rebate;
        	$this->mymodel->update_tamount($total_amount,$w_id,$petrol_rebate,$total_topup_rebate);
        }
        } //end of foreach
        }else {
        $this->mymodel->update_temp($w_id,$total_litre,$total_topup,$introducer);
        //checking either downline introducer reload reach limit or not
        $data = $this->mymodel->sum_introducer($introducer);
        foreach ($data as $key => $val) {
        $sum_litre = $val['total_litre'];
        if ($sum_litre < $min_petrol) {
        		$total_amount = ($total_litre * $rebate) + $total_topup_rebate;
        		$this->mymodel->update_tamount($total_amount,$w_id,$petrol_rebate,$total_topup_rebate);
        }else {
        		$total_amount = ($total_litre * $rebate) + $petrol_rebate + $total_topup_rebate;
        		$this->mymodel->update_tamount($total_amount,$w_id,$petrol_rebate,$total_topup_rebate);
        }
        } //end of foreach
      	}
      	}
                }
              }
            }

          $data['row'] = $this->mymodel->getTemp();
          redirect('/admin/tableSummary', 'refresh');
        }
        }else{
        	$this->promo();
      	}
	}

}
