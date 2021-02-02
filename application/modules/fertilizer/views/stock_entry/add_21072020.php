    <div class="wraper">      
            
		<div class="col-md-11 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/stockAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Purchase</h4>
				
				</div>

				<div class="form-group row">

					<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->

					<div class="col-sm-4">

						<input type="hidden" id=prod_Id name="prod_Id" class="form-control"  />

					</div>
					
					</div>

					<div class="form-group row">
					<label for="comp_id" class="col-sm-1 col-form-label">Company:</label>
					<div class="col-sm-3">

	<select name="comp_id" class="form-control required" id="comp_id" required>

<option value="">Select</option>

<?php

	foreach($compdtls as $comp){

?>

	<option value="<?php echo $comp->comp_id;?>"><?php echo $comp->comp_name;?></option>

<?php

	}

?>     

</select>

					</div>
					<label for="gst_no" class="col-sm-1 col-form-label">GSTIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=gst_no name="gst_no" class="form-control" readonly />

					</div>
					<label for="cin" class="col-sm-1 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=cin name="cin" class="form-control" readonly />

					</div>
					</div>

					<div class="form-group row">
					<label for="comp_add" class="col-sm-1 col-form-label">Address:</label>
					<div class="col-sm-4">

					<textarea style="width:530px;height:70px"  id=comp_add name="comp_add" class="form-control" readonly /></textarea>

					</div>
					<!-- <label for="cin" class="col-sm-2 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=cin name="cin" class="form-control" readonly />

					</div> -->
                  </div>
					<div class="form-header">
                
				<h4>Product Details</h4>
			
			</div>
					<div class="form-group row">
					<label for="prod_id" class="col-sm-1 col-form-label">Product:</label>

					<div class="col-sm-3">
						<!-- <input type="text" id=prod_id name="prod_id" class="form-control" required /> -->
						<select name="prod_id" class="form-control required" id="prod_id" required>

							<option value="">Select</option>

							<?php

								foreach($proddtls as $prod){

							?>

								<option value="<?php echo $prod->prod_id;?>"><?php echo $prod->prod_desc;?></option>

							<?php

								}

							?>     

							</select>

					</div>
					<label for="hsn_code" class="col-sm-1 col-form-label">HSN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=hsn_code name="hsn_code" class="form-control" readonly  />

					</div>
					<label for="gst_rt" class="col-sm-1 col-form-label">GST Rate:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=gst_rt name="gst_rt" class="form-control" readonly />
	
						</div>
					</div>
					<div class="form-header">
                
				<h4>Stock Details</h4>
			
			</div>
					<div class="form-group row">

					<label for="ro_no" class="col-sm-1 col-form-label">Ro No.:</label>
					<div class="col-sm-3">
					<input type="text"  style="width:180px" id=ro_no name="ro_no" class="form-control" required />
					</div>

					<label for="ro_dt" class="col-sm-1 col-form-label">Ro Date:</label>
					<div class="col-sm-3">
					<input type="date" style="width:150px" id=ro_dt name="ro_dt" class="form-control" required />
					</div>

					<label for="due_dt" class="col-sm-1 col-form-label">Due Date:</label>
					<div class="col-sm-3">
					<input type="date" style="width:150px" id=due_dt name="due_dt" class="form-control" required />
					</div>
					</div>

					<div class="form-group row">

					<label for="delivery_mode" class="col-sm-1 col-form-label">Delivery Mode:</label>
					<div class="col-sm-3">
					<select class="form-control" id="delivery_mode" name="delivery_mode" style="width:180px" required>
						
						<option value="">Select</option>
						<option value="1">EX GODOWN/RAIL BUFFER</option>
						<option value="2">EX GODOWN/RAIL NON BUFFER</option>
						<option value="3">FOR-FOL</option>
						
					</select>
					</div>

					<label for="invoice_no" class="col-sm-1 col-form-label">Invoice No:</label>
					<div class="col-sm-3">
					<input type="text" style="width:150px" id=invoice_no name="invoice_no" class="form-control" required />
					</div>

					<label for="invoice_dt" class="col-sm-1 col-form-label">Invoice Dt:</label>
					<div class="col-sm-3">

					<input type="date" style="width:150px" id=invoice_dt name="invoice_dt" class="form-control" required />
					</div> 
					</div>
				
			
				<div class="form-group row">
					<label for="qty" class="col-sm-1 col-form-label">Qty:</label>
					<div class="col-sm-3">

						<input type="text" style="width:180px" id=qty name="qty" class="form-control" required />

					</div>
					<label for="no_of_bags" class="col-sm-1 col-form-label">No Of Bags/Bucket:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=no_of_bags name="no_of_bags" class="form-control" value="0"  required />
					</div> 
					<label for="govt_sale_rt" class="col-sm-1 col-form-label">Sale Rate:</label>
					<div class="col-sm-3">

						<input type="number" style="width:150px" id=govt_sale_rt name="govt_sale_rt" class="form-control" value="0" readonly />

					</div>
				</div>
				<div class="form-group row">
					<label for="reck_pt_rt" class="col-sm-1 col-form-label">Reck Pt Entry Rate:</label>
					<div class="col-sm-3">

						<input type="text" style="width:180px" id=reck_pt_rt name="reck_pt_rt" class="form-control" value="0"  />

					</div>
					<label for="reck_pt_n_rt" class="col-sm-1 col-form-label">Non Reck Pt Entry Rate:</label>
					<div class="col-sm-3">

					<input type="text" style="width:150px" id=reck_pt_n_rt name="reck_pt_n_rt" class="form-control" value="0"  />
					</div> 
				</div>
				<!-- <div class="form-group row">
					<label for="govt_sale_rt" class="col-sm-2 col-form-label">Govt Sale Rate:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=govt_sale_rt name="govt_sale_rt" class="form-control"  />

					</div>
				</div> -->
				
				<div class="form-group row">
					<label for="iffco_buf_rt" class="col-sm-1 col-form-label">IFFCO Buffer Rate:</label>
					<div class="col-sm-3">

						<input type="text" style="width:180px" id=iffco_buf_rt name="iffco_buf_rt" class="form-control" value="0"  />

					</div>
					<label for="iffco_n_buff_rt" class="col-sm-1 col-form-label">IFFCO Non Buffer Rate:</label>
					<div class="col-sm-3">

						<input type="text" style="width:150px" id=iffco_n_buff_rt name="iffco_n_buff_rt" class="form-control" value="0"  />

					</div>
				</div>
				<div class="form-header">
					
					<h4>Price Details</h4>
				
				</div>
				<div class="form-group row">
					
	
						<label for="rate" class="col-sm-1 col-form-label">Purchase Rate/ Unit:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=rate name="rate" class="form-control" required />
						   
						</div>
						
						<label for="base_price" class="col-sm-1 col-form-label">Base Price:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=base_price name="base_price" class="form-control"  readonly />
						   
						</div>
						<label for="net_amt" class="col-sm-1 col-form-label">Taxable Amt:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=net_amt name="net_amt" class="form-control" readonly  />
						   
						</div>
						</div>
						<div class="form-group row">
					<label for="retlr_margin" class="col-sm-1 col-form-label">Add Retailer margin:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=retlr_margin name="retlr_margin" class="form-control" value="0"  />
						</div> 
	
						<label for="spl_rebt" class="col-sm-1 col-form-label">Less Special Rebate:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=spl_rebt name="spl_rebt" class="form-control" value="0"   />
						   
						</div>
	
						<!-- <label for="net_amt" class="col-sm-1 col-form-label">Taxable Amt:</label>
						<div class="col-sm-2">
	
							<input type="text" style="width:150px" id=net_amt name="net_amt" class="form-control"  />
						   
						</div> -->
					</div>
					<div class="form-group row">
					<label for="adj_amt" class="col-sm-1 col-form-label">Add Adj Amt:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=adj_amt name="adj_amt" class="form-control" value="0"   />
						</div> 
	
						<label for="less_amt" class="col-sm-1 col-form-label">Less Adj Amt:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=less_amt name="less_amt" class="form-control" value="0"  />
						   
						</div>
						
					  </div>
					  <div class="form-group row">
					<label for="cgst" class="col-sm-1 col-form-label">CGST:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=cgst name="cgst" class="form-control" value="0"  readonly  />
						</div> 
	
						<label for="sgst" class="col-sm-1 col-form-label">SGST:</label>
						<div class="col-sm-3">
	
							<input type="text" style="width:150px" id=sgst name="sgst" class="form-control"  value="0" readonly  />
						   
						</div>
						
					  </div>
					  <div class="form-group row">
					<label for="rbt_add" class="col-sm-1 col-form-label">Rebate Add:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rbt_add name="rbt_add" class="form-control" value="0"   />
						</div> 
	
						<label for="rbt_less" class="col-sm-1 col-form-label">Rebate Less:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rbt_less name="rbt_less" class="form-control" value="0"   />
						</div> 
						</div>
						<div class="form-group row">
					<label for="rnd_of_add" class="col-sm-1 col-form-label">Round Off Add:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rnd_of_add name="rnd_of_add" class="form-control"  value="0"  />
						</div> 
	
						<label for="rnd_of_less" class="col-sm-1 col-form-label">Round Off Less:</label>
						<div class="col-sm-3">
	
						<input type="text" style="width:150px" id=rnd_of_less name="rnd_of_less" class="form-control" value="0"   />
						</div> 
						<label for="tot_amt" class="col-sm-1 col-form-label">Total Amt:</label>
						<div class="col-sm-2">
	
							<input type="text" style="width:150px" id=tot_amt name="tot_amt" class="form-control" readonly />
						   
						</div>
						</div>



				<div class="form-group row">

					<div class="col-sm-10">

						<input type="submit" class="btn btn-info" value="Save" />

					</div>

				</div>
	
			</form>

		</div>	

	</div>

	<script>

