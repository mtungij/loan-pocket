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
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Expenses
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_expenses",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<!-- <label class="form-control-label">* Branch name:</label>
									<input type="text" placeholder="Blanch name" class="form-control" name="blanch_name" required autocomplete="off"> -->
								</div>
								<div class="col-lg-5 form-group-sub">
									<label class="form-control-label">*Expenses</label>
									<input type="text" name="ex_name" autocomplete="off" class="form-control">
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
								<div class="col-lg-4 form-group-sub">
								<!-- 	<label  class="form-control-label">* Branch Phone Number:</label>
									<input type="number" required class="form-control" placeholder="Blanch phone number" name="blanch_no" placeholder="" value=""> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>



<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Expenses List
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  						
												<th>Expenses</th>
												<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                        <?php //$no = 1; ?>
									<?php foreach ($exp as $exps): ?>
									          <tr>
				  			 <td><?php echo $exps->ex_name; ?></td> 
				  					
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $exps->ex_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/delete_expenses/{$exps->ex_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $exps->ex_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Expenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/modify_expences/{$exps->ex_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Expenses:</label>
                        <input type="text" class="form-control" autocomplete="off" name="ex_name" value="<?php echo $exps->ex_name; ?>">
                       	
                        
                    </div>
                   
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
					<th>Expenses</th>
					<th>Action</th>
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