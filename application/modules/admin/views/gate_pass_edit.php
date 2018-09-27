
<div class="">

	  <div class="page-title">
		<div class="title_left">
		  <h3>Edit Gate Pass</h3>
		</div>
		
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="x_panel">
			
			<div class="x_content">
			  <br />
			  <form  class="form-horizontal form-label-left" method="post" action="<?php echo base_url('admin/gate_pass_edit/'.$gate_pass->id); ?>" >
				
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">Slip Numbar <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="serial_no" name="serial_no" value="<?php echo $gate_pass->serial_no; ?>" autocomplete="off" class="form-control col-md-7 col-xs-12 <?php if(form_error('serial_no')){ echo "parsley-error"; } ?>" required="required" type="number">
					<span style="color:red;"> <?php echo form_error('serial_no'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="date" name="date" value="<?php echo $gate_pass->date; ?>" autocomplete="off" readonly class="date-picker form-control col-md-7 col-xs-12 <?php if(form_error('date')){ echo "parsley-error"; } ?>" required="required" type="text">
					<span style="color:red;"> <?php echo form_error('date'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">In Time <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="in_time" name="in_time" value="<?php echo $gate_pass->in_time; ?>" autocomplete="off" readonly class="date-picker form-control col-md-7 col-xs-12 <?php if(form_error('in_time')){ echo "parsley-error"; } ?>" required="required" type="text">
					<span style="color:red;"> <?php echo form_error('in_time'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">Out Time <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="out_time" name="out_time" value="<?php echo $gate_pass->out_time; ?>" autocomplete="off" readonly class="date-picker form-control col-md-7 col-xs-12 <?php if(form_error('out_time')){ echo "parsley-error"; } ?>" required="required" type="text">
					<span style="color:red;"> <?php echo form_error('out_time'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Select Client <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					 <select class="select2_single form-control <?php if(form_error('client_id')){ echo "parsley-error"; } ?>" id="client_id" name="client_id" >
                            <option value="">Select Client </option>
							<?php if(count($clients)>0){ ?>
							<?php for($i=0;$i<count($clients);$i++){ ?>
							<option value="<?php echo $clients[$i]->client_id; ?>" <?php if($gate_pass->client_id==$clients[$i]->client_id){ echo 'selected';} ?> ><?php echo $clients[$i]->client_name; ?></option>
							<?php } ?>					 
							<?php } ?>
                    </select>
					<span style="color:red;"> <?php echo form_error('client_id'); ?></span>
				  </div>				  
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Vehicle <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<select class="select2_single form-control <?php if(form_error('vehicle_id')){ echo "parsley-error"; } ?>" id="vehicle_id" name="vehicle_id" tabindex="-1">
                            <option value="">Select Vehicle </option>
							<?php if(count($vehicles)>0){ ?>
							<?php for($i=0;$i<count($vehicles);$i++){ ?>
							<option value="<?php echo $vehicles[$i]->vehicle_id; ?>" <?php if($gate_pass->vehicle_id==$vehicles[$i]->vehicle_id){ echo 'selected';} ?> ><?php echo $vehicles[$i]->vehicle_no; ?></option>
							<?php } ?>					 
							<?php } ?>
                    </select>
					<span style="color:red;"> <?php echo form_error('vehicle_id'); ?></span>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Material <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<select class="select2_single form-control <?php if(form_error('material_id')){ echo "parsley-error"; } ?>" id="material_id" name="material_id" tabindex="-1">
                            <option value="">Select Material </option>
							<?php if(count($materials)>0){ ?>
							<?php for($i=0;$i<count($materials);$i++){ ?>
							<option value="<?php echo $materials[$i]->material_id; ?>" <?php if($gate_pass->material_id==$materials[$i]->material_id){ echo 'selected';} ?> ><?php echo $materials[$i]->material_name; ?></option>
							<?php } ?>					 
							<?php } ?>
                    </select>
					<span style="color:red;"> <?php echo form_error('material_id'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="quantity" name="quantity" value="<?php echo $gate_pass->quantity; ?>" autocomplete="off" class="form-control col-md-7 col-xs-12 <?php if(form_error('quantity')){ echo "parsley-error"; } ?>"  type="number">
					<span style="color:red;"> <?php echo form_error('quantity'); ?></span>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Type <span class="required">*</span>
				  </label>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					<input id="qtype" name="qtype" value="Meter" autocomplete="off" class="form-control col-md-7 col-xs-12 <?php if(form_error('qtype')){ echo "parsley-error"; } ?>" readonly type="text">
					<span style="color:red;"> <?php echo form_error('qtype'); ?></span>
				  </div>
				</div>
				
				<div class="ln_solid"></div>
				<div class="form-group">
				  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">				
					<button type="submit" class="btn btn-success">Update</button>
				  </div>
				</div>

			  </form>
			</div>
		  </div>
		</div>
	  </div>
		  
</div>
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>
  <!-- tags -->
  <script src="<?php echo base_url(); ?>js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="<?php echo base_url(); ?>js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="<?php echo base_url(); ?>js/editor/bootstrap-wysiwyg.js"></script>
  <script src="<?php echo base_url(); ?>js/editor/external/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url(); ?>js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="<?php echo base_url(); ?>js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="<?php echo base_url(); ?>js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/autocomplete/countries.js"></script>
  <script src="<?php echo base_url(); ?>js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url(); ?>js/pace/pace.min.js"></script>
  
  <script src="<?php echo base_url(); ?>js/custom.js"></script>
  <!-- select2 -->
  <link href="<?php echo base_url(); ?>css/select/select2.min.css" rel="stylesheet">
  <!-- select2 -->
  <script src="<?php echo base_url(); ?>js/select/select2.full.js"></script>
  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({       
        allowClear: false
      });
	  
	   $("#client_id").change(function(){
        var client_id = $("#client_id option:selected").val();        
        $.ajax({
            type: "POST",
			url : '<?php echo site_url();?>admin/getvehicle',
            data: { client_id : client_id } 
        }).done(function(data){
            $("#vehicle_id").html(data);
        });
        
    });
     
    });
  </script>
  
  <!-- /select2 -->
   <script type="text/javascript">
	$(document).ready(function() {
	  $('#date').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_2",
		showDropdowns: true,
		format: 'YYYY-MM-DD',
	  },
	  function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	  });
	  
	  $('#in_time').daterangepicker({
            timePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,          
			singleDatePicker: true,			
            format: 'HH:mm A'
        }).on('show.daterangepicker', function (ev, picker) {
			
			picker.container.addClass('newtclass');
            picker.container.find("table.table-condensed").hide();
        });
	  
	   $('#out_time').daterangepicker({
            timePicker: true,
            timePicker24Hour: false,
            timePickerIncrement: 1,          
			singleDatePicker: true,
				
            format: 'HH:mm A'
        }).on('show.daterangepicker', function (ev, picker) {
			picker.container.addClass('newtclass');
            picker.container.find("table.table-condensed").hide();
        });
	  
	});
  </script>
  
  <style>
  .newtclass table.table-condensed{
	  display:none;
  }
  </style>
