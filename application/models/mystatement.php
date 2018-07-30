<?php
 /**
  *  Author : Ahmad Shukri
  *  Model : wexaver_auth
  *  Description : This model for register login and forgot password
  */
  class mystatement extends CI_Model
  {
    public function __construct()
    {
      $this->load->database();
    }

    public function getMonthlyView($updload_date){
      $query = $this->db->get_where('log', array('upload_date' => $updload_date));
      $result = $query->result_array();
      return $result; 
    }

    public function userMonthView($upload_date,$card_number){
      $query = $this->db->get_where('log', array('upload_date' => $upload_date,'card_numb' => $card_number));
      $result = $query->result_array();
      return $result;
    }

    public function select_distinct($month){
      $this->db->distinct();
      $this->db->select('w_id,card_numb');
      $query = $this->db->get_where('log',array('upload_date' => $month));
      return $query->result_array();
    }

    public function sum_total($card_numb,$month){
      $sql = "SELECT SUM(litre) AS total_litre ,SUM(tx_amount) AS total_transaction FROM log WHERE upload_date = '$month' AND card_numb = '$card_numb' AND tx_type = 'Purchase' ";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function sum_topup($card_numb,$month){
      $sql = "SELECT SUM(tx_amount) AS total_topup FROM log WHERE upload_date = '$month' AND card_numb = '$card_numb' AND tx_type = 'Reload' ";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    //create table temp_table1 for promo if not exist
    public function create(){
      $sql = "CREATE TABLE IF NOT EXISTS rebate ( w_id varchar(20) NOT NULL,total_topup int(30),total_litre int(30),total_amount float(2),introducer_id varchar(20),rebate_overiding float(2),rebate_topup float(2),PRIMARY KEY(w_id))";
      $query = $this->db->query($sql);
      return $query;
    }

    public function insertRebate($card_numb,$month){
      $data = array(
        'card_numb'   => $card_numb,
        'upload_date' => $month,
      );
      $this->db->insert('rebate',$data);
    }

    public function updateRebate($introducer,$wexaver_id,$email,$card_number){
      $data = array(
        'introducer_id' => $introducer,
        'wexaver_id' => $wexaver_id,
        'card_numb' => $card_number,
        'email' => $email,
      );
      $this->db->set('introducer_id','wexaver_id','email');
      $this->db->where('card_numb',$card_number);
      $this->db->update('rebate',$data);
    }

    public function updateRebate_totalTopup($total_topup,$rebate_topup,$card_numb){
      $data = array(
        'total_topup' =>$total_topup,
        'rebate_topup'=>$rebate_topup,
      );
      $this->db->set('total_topup','rebate_topup');
      $this->db->where('card_numb',$card_numb);
      $this->db->update('rebate',$data);
    }

    public function updateRebate_totalUsage($total_litre,$total_transaction,$rebate_petrol,$card_numb){
      $data = array(
        'total_litre'      =>$total_litre,
        'total_transaction'=>$total_transaction,
        'rebate_petrol'    =>$rebate_petrol, 
      );
      $this->db->set('total_litre','total_transaction','rebate_petrol');
      $this->db->where('card_numb',$card_numb);
      $this->db->update('rebate',$data);
    }
  }