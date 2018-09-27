<!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/icheck/flat/green.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
  
<div class="">

	  <div class="page-title">
		<div class="title_left">
		  <h3>Ganerate Bill</h3>
		</div>
		
	  </div>
	  <div class="clearfix"></div>
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="x_panel">
	  <div class="x_content">
			 
			  <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url('admin/ganerate_bill'); ?>" >
				
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">From Date <span class="required"></span>
				  </label>
				  <div class="col-md-9 col-sm-9 col-xs-12">
					<input id="from_date" name="from_date" value="<?php echo $from_date; ?>" autocomplete="off" readonly class="date-picker form-control col-md-7 col-xs-12 " type="text">					
				  </div>
				</div>
				
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12">To Date <span class="required"></span>
				  </label>
				  <div class="col-md-9 col-sm-9 col-xs-12">
					<input id="to_date" name="to_date" value="<?php echo $to_date; ?>" autocomplete="off" readonly class="date-picker form-control col-md-7 col-xs-12 " type="text">					
				  </div>
				</div>
				
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Select Client <span class="required"></span>
				  </label>
				  <div class="col-md-9 col-sm-9 col-xs-12">
					 <select class="select2_single form-control" id="client_id" name="client_id" tabindex="-1">
                            <option value="">Select Client </option>
							<?php if(count($clients)>0){ ?>
							<?php for($i=0;$i<count($clients);$i++){ ?>
							<option value="<?php echo $clients[$i]->client_id; ?>" <?php if($client_id ==$clients[$i]->client_id){ echo 'selected';} ?> ><?php echo $clients[$i]->client_name; ?></option>
							<?php } ?>					 
							<?php } ?>
                    </select>
				  </div>				  
				</div>
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Select Material <span class="required"></span>
				  </label>
				  <div class="col-md-9 col-sm-9 col-xs-12">
					<select class="select2_single form-control" id="material_id" name="material_id" tabindex="-1">
                            <option value="">Select Material </option>
							<?php if(count($materials)>0){ ?>
							<?php for($i=0;$i<count($materials);$i++){ ?>
							<option value="<?php echo $materials[$i]->material_id; ?>" <?php if($material_id==$materials[$i]->material_id){ echo 'selected';} ?> ><?php echo $materials[$i]->material_name; ?></option>
							<?php } ?>					 
							<?php } ?>
                    </select>
				  </div>
				</div>
				
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">				
					<button type="submit" class="btn btn-success">Ganerate Bill</button>
					<a href="" class="btn btn-primary">Reset</a>
				  </div>
				</div>

			  </form>
			</div>
		</div>
		</div>
		</div>
	  <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="x_panel">
			  <?php if(count($bills)>0 && $client_id!=''){ ?>
			 <form  onsubmit="return fullValidateForm();" class="form-horizontal form-label-left" method="post" action="<?php echo base_url('admin/ganerate_bill_update'); ?>" >
				
				<input type="hidden" name="from_date" value="<?php echo $from_date; ?>">
				<input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
				<input type="hidden" name="client_id" value="<?php echo $client_id; ?>">				
				<input type="hidden" name="material_id" value="<?php echo $material_id; ?>">
				
			 <div class="x_content">
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
							<i class="fa fa-globe"></i> Invoice.
							<small class="pull-right">Date: <?php echo date('d-m-Y'); ?></small>
						</h1>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        From
                        <address>
							<strong>JhuleLal</strong>
							<br>Sonaguraaddi
							<br>Indore MP
						  <!--  <br>Phone: 0731 -12345
							<br>Email: jhoolelal@test.com -->
						</address>
                      </div>
                      <!-- /.col -->
					  <?php 
					  $client_data = $this->common_model->getsingle('clients',array('client_id'=>$client_id));
					  ?>
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
							<strong><?php echo $client_data->client_name; ?></strong>
							<br><?php echo $client_data->address; ?>                                       
							<br>Phone: <?php echo $client_data->mobile_no; ?>
						   <!-- <br>Email: xxxxxx -->
						</address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
						<?php 
						$this->db->select_max('invoice_no');
						$invoice_data1 = $this->db->get('bills');
						$invoice_data = $invoice_data1->row();
						if($invoice_data->invoice_no > 0)
						{
							$invoice_no = $invoice_data->invoice_no + 1;
						}else{
							$invoice_no = '10001';
						}
						?>
                        <b>Invoice #<?php echo $invoice_no; ?></b>
						<input type="hidden" name="invoice_no" value="<?php echo $invoice_no; ?>">
                       <!-- <br>
                        <br>
                        <b>Order ID:</b> 4F3S8J
                        <br>
                        <b>Payment Due:</b> 2/22/2014
                        <br>
                        <b>Account:</b> 968-34567 -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
					  
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>Date</th> 
								<th>Slip Number</th>
								<th>Vehicle Number</th>
								<?php if(count($billsh)>0){ ?>
								<?php for($i=0;$i<count($billsh);$i++){ $tot[$billsh[$i]->material_id] ='0';?>
								<th><?php echo $billsh[$i]->material_name; ?></th>								
								 <?php } } ?>														                     
								<th style="text-align:right;">Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if(count($bills)>0){ $subtotal =0; ?>
							  <?php for($i=0;$i<count($bills);$i++){
								$subtotal = $subtotal + $bills[$i]->amount;
							  ?>
							  <tr> 
								<td><?php echo date('d-m-Y',strtotime($bills[$i]->date)); ?></td>
								<td><?php echo $bills[$i]->serial_no; ?></td>
								<td><?php echo $bills[$i]->vehicle_no; ?></td>
								<?php for($j=0;$j<count($billsh);$j++){ ?>
								<td><?php if($billsh[$j]->material_id== $bills[$i]->material_id){ $tot[$billsh[$j]->material_id] = $tot[$billsh[$j]->material_id] + $bills[$i]->quantity; echo $bills[$i]->quantity; } ?></td>								
								 <?php } ?>															
								<td style="text-align:right;"><?php echo $bills[$i]->amount; ?></td>                        
							  </tr>
							  <?php } ?>
							  <tr>
								<td colspan="3" style="text-align:right; font-weight: bold;" >SubTotal</td>	
								<?php for($j=0;$j<count($billsh);$j++){ ?>	
								<td><span style="font-weight: bold;"><?php echo $tot[$billsh[$j]->material_id]; ?> </span> <span style="font-size: 10px;"> Meter</span></td>									
								 <?php } ?>	
								<td style="text-align:right; font-weight: bold;" id="bill_amountf"><?php echo $subtotal; ?></td> 
								<input type="hidden" name="bill_amount" id="bill_amountv" value="<?php echo $subtotal; ?>">
							  </tr>
							  <?php
							  $client_due = $this->common_model->getsingle('dues',array('client_id'=>$client_id));
							  if($client_due && $client_due > 0)
							  { ?>
								<tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Old Due</td>									
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;"><?php echo $client_due->due_amount; ?></td>
									<input type="hidden" name="due_amount" id="due_amount" value="<?php echo $client_due->due_amount; ?>">
								  </tr>  
							  <?php } ?>
							   <tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Tax ( % )</td>						
									<td > <input placeholder="Enter Tax Percent" type="text" autocomplete="off" name="tax_value" class="form-control col-md-3 col-xs-12" onkeyup="tax_calculate(this.value);" onblur="tax_calculate(this.value);">  <p id="tax_value_error" style="color:red;"></p></td>											
									<td colspan="<?php echo count($billsh); ?>" style="text-align:right; font-weight: bold;" id="tax_amountf"></td> 
									<input type="hidden" name="tax_amount" id="tax_amountv" value="">
								  </tr> 
								<tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Total Amount</td>						
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="total_amountf"><?php echo $subtotal + $client_due->due_amount; ?></td> 
									<input type="hidden" name="total_amount" id="total_amountv" value="<?php echo $subtotal + $client_due->due_amount; ?>">
							  </tr>
							  <tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Diposit Amount</td>						
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" >
										<input type="text" placeholder="Enter Deposit Amount" autocomplete="off" name="diposit_amount" class="form-control col-md-3 col-xs-12" id="diposit_amount" onkeyup="amount_calculate(this.value);" onblur="amount_calculate(this.value);" value="">
										<p id="diposit_amount_error" style="color:red;"></p>
									</td> 									
							  </tr>
							   <tr id="due_div" style="display:none">
								<td colspan="3" style="text-align:right; font-weight: bold;" >Due Balance</td>						
								<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="duef"></td> 
								<input type="hidden" name="due" id="duev" value="">
							  </tr>
							  <?php } ?>                           
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->                 

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">                       
                        <button type="submit" class="btn btn-success pull-right"> Submit Record</button>                       
                      </div>
                    </div>
                  </section>
                </div>
				</form>
			  <?php }else{ ?>
			   <?php if($client_id!=''){ ?>
			 <h3> No Record Found</h3>
			  <?php } } ?>
				
		  </div>
		</div>
	  </div>
		  
