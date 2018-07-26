<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once'assets/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/*
	1) Upload Monthly zip file (admin)

*/

class Upload extends CI_Controller {

	//upload zip file 
	public function uploadZip(){
		$month 	= $this->input->post('month');
		$year	= $this->input->post('year');
		// create folder inside uploads
		if (!is_dir('uploads/'. $month . $year)) {
			mkdir('./uploads/' . $month . $year, 0777, TRUE);
		}

		// set config param for CI Uploads
		$config['upload_path'] = './uploads/'.$month . $year;
		$config['allowed_types'] = 'zip';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		$zipfile = "upload"; // field name from the form

		// show error if upload failed
		if (!$this->upload->do_upload($zipfile))
		{
			echo '<h1>Error</h1>'.$this->upload->display_errors();return;
		}
		else
		{
			// to get the unzip folder's name
			// this is a BAD assumption assuming folder name is similar with zip name
			$file_name = $_FILES['upload']['name'];
			$array = explode(".", $file_name);
			$name = $array[0];
			$ext = $array[1];
			$udate 		= $month.' '.$year;	
			// 1) unzip
			$zip = new ZipArchive;

			if ($zip->open($config['upload_path'].'/'.$this->upload->data('file_name')) === TRUE)
			{
				$zip->extractTo($config['upload_path']);
				$zip->close();
			}
			else
			{
				echo '<h1>Error unzipping file</h1>';
			}

			// 2) process csv file -> dbase
			$this->load->library('csvreader');

			$pathOpen = $config['upload_path'] .'/'.$name.'/';
			$files = scandir($pathOpen);
			// we should know which company via Folder's name. Petronas / Petron?
			// still a BAD assumption
			$name = explode(' ', $name ); 
			//$company =  (strpos($name,'Petronas'))? 'Petronas' : 'Petron' ;
			$company= $name[0];
			if ($company == 'Petron') 
			{	
				$udate 		= $month.$year;
				$this->db->delete('log', array('upload_date' => $udate,'type' => $company));
				// convert xlx to csv
				$i_ = 0;
				foreach ($files as $i => $file) {
					$i_++;
					$e_ 	= explode('.', $file);
					//var_dump($e_);
					if ($e_[1] == 'xlsx') {
						$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($pathOpen.$file);
						$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
						$writer->setUseBOM(true);
						$writer->save($pathOpen.'Petron'.$i_.'.csv');
					}
				}
			}else{
				$udate 		= $month.$year;
				$this->db->delete('log', array('upload_date' => $udate,'type' => $company));
			}
			//refresh 
			$files = scandir($pathOpen);
			//print_r($files);
			foreach ($files as $i => $file) {

				$e_ 	= explode('.', $file);
				
				// making sure we only process CSV file
				if ($e_[1] == 'csv') {
					$result = $this->csvreader->parse_file($pathOpen.$file);
					    foreach ($result as $field) {
						    switch ($company) {
							    case 'Petronas':
							    	// Process fields for Petronas
									$date_time 	= $field['Date Time']; 
									$tx_type 	= $field['Transaction Type']; 
									$card_numb  = $field['Card Number'];			 //card number
									$w_numb 	= $field['Vehicle Number'];			 //wexaver ID
									//$field['Driver Card Number'];
									$product 	= $field['Product Type'];            //type of petrol
									//$field['Billing Type'];
									$litre 		= $field['Transaction Volume (Litres)'];//transaction litre
									$tx_amount	= $field['Transaction Amount (RM)']; //transaction amount
									$st_name 	= $field['Station Name'];			 //station name
									$odometer 	= $field['Odometer'];				 //odometer
									//$field['Card Type'];							 //standalone
									//$field['Cost Centre'];						 //null
									//$field['Cost Centre Name'];					 //null
									//$field['Statement Month'];		 //month statement
									$type 		= 'Petronas';						 //type of petrol
									$field 		=(explode(" ",$date_time)); 		 //explode date and time to seperate value
							    	$date 		= $field[0];						 //date
									$time		= $field[1];						 //time
									$tx_amount  = ltrim($tx_amount, '-');
									$card_numb  = ltrim($card_numb, "'");
									$w_number 	= explode("WXR",$w_numb);
									$w_numb      = $w_number[1];
									$udate 		= $month.''.$year;
									$this->mymodel->insertLog($date,$time,$tx_type,$card_numb,$w_numb,$tx_amount,$st_name,$odometer,$litre,$product,$type,$udate);
							    break;
							    case 'Petron':
							    	//$invoice = $field['Invoice Date'];			//invoice date
									$date 		= $field['Transaction Date'];		//date
									$time 		= $field['Transaction Time'];		//time
									$card_numb  = $field['Vehicle Card'];			//card number
									$w_numb 	= $field['Vehicle No'];				//wexaver ID
									$product 	= $field['Product'];				//type of petrol
									$tx_type 	= 'Purchase';						//type of transaction
									//$field['Unit Price'];
									//							//RM per litre
									$litre 		= $field['Quantity'];				//transaction per litre
									$tx_amount	= $field['Transaction Amount'];		//transaction amount
									$st_name	= $field['Station Name'];			//station name
									//$field['Receipt No'];							//receipt number
									//$field['Driver Card'];						//null
									//$field['Driver Name'];						//null
									$odometer 	= $field['Odometer'];				//odometer
									$udate 		= $month.''.$year;					//month statement
									$type 		= 'Petron';
									$w_numb		= explode(" ", $w_numb);							//type of petrol
									
									$w_numb 	= $w_numb[1];
									// save into log	
									$this->mymodel->insertLog($date,$time,$tx_type,$card_numb,$w_numb,$tx_amount,$st_name,$odometer,$litre,$product,$type,$udate);
							    break;
						    }
					    }
				}
			}
			// 3) unlink all files inside uploads/xx to avoid web snooping
			foreach ($files as $i => $file) {
				if (!in_array($file,array(".",".."))) {
					unlink($pathOpen.$file);
				}
			}
			rmdir($pathOpen);
			// 4) show done
			redirect('admin/tableLogs','refresh');
		}
	}
	/*
	2) MasterUpload 
					*/
	public function masterUpload(){
		$file_name = $_FILES['upload']['name'];
		if (!is_dir('members/')) {
			mkdir('./members/', 0777, TRUE);
		}
		// set config param for CI Uploads
		$config['upload_path'] = './members/';
		$config['allowed_types'] = 'xlsx|csv|xls';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$zipfile = "upload"; // field name from the form

		// show error if upload failed
		if ($this->upload->do_upload($zipfile))
		{
			$array = explode(".", $file_name);
			$name = $array[0];
			$ext = $array[1];

			// 2) process csv file -> dbase
			$this->load->library('csvreader');

			$pathOpen = $config['upload_path'] ;
			$files = scandir($pathOpen);


			//print_r($files);
			foreach ($files as $i => $file) {
				$e_ 	= explode('.', $file);
				// making sure we only process CSV file
				if ($e_[1] == 'xlsx') {
					$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($pathOpen.$file);
						$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
						$writer->setUseBOM(true);
					$writer->save($pathOpen.'Members.csv');
				}
			}
			//refresh 
			$files = scandir($pathOpen);
			foreach ($files as $i => $file) {

				$e_ 	= explode('.', $file);
				
				// making sure we only process CSV file
				if ($e_[1] == 'csv') {
					$result = $this->csvreader->parse_file($pathOpen.$file);
					    foreach ($result as $field) {
					    	$name = $field['Name'];
					    	if (!empty($name)){
					    		    //$field[﻿'NO']; 
    								$acc      	  = $field['ACCOUNT']; 
    								$card_numb 	  = $field['CARD NUMBER']; 
    								$w_numb 	  = $field['WeXaver ID NO.']; 
    								$card_pass    = $field['PIN NO.'];
    								$name 		  = $field['Name'];
    								$ic_number 	  = $field['NRIC']; 
    								$email 		  = $field['EMAIL'];
    								$phone_no 	  = $field['PHONE']; 
    								$address 	  = $field['ADDRESS'];
    								$state 		  = $field['STATE'];  
    								$postcode 	  = $field['POSTCODE'];
    								$fuel_type 	  = $field['CHOICE OF FUEL BRAND'];
    								$avg_spend 	  = $field['AVERAGE FUEL SPEND'];
    								$grocer_brand = $field['CHOICE OF GROCERY BRAND'];
    								$name_bnf 	  = $field['Name of Beneficiary'];
    								$ic_bnf 	  = $field['Beneficiary NRIC'];
    								$hp_bnf       = $field['Beneficiary Mobile Number']; 
    								$relationship = $field['Relationship'];
    								$w_id 	      = $field['Assigned Membership No. '];  
    								$introducer   = $field['INTRODUCER'];
    								$date_joined  = $field['DATE JOINED'];
    								$agent_name   = $field['Agent Name'];
    								$agent_no     = $field['Agent Number']; 
    								//$field['Batch Date'];
    								//$field['Membership Paid by Agent?']; 
    								//$field['Incentive Paid to Agent?']; 
    								//$field['Note'];
    								$w_id 		  = preg_replace('/\s+/', '', $w_id);
									$this->mymodel->insertMembers($acc,$card_numb,$w_numb,$ic_number,$card_pass,$name,$email,$phone_no,$address,$state,$postcode,$fuel_type,$avg_spend,$grocer_brand,$name_bnf,$ic_bnf,$hp_bnf,$relationship,$w_id,$introducer,$date_joined,$agent_name,$agent_no);
					    	}else{
					    			//$field[﻿'NO']; 
    								$acc      	  = $field['ACCOUNT']; 
    								$card_numb 	  = $field['CARD NUMBER']; 
    								$w_numb 	  = $field['WeXaver ID NO.']; 
    								$card_pass    = $field['PIN NO.'];
    								$name 		  = $field['Name'];
    								$ic_number 	  = $field['NRIC']; 
    								$email 		  = $field['EMAIL'];
    								$phone_no 	  = $field['PHONE']; 
    								$address 	  = $field['ADDRESS'];
    								$state 		  = $field['STATE'];  
    								$postcode 	  = $field['POSTCODE'];
    								$fuel_type 	  = $field['CHOICE OF FUEL BRAND'];
    								$avg_spend 	  = $field['AVERAGE FUEL SPEND'];
    								$grocer_brand = $field['CHOICE OF GROCERY BRAND'];
    								$name_bnf 	  = $field['Name of Beneficiary'];
    								$ic_bnf 	  = $field['Beneficiary NRIC'];
    								$hp_bnf       = $field['Beneficiary Mobile Number']; 
    								$relationship = $field['Relationship'];
    								$w_id 	      = $field['Assigned Membership No. '];  
    								$introducer   = $field['INTRODUCER'];
    								$date_joined  = $field['DATE JOINED'];
    								$agent_name   = $field['Agent Name'];
    								$agent_no 	  = $field['Agent Number']; 
    								//$field['Batch Date'];
    								//$field['Membership Paid by Agent?']; 
    								//$field['Incentive Paid to Agent?']; 
    								//$field['Note'];
    								$w_id 		  = preg_replace('/\s+/', '', $w_id);
									$this->mymodel->insertUnassigned($acc,$card_numb,$w_numb,$ic_number,$card_pass,$name,$email,$phone_no,$address,$state,$postcode,$fuel_type,$avg_spend,$grocer_brand,$name_bnf,$ic_bnf,$hp_bnf,$relationship,$w_id,$introducer,$date_joined,$agent_name,$agent_no);
					    	}
					    }
				}	
			}foreach ($files as $i => $file) {
				if (!in_array($file,array(".",".."))) {
					unlink($pathOpen."/".$file);
				}
			}
			rmdir($pathOpen);
		}	
	}
	

	public function delete_directory($path,$name){
		$pathOpen = $path .'/'.$name.'/';
		$files = scandir($pathOpen);
		// "<pre>";print_r($files);
		foreach ($files as $i => $file) {
			if (!in_array($file,array(".",".."))) {
				unlink($pathOpen."/".$file);
			}
		}
		rmdir($pathOpen);
	}	
}