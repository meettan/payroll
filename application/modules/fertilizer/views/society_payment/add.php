<div class="wraper">      
            
			<div class="col-md-10 container form-wraper">
	
				<form method="POST" action="<?php echo site_url("socpay/society_payAdd") ?>" onsubmit="return valid_data()" id="form">
	
					<div class="form-header">
					
						<h4>Society and Payble Details</h4>
					
					</div>

                    <div class="form-group row">
						<label for="soc_id" class="col-sm-2 col-form-label">Society :</label>
						<div class="col-sm-3">
	
							<select name="soc_id" style="width:180px" class="form-control sch_cd required" id="soc_id" required>
	
	                            <option value="">Select</option>
	
                                <?php
                                
                                    foreach($socdtls as $soc){
                                
                                ?>
                                
                                    <option value="<?php echo $soc->soc_id;?>"><?php echo $soc->soc_name;?></option>
	
	                            <?php
	
		                            }
	
	                            ?>     
	
	                        </select>
						</div>
                        <label for="paid_dt" class="col-sm-2 col-form-label">Receipt Date:</label>
						<div class="col-sm-4">
	
						<input type="date" style="width:200px" id="paid_dt" name="paid_dt" class="form-control"/>
	                    </div>
                        <!-- </div> -->
                      </div>

                      <div class="form-group row">
                      <label for="trans_do" class="col-sm-2 col-form-label">Invoice No:</label>
						<div class="col-sm-3">
	                <select name="trans_do" style="width:180px" class="form-control required" id="trans_do">
                    <option value="">Select</option>
                    <?php
                       foreach($ro_dtls as $ro){
                            ?>
                    <option value="<?php echo $ro->trans_do;?>"><?php echo $ro->trans_do;?></option>
                    <?php    }    ?>     
                    </select>
                    </div>

                      <label for="do_dt" class="col-sm-2 col-form-label">Invoice Date:</label>
						<div class="col-sm-2">
	
						<input type="date" style="width:200px" id="do_dt" name="do_dt" class="form-control" readonly/>
	                    </div>
                        </div>

                        <div class="form-group row">
                      <label for="sale_ro" class="col-sm-2 col-form-label">RO No:</label>
						<div class="col-sm-3">
	
						<!-- <input type="text" style="width:180px" id="sale_ro" name="sale_ro" class="form-control"  /> -->
                        <select name="sale_ro" class="form-control sch_cd required" id="sale_ro"style="width:180px" required>

							<option value="">Select</option>

							<!-- <?php

								foreach($proddtls as $prod){

							?>

								<option value="<?php echo $prod->prod_id;?>"><?php echo $prod->prod_desc;?></option>

							<?php

								}

							?>      -->

							</select>
	                    </div>
                      <label for="tot_recvble_amt" class="col-sm-2 col-form-label">Total Invoice RO Amount:</label>
						<div class="col-sm-3">
	                    <input type="hidden"  id="tot_amt" name="tot_amt"  />
						<input type="text" style="width:200px" id="tot_recvble_amt" name="tot_recvble_amt" value="0" class="form-control" readonly />
	                    </div>
                        </div>
                        <div class="form-group row">
                      <!-- <label for="tot_recvble_amt" class="col-sm-2 col-form-label">Total Receivable Amount:</label>
						<div class="col-sm-3">
	                    <input type="hidden"  id="tot_amt" name="tot_amt"  />
						<input type="text" style="width:180px" id="tot_recvble_amt" name="tot_recvble_amt" class="form-control" readonly />
	                    </div> -->
                        <label for="tot_dr_amt" class="col-sm-2 col-form-label">Total Dr Note Amount:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="tot_dr_amt" name="tot_dr_amt" value="0" class="form-control"  readonly />
                        </div>
                         <label for="adv_amt" class="col-sm-2 col-form-label">Advance Amount:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:200px" id="adv_amt" name="adv_amt" value="0" class="form-control" readonly  />
                        </div>
                        </div>
                        <div class="form-group row">
                       
                        <label for="net_amt" class="col-sm-2 col-form-label">RO Net Amount<br>(Total Amount - Paid Amount):</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="net_amt" name="net_amt"value="0"  class="form-control" readonly />
                        </div>
                        <label for="bnk_id" class="col-sm-2 col-form-label">Bank Name :</label>
						<div class="col-sm-3">
                        <!-- <input type="text" style="width:200px" id="bnk_id" name="bnk_id"value=""  class="form-control"  /> -->
                        <select name="bnk_id" style="width:180px" class="form-control bnk_id" id="bnk_id">
                    <option value="">Select</option>
                    <?php
                       foreach($bnk_dtls as $bnk){
                            ?>
                <option value="<?php echo $bnk->sl_no;?>"><?php echo $bnk->bank_name;?></option>
                <?php    }    ?>     
                </select>
                        </div>
                        </div>
                        <div class="form-group row">
                        <!-- <label for="remarks" class="col-sm-2 col-form-label">Remarks :</label>
						<div class="col-sm-3">
                        <textarea class="form-control" style="width:200px;height:80px" name="remarks" id="remarks"></textarea>
                        </div> -->
                        
                        <label for="ifsc" class="col-sm-2 col-form-label">IFSC :</label>
						<div class="col-sm-3">
                        <input type="text" style="width:180px" id="ifsc" name="ifsc"value=""  class="form-control" readonly />
                        </div>
                        <label for="ac_no" class="col-sm-2 col-form-label">A/C No:</label>
						<div class="col-sm-3">
                        <input type="text" style="width:200px" id="ac_no" name="ac_no"value=""  class="form-control" readonly />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="remarks" class="col-sm-2 col-form-label">Remarks :</label>
						<div class="col-sm-3">
                        <textarea class="form-control" style="width:590px" name="remarks" id="remarks"></textarea>
                        </div>
                        </div>
                        <div class="form-group row">
                        
                        </div>

						<div class="form-header">
					
					<h4>Pay Type and Paid Details</h4>
				
				</div>
                <hr>

                <div class="row" style ="margin: 5px;">

                    <div class="form-group">

                        <table class= "table table-striped table-bordered table-hover">

                            <thead>
                                <th style= "text-align: center;width:100px">Pay Type</th>
                                <th style= "text-align: center;width:100px">Reference Date.</th>
                                <th style= "text-align: center;width:100px">Reference NO.</th>
								<th style= "text-align: center;width:100px">Amount</th>
                                <th>
                                    <button class="btn btn-success" type="button" id="addrow" style= "border-left: 10px" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
                                </th>

                            </thead>

                            <tbody id= "intro">
                                <tr>
                                
                                    <td>    
                                       
                 <select name="pay_type[]" id="pay_type" style="width:230px"class="form-control required pay_type" required>
                <option value="">Select Pay Type</option>
						<option value="1">Cash</option>
						<option value="2">Advance</option>
						<option value="3">Cheque</option>
                        <option value="4">Draft</option>
                        <option value="5">Pay Order</option>
                        <option value="6">DR Note</option>
                        <option value="7">NEFT/RTGS</option>
                   
            </select> 
                                    </td>
                                    <td>
                                      <input type="date" name="ref_dt[]" style="width:200px;" class="form-control ref_dt" value= "" id="ref_dt" >
                                    </td>
                                    <td>
                                      <input type="text" name="ref_no[]" style="width:200px;" class="form-control ref_no" value= "" id="ref_no" >
                                    </td>
									<td>
                                      <input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" required>
                                    </td>
                                    
                                   
                                </tr>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        Total:
                                    </td>
                                    <td colspan="2">
                                        <input name="total" style="width:150px;" id="total" class="form-control total" placeholder="Total" readonly>  
                                    </td>
                                </tr>
                            </tfoot>
                    
                        </table>

                    </div> 

                </div>

                
                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" id= "submit" class="btn btn-info" value="Save" />

                    </div>

                </div>

            </form>


        </div>

    </div>

