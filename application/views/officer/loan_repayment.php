<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
	


<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">					
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   
</div>
<!-- end:: Subheader -->										
<!-- begin:: Content -->
<!-- begin:: Content -->


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--begin::Portlet-->
	<?php if ($das = $this->session->flashdata('massage')): ?>
	  <div class="alert alert-success fade show alert-success" role="alert">
                            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Repayments
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<!-- <a href="<?php //echo base_url("oficer/previour_repayment"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-event-calendar-symbol"></i>
			Previous
		</a> -->
		<?php if ($manager->position_id == '21') {
		 ?>
		<a href="<?php echo base_url("oficer/manager_print_repayment_report"); ?>" target="_blank" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-technology"></i>
			Print
		</a>
	<?php }else{ ?>
		<a href="<?php echo base_url("oficer/print_repayment_report"); ?>" target="_blank" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php } ?>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							   <th><b>Customer Name</b></th>
										<th><b>Branch Name</b></th>
										<th><b>Loan Ac</b></th>
										<th><b>Principal</b></th>
										<th><b>Interest Amount</b></th>
										<th><b>Principal + Interest</b></th>
										<th><b>Loan Duration</b></th>
										<th><b>Number Of Repayment</b></th>
										<!-- <th><b>Joining date</b></th> -->
										<th><b>Disbursed Date</b></th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($repayment as $repayments): ?>
									          <tr>
				  					<td><?php echo $repayments->f_name; ?> <?php echo $repayments->m_name; ?> <?php echo $repayments->l_name; ?></td>
				  					<td><?php echo $repayments->blanch_name; ?></td>
				  					<td><?php echo $repayments->loan_code; ?></td>
				  					<td><?php echo number_format($repayments->loan_aprove); ?></td>
				  					<td><?php echo number_format($repayments->loan_int - $repayments->loan_aprove); ?></td>
				  					<td><?php echo number_format($repayments->loan_int); ?></td>
				  					<td><?php if ($repayments->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($repayments->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($repayments->day == 30){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo $repayments->session ?></td>
				  			<!-- 		<td>
				  			<?php //echo substr($repayments->customer_day, 0,10); ?>
				  					</td> -->
				  	
				  						<td>
				 <?php echo substr($repayments->loan_day, 0,10); ?>
				                        </td>
				                       
				  											  							
                                   </tr>

                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b><?php echo number_format($total_loanAprove->aprovedLoan); ?></b></th>
										<th><b><?php echo number_format($total_loan_int->loan_interestData - $total_loanAprove->aprovedLoan) ?></b></th>
										<th><b><?php echo number_format($total_loan_int->loan_interestData); ?></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<!-- <th><b></b></th> -->
										<th><b></b></th>
									
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>