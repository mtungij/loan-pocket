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
	<?php echo form_open("admin/previous_income"); ?>
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Previous Income List
			</h3>
      &nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<label>From:</label>
				<input type="date" name="from" class="form-control">
			</h3>
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<label>To:</label>
				<input type="date" name="to" class="form-control">
				<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
			</h3>
			&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<label>Branch:</label>
				<select type="number" class="form-control kt-selectpicker" name="blanch_id" data-live-search="true">
					<option value="">Select Branch</option>
					 <?php foreach ($blanch as $blanchs): ?>
					<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
					<?php endforeach; ?>
				</select>
				
			</h3>
			<h3 class="kt-portlet__head-title">
				<br>
				<button type="submit" class="btn btn-brand">Get Data</button>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		  <?php if (count($data)== 0) {
		   ?>
		<?php }else{ ?>
		<a href="<?php echo base_url("admin/print_previous_report/{$from}/{$to}/{$comp_id}/{$blanch_id}"); ?>" target="_blank" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-technology"></i>
			Print
		</a>
		<?php } ?>

		<a href="<?php echo base_url("admin/all_previous_income"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-calendar-3"></i>
			All Branch
		</a>

		<a href="<?php echo base_url("admin/income_dashboard"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon2-back-1"></i>
			Back
		</a>
	</div>	
</div>		</div>
	</div>
	<?php echo form_close(); ?>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Customer Name</th>
												<th>Branch Name</th>
												<th>Incomes Type</th>
												<th>Income Amount</th>
												<th>User Employee</th>
												<th>Date</th>
												<!-- <th>Action</th> -->
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
							<?php foreach ($data as $detail_incomes): ?>
									          <tr>
				  			 <td><?php echo $detail_incomes->f_name; ?> <?php echo $detail_incomes->m_name; ?> <?php echo $detail_incomes->l_name; ?></td> 
				  			 <td><?php echo $detail_incomes->blanch_name; ?></td>
				  			 <td><?php echo $detail_incomes->inc_name; ?></td> 
				  			 <td><?php echo number_format($detail_incomes->receve_amount); ?></td> 
				  			  
				  			 
				  			 <td><?php echo $detail_incomes->empl; ?></td> 
				  			 <td><?php echo $detail_incomes->receve_day; ?></td>			  							
                       </tr>

                    <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
					<th>TOTAL</th>
					<th></th>
					<th></th>
					<th><?php echo number_format($sum_income->total_receved); ?></th>
					<th></th>
					<th></th>
					<!-- <th></th> -->
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