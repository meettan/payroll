<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Employees Earning</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <h3>
            <a href="<?php echo site_url("slryad");?>" class="btn btn-primary" style="width: 100px;">Add</a>
                <span class="confirm-div" style="float:right; color:green;"></span>
        </h3>

        <table class="table table-bordered table-hover">

            <thead>

                <tr>
                
                    <th>Sl No.</th>
                    <th>Name</th>
                    <!-- <th>Category</th> -->
                    <th>Effective Date</th>
                    <th>Basic Pay</th>
                    <!-- <th>DA</th>
                    <th>HRA</th>
                    <th>Medical Allownce</th>
                    <th>Other Allownce</th> -->
            <!--	<th>Others</th>  -->
                    <th>Option</th>

                </tr>

            </thead>

            <tbody> 

                <?php 
                
                if($earning_dtls) {

                    
                        foreach($earning_dtls as $e_dtls) {

                ?>

                        <tr>

                            <td><?php echo $e_dtls->emp_code; ?></td>
                            <td><?php echo $e_dtls->emp_name; ?></td>
                            <!-- <td><?php echo $e_dtls->emp_catg; ?></td> -->
                            <td><?php echo date("d-m-Y", strtotime($e_dtls->effective_date)); ?></td>
                            <td><?php echo $e_dtls->basic_pay; ?></td>

                            <!-- <td><?php echo $e_dtls->da_amt; ?></td>
                            <td><?php echo $e_dtls->hra_amt; ?></td>
                            <td><?php echo $e_dtls->med_allow; ?></td>
                            <td><?php echo $d_dtls->othr_allow; ?></td> -->
            <!--<td><//?php echo $d_dtls->other_deduction;?></td>-->
                            <td>
                            
                                <!-- <a href="deduction/edit?emp_cd=<?php echo $d_dtls->emp_cd; ?>&month=<?php echo $d_dtls->sal_date; ?>" 
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Edit"
                                >

                                    <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    
                                </a> -->

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <button 
                                    type="button"
                                    class="delete"
                                    id="<?php echo $d_dtls->emp_cd; ?>"
                                    date="<?php echo $d_dtls->sal_date; ?>"
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Delete"
                                    
                                >

                                    <i class="fa fa-trash-o fa-2x" style="color: #bd2130"></i>

                                </button>
                                
                            </td>

                        </tr>

                <?php
                        
                        }

                    }

                    else {

                        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                    }
                ?>
            
            </tbody>

            <tfoot>

                <tr>
                <th>Sl No.</th>
                    <th>Name</th>
                    <!-- <th>Category</th> -->
                    <th>Effective Date</th>
                    <th>Basic Pay</th>
                    <!-- <th>DA</th>
                    <th>HRA</th>
                    <th>Medical Allownce</th>
                    <th>Other Allownce</th> -->
            <!--	<th>Others</th>  -->
                    <th>Option</th>

                </tr>
            
            </tfoot>

        </table>
        
    </div>

</div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {

            var id = $(this).attr('id'),
                date = $(this).attr('date');

            var result = confirm("Do you really want to delete this record?");

            if(result) {

                window.location = "<?php echo site_url('payroll/deduction/delete?empcd="+id+"&saldate="+date+"');?>";

            }
            
        });

    });

</script>

<script>
   
   $(document).ready(function() {

   $('.confirm-div').hide();

   <?php if($this->session->flashdata('msg')){ ?>

   $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();

   });

   <?php } ?>
   
</script>
