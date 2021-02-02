    <div class="wraper">      

        <div class="col-md-11 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/viewstock");?>" >

                <div class="form-header">
                
                    <h4>View Purchase</h4>
                
                </div>

               
                <!-- <div class="form-group row"> -->

<div class="form-group row">

<label for="comp_id" class="col-sm-1 col-form-label">Company:</label>

<div class="col-sm-3">

     <input type="hidden" style="width:200px"  name="comp_id" class="form-control required"  
        value = "<?php echo $compdtls->comp_id; ?>" readonly />
        <input type="text" style="width:200px"  name="comp_desc" class="form-control required"  
        value = "<?php echo $compdtls->comp_name; ?>" readonly />
 
</div>
<label for="gst_no" class="col-sm-1 col-form-label">GSTIN:</label>
					<div class="col-sm-3">

                    <input type="text" style="width:200px"  name="gst_no" class="form-control required"  
        value = "<?php echo $compdtls->gst_no; ?>" readonly />

					</div>
                    <label for="cin" class="col-sm-1 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=cin name="cin"class="form-control required"  
        value = "<?php echo $compdtls->cin; ?>" readonly />

					</div>
</div>
<div class="form-group row">
					<label for="comp_add" class="col-sm-1 col-form-label">Address:</label>
					<div class="col-sm-4">

					<textarea style="width:580px;height:70px"  id=comp_add name="comp_add" class="form-control required"  
        readonly /> <?php echo $compdtls->comp_add; ?></textarea>

					</div>
					<!-- <label for="cin" class="col-sm-2 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=cin name="cin"class="form-control required"  
        value = "<?php echo $compdtls->cin; ?>" readonly />

					</div> -->
                    </div>
<div class="form-header">
                
  <h4>Product Details</h4>
            
</div>

<div class="form-group row">

<label for="prod_id" class="col-sm-1 col-form-label">Product:</label>
<div class="col-sm-3">
<input type="hidden" style="width:200px"  name="prod_id" class="form-control required"  
        value = "<?php echo $proddtls->prod_id; ?>" readonly />
        <input type="text" style="width:200px"  name="prod_desc" class="form-control required"  
        value = "<?php echo $proddtls->prod_desc; ?>" readonly />
     
</div>
<label for="hsn_code" class="col-sm-1 col-form-label">HSN:</label>
					<div class="col-sm-3">

                    <input type="text" style="width:200px"  name="hsn_code" class="form-control required"  
        value = "<?php echo $proddtls->hsn_code; ?>" readonly />

					</div>
                    <label for="gst_rt" class="col-sm-1 col-form-label">GST RT:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=gst_rt name="gst_rt" class="form-control" 
                            value = "<?php echo $proddtls->gst_rt; ?>" readonly />
	
						</div>
</div>

                <div class="form-header">
                                
                <h4>Stock Details</h4>
                            
                </div>

                <div class="form-group row">

                <label for="ro_no" class="col-sm-1 col-form-label">Ro No.:</label>

                <div class="col-sm-3">

                    <input type="text" style="width:200px"  name="ro_no" class="form-control required"  
                        value = "<?php echo $schdtls->ro_no; ?>"  />
                </div>

                <label for="ro_dt" class="col-sm-1 col-form-label">Ro Date:</label>
                <div class="col-sm-3">
                <input type="date" style="width:200px"  name="ro_dt" class="form-control required"  
                        value = "<?php echo $schdtls->ro_dt; ?>"  />
                </div>
                <label for="due_dt" class="col-sm-1 col-form-label">Due Date:</label>
                <div class="col-sm-3">
                <input type="date" style="width:150px"  name="due_dt" class="form-control required"  
                        value = "<?php echo $schdtls->due_dt; ?>"  />
                </div>
                </div>

                <div class="form-group row">

                <!-- <label for="due_dt" class="col-sm-1 col-form-label">Due Date:</label>
                <div class="col-sm-3">
                <input type="text" style="width:200px"  name="due_dt" class="form-control required"  
                        value = "<?php echo $schdtls->due_dt; ?>" readonly />
                </div> -->
                <label for="delivery_mode" class="col-sm-1 col-form-label">Stock Point:</label>