</div>

<script>

        $(".sch_cd").select2();   // Code For Select Write Option


    $(document).ready(function(){

        // For add row option
        $('#addrow').click(function(){

            var newElement = '<tr>'
                                +'<td>'
                               +'<select name="pay_type[]" id="pay_type" style="width:230px"class="form-control required soc_id" required>'
                +'<option value="">Select Pay Type</option>'
                +'<option value="1">Cash</option>'
						+'<option value="2">Advance</option>'
						+'<option value="3">Cheque</option>'
                       + '<option value="4">Draft</option>'
                      +  '<option value="5">Pay Order</option>'
                                +'</td>'
                                +'<td>'
                                + '<input type="date" name="ref_dt[]" style="width:200px;" class="form-control ref_dt" value= "" id="ref_dt" >'
                                +'</td>'
                               +'<td>'
                                +'<input type="text" name="ref_no[]" style="width:200px;" class="form-control ref_no" value= "" id="ref_no" >'
                                +'</td>'
								+'<td>'
                                    +'<input type="text" name="paid_amt[]" style="width:130px;" class="form-control paid_amt" value= "" id="paid_amt" required>'
                                +'</td>'
                                +'<td>'
                                    +'<button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="fa fa-remove" aria-hidden="true"></i></button>'
                                +'</td>'
                            '</tr>';

            $("#intro").append($(newElement));

        });

        // $("#intro").on("click","#removeRow", function(){
        //     $(this).parents('tr').remove();
        //     var sum =0;        
         
        //        $("input[class *= 'br_amt']").each(function(){
        //    sum += parseFloat($(this).val());
                      
        //     });

        //     $("#total").val("0");
        //     $("#total").val(sum.toFixed(2));
        // });

        $('#nt').on("change", function(){
            var total = $(this).val();
            $('#total').val(total);
        })


        $('.total').change(function(){

            var total = $('#nt').val();
            var ntAmount = $('#nt').val();
            $('.cgst_val').each(function(){

                var curr_gst_val = $(this).val();
                total = parseFloat(total)+parseFloat(parseFloat(curr_gst_val)*2);
               

            })
            $('#total').val(parseFloat(total).toFixed());

            var total_subAmnt = 0;
            $('.sub_amnt').each(function(){

                var tot_sub_amnt = $(this).val();
                total_subAmnt = parseFloat(total_subAmnt)+parseFloat(tot_sub_amnt);
                
                if(parseFloat(ntAmount)<parseFloat(total_subAmnt))
                {
                    $('#nt').css('border-color', 'red');
                    $('#submit').prop('disabled', true);
                    return false;
                }
                else
                {
                    $('#nt').css('border-color', 'green');
                    $('#submit').prop('disabled', false);
                    return true;
                }

                
            })

        });

    })

