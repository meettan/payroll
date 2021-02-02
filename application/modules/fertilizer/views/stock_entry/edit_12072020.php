    <div class="wraper">      

        <div class="col-md-7 container form-wraper">

            <form method="POST" id="form" action="<?php echo site_url("fertilizer/viewstock");?>" >

                <div class="form-header">
                
                    <h4>View Stock</h4>
                
                </div>

               
                <!-- <div class="form-group row"> -->

<div class="form-group row">

<label for="comp_id" class="col-sm-2 col-form-label">Company:</label>

<div class="col-sm-4">

     <input type="text" style="width:200px"  name="comp_id" class="form-control required"  
        value = "<?php echo $compdtls->comp_name; ?>" readonly />
       
 
</div>
<label for="gst_no" class="col-sm-2 col-form-label">GSTIN:</label>
					<div class="col-sm-3">

                    <input type="text" style="width:200px"  name="gst_no" class="form-control required"  
        value = "<?php echo $compdtls->gst_no; ?>" readonly />

					</div>
</div>
<div class="form-group row">
					<label for="comp_add" class="col-sm-2 col-form-label">Address:</label>
					<div class="col-sm-4">

					<textarea style="width:230px;height:100px"  id=comp_add name="comp_add" cclass="form-control required"  
        readonly /> <?php echo $compdtls->comp_add; ?></textarea>

					</div>
					<label for="cin" class="col-sm-2 col-form-label">CIN:</label>
					<div class="col-sm-3">

					<input type="text" style="width:200px" id=cin name="cin"class="form-control required"  
        value = "<?php echo $compdtls->cin; ?>" readonly />

					</div>
                    </div>
<div class="form-header">
                
  <h4>Product Deatails</h4>
            
</div>

<div class="form-group row">

<label for="prod_id" class="col-sm-2 col-form-label">Product:</label>
<div class="col-sm-4">
<input type="text" style="width:200px"  name="prod_id" class="form-control required"  
        value = "<?php echo $proddtls->prod_desc; ?>" readonly />
     
</div>
<label for="hsn_code" class="col-sm-2 col-form-label">HSN:</label>
					<div class="col-sm-3">

                    <input type="text" style="width:200px"  name="hsn_code" class="form-control required"  
        value = "<?php echo $proddtls->hsn_code; ?>" readonly />

					</div>
</div>

                <div class="form-header">
                                
                <h4>Stock Deatails</h4>
                            
                </div>

                <div class="form-group row">

                <label for="ro_no" class="col-sm-2 col-form-label">Ro No.:</label>

                <div class="col-sm-4">

                    <input type="text" style="width:200px"  name="ro_no" class="form-control required"  
                        value = "<?php echo $schdtls->ro_no; ?>" readonly />
                </div>

                <label for="ro_dt" class="col-sm-2 col-form-label">Ro Date:</label>
                <div class="col-sm-3">
                <input type="text" style="width:200px"  name="ro_dt" class="form-control required"  
                        value = "<?php echo $schdtls->ro_dt; ?>" readonly />
                </div>
            
                </div>

                <div class="form-group row">

                <label for="due_dt" class="col-sm-2 col-form-label">Due Date:</label>
                <div class="col-sm-4">
                <input type="text" style="width:200px"  name="due_dt" class="form-control required"  
                        value = "<?php echo $schdtls->due_dt; ?>" readonly />
                </div>
                <label for="delivery_mode" class="col-sm-2 col-form-label">Stock Point:</label>

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

                </div>

                <div class="form-group row">

                  <label for="invoice_no" class="col-sm-2 col-form-label">Invoice No:</label>

                  <div class="col-sm-4">

                   <input type="text" style="width:200px"  name="invoice_no" class="form-control required"  
                            value = "<?php echo $schdtls->invoice_no; ?>" readonly />
		          </div>

                  <label for="invoice_dt" class="col-sm-2 col-form-label">Invoice Date:</label>

                    <div class="col-sm-3">

                    <input type="text" style="width:200px"   name="invoice_dt" class="form-control required"  
                    value = "<?php echo $schdtls->invoice_dt; ?>" readonly  />

                   </div>
		</div>

<div class="form-group row">

<label for="qty" class="col-sm-2 col-form-label">Qty:</label>

<div class="col-sm-4">

 <input type="text" style="width:200px"  name="qty" class="form-control required"  
          value = "<?php echo $schdtls->qty; ?>" readonly />
</div>

<label for="no_of_bags" class="col-sm-2 col-form-label">No Of Bags/Bucket:</label>

  <div class="col-sm-3">

  <input type="text" style="width:200px"   name="no_of_bags" class="form-control required"  
  value = "<?php echo $schdtls->no_of_bags; ?>" readonly  />

 </div>
</div>
			
		<div class="form-group row">

                    <div class="col-sm-10">

                        <!-- <input type="button" class="btn btn-info" value="Back" /> -->
                        <a href="<?php echo site_url("fertilizer/stock_entry");?>" class="btn btn-primary" style="width: 100px;">Back</a></small>
                    </div>

                </div>
 
            </form>

        </div>

    </div>


