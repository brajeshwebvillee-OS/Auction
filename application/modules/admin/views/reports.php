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
		  <h3>Billing Reports</h3>
		</div>
		
	  </div>
	  <div class="clearfix"></div>
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="x_panel">
	  <div class="x_content">
			 
			  <form  class="form-horizontal form-label-left" method="post" action="<?php echo base_url('admin/reports'); ?>" >
				
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
				  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice No<span class="required"></span>
				  </label>
				  <div class="col-md-9 col-sm-9 col-xs-12">
					<input id="invoice_no" name="invoice_no" value="<?php echo $invoice_no; ?>" autocomplete="off" class="form-control col-md-7 col-xs-12" type="text">					
				  </div>
				</div>
				
				<div class="form-group col-md-6 col-sm-6 col-xs-6">
				  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">				
					<button type="submit" class="btn btn-success">Filter</button>					
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
			 
			 <div class="x_content">
				<?php if($msg!=''){ ?>
                   <div class="alert alert-success alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					  </button>
					  <?php echo $msg; ?>
					</div>
				<?php } ?>
				  <table id="datatable-buttons" class="table table-striped table-bordered" data-page-length='25'>
                    <thead>
                      <tr> 
						<th>S. No.</th> 
						<th>Invoice Number</th>
                        <th>Client Name</th>
						<th>Bill Amount</th>
						<th>Bill Date</th>						                     
                        <th>Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(count($bills)>0){ ?>
					  <?php for($i=0;$i<count($bills);$i++){ ?>
                      <tr> 
						<td><?php echo $i+1; ?></td>
						<td><?php echo $bills[$i]->invoice_no; ?></td>
                        <td><?php echo $bills[$i]->client_name; ?></td>
                        <td><?php echo $bills[$i]->total_amount; ?></td>												
                        <td><?php echo date('d-m-Y',strtotime($bills[$i]->entry_date)); ?></td>
						<td><a href="<?php echo base_url('admin/bill_view/'.$bills[$i]->bill_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a></td>
                      </tr>
					  <?php } ?>
					  <?php } ?>
                    </tbody>
                  </table>
				   
                </div>
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