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
				Expected Receivable 
			
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
		
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
										<th><b>Receivable Amount</b></th>
										<th><b>Employee</b></th>
										<th><b>Date</b></th>	
				  						         </tr>
						                  </thead>
										    <tbody>
                                        
									<?php //foreach($data_expected as $today_recevables): ?>
									          <tr>
				  					<td><?php //echo $today_recevables->f_name; ?> <?php //echo $today_recevables->m_name; ?> <?php //echo $today_recevables->l_name; ?></td>
				  					<td><?php //echo $today_recevables->blanch_name; ?></td>
				  					<td><?php //echo $today_recevables->phone_no; ?></td>
				  					
				  					<td></td>
				  					<td><?php //echo number_format($today_recevables->loan_int); ?></td>
				  					<td><?php //echo number_format($today_recevables->restration); ?></td>
				  					<td><?php //echo $today_recevables->empl_name; ?></td>
				  					<td>
				  					 <?php //echo $today_recevables->date_show; ?>			
				  					</td>
				  											  							
                                   </tr>

                       <?php //endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                                       <th><b>TOTAL</b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b></b></th>
										<th><b><?php //echo number_format($sum_expectation->total_expectation); ?></b></th>
										<th><b></b></th>
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

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter By Next Expectation Receivable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/next_expectation_report"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Select Branch:</label>
                            <select class="form-control kt-selectpicker" name="blanch_id" required data-live-search="true">
                                   <option value="">Select Branch</option>
                                    <?php foreach ($blanch as $branchs): ?>
                                <option value="<?php echo $branchs->blanch_id; ?>"><?php echo $branchs->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                    <option value="all">ALL</option>
                                </select>
                               
                        </div>
                         <div class="col-lg-6">
                         	<?php $date = date("Y-m-d"); ?>
                            <label class="form-control-label">*From:</label>
                            <input type="date" name="from" value="<?php echo $date; ?>" class="form-control" required>  
                        </div>
                          <div class="col-lg-6">
                            <label class="form-control-label">*To:</label>
                            <input type="date" name="to" value="<?php echo $date; ?>" class="form-control" required>  
                        </div>
                    </div>  
                 </div>
                
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


		