</div>

  <!-- select2 -->
  <link href="<?php echo base_url(); ?>css/select/select2.min.css" rel="stylesheet">
  <!-- select2 -->
  <script src="<?php echo base_url(); ?>js/select/select2.full.js"></script>
  
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
  
  <script>
  
  function tax_calculate(value){
	  $("#tax_value_error").html("");   
		var bill_amountv 	= $("#bill_amountv").val();
		var due_amount 		= "<?php echo $client_due->due_amount; ?>";
		var tax_amountv 	= $("#tax_amountv").val();
		var tax_amountf 	= $("#tax_amountf").val();
		var total_amountf 	= $("#total_amountf").val();
		var total_amountv 	= $("#total_amountv").val();
	if(value.match(/^\d+$/)) {
		
		var finaamt = (value*bill_amountv)/100;
		if(due_amount=='')
		{
			var totalamt = parseInt(finaamt) + parseInt(bill_amountv);
		}else{
			var totalamt = parseInt(finaamt) + parseInt(bill_amountv) + parseInt(due_amount);
		}
		$("#tax_amountf").html(finaamt);
		$("#tax_amountv").val(finaamt);
		$("#total_amountf").html(totalamt);
		$("#total_amountv").val(totalamt);
	}
	else
	{
		if(due_amount=='')
		{
			var totalamt = parseInt(bill_amountv);
		}else{
			var totalamt =parseInt(bill_amountv) + parseInt(due_amount);
		}
		$("#tax_amountf").html('');
		$("#tax_amountv").val('');
		$("#total_amountf").html(totalamt);
		$("#total_amountv").val(totalamt);
		$("#tax_value_error").html("Enter Only Number!");
	}

}
  function amount_calculate(value)
  {
	 $("#diposit_amount_error").html("");
	 var totalamt = $("#total_amountv").val();
	  if(value.match(/^\d+$/)) {
		if(parseInt(value) > parseInt(totalamt))
		{
			$("#diposit_amount").val(totalamt);
			$("#diposit_amount_error").html("Yout Bill Amount Only "+totalamt+" Not Enter Grater Amount");
		}else{
			$("#diposit_amount_error").html("");
		}
	  }else{
		$("#diposit_amount_error").html("Enter Only Number!");
	  }
	if(parseInt(value) < parseInt(totalamt))
	{
		$("#due_div").show();
		var due = parseInt(totalamt) - parseInt(value);
		$("#duef").html(due);
		$("#duev").val(due);
	}else{
		$("#due_div").hide();		
		$("#duef").html("");
		$("#duev").val("");
	}
  }
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
	
	$('#from_date').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_2",
		showDropdowns: true,
		format: 'YYYY-MM-DD',
	  },
	  function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	  });
	  
	  $('#to_date').daterangepicker({
		singleDatePicker: true,
		calender_style: "picker_2",
		showDropdowns: true,
		format: 'YYYY-MM-DD',
	  },
	  function(start, end, label) {
		console.log(start.toISOString(), end.toISOString(), label);
	  });
	  
     
    });
  </script>
 <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>

        <script src="<?php echo base_url(); ?>js/custom.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <!-- Datatables-->
        <script src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
		function fullValidateForm(){
		
		var diposit_amount = jQuery("#diposit_amount").val();
	    
		if(diposit_amount=='')
		{
			jQuery(".submitbtnerror").remove();
			jQuery("#diposit_amount_error").html("Please Enter Deposit Amount");
		}		
		else{
			jQuery(".diposit_amount_error").html("");
		}
		if(diposit_amount!=''){
			return true;	
		}else{
			return false;	
		} 	
	}
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [/*{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                },*/ {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();

        </script>