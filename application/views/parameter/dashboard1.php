


<div class="wraper">      
        
    <div class="row">
        
        <div class="col-lg-9 col-sm-12">

            <h1><strong>Salary Parameters</strong></h1>

        </div>

    </div>

    <div class="col-lg-12 container contant-wraper">    

        <!-- <h3>

            <small><a href="<?php echo site_url("Disaster/addItem");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
            <span class="confirm-div" style="float:right; color:green;"></span>

        </h3> -->

        <table class="table table-striped table-bordered table-hover" id="dataTables-example" >

            <thead>

                <tr>
                    <th>Sl No.</th>
                    <th>Description</th>
                    <th>Value</th>
                    <!-- <th>Unit</th> -->
                    <th>Option</th>

                </tr>

            </thead>

            <tbody>

                <?php
                    foreach($parameter as $key)
                    {
                ?>
                    <tr>
                         <td><?php echo $key->sl_no; ?></td>
                        <td><?php echo $key->param_desc; ?></td>
                        <td><?php echo $key->param_value; ?></td>
                        <!-- <td><?php echo $key->unit; ?></td> -->
                        <!-- <td><a href="<?php echo site_url('payroll/edit/'.$key->sl_no.' '); ?>"><i class="fa fa-edit fa-fw fa-2x"></i></a></td> -->
                        <td>
                                
                                <a href="vlsedt?sl_no=<?php echo $key->sl_no; ?>" 
                                    data-toggle="tooltip"
                                    data-placement="bottom" 
                                    title="Edit"
                                >

                                    <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    
                                </a>
                    </tr>

                <?php
                    }
                ?>

            </tbody>

        </table>

    </div>

</div>

<!-- DataTables JavaScript -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });
</script>