<div class="col-sm-3">


    <select class="col-sm-3"
                        name="delivery_mode"
                        id="delivery_mode" style="width:200px;height:40px"
                    >
                    
                    <option value="">Select</option>
                    <option value="1" <?php echo ($schdtls->delivery_mode == 1)? 'selected' : '';?>>EX GODOWN/RAIL BUFFER</option>
                    <option value="2" <?php echo ($schdtls->delivery_mode == 2)? 'selected' : '';?>>EX GODOWN/RAIL NON BUFFER</option>
                    <option value="3" <?php echo ($schdtls->delivery_mode == 3)? 'selected' : '';?>>FOR-FOL</option>
                </select>  
</div>
<label for="invoice_no" class="col-sm-1 col-form-label">Invoice No:</label>

<div class="col-sm-3">

 <input type="text" style="width:200px"  name="invoice_no" class="form-control required"  
          value = "<?php echo $schdtls->invoice_no; ?>"  />
</div>
<label for="invoice_dt" class="col-sm-1 col-form-label">Invoice Date:</label>

<div class="col-sm-3">

<input type="date" style="width:150px"   name="invoice_dt" class="form-control required"  
value = "<?php echo $schdtls->invoice_dt; ?>"   />

</div>
                </div>

                <div class="form-group row">

                  <!-- <label for="invoice_no" class="col-sm-1 col-form-label">Invoice No:</label>

                  <div class="col-sm-3">

                   <input type="text" style="width:200px"  name="invoice_no" class="form-control required"  
                            value = "<?php echo $schdtls->invoice_no; ?>" readonly />
		          </div> -->

                  <!-- <label for="invoice_dt" class="col-sm-1 col-form-label">Invoice Date:</label>

                    <div class="col-sm-3">

                    <input type="text" style="width:200px"   name="invoice_dt" class="form-control required"  
                    value = "<?php echo $schdtls->invoice_dt; ?>" readonly  />

                   </div> -->
		</div>

<div class="form-group row">

<label for="qty" class="col-sm-1 col-form-label">Qty:</label>

<div class="col-sm-3">

 <input type="text" style="width:200px"  name="qty" id="qty" class="form-control required"  
          value = "<?php echo $schdtls->qty; ?>"  />
</div>

<label for="no_of_bags" class="col-sm-1 col-form-label">No Of Bags/Bucket:</label>

  <div class="col-sm-3">

  <input type="text" style="width:200px"   name="no_of_bags" class="form-control required"  
  value = "<?php echo $schdtls->no_of_bags; ?>"   />

 </div>
