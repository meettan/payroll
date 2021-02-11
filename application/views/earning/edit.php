    <div class="wraper">      
        
        <div class="col-md-6 container form-wraper">

            <form method="POST" 
                action="<?php echo site_url("slryed");?>" >

                <div class="form-header">
                
                    <h4>Edit Earning</h4>
                
                </div>

                <!-- <div class="form-group row">

                    <label for="sal_yr" class="col-sm-2 col-form-label">Date:</label>

                    <div class="col-sm-10">

                        <input type="date"
                                name="sal_date"
                                class="form-control required"
                                id="sal_date"
                                value="<?php echo $deduction_dtls->sal_date;?>"
                                readonly
                        />

                    </div>

                </div> -->

                <div class="form-group row">

                    <label for="emp_cd" class="col-sm-2 col-form-label">Name:</label>

                    <div class="col-sm-10">

                        <input type="hidden"
                                name="emp_cd"
                                id="emp_cd"
                                value="<?php echo $earning_dtls->emp_cd;?>"
                                readonly
                        >

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
                            value="<?php echo $earning_dtls->emp_catg;?>"
                            readonly
                        />

                    </div>

                </div>
 

                <!-- <div class="form-group row"> -->

                    <!-- <label for="sal_month" class="col-sm-2 col-form-label">Month:</label>

                        <div class="col-sm-4">

                            <select
                                        class="form-control required"
                                        name="sal_month"
                                        id="sal_month"
                                        required
                            >

                                <option value="">Select Month</option>

                                <?php 
                                
                                foreach($month_list as $m_list) {?>

                                    <option value="<?php echo $m_list->month_name; ?>" 
                                            <?php echo ($m_list->month_name == $deduction_dtls->sal_month) ? "selected":""; ?>
                                    
                                    ><?php echo $m_list->month_name; ?></option>

                                <?php
                                }
                                ?>

                            </select>   

                        </div> -->
                

                    <!-- <label for="sal_yr" class="col-sm-2 col-form-label">Year:</label>

                    <div class="col-sm-4">

                        <input type="text"
                            class="form-control required"
                            name="sal_yr"
                            id="sal_yr"
                            value="<?php echo $deduction_dtls->sal_yr;?>"
                            readonly required	
                        />

                    </div> -->

                <!-- </div> -->

                <div class="form-group row">

                    <label for="basic" class="col-sm-2 col-form-label">basic Pay:</label>

                    <div class="col-sm-4">

                        <input type = "text"
                            class="form-control required"
                            name = "basic"
                            id   = "basic"
                            value="<?php echo $earning_dtls->basic_pay;?>"
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

                
                    <label for="ma" class="col-sm-2 col-form-label">MA:</label>

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
