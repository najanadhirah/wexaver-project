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

  public function getUser($email){
    $query = $this->db->get_where('membership', array('email' => $email));
    $row = $query->row_array();
    return $row; 
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