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
		  <h3>Clients</h3>
		</div>
		
	  </div>
	  <div class="clearfix"></div>
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
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>S. No.</th>
                        <th>Client Name</th>
						<th>Mobile Number</th>
						<th>Address</th>
                        <th>Status</th>
                        <th>Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(count($clients)>0){ ?>
					  <?php for($i=0;$i<count($clients);$i++){ ?>
                      <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $clients[$i]->client_name; ?></td>
						<td><?php echo $clients[$i]->mobile_no; ?></td>
						<td><?php echo $clients[$i]->address; ?></td>
						<td><?php if($clients[$i]->status==0){echo '<button type="button" class="btn btn-success btn-xs">Active</button>';}else{ echo '<button type="button" class="btn btn-danger btn-xs">Deactive</button>';} ?></td>                       
                        <td>
						     <a href="<?php echo base_url('admin/client_view/'.$clients[$i]->client_id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
							<a href="<?php echo base_url('admin/client_edit/'.$clients[$i]->client_id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
							<?php if($clients[$i]->status==1){ ?>
							<a onclick="return confirm('Are you sure you want to change Status?');" href="<?php echo base_url('admin/client_status/'.$clients[$i]->client_id.'/0'); ?>" class="btn btn-success btn-xs"><i class="fa fa-unlock"></i> Activated </a>
							<?php }else{ ?>
							<a onclick="return confirm('Are you sure you want to change Status?');" href="<?php echo base_url('admin/client_status/'.$clients[$i]->client_id.'/1'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-unlock-alt"></i> Deactivated </a>
							<?php } ?>
						</td>                        
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