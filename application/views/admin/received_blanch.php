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
				Today Received (<?php echo $blanch->blanch_name; ?>)
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("admin/view_blanchPanel/{$blanch->blanch_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-back-1"></i>
			Back
		</a>
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
										<th><b>Phone Number</b></th>
										<th><b>Duration Type</b></th>
										<th><b>Loan Amount</b></th>
										<th><b>Received Amount</b></th>
										<th><b>Depost Method</b></th>
										<th><b>Date</b></th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        
									<?php foreach($received as $today_recevables): ?>
									          <tr>
				  					<td><?php echo $today_recevables->f_name; ?> <?php echo $today_recevables->m_name; ?> <?php echo $today_recevables->l_name; ?></td>
				  					<td><?php echo $today_recevables->blanch_name; ?></td>
				  					<td><?php echo $today_recevables->phone_no; ?></td>
				  					
				  					<td><?php if ($today_recevables->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($today_recevables->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($today_recevables->day == 30){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?></td>
				  					<td><?php echo number_format($today_recevables->loan_int); ?></td>
				  					<td><?php echo number_format($today_recevables->depost); ?></td>
				  					<td><?php echo $today_recevables->depost_method; ?></td>
				  					<td>
				  					 <?php echo $today_recevables->depost_day; ?>			
				  					</td>
				  											  							
                                   </tr>

                       <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b><?php echo number_format($total_receved->total_depost); ?></b></th>
										<th></th>
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


		