</script>

<script>

$(document).ready(function(){

    var i = 2;

  

     $('#do_no').change(function(){

        $.get( 

            '<?php echo site_url("fertilizer/do_detail");?>',
            { 

                do_no: $(this).val(),
               
            }

        )
        .done(function(data){

            var datas = JSON.parse(data);
            
           
            $('#ro_dt').val(datas.do_dt);
            $('#invoice_no').val(datas.invoice_no);
            $('#invoice_dt').val(datas.invoice_dt);
            $('#company').val(datas.COMP_NAME);
            $('#comp_id').val(datas.comp_id);
            $('#gst_no').val(datas.GST_NO);
            $('#tot_amt').val(datas.tot_cr_amt);
            $('#tot_amts').val(datas.tot_cr_amt);
        });

    });

});

 $('.table tbody').on('change', '.qty', function(){

   
          
            let row          = $(this).closest('tr');
            var qty          = row.find('td:eq(3) .qty').val();
        
            
            var stock        = row.find('td:eq(2) .stock_qty').val();

         
                if (parseFloat(qty)>parseFloat(stock)  ){
              //  var zero_qty          = null;
               
                row.find('td:eq(3)  input').val("0");
             
                alert('Sale Quantity Should Not Be Greater Than Stock Quantity!');

              }
           
                      
            })
 $('.table tbody').on('change', '.soc_amt', function(){
   
           var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });

            $("#total").val("0");
            $("#total").val(sum).toFixed(2);
                      
            })

        
   $('#form').submit(function(event){

          
                 var tot_cr_amt = parseFloat($('#tot_amt').val());


                 var sum =0;
            let row   = $(this).closest('tr');
                    
            $("input[class *= 'soc_amt']").each(function(){
            sum += parseFloat($(this).val());
                      
            });


                 var total      = parseFloat($('#total').val());

                    if(tot_cr_amt < sum) {

                         alert("Total Debit Exceed Limit");
                                      
                         event.preventDefault();
                    }
                     else 
                        {
                    //  alert("Transaction Date Can Not Be Less Than order Date");

                       $('#submit').attr('type', 'submit');
                      }
        });
</script>

<script>

$(document).ready(function(){

	var i = 2;

	$('#trans_do').change(function(){

		$.get( 

			'<?php echo site_url("socpay/f_get_ro_dt");?>',
			{ 

				trans_do: $(this).val(),
				
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			
			var do_dt = parseData[0].do_dt;
			$('#do_dt').val(do_dt);
           
		});
        

	});

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#soc_id').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_payro");?>',

            { 

                soc_id: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.trans_do + '">' + value.trans_do + '</option>'

            });

            $('#trans_do').html(string);


          });


    });

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#trans_do').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_ro_dt");?>',

            { 

                trans_do: $(this).val()

            }

        ).done(function(data){

            var string = '<option value="">Select</option>';

            $.each(JSON.parse(data), function( index, value ) {

                string += '<option value="' + value.sale_ro + '">' + value.sale_ro + '</option>'

            });

            $('#sale_ro').html(string);


          });


    });

});
</script>



<script>

