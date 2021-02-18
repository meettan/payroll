    <div class="wraper">      

        <div class="col-md-6 container form-wraper">

            <div class="form-header">
                
                <h4>Add Earnings</h4>
             
            </div>

            <form method="POST" 
                id="form"
               
                action="<?php echo site_url("slryad");?>" >
                <div class="form-group row">

                    <label for="sal_date" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                name="sal_date"
                                class="form-control required"
                                id="sal_date"
                                value="<?php echo $sys_date;?>"
                                readonly
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="emp_code" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <select
                                class="form-control required"
                                name="emp_code"
                                id="emp_code"
                        >

                        <option value="">Select Employee</option>

                        <?php  

                        if($emp_list) {

                            foreach ($emp_list as $e_list) {

                                foreach ($category  as $catg) {

                                    if($e_list->emp_catg == $catg->category_code) {

                        ?>        
                                <option value="<?php echo $e_list->emp_code ?>"

                                catg="<?php echo $catg->category_type; ?>"            
                                ><?php echo $e_list->emp_name; ?></option>

                        <?php
                                    }

                                }    

                            }

                        }

                        ?>
                            
                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="category" class="col-sm-2 col-form-label">Category:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"
                            name = "category"
                            id   = "category"
                            readonly required
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="dist" class="col-sm-2 col-form-label">District:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"
                            name = "dist"
                            id   = "dist"
                            readonly required
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="basic" class="col-sm-2 col-form-label">Basic:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class= "form-control"
                            name = "basic"
                            id   = "basic"
                            value = 0.00	
                       readonly />

                    </div>

                   <label for="da" class="col-sm-2 col-form-label">DA:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "da"
                            id   = "da"
                            value = 0.00 
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="hra" class="col-sm-2 col-form-label">HRA:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "hra"
                            id   = "hra"
                            value = 0.00
                        />

                    </div>
        
                
                    <label for="ma" class="col-sm-2 col-form-label">Medical Allowance:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "ma"
                            id   = "ma"
                            value = 0.00
                        />

                    </div>

                </div>


                <div class="form-group row">

                    <label for="oa" class="col-sm-2 col-form-label">Other Allowance</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class= "form-control"
                            name = "oa"
                            id   = "oa"
                            value = 0.00
                        />

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

    $("#form").validate({
        rules: {

            sal_yr: "required",

        },
        messages: {
            
            sal_yr: "Please enter valid input"
        }
        
    });


</script>

<script>

    $(document).ready(function(){

        $('#emp_code').change(function(){

            $('#category').val($(this).find(':selected').attr('catg'));

            $.get(
                '<?php echo site_url("Salary/f_emp_dtls"); ?>',
                {
                    emp_code: $(this).val() 
                }
            )

            .done(function(data){
                var parseData = JSON.parse(data);
				// basic=$('#basic').val() 
                console.log(parseData );
                $('#dist').val(parseData.district_name) 

            });

        });

    });
    
</script>


<script>
	
	$(document).ready(function(){
	
	
		var basic  = 0.00;
		
		$('#emp_code').change(function(){
	
			$.get( 
	
				'<?php echo site_url("Salary/f_sal_dtls");?>',
				{ 
	
					emp_code: $(this).val()
                    // rbt_add =$('#rbt_add').val() 	
				}
	
			)
			.done(function(data){
				var parseData = JSON.parse(data);
				// basic=$('#basic').val() 
                console.log(parseData );
                $('#basic').val(parseData.basic_pay) 
                $('#da').val(parseData.da) 
                $('#hra').val(parseData.hra) 
                $('#ma').val(parseData.ma) 
				
			});
	
		});
	
	});
	
</script>