</div>
<div class="form-header">
                
                <h4>Price Details</h4>
            
            </div>	
           <div class="form-group row">
            
						<label for="rate" class="col-sm-1 col-form-label">Purchase Rate/Unit:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=rate name="rate" class="form-control required" 
                            value = "<?php echo $schdtls->rate; ?>"    />
			
						</div>
						
						<label for="base_price" class="col-sm-1 col-form-label">Base Price:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=base_price name="base_price" class="form-control" 
                            value = "<?php echo $schdtls->base_price; ?>"   readonly />
						   
						</div>
						<label for="net_amt" class="col-sm-1 col-form-label">Taxable Amt:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=net_amt name="net_amt" class="form-control" 
                            value = "<?php echo $schdtls->net_amt; ?>" readonly />
						   
						</div>
                        </div>
                        <div class="form-group row">
					<label for="retlr_margin" class="col-sm-1 col-form-label">Add Retailer margin:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=retlr_margin name="retlr_margin" class="form-control"  
                        value = "<?php echo $schdtls->retlr_margin; ?>"  />
						</div> 
	
						<label for="spl_rebt" class="col-sm-1 col-form-label">Less Special Rebate:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=spl_rebt name="spl_rebt" class="form-control" 
                            value = "<?php echo $schdtls->spl_rebt; ?>"   />
						   
						</div>
                        </div>
                        <div class="form-group row">
					<label for="adj_amt" class="col-sm-1 col-form-label">Add Adj Amt:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=add_adj_amt name="add_adj_amt" class="form-control"  
                        value = "<?php echo $schdtls->add_adj_amt; ?>"   />
						</div> 
	
						 <label for="less_adj_amt" class="col-sm-1 col-form-label">Less Adj Amt:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=less_amt name="less_adj_amt" class="form-control" 
                            value = "<?php echo $schdtls->less_adj_amt; ?>"   />
						   
						</div> 
						
					  </div>
                      <div class="form-group row">
					<label for="cgst" class="col-sm-1 col-form-label">CGST:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=cgst name="cgst" class="form-control" 
                        value = "<?php echo $schdtls->cgst; ?>" readonly  />
						</div> 
	
						<label for="sgst" class="col-sm-1 col-form-label">SGST:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=sgst name="sgst" class="form-control" 
                            value = "<?php echo $schdtls->sgst; ?>"  readonly  />
						   
						</div>
						
					  </div>
                      <div class="form-group row">
					<label for="rbt_add" class="col-sm-1 col-form-label">Rebate Add:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rbt_add name="rbt_add" class="form-control" 
                        value = "<?php echo $schdtls->rbt_add; ?>"    />
						</div> 
	
						<label for="rbt_less" class="col-sm-1 col-form-label">Rebate Less:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rbt_less name="rbt_less" class="form-control" 
                        value = "<?php echo $schdtls->rbt_less; ?>"    />
						</div> 
						</div>
                        <div class="form-group row">
					<label for="rnd_of_add" class="col-sm-1 col-form-label">Round Off Add:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rnd_of_add name="rnd_of_add" class="form-control" 
                        value = "<?php echo $schdtls->rnd_of_add; ?>"    />
						</div> 
	
						<label for="rnd_of_less" class="col-sm-1 col-form-label">Round Off Less:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rnd_of_less name="rnd_of_less" class="form-control"
                        value = "<?php echo $schdtls->rnd_of_less; ?>"     />
						</div> 
						<label for="tot_amt" class="col-sm-1 col-form-label">Total Amt:</label>
						<div class="col-sm-2">
	
							<input type="text" style="width:150px" id=tot_amt name="tot_amt" class="form-control" 
                            value = "<?php echo $schdtls->tot_amt; ?>"  readonly />
						   
						</div>
						</div>
		<div class="form-group row">

                    <div class="col-sm-10">
                    <input type="submit" class="btn btn-info" value="Save" />
                        <!-- <input type="button" class="btn btn-info" value="Back" /> -->
                        <!-- <a href="<?php echo site_url("fertilizer/stock_entry");?>" class="btn btn-primary" style="width: 100px;">Back</a></small> -->
                    </div>

                </div>
 
            </form>

        </div>

    </div>


    <script>
	
	$(document).ready(function(){
	
		var i = 2;
		var tot_qty  =0.00;
		var base_price =0.00;
		var gst_rt =0.00;
		var gst=0.00;
		var tot_amt= 0.00;
		var rbt_add= 0.00;
		var rbt_less= 0.00;
		var rnd_of_add= 0.00;
		var rnd_of_less= 0.00;
		var add_adj_amt =0.00;
		var less_adj_amt=0.00;
		$('#rate').change(function(){
	
			$.get( 
	
				'<?php echo site_url("fertilizer/f_get_ro");?>',
				{ 
	
					rate: $(this).val()
					
				}
	
			)
			.done(function(data){
	
				//console.log(data);
				var parseData = JSON.parse(data);
				tot_qty=$('#qty').val() 
				gst_rt =$('#gst_rt').val() 
				base_price =tot_qty * $('#rate').val() 
				taxable_amt =base_price
				gst=(taxable_amt * gst_rt/100)/2
				tot_amt=parseFloat(taxable_amt) + parseFloat(gst)*2
				//console.log(parseData);
				//  console.log(parseData[0].qty);
				// console.log(parseData[0].allot_qty_qnt);
				console.log(qty);
				$('#base_price').val(base_price);
				$('#net_amt').val(taxable_amt);
				$('#tot_amt').val(tot_amt);
				$('#retlr_margin').val(0);
				$('#spl_rebt').val(0);
				$('#cgst').val(gst);
				$('#sgst').val(gst);
				$('#rbt_add').val(0);
				$('#rbt_less').val(0);
				$('#rnd_of_add').val(0);
				$('#rnd_of_less').val(0);
				$('#adj_amt').val(0);
				$('#less_amt').val(0);
			});
	
		});
	
	});
	
	</script>
	<script>
	
	$(document).ready(function(){
	
		var i = 2;
		var tot_qty  =0.00;
		var base_price =0.00;
		var gst_rt =0.00;
		var gst=0.00;
		var spl_rebt=0.00;
		var retlr_margin=0.00;
		var tot_amt = 0.00;
	
		var rbt_add= 0.00;
		var rbt_less= 0.00;
		var rnd_of_add= 0.00;
		var rnd_of_less= 0.00;
		var add_adj_amt =0.00;
		var less_adj_amt=0.00;

		$('#retlr_margin').change(function(){
			let row = $(this).closest('tr');
			$.get( 
	
				'<?php echo site_url("fertilizer/f_get_ro");?>',
				{ 
	
					rate: $(this).val()
					
				}
	
			)
			.done(function(data){
	
				//console.log(data);
				var parseData = JSON.parse(data);
				tot_qty=$('#qty').val() 
				gst_rt =$('#gst_rt').val() 
				base_price =tot_qty * $('#rate').val() 
				retlr_margin = $('#retlr_margin').val() 
				spl_rebt  = $('#spl_rebt').val() 
				taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)
				gst=(taxable_amt * gst_rt/100)/2
				tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2
				//console.log(parseData);
				//  console.log(parseData[0].qty);
				// console.log(parseData[0].allot_qty_qnt);
				console.log(qty);
				$('#base_price').val(base_price);
				$('#net_amt').val(taxable_amt);
				$('#tot_amt').val(tot_amt);
				$('#retlr_margin').val(retlr_margin);
				$('#spl_rebt').val(spl_rebt);
				$('#cgst').val(gst);
				$('#sgst').val(gst);
				$('#rbt_add').val(0);
				$('#rbt_less').val(0);
				$('#rnd_of_add').val(0);
				$('#rnd_of_less').val(0);
				$('#adj_amt').val(0);
				$('#less_amt').val(0);
				
			});
	
		});
	
	});
	
	</script>
	
	<script>
	
	$(document).ready(function(){
	
		var i = 2;
		var tot_qty  =0.00;
		var base_price =0.00;
		var gst_rt =0.00;
		var gst=0.00;
		var spl_rebt=0.00;
		var retlr_margin=0.00;
		var tot_amt = 0.00;
		var rbt_add= 0.00;
		var rbt_less= 0.00;
		var rnd_of_add= 0.00;
		var rnd_of_less= 0.00;
		var add_adj_amt =0.00;
		var less_adj_amt=0.00;

		$('#spl_rebt').change(function(){
	
			$.get( 
	
				'<?php echo site_url("fertilizer/f_get_ro");?>',
				{ 
	
					rate: $(this).val()
					
				}
	
			)
			.done(function(data){
	
				     //console.log(data);
				var parseData = JSON.parse(data);
				tot_qty=$('#qty').val() 
				gst_rt =$('#gst_rt').val() 
				base_price =tot_qty * $('#rate').val() 
				retlr_margin = $('#retlr_margin').val() 
				spl_rebt  = $('#spl_rebt').val() 
				taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)
				gst=(taxable_amt * gst_rt/100)/2
				tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2

				 // console.log(parseData);
				// console.log(parseData[0].qty);
			   // console.log(parseData[0].allot_qty_qnt);
			  // console.log(qty);
				$('#base_price').val(base_price);
				$('#net_amt').val(taxable_amt);
				$('#tot_amt').val(tot_amt);
				$('#retlr_margin').val(retlr_margin);
				$('#spl_rebt').val(spl_rebt);
				$('#cgst').val(gst);
				$('#sgst').val(gst);
				$('#rbt_add').val(0);
				$('#rbt_less').val(0);
				$('#rnd_of_add').val(0);
				$('#rnd_of_less').val(0);
				
			});
	
		});
	
	});
	
	</script>


