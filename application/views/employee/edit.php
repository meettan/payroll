<div class="wraper">      

<div class="col-md-6 container form-wraper">

    <form method="POST" 
        id="form"
        action="<?php echo site_url("estem");?>" >

        <div class="form-header">
        
            <h4>Employee Details</h4>
        
        </div>

        <div class="form-group row">

            <label for="emp_code" class="col-sm-2 col-form-label">Employee Code:</label>

            <div class="col-sm-10">

                <input type="text"
                        name="emp_code"
                        class="form-control required"
                        id="emp_code"
                        value="<?php echo $employee_dtls->emp_code; ?>"
                        readonly
                />

            </div>

        </div>

        <div class="form-group row">

            <label for="emp_name" class="col-sm-2 col-form-label">Employee Name:</label>

            <div class="col-sm-10">

                <input type="text"
                        name="emp_name"
                        class="form-control required"
                        id="emp_name"
                        value="<?php echo $employee_dtls->emp_name; ?>"
                />

            </div>

        </div>

        <div class="form-group row">

            <label for="emp_catg" class="control-lebel col-sm-2 col-form-label">Category:</label>

                <div class="col-sm-10">

                    <select
                        class="form-control required"
                        name="emp_catg"
                        id="emp_catg"
                    >

                        <option value="">Select Category</option>

                        <?php foreach($category_dtls as $c_list) {

                        ?>
                            <option value="<?php echo $c_list->category_code ?>" 
                                    <?php echo ($employee_dtls->emp_catg == $c_list->category_code)? 'selected':'';?>>
                                    <?php echo $c_list->category_type; ?>
                            </option>

                        <?php

                        }

                        ?>

                    </select>   

                </div>
        </div>

        <div class="form-group row">

            <label for="join_dt" class="col-sm-2 col-form-label">Date of Birth:</label>

            <div class="col-sm-4">

                <input type="date"
                    class="form-control required"
                    name="dob"
                    id="dob"
                    value="<?php if(isset($employee_dtls->dob)) { 
                        
                                    echo $employee_dtls->dob;
                
                                }
                            ?>"
                />

            </div>

        </div>

        <div class="form-group row">

            <label for="join_dt" class="col-sm-2 col-form-label">Joining Date:</label>

            <div class="col-sm-4">

                <input type="date"
                    class="form-control"
                    name="join_dt"
                    id="join_dt"
                    value="<?php if(isset($employee_dtls->join_dt)) { 
                        
                                        echo $employee_dtls->join_dt;
                                
                                }
                            ?>"
                />

            </div>

            <label for="ret_dt" class="col-sm-2 col-form-label">Retirement Date:</label>

            <div class="col-sm-4">

                <input type="date"
                    class="form-control"
                    name="ret_dt"
                    id="ret_dt"
                    value="<?php if(isset($employee_dtls->ret_dt)) { 
                        
                                        echo $employee_dtls->ret_dt;
                                
                                }
                            ?>"
                />

            </div>

        </div>

        <div class="form-group row">

            <label for="email" class="col-sm-2 col-form-label">Email:</label>

            <div class="col-sm-4">

                <input type="email"
                    class= "form-control"
                    name = "email"
                    id   = "email"
                    value="<?php echo $employee_dtls->email; ?>"
                />

            </div>

            <label for="phn_no" class="col-sm-2 col-form-label">Phone No.:</label>

            <div class="col-sm-4">

                <input type="text"
                    class= "form-control"
                    name = "phn_no"
                    id   = "phn_no"
                    value="<?php echo $employee_dtls->phn_no; ?>"
                />

            </div>

        </div> 

        <div class="form-group row">

            <label for="designation" class="col-sm-2 col-form-label">Designation:</label>

            <div class="col-sm-4">

                <input type="text"
                    class= "form-control required"
                    name = "designation"
                    id   = "designation"
                    value="<?php echo $employee_dtls->designation; ?>"
                />

            </div>

            <label for="department" class="col-sm-2 col-form-label">Department:</label>

            <div class="col-sm-4">

                <input type="text"
                    class= "form-control"
                    name = "department"
                    id   = "department"
                    value="<?php echo $employee_dtls->department; ?>"
                />

            </div>

        </div> 

        <div class="form-group row">

            <label for="location" class="col-sm-2 col-form-label">Address:</label>

            <div class="col-sm-10">

                <textarea type="text"
                    class= "form-control required"
                    name = "emp_addr"
                    id   = "emp_addr"
                ><?php echo $employee_dtls->emp_addr; ?></textarea>

            </div>

        </div>  

        <div class="form-header">
        
            <h4>Basic Pay</h4>
        
        </div>

        <div class="form-group row">

            <label for="basic_pay" class="col-sm-2 col-form-label band_pey">Basic Pay:</label>

            <div class="col-sm-10">

                <input type="text"
                    class= "form-control required"
                    name = "basic_pay"
                    id   = "basic_pay"
                    value="<?php echo $employee_dtls->basic_pay; ?>"
                />

            </div>

        </div>  


        <div class="form-header">
        
            <h4>Bank & Other Details</h4>
        
        </div> 

        <div class="form-group row">

            <label for="bank_name" class="col-sm-2 col-form-label">Bank Name:</label>

            <div class="col-sm-10">

                <input type="text"
                    class= "form-control"
                    name = "bank_name"
                    id   = "bank_name"
                    value="<?php echo $employee_dtls->bank_name; ?>"
                />

            </div>

        </div> 

        <div class="form-group row">

            <label for="bank_ac_no" class="col-sm-2 col-form-label">A/C No.:</label>

            <div class="col-sm-10">

                <input type="text"
                    class= "form-control"
                    name = "bank_ac_no"
                    id   = "bank_ac_no"
                    value="<?php echo $employee_dtls->bank_ac_no; ?>"
                />

            </div>

        </div> 

        <div class="form-group row">

            <label for="pf_ac_no" class="col-sm-2 col-form-label">PF A/C No.:</label>

            <div class="col-sm-10">

                <input type="text"
                    class= "form-control"
                    name = "pf_ac_no"
                    id   = "pf_ac_no"
                    value="<?php echo $employee_dtls->pf_ac_no; ?>"
                />

            </div>

        </div> 

        <div class="form-group row">

            <label for="pan_no" class="col-sm-2 col-form-label">Pan No.:</label>

            <div class="col-sm-4">

                <input type="text"
                    class= "form-control"
                    name = "pan_no"
                    id   = "pan_no"
                    value="<?php echo $employee_dtls->pan_no; ?>"
                />

            </div>

            <label for="aadhar" class="col-sm-2 col-form-label">Aadhar No.:</label>

            <div class="col-sm-4">

                <input type="text"
                    class= "form-control required"
                    name = "aadhar"
                    id   = "aadhar"
                    value="<?php echo $employee_dtls->aadhar_no; ?>"
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

$("#form").validate();

$(document).ready(function(){

    if(<?php echo $employee_dtls->emp_catg ?> != 1){

        $('.band_pey').text('Pay:');
        $('.grade_pey').hide();
    }

$('#emp_catg').change(function(){

    if($(this).val() == 1){

        $('.band_pey').text('Band Pay:');
        $('.grade_pey').show();

    }
    else{

        $('.band_pey').text('Pay:');
        
        $('.grade_pey').val('0.00');
        $('.grade_pey').hide();

    }

});

});

</script>
