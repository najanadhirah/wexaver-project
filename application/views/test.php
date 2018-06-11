 <p> To : <?php echo $user['name'] ?> <br> Month : <?php echo $summary['upload_date']?></p>
  <table width="100%">
      <tr >
        <td  width="25%">WeXaver Member No. : </td>
        <td  width="25%"><?php echo $user["w_id"] ?></td>
        <td  align="right" width="25%">Period : </td>
        <td  width="25%"><?php echo $summary["upload_date"] ?></td>
      </tr> 
    </table >
  <p>Hi WeXaver Member,</p>
    <p>Welcome to WeXaver. Many thanks for becoming WeXaver member.</p>
    <p>Kindly find attached details of your WeXaver membership for period {$summary['upload_date']}.</p>
    <p>If you have any issues or queries, kindly contact WeXaver CareLine at <b>013-2755 329 </b>working days from 10am till 6pm) or e-mail us at <a href="mailto:welcome@wexaver.com">welcome@wexaver.com</a>.</p>

 <p>Your usage cashback amount for period '.$summary["upload_date"].' have been credited to your fuel card on 1st April 2018.</br> <p>Your promotion bonus cashback amount for period '.$summary["upload_date"].' will be credited to your fuel card by 10th April 2018.</p>Many thanks for your continuous support to WeXaver.</p>
                <p>Kind Regards, <br><b>WeXaver - Smart Saver </b>
