<?php
 /**
  *  Author : Ahmad Shukri
  *  Model : wexaver_auth
  *  Description : This model for register login and forgot password
  */
  class mymodel extends CI_Model
  {
    public function __construct()
    {
      $this->load->database();
    }

  /* BELOW CONTAINS ALL QUERY FOR AUTHENTICATION*/
  public function adminLogin($uname,$pass){
    $query = $this->db->get_where('admin', array('username' => $uname));
    $row = $query->row();
    if ($pass == "") {
      return FALSE; // wrong password
    }else if (isset($row)){
      $cpass = $row->password;
        if ($cpass == $pass) {
          return TRUE;
        }else{
          return FALSE;
        }
    }else{
      return FALSE;
    }
  }

  public function UserLogin($email,$pass){
    $query = $this->db->get_where('membership', array('email' => $email));
    $row = $query->row();
    if ($pass == "") {
      return FALSE; // wrong password
    }else if (isset($row)){
      $cpass = $row->card_pass;
        if ($cpass == $pass) {
          return TRUE;
        }else{
          return FALSE;
        }
    }else{
      return FALSE;
    }
  }

  public function getAdmin($uname){
    $query = $this->db->get_where('admin', array('username' => $uname));
    $row = $query->row_array();
    return $row; 
  }

  public function getUser($email){
    $query = $this->db->get_where('membership', array('email' => $email));
    $row = $query->row_array();
    return $row; 
  }

  public function insertLog($date,$time,$tx_type,$card_numb,$w_numb,$tx_amount,$st_name,$odometer,$litre,$product,$type,$udate){
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
    );
    $this->db->insert('log',$data);  
  }
  /* BELOW ONLY QUERY WITHOUT PARAMETER WHICH MEAN SELECT ALL DATA*/
  /* get summary */
  public function getSummary(){
    $query = $this->db->get('temp_table_1');
    $result = $query->result_array();
    return $result; 
  }
  /* get members */
  public function getMembers(){
    $query = $this->db->get('membership');
    $result = $query->result_array();
    return $result; 
  }

  /*get unassigned*/
  public function getUnassigned(){
    $query = $this->db->get('unassigned');
    $result = $query->result_array();
    return $result; 
  }
  /* get log*/
  public function getLog(){
    $query = $this->db->get('log');
    $result = $query->result_array();
    return $result; 
  }
  /* get fuel*/
  public function getFuel(){
    $query = $this->db->get('fuel');
    $result = $query->result_array();
    return $result; 
  }
  /* get grocery */
  public function getGrocery(){
    $query = $this->db->get('grocery');;
    $result = $query->result_array();
    return $result; 
  }
  /* get reciept*/
  public function getReceipt(){
    $query = $this->db->get('receipt');
    $result = $query->result_array();
    return $result; 
  }

  /*BELOW ALL QUERY FOR UPLOAD*/
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
  // end of upload main data

  /*  start promo */
  // delete table
  public function delTemp(){
    $sql ="DELETE FROM temp_table_1 ";
    $this->db->query($sql);
  }
  //select distinct for promo
  public function select_distinct(){
    $this->db->distinct();
    $this->db->select('w_id,card_numb');
    $query = $this->db->get('log');
    return $query->result_array();
  }
  //create table temp_table1 for promo if not exist
  public function create(){
    $sql = "CREATE TABLE IF NOT EXISTS temp_table_1 ( w_id varchar(20) NOT NULL,total_topup int(30),total_litre int(30),total_amount float(2),introducer_id varchar(20),rebate_overiding float(2),rebate_topup float(2),PRIMARY KEY(w_id))";
    $query = $this->db->query($sql);
    return $query;
  }
  //select sum from log to total the value of topup and litre petrol
  public function select_suml($w_id,$card_numb){
    $sql = "SELECT SUM(litre) AS total_litre FROM log WHERE w_id = '$w_id' AND card_numb = '$card_numb'";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function select_reload($w_id,$card_numb){
    $sql = "SELECT SUM(tx_amount) AS total_topup FROM log WHERE w_id = '$w_id' AND tx_type = 'Reload' AND card_numb = '$card_numb'";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  //select where user id from temp table equal to main table
  public function select_master($card_numb){
    $query = $this->db->get_where('membership', array('card_numb' => $card_numb));
    return $query->result_array();
  }
  //insert into temp table
  public function insertTemp($w_id,$total_litre,$total_topup,$email){
    $data = array(
      'w_id'       => $w_id,
      'email'      => $email,
      'total_topup'=> $total_topup,
      'total_litre'=> $total_litre,
    );
    $this->db->insert('temp_table_1',$data);
  }
  //select temp table for calculation
  public function select_temp($w_id){
    $sql = "SELECT * FROM temp_table_1 WHERE w_id = '$w_id' ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function update_temp($w_id,$total_litre,$total_topup,$introducer){
    $data = array(
      'total_litre'=>$total_litre,
      'total_topup'=>$total_topup,
      'introducer_id'=>$introducer,
    );
    $this->db->set('total_litre','total_topup','introducer_id');
    $this->db->where('w_id',$w_id);
    $this->db->update('temp_table_1',$data);
  }
  public function sum_introducer($introducer){
    $sql = "SELECT SUM(total_litre) AS total_litre FROM temp_table_1 WHERE introducer_id = '$introducer' ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function update_tamount($total_amount,$w_id,$petrol_rebate,$total_topup_rebate){
    $data = array(
      'total_amount'=>$total_amount,
      'rebate_overiding' => $petrol_rebate,
      'rebate_topup' => $total_topup_rebate,
    );
    $this->db->set('total_amount','rebate_topup','rebate_overiding');
    $this->db->where('w_id',$w_id);
    $this->db->update('temp_table_1',$data);
  }
  public function getTemp(){
    $query = $this->db->get('temp_table_1');
    return $query->result_array();
  }
  /* end of promo table */

  /* start view pdf query*/
  public function getTemps($w_id){
    $query = $this->db->get_where('temp_table_1', array('w_id' => $w_id));
    return $query->row_array();
  }
  public function getMemberships($w_id){
    $query = $this->db->get_where('membership', array('w_numb' => $w_id));
    return $query->row_array();
  }
  public function getlogs($card){
    $query = $this->db->get_where('log', array('card_numb' => $card));
    return $query->result_array();
  }
  public function getlog_row($card){
    $query = $this->db->get_where('log', array('card_numb' => $card));
    return $query->row_array();
  }
  public function select_sump($card){
    $sql = "SELECT SUM(tx_amount) AS totalp_topup FROM log WHERE card_numb = '$card' AND tx_type = 'Purchase'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }
  public function select_sumr($w_id){
    $sql = "SELECT SUM(tx_amount) AS totalr_topup FROM log WHERE w_id = '$w_id' AND tx_type = 'Reload'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function select_upload($w_id){
    $this->db->distinct();
    $this->db->select('upload_date');
    $this->db->where('w_id',$w_id);
    $query = $this->db->get('log');
    return $query->result_array();
  }

  public function getlogsPdf($w_id,$date){
    $query =  $this->db->query ('SELECT * FROM log WHERE w_id = "$w_id" AND upload_date = "$date" ');
    return $query->result_array();
  }

  public function getlogUser($date){
    $query =  $this->db->query ('SELECT * FROM log WHERE upload_date = "$date" ');
    return $query->row_array();
  }
  /*end of view pdf query*/

  /* start part register */
  public function updateUnassigned($fullname,$ic,$email,$phone,$w_numb){
        $data = array(
          'name' => $fullname,
          'email'=> $email,
          'nric'=> $ic,
        );
        $this->db->set('name','email','phone_no','nric');
        $array = array('w_numb' => $w_numb);
        $this->db->where($array);
        $this->db->update('unassigned',$data);
    }
    public function updateFree($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$date_joined,$mark){
        $data = array(
          'account' => $acc,
          'card_numb' => $card_numb,
          'w_numb'  => $w_numb,
          'card_pass'  => $password,
          'name' => $fullname,
          'email'=> $email,
          'nric' => $ic,
          'phone_no'=> $phone,
          'package' => $package,
          'address' => $address,
          'state'   => $city,
          'poscode'=> $postcode,
          'avg_fuel'=> $average,
          'vmodel'=>$vmodel,
          'cartype'    => $radio2,
          'vcc'    => $vcc,
          'vplate'=> $vplate,
          'vmanufactured'=> $vmanufatured,
          'roadtax'  => $road_tax,
          'date_joined' => $date_joined,
          'reg_type'    => $reg_type,
          'mark'        => $mark,
        );
        $this->updateUnassigned($fullname,$ic,$email,$phone,$w_numb);
        $this->db->insert('membership',$data);
    }
    public function getUpt(){
      $query = $this->db->get_where('unassigned', array('name' => '','agent_name'=>''));
      return $query->row_array();
    }
    public function updateNotFree($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$w_id,$date_joined,$mark){
      $data = array(
          'account' => $acc,
          'card_numb' => $card_numb,
          'w_numb'  => $w_numb,
          'card_pass'  => $password,
          'name' => $fullname,
          'email'=> $email,
          'nric' => $ic,
          'phone_no'=> $phone,
          'package' => $package,
          'address' => $address,
          'state'   => $city,
          'poscode'=> $postcode,
          'avg_fuel'=> $average,
          'vmodel'=>$vmodel,
          'cartype'    => $radio2,
          'vcc'    => $vcc,
          'vplate'=> $vplate,
          'vmanufactured'=> $vmanufatured,
          'w_id'        => $w_id,
          'roadtax'  => $road_tax,
          'date_joined' => $date_joined,
          'reg_type'    => $reg_type,
          'mark'        => $mark,
      );
      $this->updateUnassigned($fullname,$ic,$email,$phone,$w_numb);
      $this->db->insert('membership',$data);
    }
  /* end of register */

  public function updateFreeOffline($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$date_joined,$mark,$reference){
        $data = array(
          'account' => $acc,
          'card_numb' => $card_numb,
          'w_numb'  => $w_numb,
          'card_pass'  => $password,
          'name' => $fullname,
          'email'=> $email,
          'nric' => $ic,
          'phone_no'=> $phone,
          'package' => $package,
          'introducer' => $reference,
          'address' => $address,
          'state'   => $city,
          'poscode'=> $postcode,
          'avg_fuel'=> $average,
          'vmodel'=>$vmodel,
          'cartype'    => $radio2,
          'vcc'    => $vcc,
          'vplate'=> $vplate,
          'vmanufactured'=> $vmanufatured,
          'roadtax'  => $road_tax,
          'date_joined' => $date_joined,
          'reg_type'    => $reg_type,
          'mark'        => $mark,
        );
        $this->updateUnassigned($fullname,$ic,$email,$phone,$w_numb);
        $this->db->insert('membership',$data);
    }

    public function updateNotFreeOffline($acc,$card_numb,$w_numb,$pass,$fullname,$ic,$email,$phone,$package,$password,$average,$address,$city,$postcode,$vmodel,$radio2,$vcc,$vplate,$vmanufatured,$road_tax,$reg_type,$w_id,$date_joined,$mark,$reference){
      $data = array(
          'account' => $acc,
          'card_numb' => $card_numb,
          'w_numb'  => $w_numb,
          'card_pass'  => $password,
          'name' => $fullname,
          'email'=> $email,
          'nric' => $ic,
          'phone_no'=> $phone,
          'package' => $package,
          'introducer' => $reference,
          'address' => $address,
          'state'   => $city,
          'poscode'=> $postcode,
          'avg_fuel'=> $average,
          'vmodel'=>$vmodel,
          'cartype'    => $radio2,
          'vcc'    => $vcc,
          'vplate'=> $vplate,
          'vmanufactured'=> $vmanufatured,
          'w_id'        => $w_id,
          'roadtax'  => $road_tax,
          'date_joined' => $date_joined,
          'reg_type'    => $reg_type,
          'mark'        => $mark,
      );
      $this->updateUnassigned($fullname,$ic,$email,$phone,$w_numb);
      $this->db->insert('membership',$data);
    }

  public function insertSme($company_name,$name,$email,$phone_number,$address,$postcode,$petrol_spend){
    $data = array (
      'company_name' => $company_name, 
      'name' => $name,
      'email' => $email,
      'phone_number' => $phone_number,
      'address' => $address,
      'postcode' => $postcode,
      'petrol_spend' => $petrol_spend,
    );
    $this->db->insert('sme',$data);
  }

}