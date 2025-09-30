<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>


                   <style>
                	    .c {
               text-transform: uppercase;
                 }
                
                </style>	


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
				Loan Collections statement <b>(<?php echo $data_blanch->blanch_name; ?>)</b>
			</h3>
			
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">
		  <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		  <?php if (count($data_collection) == 0) {
		   ?>
		<?php }else{ ?>
		<a href="<?php echo base_url("admin/print_loanCollection_blanch/{$blanch_id}/{$loan_status}/{$comp_id}"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
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
				  							    <th>S/No.</th>
												<th>Customer Name</th>
												<th>Employee</th>
												<th>Loan Amount</th>
												<th>Collection</th>
												<th>Paid Amount</th>
												<th>Remain Amount</th>
												<th>Penart Amount</th>
												<th>End Date</th>
												<th>Status</th>
												<!-- <th>Action</th> -->
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($data_collection as $loan_collections): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td class="c">
				  					   <?php echo $loan_collections->f_name; ?> <?php echo $loan_collections->m_name; ?> <?php echo $loan_collections->l_name; ?>
				  					</td>
				  					<td class="c">
				  						<?php if ($loan_collections->username == TRUE) {
				  						 ?>
				  					   <?php echo $loan_collections->username; ?> 
				  					<?php }else{ ?>
				  						Admin
				  						<?php } ?>
				  					</td>
				  					<td>
				  						<?php echo number_format($loan_collections->loan_int); ?>
				  					</td>
				  					<td><?php echo number_format($loan_collections->restration); ?></td> 
				  					<td><?php echo number_format($loan_collections->total_depost); ?></td> 
				  					<td>
				  						<?php if ($loan_collections->total_depost > $loan_collections->loan_int) {
				  						 ?>
				  						 0
				  						<?php }else{ ?>
				  						<?php echo number_format($loan_collections->loan_int - $loan_collections->total_depost); ?>
				  						<?php } ?>
				  						</td> 
				  					<td>
				  						<?php if ($loan_collections->penart_paid >$loan_collections->total_penart_amount ){
				  						 ?>
				  						 0
				  						<?php }else{ ?>
				  						<?php echo number_format($loan_collections->total_penart_amount - $loan_collections->penart_paid); ?>
				  							<?php } ?>
				  						</td> 
				  					<td><?php echo substr($loan_collections->loan_end_date, 0,10); ?></td> 
				  					<td>
				  						<?php if ($loan_collections->loan_status == 'open') {
				  						 ?>
				  						<a href="javascript:;" class="badge badge-warning">Pending</a>
				  						<?php }elseif($loan_collections->loan_status == 'aproved'){ ?>
                                          <a href="javascript:;" class="badge badge-info">Aproved</a>
				  							<?php }elseif($loan_collections->loan_status == 'withdrawal'){ ?>
                                             <a href="javascript:;" class="badge badge-primary">Active</a>
				  								<?php }elseif($loan_collections->loan_status == 'done'){ ?>
				  								<a href="javascript:;" class="badge badge-success">Done</a>
				  									<?php }elseif ($loan_collections->loan_status == 'out') { ?>
				  							<a href="javascript:;" class="badge badge-danger">Default</a>
				  										
				  									<?php }elseif($loan_collections->loan_status == 'disbarsed'){ ?> 
				  								<a href="javascript:;" class="badge badge-secondary">Disbursed</a>
				  										<?php } ?>
				  							
				  						</td> 	  											  							
                                   </tr>
  
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<th><?php //echo number_format($total_loan->cash_depost); ?></th>
					<th><?php //echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
					<th><?php echo number_format($total_loans->total_loan); ?></th>
					<th></th>
					<th>
						<?php if ($loan_paid->total_loan_depost >$total_loans->total_loan) {
						 ?>
						<?php echo $total_loans->total_loan; ?> <b style="color:red;">(<?php echo $loan_paid->total_loan_depost - $total_loans->total_loan ?>)</b>
						 <?php }else{ ?>

						<?php echo number_format($loan_paid->total_loan_depost); ?>
						<?php } ?>
						
					</th>
					<th>
						<?php if ($loan_paid->total_loan_depost > $total_loans->total_loan) {
						 ?>
						 0 <b style="color:red">(<?php echo $loan_paid->total_loan_depost - $total_loans->total_loan ?>)</b>
						<?php }else{ ?>
						<?php echo number_format($total_loans->total_loan - $loan_paid->total_loan_depost); ?>
							<?php } ?>
						</th>
					
					<th>
						<?php if ($paid_penart->total_penart_paid > $penart_amounts->penart_amount) {
						 ?>
						0 <b style="color:red;">(<?php echo $paid_penart->total_penart_paid - $penart_amounts->penart_amount; ?>)</b>
						<?php }else{ ?>
						<?php echo number_format($penart_amounts->penart_amount - $paid_penart->total_penart_paid); ?>
							<?php } ?>
						</th>
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



<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Loan Collections By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/search_loanSatatus"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                               
                        </div>
                          <div class="col-lg-6">
                          <label class="form-control-label">*Select Loan Status:</label>
                            <select class="form-control kt-selectpicker" name="loan_status" required data-live-search="true">
                               <option value="">Select Loan Status</option> 
                                <option value="open">PENDING</option>
                                <option value="aproved">APROVED</option>
                                <option value="disbarsed">DISBURSED</option>
                                <option value="withdrawal">ACTIVE</option>
                                <option value="done">DONE</option>
                                <option value="out">DEFALT</option>
                                </select>

                          <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">   
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


<!--end::Modal-->