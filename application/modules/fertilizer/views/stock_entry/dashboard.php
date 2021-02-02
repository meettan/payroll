<div class="wraper">      
        
        <div class="row">
            
            <div class="col-lg-9 col-sm-12">

                <h1><strong>Purchase Entry</strong></h1>

            </div>

        </div>

        <div class="col-lg-12 container contant-wraper">    

            <h3>
		        <small><a href="<?php echo site_url("stock/stockAdd");?>" class="btn btn-primary" style="width: 100px;">Add</a></small>
                    <span class="confirm-div" style="float:right; color:green;"></span>
                <div class="input-group" style="margin-left:75%;">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search..." id="search" style="z-index: 0;">
                </div>
            </h3>

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                    	<th>Sl No.</th>
                        <th>Purchase Date</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Ro No</th>
            			<th>Ro Date</th>
                        <th>Invoice no</th>
                        <th>Invoice Date</th>
            			<th>View</th>
                        <th>Delete</th>
                    </tr>

                </thead>

                <tbody> 

                    <?php 
                        $i=0;
                    if($data) {
                            foreach($data as $value) {
		    ?>

                            <tr>   
                                <td><?php echo ++$i; ?></td>
                                <td style="display:none"><?php echo date('Y',strtotime($value->trans_dt)); ?></td>
                                <td style="display:none"><?php echo date('m',strtotime($value->trans_dt)); ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->trans_dt)); ?></td>
                                <td><?php echo $value->PROD_DESC; ?></td>
                                <td><?php echo $value->qty; ?></td>
                                <td><?php echo $value->ro_no; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->ro_dt)); ?></td>
                                
				                <td><?php echo $value->invoice_no; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($value->invoice_dt)); ?></td>
                                <!-- <td><?php echo $value->invoice_dt; ?></td> -->
                                <!-- <td style="visibility:hidden;"><?php echo $value->challan_flag; ?></td> -->
                                <!-- <td id="challan_flag"><?php echo $value->challan_flag; ?> -->
                                  <!-- <td>   -->
                                    <input type="hidden" name="challan_flag" id="challan_flag" value="<?php echo $value->challan_flag; ?>">
                                <!-- </td> -->
			 	                <td><a href="viewstock?ro_no=<?php echo $value->ro_no;?>&comp=<?php echo $value->comp_id;?>" 
                                        data-toggle="tooltip" data-placement="bottom" title="Edit">

                                        <i class="fa fa-edit fa-2x" style="color: #007bff"></i>
                                    </a> 
                                </td>
                                <td><button type="button" class="delete" id="<?php echo $value->ro_no;?>"    
                                       
                                        data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="myFunction()">

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
                        <th>Purchase Date</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Ro No</th>
                        <th>Ro Date</th>
                        <th>Invoice no</th>
                        <th>Invoice Date</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                
                </tfoot>

            </table>
            
        </div>

    </div>

<script>

    $(document).ready( function (){

        $('.delete').click(function () {
            
            var id = $(this).attr('id');

            var ids = $(this).closest('tr').find('td:eq(6)  input').val();
            var challan_flag = $('#challan_flag').val();
            // echo(ids);
            // die
           if( challan_flag== "N" ){  
       
        //   alert("You Can Not Delete");
        //    } else{
            var result = confirm("Do you really want to delete this record?");
           
            if(result) {

                window.location = "<?php echo site_url('stock/deletero?ro_no="+id+"');?>";

            }
        }
            
        });

    });

</script>

<script>

    $(document).ready(function() {

    <?php if($this->session->flashdata('msg')){ ?>
	window.alert("<?php echo $this->session->flashdata('msg'); ?>");
    });

    <?php } ?>
</script>


<script>
function myFunction() {
	var challan_flag = $('#challan_flag').val();
	//  alert(salerate);
	if(challan_flag=='Y'){
		alert('Some Sale Transaction has Occured ! Delete Not Possible!');
		// $('#submit').attr('type', 'buttom');
		event.preventDefault();
	}else{
	// $('#submit').attr('type', 'submit');
	}
}
</script>