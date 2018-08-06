<?php 

$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Usage Details '.$summary['upload_date']);
//$pdf->SetHeaderMargin(30);
//$pdf->SetTopMargin(20);
//$pdf->setFooterMargin(20);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(true);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//$pdf->SetAuthor('Author',$user['name']);
//$pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('times', '', 10, '', true);
$title = 'Summary Report';
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);

if ($reload['totalr_topup'] == Null) {
$pdf->AddPage();

$header =<<<EOD
  <p> To : {$user['name']} <br> Month : {$summary['upload_date']}</p>
  <table width="100%">
      <tr >
        <td  width="25%">WeXaver Member No. : </td>
        <td  width="25%">{$user["w_id"]}</td>
        <td  align="right" width="25%">Period : </td>
        <td  width="25%">{$summary["upload_date"]} </td>
      </tr> 
    </table >
  <p>Hi WeXaver Member,</p>
    <p>Welcome to WeXaver. Many thanks for becoming WeXaver member.</p>
    <p>Kindly find attached details of your WeXaver membership for period {$summary['upload_date']}.</p>
    <p>If you have any issues or queries, kindly contact WeXaver CareLine at <b>013-2755 329 </b>working days from 10am till 6pm) or e-mail us at <a href="mailto:welcome@wexaver.com">welcome@wexaver.com</a>.</p>
EOD;

$tbl_header = '<table border="1" style="margin-bottom:15px;">';
$tbl_footer = '</table>';
$tbl ='
  <tr>
        <td align="center" width="16.5%"><b>Date Time</b></td>
        <td align="center" width="16.5%"><b>Transaction Type</b></td>
        <td align="center" width="16.5%"><b>Product Type</b></td>
        <td align="center" width="16.5%"><b>Transaction Volume(Litres)</b></td>
        <td align="center" width="16.5%"><b>Transaction Amount(RM)</b></td>
        <td align="center" width="16.5%"><b>Station Name</b></td>
  </tr>
';

 foreach ($summaries as $key => $values) {
  if($values['tx_type'] === 'Purchase'){
    $date = $values['date'];
    $tx_type = $values['tx_type'];
    $product = $values['product'];
    $litre = $values['litre'];
    $tx_amount = number_format( (float) $values['tx_amount'], 2, '.', '');
    $st_name = $values['st_name'];
    $total_litre = number_format( (float) $row['total_litre'], 2, '.', '');
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;


    $tbl .= '<tr>
          <td align="center">'.$date.'</td>
          <td align="center">'.$tx_type.'</td>
          <td align="center">'.$product.'</td>
          <td align="right">'.$litre.'</td>
          <td align="right">'.$tx_amount.'</td>
          <td align="center">'.$st_name.'</td>
        </tr>';
  }
 }

   if ($row['total_topup'] == 0) {
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }elseif($row['total_litre'] == 0){
    $total_litre = 0;
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }else{
    $total_litre = $row['total_litre'];
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }


 $tbl2 ='<tr>
           <td></td>
           <td align="right" colspan="2" ><b>Total Purchase</b></td>
           <td align="right" ><b> '.$total_litre.' </b></td>
           <td align="right" ><b>RM '.$amount.'</b></td>
           <td></td>
         </tr>
          <tr>
           <td></td>
           <td align="right" colspan="2"><b>Usage Cashback</b></td>
           <td align="right" ><b>RM '.$usage_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td align="right" colspan="2"><b>Bonus Cashback</b></td>
           <td align="right" ><b>RM '.$bonus_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td align="right" colspan="2"><b>Total Cashback</b></td>
           <td align="right" ><b>RM '.$total_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>';

 $footer = '<p>Your usage cashback amount for period '.$summary["upload_date"].' have been credited to your fuel card on 1st April 2018.</br> <p>Your promotion bonus cashback amount for period '.$summary["upload_date"].' will be credited to your fuel card by 10th April 2018.</p>Many thanks for your continuous support to WeXaver.</p>
                <p>Kind Regards, <br><b>WeXaver - Smart Saver </b>';

$pdf->writeHTML($header . $tbl_header . $tbl . $tbl2 . $tbl_footer .$footer, true, false, false, false, '');
$pdf->Output('Usage Details '.$summary['upload_date'].'.pdf', 'I'); 

}else {
$pdf->AddPage();

$header =<<<EOD
  <p> To : {$user['name']} <br> Month : {$summary['upload_date']}</p>
  <table width="100%">
      <tr >
        <td  width="25%">WeXaver Member No. : </td>
        <td  width="25%">{$user["w_id"]}</td>
        <td  width="25%">Period : </td>
        <td  width="25%">{$summary["upload_date"]} </td>
      </tr> 
    </table >
  <p>Hi WeXaver Member,</p>
    <p>Welcome to WeXaver. Many thanks for becoming WeXaver member.</p>
    <p>Kindly find attached details of your WeXaver membership for period {$summary['upload_date']}.</p>
    <p>If you have any issues or queries, kindly contact WeXaver CareLine at <b>013-2755 329 </b>working days from 10am till 6pm) or e-mail us at <a href="mailto:welcome@wexaver.com">welcome@wexaver.com</a>.</p>
EOD;

