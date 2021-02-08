<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Salary Parameters</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Description</th>
                        <th>Value</th> 
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
        
                        <td>
                            <a href="vlsedt?sl_no=<?php echo $key->sl_no; ?>" 
                                data-toggle="tooltip"
                                data-placement="bottom" 
                                title="Edit"
                            >

                                <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                
                            </a>
                        </td>

                    </tr>

                    <?php
                        }
                    ?>

                </tbody>

                <tfoot>

                    <tr>
                    
                        <th>Sl. No.</th>
                        <th>Description</th>
                        <th>Value</th> 
                        <th>Option</th>

                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready(function() {

        $('#dataTables-example').DataTable();

    });

</script>