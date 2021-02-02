<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>




    

        <div class="wraper"> 

            <div class="col-lg-12 container contant-wraper">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>THE WEST BENGAL STATE CO.OP.MARKETING FEDERATION LTD.</h2>
                        <h4>HEAD OFFICE: SOUTHEND CONCLAVE, 3RD FLOOR, 1582 RAJDANGA MAIN ROAD, KOLKATA-700107.</h4>
                        <h4>Stock Statement Between: <?php echo $_SESSION['date']; ?></h4>
                        <h5 style="text-align:left"><label>District: </label> <?php echo $branch->district_name; ?></h5>
<<<<<<< HEAD
                        <h5 style="text-align:left"><label>Company: </label> <?php  if($product){ foreach($product as $prodtls);
                            echo $prodtls->short_name;
                          }?></h5>
=======
                        <h5 style="text-align:left"><label>Company: </label> <?php  
                        if($product){ foreach($product as $prodtls);
                            echo $prodtls->COMP_NAME;}?></h5>
                            <h5 style="text-align:left"><label>Product: </label> <?php  
                        if($product){ foreach($product as $prodtls);
                           echo $prodtls->PROD_DESC;}?></h5>
>>>>>>> 8c02b574e336f63f00e21d64813ef4dede8e2db4

                    </div>
                  

                    <table style="width: 100%;" id="example">

                        <thead>

                            <tr>
                            
                                <th>Sl No.</th>

                              <!--   <th>Company</th> -->

<<<<<<< HEAD
                                <!-- <th>Product</th> -->
=======
                              
>>>>>>> 8c02b574e336f63f00e21d64813ef4dede8e2db4

                                <th>Trans Date</th>

                                <th>Detail</th>

                               

                                <th>Unit</th>

                                <th>Opening</th>

                                <th>Purchase during the period</th>

                                <th>Sale during the period</th>

                                <th>Closing</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($product){ 

                                    $i = 1;
                                    $total = 0.00;
                                    $val =0;

                                        foreach($product as $prodtls){
                            ?>

                                <tr class="rep">
                                     <td class="report"><?php echo $i++; ?></td>
                                 <!--     <td class="report"><?php //echo $prodtls->short_name; ?> -->
<<<<<<< HEAD
                                    <td class="report"><?php echo $prodtls->do_dt; ?> </td>
                                    <td class="report"><?php echo $prodtls->trans_do; ?> </td>
                                 
=======
                                     
                                     <td class="report"><?php echo $prodtls->ro_no; ?>
>>>>>>> 8c02b574e336f63f00e21d64813ef4dede8e2db4
                                     <td class="report"><?php if($prodtls->unit==3){
                                                  echo "Litre";
                                                }else if ($prodtls->unit==5){
                                                  echo "ML"; 
                                                }else if ($prodtls->unit==1){
                                                    echo "MT";
                                                }else if ($prodtls->unit==2){ 
                                                    echo "Kg";
                                                }else if ($prodtls->unit==4){ 
                                                    echo "Quintal";
                                                }else if ($prodtls->unit==6){
                                                    echo "Gm";
                                                }else if ($prodtls->unit==7){
                                                    echo "Pc";
                                                }
                                        ?>
                                     </td>
                                     <td class="report opening" id="opening">
                                        <?php 
                                            foreach($opening as $opndtls){
                                                if($prodtls->ro_no==$opndtls->ro_no){
                                                    echo $opndtls->opn_qty;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report purchase" id="purchase">
                                        <?php 
                                            foreach($purchase as $purdtls){
                                                if($prodtls->ro_no==$purdtls->ro_no){
                                                    echo $purdtls->tot_pur;
                                                }
                                            }
                                        ?>
                                     </td>
                                     <td class="report sale" id="sale">
                                        <?php 
                                            foreach($sale as $saledtls){
                                                if($prodtls->ro_no==$saledtls->sale_ro){
                                                    echo $saledtls->tot_sale;
                                                }
                                            }
                                        ?>
                                     </td>

                                     <td class="report closing" id="closing">
                                        <?php 
                                            foreach($closing as $clsdtls){
                                                if($prodtls->ro_no==$clsdtls->ro_no){
                                                    echo $clsdtls->opn_qty;               
                                                }
                                            }
                                        ?>
                                     </td>
                                   
                                </tr>
 
                                <?php  
                                                        
                                    }
                                ?>

 
                                <?php 
                                       }
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>

                </div>   
                
                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
                   <!-- <button class="btn btn-primary" type="button" id="btnExport" >Excel</button>-->

                </div>

            </div>
            
        </div>