$(document).ready(function(){

    var i = 0;

    $('#sale_ro').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_ro_dt");?>',

            { 

                trans_do: $('#trans_do').val()
                // sale_ro: $('#sale_ro').val()

            }

        ).done(function(data){

            var parseData = JSON.parse(data);
            
			var tot_recvble_amt = parseData[0].tot_amt;
            // var sale_ro = parseData[0].sale_ro;
			// $('#tot_recvble_amt').val(tot_recvble_amt);
            // $('#sale_ro').val(sale_ro)
            var tot_dr_amt = parseFloat($('#tot_dr_amt').val());
            var adv_amt    = parseFloat($('#adv_amt').val());
            // var tot_recvble_amt = parseFloat($('#tot_recvble_amt').val());
            // var net_amt = tot_recvble_amt - 
          });


    });

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#sale_ro').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_advamt_dr");?>',

            { 

                soc_id: $('#soc_id').val()

            }

        ).done(function(data){

            var parseData = JSON.parse(data);
            
			var adv_amt = parseData[0].adv_amt;
           
			 $('#adv_amt').val(adv_amt);
             
          });


    });

});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#sale_ro').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_adv_net_amt");?>',

            { 

                soc_id: $('#soc_id').val(),
                trans_do: $('#trans_do').val(),
                sale_ro: $('#sale_ro').val(),
                // tot_recvble_amt: $('#tot_recvble_amt').val()

            }

        ).done(function(data){

            var parseData = JSON.parse(data);
            
			var net_amt = parseData[0].net_amt;
            var tot_ro_amt = parseData[0].tot_ro_amt;
            $('#tot_recvble_amt').val(tot_ro_amt);
//  var tot_recvble_amt = parseFloat($('#tot_recvble_amt').val());
           
			 $('#net_amt').val(net_amt);
             
          });


    });

});
</script>

<script>
$(document).ready(function(){
    
$('#intro').on( "change", ".paid_amt", function(){

$("#total").val('');
var total = 0;
$('.paid_amt').each(function(){
    total += +$(this).val();
})
$("#total").val(total);

});
$("#intro").on("click","#removeRow", function(){
    console.log('ok');

    $(this).parent().parent().remove();
    $('.paid_amt').change();
})
});
</script>

<script>

$(document).ready(function(){

    var i = 0;

    $('#sale_ro').change(function(){

        $.get( 

            '<?php echo site_url("socpay/f_get_amt_dr");?>',

            { 

                soc_id: $('#soc_id').val(),
                

            }

        ).done(function(data){

            var parseData = JSON.parse(data);
            
			var tot_dr_amt = parseData[0].tot_amt;
           
			 $('#tot_dr_amt').val(tot_dr_amt);
             
          });


    });

});
</script>



<script>

$(document).ready(function(){

    $('#intro').on("change", ".paid_amt", function(){

        var net_amt    =   $('#net_amt').val();
        var total               =   $('#total').val();

        // console.log(tot_dist_qty_qnt);
        // console.log(total);

        if(parseFloat(total) > parseFloat(net_amt))
        {
            $('#total').css('border-color', 'red');
            alert('Paid Amount Should Not Greater Than Net Amount!');
            $('#submit').prop('disabled', true);
            
            return false;
        }
        else
        {
            $('#submit').prop('disabled', false);
            $('#total').css('border-color', 'gray');
            return true;
        }

    })

})

</script>
  <!-- </script> -->

<script>
$(document).ready(function(){
$("#paid_dt").change(function(){

var ro_dt = $('#paid_dt').val();



var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
(month<10 ? '0' : '') + month + '-' +
(day<10 ? '0' : '') + day;

// console.log(trans_dt,output);

if(new Date(output) <new Date(ro_dt))
{
alert("Receipt Date Can Not Be Greater Than Current Date");
$('#submit').attr('type', 'buttom');
return false;
}else{
   $('#submit').attr('type', 'submit');
}
})
});
</script>

  <!-- </script> -->

<script>
$(document).ready(function(){
$("#sale_ro").change(function(){

var ro_dt = $('#paid_dt').val();
var invoice_dt = $('#do_dt').val();

if(new Date(invoice_dt) >new Date(ro_dt))
{
alert("Receipt Date Can Not Be less Than invoice Date");
$('#submit').attr('type', 'buttom');
return false;
}else{
   $('#submit').attr('type', 'submit');
}
})
});
</script>

<script>

$(document).ready(function(){

	var i = 2;

	$('#bnk_id').change(function(){

		$.get( 

			'<?php echo site_url("socpay/f_get_dist_bnk_dtls");?>',
			{ 

				bnk_id: $(this).val(),
				
				
			}

		)
		.done(function(data){

			//console.log(data);
			var parseData = JSON.parse(data);
			var ac_no = parseData[0].ac_no;
			var ifsc = parseData[0].ifsc;
            $('#ac_no').val(ac_no);
			$('#ifsc').val(ifsc);
           
		});
        

	});

});
</script>

