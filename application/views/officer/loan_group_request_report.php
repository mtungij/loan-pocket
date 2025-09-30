
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> | LOAN DISBURSEMENT REQUEST REPORT(groups)</title>
</head>
<body>

<div id="container">
  <div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
 </div>
  <style>
    .pull{
    text-align: center;
    /*margin-top: 100px;
    margin-bottom: 0px;
    margin-right: 150px;
    margin-left: 80px;*/

    }
  </style>
  <style>
    .display{
      display: flex;
      
    }
  </style>

     <style>
             .c {
               text-transform: uppercase;
               }
                
                </style>

           <table  style="border: none">
      <tr style="border: none">
        <td style="border: none">
          

 <div style="width: 20%;">
  <img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
  </div> 

        </td>
        <td style="border: none">
      <div class="pull">
  <p style="font-size:20px;" class="c"> <b><?php echo $compdata->comp_name; ?></b><br>
        <?php echo $compdata->adress; ?> <br>
        <?php $day = date("d-m-Y"); ?>
        </p>
         <p style="font-size:15px;text-align:center;"><b><?php echo $blanch_data->blanch_name; ?> - LOAN DISBURSEMENT REQUEST REPORT</b>(<i>Groups</i>) / <?php echo $day; ?></p>

  </div>
        </td>
      </tr>
    </table>

     
 
  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: ;
}

</style>
</head>
<body>

  <hr>

<table>
  <tr>
    <th style="font-size:12px;border: none;">Group Name</th>
    <th style="font-size:12px;border: none;">S/No.</th>
    <th style="font-size:12px;border: none;">Loan Account</th>
    <th style="font-size:12px;border: none;">Customer Name</th>
    <th style="font-size:12px;border: none;">Phone Number</th>
    <th style="font-size:12px;border: none;">Loan Amount</th>
    <th style="font-size:12px;border: none;">Loan Duration</th>
    <th style="font-size:12px;border: none;">Number of Repayments</th>
    <th style="font-size:12px;border: none;">Date</th>
  </tr>
    <?php foreach ($group_loan as $group_loans): ?>
  <tr>
    <th style="font-size:12px;border: none;"><?php echo $group_loans->group_name ?></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
    <th style="font-size:12px;border: none;"></th>
  </tr>

  <?php $group_loan = $this->queries->get_loanPendingBlanch_group($group_loans->group_id); ?>    
           <?php $no = 1; ?>
  <?php foreach ($group_loan as $repayments): ?>
 <tr>
    <td style="font-size:12px;border: none;" class="c"></td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $no++; ?>.</td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $repayments->loan_code; ?>
      </td>
    <td style="font-size:12px;border: none;" class="c">
      <?php echo $repayments->f_name; ?> <?php echo $repayments->m_name; ?> <?php echo $repayments->l_name; ?>
        
      </td>
    <td style="font-size:12px;border: none;" class="c"><?php echo $repayments->phone_no; ?></td>
    <td style="font-size:12px;border: none;"><?php echo number_format($repayments->how_loan); ?></td>
    <td style="font-size:12px;border: none;">
      <?php if ($repayments->day == 1) {
                           echo "Daily";
                         ?>
                        <?php }elseif($repayments->day == 7){
                                echo "Weekly";
                         ?>
                        
                      <?php }elseif($repayments->day == 30 || $repayments->day == 31 || $repayments->day == 29 || $repayments->day == 28){
                              echo "Monthly"; 
                        ?>
                        <?php } ?></td>
    <td style="font-size:12px;border: none;">
      <?php echo $repayments->session; ?>
    </td>
    <td style="font-size:12px;border: none;"><?php echo substr($repayments->loan_day, 0,10); ?></td>
   
  </tr>
 <?php endforeach; ?>
 <?php endforeach; ?>
 <tr>
   <td style="font-size:12px;border: none;" class="c"><b>Total:</b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_loan->loan_interest); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_allblanch->total_depost); ?></b></td>
   <td style="font-size:12px;border: none;" class="c"><b><?php //echo number_format($total_loanAprove->aprovedLoan); ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php //echo number_format($total_request->total_loan_request); ?></b></td>
   <td style="font-size:12px;border: none;"><b><?php echo number_format($total_loan_group->total_loan_request_group); ?></b></td>
   <td style="font-size:12px;border: none;"></td>
   <td style="font-size:12px;border: none;"></td>
 </tr>

</table>
  </div>

</div>

</body>
</html>




