    <div class="wraper">      
        
        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                action="<?php echo site_url("slryed");?>" >

                <div class="form-header">
                
                    <h4>Edit Earning</h4>
                
                </div>

                <div class="form-group row">

                    <label for="date" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                name="sal_date"
                                class="form-control required"
                                id="sal_date"
                                value="<?php echo $earning_dtls->effective_date;?>"
                                readonly
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="emp_cd" class="col-sm-2 col-form-label">Employee code:</label>

                    <div class="col-sm-10">

                        <input type="text"
                                name="emp_code"
                                class="form-control required"
                                id="emp_code"
                                value="<?php echo $earning_dtls->emp_code;?>"
                                readonly
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="emp_cd" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="text"
                                name="empname"
                                class="form-control required"
                                id="empname"
                                value="<?php echo $earning_dtls->emp_name;?>"
                                readonly
                        >

                    </div>

                </div> 

                <div class="form-group row">

                    <label for="category" class="col-sm-2 col-form-label">Category:</label>

                    <div class="col-sm-10">

                        <input type = "text"
                            class= "form-control"
                            name = "category"
                            id   = "category"
                            value="<?php echo $earning_dtls->category_type;?>"
                            readonly
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
                            value="<?php echo $earning_dtls->district_name;?>"
                            readonly required
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="basic" class="col-sm-2 col-form-label">Basic Pay:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "basic"
                            id   = "basic"
                            value="<?php echo $earning_dtls->basic_pay;?>"
                            readonly
                        />

                    </div>


                    <label for="da" class="col-sm-2 col-form-label">DA:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "da"
                            id   = "da"
                            value="<?php echo $earning_dtls->da_amt;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="hrm" class="col-sm-2 col-form-label">HRA:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "hra"
                            id   = "hra"
                            value="<?php echo $earning_dtls->hra_amt;?>"
                        />

                    </div>

                
                    <label for="ma" class="col-sm-2 col-form-label">Medical Allowance:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "ma"
                            id   = "ma"
                            value="<?php echo $earning_dtls->med_allow;?>"
                        />

                    </div>

                </div>


                <div class="form-group row">

                    <label for="oa" class="col-sm-2 col-form-label">Other Allownce:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "oa"
                            id   = "oa"
                            value="<?php echo $earning_dtls->othr_allow;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                        <button type="submit" class="btn btn-info">Save</button>

                    </div>

                </div>

            </form>
        
        </div>

    </div>