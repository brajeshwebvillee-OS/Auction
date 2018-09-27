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
		  <h3>View Bill Information</h3>
		</div>
		
	  </div>
	  <div class="clearfix"></div>	   
	  <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="x_panel">
			  <?php if(count($bills)>0){ ?>
			 
				
			 <div class="x_content">
                  <section class="content invoice">
				  
				 <div id="printableArea"> 
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
							<i class="fa fa-globe"></i> Invoice.
							<small class="pull-right">Date: <?php echo date('d-m-Y',strtotime($bills_data->entry_date)); ?></small>
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
					  $client_data = $this->common_model->getsingle('clients',array('client_id'=>$bills_data->client_id));
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
						
                        <b>Invoice #<?php echo $bills_data->invoice_no; ?></b>
					
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
					  
                        <table  class="table table-striped table-bordered">
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
								<td  style="text-align:right; font-weight: bold;" id="bill_amountf"><?php echo $bills_data->bill_amount; ?></td>								
							  </tr>
							  <?php
							  
							  if($bills_data->due_amount!='0')
							  { ?>
								<tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Old Due</td>						
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;"><?php echo $bills_data->due_amount; ?></td>
									
								  </tr>  
							  <?php } ?>
							   <tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Tax ( <?php echo $bills_data->tax; ?>% )</td>	
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="tax_amountf"><?php echo $bills_data->tax_amount; ?></td>
								  </tr> 
								<tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Total Amount</td>						
									<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="total_amountf"><?php echo $bills_data->total_amount; ?></td> 
									
							  </tr>
							  <tr>
									<td colspan="3" style="text-align:right; font-weight: bold;" >Diposit Amount</td>						
									<td  colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" ><?php echo $bills_data->diposit_amount; ?></td> 									
							  </tr>
							   <tr>
								<td colspan="3" style="text-align:right; font-weight: bold;" >Due Balance</td>						
								<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="duef"><?php echo $bills_data->due; ?></td> 
								
							  </tr>
							  <?php } ?>                           
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
					
				</div>
                    <!-- /.row -->                 
					 <div class="row no-print">
                      <div class="col-xs-12">
                        <button class="btn btn-default" onclick="printDiv('printableArea')" ><i class="fa fa-print"></i> Print</button>  
						<a onclick="window.history.back()" class="btn btn-success pull-right" style="margin-right: 5px;">Back</a>
                        <a href="<?php echo base_url('admin/bill_download/'.$bills_data->bill_id) ?>" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Download PDF</a>						
                      </div>
                    </div>
                  </section>
                </div>
				
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
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
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
        <script src="<?php echo base_url(); ?>js/pace/pace.min.js"></script>
        