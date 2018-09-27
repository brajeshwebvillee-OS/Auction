<style>
h2{
	text-align:center;
}
table {
    width: 100%;
    text-align: center;
	border-spacing: 0;
    border-collapse: collapse;
}
table.info {
    margin: 15px 0 20px 0;
}
table.details td, table.details th {
    border: 1px solid;
    padding: 10px;
}
</style>
<div class="">
<h2>JhuleLal! </h2>
<table class="info">
<thead>
<tr>
	<th colspan="2">
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
	</th> 
	<th colspan="2">
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
	</th>								
	<th>
	 
	 <b class="pull-right">Date: <?php echo date('d-m-Y',strtotime($bills_data->entry_date)); ?></b><br>
	 <b>Invoice #<?php echo $bills_data->invoice_no; ?></b>
	</th>
		
</tr>
</thead>
</table>
	 
	 <table  class="details">
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
					<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" ><?php echo $bills_data->diposit_amount; ?></td> 									
			  </tr>
			   <tr>
				<td colspan="3" style="text-align:right; font-weight: bold;" >Due Balance</td>						
				<td colspan="<?php echo count($billsh)+1; ?>" style="text-align:right; font-weight: bold;" id="duef"><?php echo $bills_data->due; ?></td> 
				
			  </tr>
			  <?php } ?>                           
		  </tbody>
		</table>	  
</div>