<script>
	
	$(document).ready(function(){
	
		var i = 2;
		var tot_qty  =0.00;
		var base_price =0.00;
		var gst_rt =0.00;
		var gst=0.00;
		var spl_rebt=0.00;
		var retlr_margin=0.00;
		var tot_amt = 0.00;
		var rbt_add= 0.00;
		var rbt_less= 0.00;
		var rnd_of_add= 0.00;
		var rnd_of_less= 0.00;
		var add_adj_amt =0.00;
		var less_adj_amt=0.00;

		$('#adj_amt').change(function(){
	
			$.get( 
	
				'<?php echo site_url("fertilizer/f_get_ro");?>',
				{ 
	
					rate: $(this).val()
					
				}
	
			)
			.done(function(data){
	
				     //console.log(data);
				var parseData = JSON.parse(data);
				tot_qty=$('#qty').val() 
				gst_rt =$('#gst_rt').val() 
				base_price =tot_qty * $('#rate').val() 
				retlr_margin = $('#retlr_margin').val() 
				spl_rebt  = $('#spl_rebt').val() 
				add_adj_amt=$('#adj_amt').val() 
				less_adj_amt =$('#less_amt').val() 
				taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)+parseFloat(add_adj_amt)-parseFloat(less_adj_amt)
				gst=(taxable_amt * gst_rt/100)/2
				tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2

				 // console.log(parseData);
				// console.log(parseData[0].qty);
			   // console.log(parseData[0].allot_qty_qnt);
			  // console.log(qty);
				$('#base_price').val(base_price);
				$('#net_amt').val(taxable_amt);
				$('#tot_amt').val(tot_amt);
				$('#retlr_margin').val(retlr_margin);
				$('#spl_rebt').val(spl_rebt);
				$('#cgst').val(gst);
				$('#sgst').val(gst);
				$('#rbt_add').val(0);
				$('#rbt_less').val(0);
				$('#rnd_of_add').val(0);
				$('#rnd_of_less').val(0);
				
			});
	
		});
	
	});
	
	</script>