$(document).ready(function(){

    var i = 0;

    $('#comp_id').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/f_get_product");?>',

            { 

                comp_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.prod_id + '">' + value.prod_desc + '</option>'

            });

            $('#prod_id').html(string);


          });


    });

});
</script>
<script>

$(document).ready(function(){

	var i = 2;

	$('#ro_dt').change(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_salerate");?>',
			{ 

				comp_id: $('#comp_id').val(),
			 prod_id : $('#prod_id').val(),
			 ro_dt : $(this).val(),
				// frm_dt  : $(this).val(),
				// to_dt   : $(this).val()
				//dist_cd: $(this).val(),
				// dist_cd : $('#dist_cd').val()
				
			}

		)
		.done(function(data){

			console.log(data);
			var parseData = JSON.parse(data);
			var rate=parseData.rate;
		//    var gst_no = parseData[0].gst_no;
		// 	var comp_add= parseData[0].comp_add;
		// 	var cin= parseData[0].cin;
		// 	$('#gst_no').val(gst_no);
		// 	$('#comp_add').val(comp_add);
		// 	$('#cin').val(cin); 
			$('#govt_sale_rt').val(rate);
		});

	});

});

</script>

<script>

$(document).ready(function(){

	var i = 2;

	$('#comp_id').change(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_company");?>',
			{ 

				comp_id: $(this).val(),
				//dist_cd: $(this).val(),
				// dist_cd : $('#dist_cd').val()
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var gst_no = parseData[0].gst_no;
			var comp_add= parseData[0].comp_add;
			var cin= parseData[0].cin;
			$('#gst_no').val(gst_no);
			$('#comp_add').val(comp_add);
			$('#cin').val(cin);
			// $('#hsn_code').val(hsn_code);
		});

	});

});

</script>

<script>

$(document).ready(function(){

	var i = 2;

	$('#prod_id').change(function(){

		$.get( 

			'<?php echo site_url("fertilizer/f_get_hsn");?>',
			{ 

				prod_id: $(this).val(),
				//dist_cd: $(this).val(),
				// dist_cd : $('#dist_cd').val()
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var hsn_code = parseData[0].hsn_code;
			var gst_rt = parseData[0].gst_rt;
			$('#hsn_code').val(hsn_code);
			$('#gst_rt').val(gst_rt);
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
