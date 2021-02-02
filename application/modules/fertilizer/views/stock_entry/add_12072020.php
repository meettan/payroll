    <div class="wraper">      
            
		<div class="col-md-7 container form-wraper">

			<form method="POST" action="<?php echo site_url("fertilizer/stockAdd") ?>" onsubmit="return valid_data()">

				<div class="form-header">
                
					<h4>Add Stock</h4>
				
				</div>

				<div class="form-group row">

					<!-- <label for="prod_Id" class="col-sm-3 col-form-label">Prod_Id:</label> -->

					<div class="col-sm-4">

						<input type="hidden" id=prod_Id name="prod_Id" class="form-control"  />

					</div>
					
					</div>

					<div class="form-group row">
					<label for="comp_id" class="col-sm-2 col-form-label">Company :</label>
					<div class="col-sm-4">

						<select name="comp_id" class="form-control required" id="comp_id">

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
					<label for="gst_no" class="col-sm-2 col-form-label">GSTIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=gst_no name="gst_no" class="form-control" readonly />

					</div>
					
					</div>

					<div class="form-group row">
					<label for="comp_add" class="col-sm-2 col-form-label">Address:</label>
					<div class="col-sm-4">

					<textarea style="width:230px;height:100px"  id=comp_add name="comp_add" class="form-control" readonly /></textarea>

					</div>
					<label for="cin" class="col-sm-2 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=cin name="cin" class="form-control" readonly />

					</div>
                  </div>
					<div class="form-header">
                
				<h4>Product Details</h4>
			
			</div>
					<div class="form-group row">
					<label for="prod_id" class="col-sm-2 col-form-label">Product:</label>

					<div class="col-sm-4">
						<!-- <input type="text" id=prod_id name="prod_id" class="form-control" required /> -->
						<select name="prod_id" class="form-control required" id="prod_id">

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
					<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=hsn_code name="hsn_code" class="form-control" readonly  />

					</div>
					</div>
					<div class="form-header">
                
				<h4>Stock Details</h4>
			
			</div>
					<div class="form-group row">
					<label for="ro_no" class="col-sm-2 col-form-label">Ro No.:</label>
					<div class="col-sm-4">

					<input type="text"  style="width:200px" id=ro_no name="ro_no" class="form-control"  />

					</div>

					<label for="ro_dt" class="col-sm-2 col-form-label">Ro Date:</label>
					<div class="col-sm-3">

					<input type="date" style="width:200px" id=ro_dt name="ro_dt" class="form-control"  />

					</div>

					</div>

					<div class="form-group row">
					<label for="due_dt" class="col-sm-2 col-form-label">Due Date:</label>
					<div class="col-sm-4">

					<input type="date" style="width:200px" id=due_dt name="due_dt" class="form-control"  />

					</div>
					<label for="delivery_mode" class="col-sm-2 col-form-label">Delivery Mode:</label>
					<div class="col-sm-3">

					<select class="form-control" id="delivery_mode" name="delivery_mode" style="width:200px" required>
						
						<option value="">Select</option>
						<option value="1">EX GODOWN/RAIL BUFFER</option>
						<option value="2">EX GODOWN/RAIL NON BUFFER</option>
						<option value="3">FOR-FOL</option>
						
					
					</select>

					</div>
					
					</div>
				<div class="form-group row">
					<label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=invoice_no name="invoice_no" class="form-control"  />
                       
					</div>
					<label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Dt:</label>
					<div class="col-sm-3">

					<input type="date" style="width:200px" id=invoice_dt name="invoice_dt" class="form-control"  />
					</div> 
				</div>
			
				<div class="form-group row">
					<label for="qty" class="col-sm-2 col-form-label">Qty:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=qty name="qty" class="form-control"  />

					</div>
					<label for="no_of_bags" class="col-sm-2 col-form-label">No Of Bags/Bucket:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=no_of_bags name="no_of_bags" class="form-control"  />
					</div> 
				</div>
				<div class="form-group row">
					<label for="reck_pt_rt" class="col-sm-2 col-form-label">Reck Pt Entry Rate:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=reck_pt_rt name="reck_pt_rt" class="form-control"  />

					</div>
					<label for="reck_pt_n_rt" class="col-sm-2 col-form-label">Non Reck Pt Entry Rate:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=reck_pt_n_rt name="reck_pt_n_rt" class="form-control"  />
					</div> 
				</div>
				<div class="form-group row">
					<label for="govt_sale_rt" class="col-sm-2 col-form-label">Govt Sale Rate:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=govt_sale_rt name="govt_sale_rt" class="form-control"  />

					</div>
				</div>
				
				<div class="form-group row">
					<label for="iffco_buf_rt" class="col-sm-2 col-form-label">IFFCO Buffer Rate:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=iffco_buf_rt name="iffco_buf_rt" class="form-control"  />

					</div>
					<label for="iffco_n_buff_rt" class="col-sm-2 col-form-label">IFFCO Non Buffer Rate:</label>
					<div class="col-sm-4">

						<input type="text" style="width:200px" id=iffco_n_buff_rt name="iffco_n_buff_rt" class="form-control"  />

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
			
			$('#hsn_code').val(hsn_code);
			// $('#hsn_code').val(hsn_code);
		});

	});

});

</script>