<script>
	
	$(document).ready(function(){
	
		var i = 2;
		var tot_qty  =0.00;
		var base_price =0.00;
		var gst_rt =0.00;
		var gst=0.00;
		var spl_rebt=0.00;
		var retlr_margin=0.00;
		var tot_amt = 0.00;
		var rbt_add= 0.00;
		var rbt_less= 0.00;
		var rnd_of_add= 0.00;
		var rnd_of_less= 0.00;
		var add_adj_amt =0.00;
		var less_adj_amt=0.00;

		$('#less_amt').change(function(){
	
			$.get( 
	
				'<?php echo site_url("fertilizer/f_get_ro");?>',
				{ 
	
					rate: $(this).val()
					
				}
	
			)
			.done(function(data){
	
				     //console.log(data);
				var parseData = JSON.parse(data);
				tot_qty=$('#qty').val() 
				gst_rt =$('#gst_rt').val() 
				base_price =tot_qty * $('#rate').val() 
				retlr_margin = $('#retlr_margin').val() 
				spl_rebt  = $('#spl_rebt').val() 
				add_adj_amt=$('#adj_amt').val() 
				less_adj_amt =$('#less_amt').val() 
				taxable_amt= parseFloat(base_price) +  parseFloat(retlr_margin) -parseFloat(spl_rebt)+parseFloat(add_adj_amt)-parseFloat(less_adj_amt)
				gst=(taxable_amt * gst_rt/100)/2
				tot_amt=parseFloat(taxable_amt) + parseFloat(gst) *2

				 // console.log(parseData);
				// console.log(parseData[0].qty);
			   // console.log(parseData[0].allot_qty_qnt);
			  // console.log(qty);
				$('#base_price').val(base_price);
				$('#net_amt').val(taxable_amt);
				$('#tot_amt').val(tot_amt);
				$('#retlr_margin').val(retlr_margin);
				$('#spl_rebt').val(spl_rebt);
				$('#cgst').val(gst);
				$('#sgst').val(gst);
				$('#rbt_add').val(0);
				$('#rbt_less').val(0);
				$('#rnd_of_add').val(0);
				$('#rnd_of_less').val(0);
				
			});
	
		});
	
	});
	
	</script>