$tbl_header = '<table border="1">';
$tbl_footer = '</table>';
$tbl ='
  <tr>
    <td align="center" width="16.5%"><b>Date<br>Time</b></td>
        <td align="center" width="16.5%"><b>Transaction Type</b></td>
        <td align="center" width="16.5%"><b>Product Type</b></td>
        <td align="right" width="16.5%"><b>Transaction Volume(Litres)</b></td>
        <td align="right" width="16.5%"><b>Transaction Amount(RM)</b></td>
        <td align="center" width="16.5%"><b>Station Name</b></td>
  </tr>
';

 foreach ($summaries as $key => $values) {
  if($values['tx_type'] === 'Purchase'){
    $date = $values['date'];
    $time = $values['time'];
    $datetime = $date.$time;
    $tx_type = $values['tx_type'];
    $product = $values['product'];
    $litre = $values['litre'];
    $tx_amount = number_format( (float) $values['tx_amount'], 2, '.', '');
    $st_name = $values['st_name'];
    $total_litre = number_format( (float) $row['total_litre'], 2, '.', '');
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;

    $tbl .= '<tr>
          <td align="center">'.$date.'<br>'.$time.'</td>
          <td align="center">'.$tx_type.'</td>
          <td align="center">'.$product.'</td>
          <td align="right">'.$litre.'</td>
          <td align="right">'.$tx_amount.'</td>
          <td align="center">'.$st_name.'</td>
        </tr>';
  }
 }

 if ($row['total_topup'] == 0) {
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }elseif($row['total_litre'] == 0){
    $total_litre = 0;
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }else{
    $total_litre = $row['total_litre'];
    $total_topup = number_format( (float) $row['total_topup'], 2, '.', '');
    $amounts = $purchase['totalp_topup'];
    $amount = number_format( (float) $amounts, 2, '.', '');
    $total_cashback = number_format( (float) $row['total_amount'], 2, '.', '');
    $bonus_cashback = number_format( (float) $row['rebate_topup'], 2, '.', '');
    $usage_cashback = $total_cashback - $bonus_cashback;
  }

 $tbl2 ='<tr>
           <td></td>
           <td align="right" colspan="2" ><b>Total Purchase</b></td>
           <td align="right" ><b> '.$total_litre.' </b></td>
           <td align="right" ><b>RM '.$amount.'</b></td>
           <td></td>
         </tr>
          <tr>
           <td></td>
           <td align="right" colspan="2"><b>Usage Cashback</b></td>
           <td align="right" ><b>RM '.$usage_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td align="right" colspan="2"><b>Bonus Cashback</b></td>
           <td align="right" ><b>RM '.$bonus_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>
         <tr>
           <td></td>
           <td align="right" colspan="2"><b>Total Cashback</b></td>
           <td align="right" ><b>RM '.$total_cashback.'</b></td>
           <td></td>
           <td></td>
         </tr>';
         
$pdf->writeHTML($header . $tbl_header . $tbl . $tbl2 . $tbl_footer , true, false, false, false, '');  
$pdf->AddPage();

if ($reload['totalr_topup'] === Null) 
  {echo "No data";}
else {

$tbl_header1 = '<p></p><table border="1">';
$tbl_footer1 = '</table>';
$tbl1 ='
  <tr>
    <td align="center" width="25%"><b>Date<br>Time</b></td>
        <td align="center" width="25%"><b>Transaction Type</b></td>
        <td align="right" colspan="3" width="25%"><b>Transaction Amount(RM)</b></td>
        <td align="center" width="25%"><b>Station Name</b></td>
  </tr>
';

 foreach ($summaries as $key => $values) {
  if($values['tx_type'] === 'Reload'){
    $date = $values['date'];
    $time = $values['time'];
    $tx_type = $values['tx_type'];
    $tx_amount = number_format( (float) $values['tx_amount'], 2, '.', '');
    $st_name = $values['st_name'];
    $total_reload = number_format( (float) $reload['totalr_topup'], 2, '.', '');


    $tbl1 .= '<tr>
          <td align="center">'.$date.'<br>'.$time.'</td>
          <td align="center">'.$tx_type.'</td>
          <td align="right" colspan="3">'.$tx_amount.'</td>
          <td align="center">'.$st_name.'</td>
        </tr>';
  }
 }

 $tbl21 ='<tr>
          <td></td>
          <td align="right" ><b>Total Reload</b></td>
          <td align="right" colspan="3"><b>RM'.$total_reload.'</b></td>
          <td></td>
        </tr>';
}

$footer = '<p>Your usage cashback amount for period '.$summary["upload_date"].' have been credited to your fuel card on 1st April 2018.</br> <p>Your promotion bonus cashback amount for period '.$summary["upload_date"].' will be credited to your fuel card by 10th April 2018.</p>Many thanks for your continuous support to WeXaver.</p>
                <p>Kind Regards, <br><b>WeXaver - Smart Saver </b>';

$pdf->writeHTML($tbl_header . $tbl_footer . $tbl_header1 . $tbl1 . $tbl21 . $tbl_footer1 . $footer, true, false, false, false, '');
//$pdf->writeHTML($header . $tbl_header . $tbl . $tbl2 . $tbl_footer . $tbl_header1 . $tbl1 . $tbl21 . $tbl_footer1 . $footer, true, false, false, false, '');
//exit;
$pdf->setPage(1, true);
$pdf->setPage(2, true);
$pdf->Output('Usage Details '.$summary['upload_date'].'.pdf', 'I');
}

?>