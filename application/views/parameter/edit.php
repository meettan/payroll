<div class="wraper">      

    <div class="col-md-6 container form-wraper">

        <form method="POST" id="form" action="<?php echo site_url("vlsedt");?>" >
            

            <div class="form-header">
            
                <h4>Edit Parameter</h4>
            
            </div>

                <div class="form-group row">

                    <div class="col-sm-4">

                        <input type="hidden" name="sl_no" class="form-control required" id="sl_no" value= "<?php echo $param_dtls->sl_no; ?>" />
                                
                    </div>
                    </div>

                    <div class="form-group row">

                    <label for="param_desc" class="col-sm-2 col-form-label">Description:</label>
                    <div class="form-group row">
                    <div class="col-sm-3">

                        <input type="text" name="param_desc" class="form-control required" id="param_desc" value= "<?php echo $param_dtls->param_desc; ?>" readonly />
                                
                    </div>

                    <label for="param_value" class="col-sm-2 col-form-label">Value:</label>

                    <div class="col-sm-4">

                        <input type="text" name="param_value" class="form-control required" id="param_value" value= "<?php echo $param_dtls->param_value; ?>" />
                                
                    </div>

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