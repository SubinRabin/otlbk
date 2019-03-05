<!DOCTYPE html>
<html>
<script type="text/javascript">
    // window.print();
    
</script>
<head>

    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFF;
        }

        table {
            /*background-color: #f7f7f7;*/
            background-color: aliceblue;
        }

        .print-wrapper {
            padding: 2em 4em;
        }

        hr {
            border-color: #ccc;
        }

        .m-0 {
            margin: 0;
        }
        .m-t-30 {
            margin-top: 30px;
        }
        .info-table th {
            width: 15%;
            border-right: 1px dashed #ccc;
        }
        .info-table thead {
            background-color: ghostwhite;
            border: 1px solid #ccc;
        }

        @media print {
            .print-wrapper {
                padding: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="print-wrapper">
        <form id="form1" runat="server">
            <div class="row">
                <div class="col-md-12">
                    <!-- INVOICE HEAD -->
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-right">
                                <img width="100" src="<?php echo base_url(); ?>skin/images/logo.png" alt="Logo" />
                            </h4>
                        </div>
                        <div class="pull-right">
                            <address class="text-right">
                                <strong><?php echo $view[0]->hotel_name  ?></strong><br />
                                <?php echo $view[0]->sale_address  ?><br />
                                Ph : <?php echo $view[0]->sale_number  ?> | Email : <?php echo $view[0]->sale_mail  ?>
                            </address>
                        </div>
                    </div>
                    <hr class="m-0" />
                 <!-- INVOICE DETAILS -->
                    <div class="row">
                        <h3 style="padding-left: 10px;" class="text-primary"><strong>Invoice</strong></h3>
                        <div class="col-xs-6">
                            <label class="control-label">Issued To :</label>
                            <address style="padding-left: 25px;">
                                <strong><?php echo $view[0]->bk_contact_fname ?> <?php echo isset($view[0]->bk_contact_fname) ? $view[0]->bk_contact_fname : '' ?></strong><br />
                                Ph : <?php echo $view[0]->bk_contact_number  ?> | Email : <?php echo $view[0]->bk_contact_email  ?>
                            </address>
                        </div>
                        <div class="co-xs-6 text-right">
                            <p><strong>Date: </strong>
                                <strong><?php echo $view[0]->date  ?></strong></p>
                            <p class="m-t-10"><strong>Invoice No: </strong>
                                <strong><?php echo $view[0]->invoice_id  ?></strong></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table m-t-30 info-table">
                            <thead>
                                <tr>
                                    <th><p><b>Hotel Name</b></p><p><small><?php echo $view[0]->hotel_name  ?></small></p></th>
                                    <th><p><b>Room Type</b></p><p><small><?php echo $view[0]->Room_Type  ?></small></p></th>
                                    <th><p><b>Days</b></p><p><small><?php echo $view[0]->no_of_days  ?></small></p></th>
                                    <th><p><b>No of Rooms</b></p><p><small><?php echo 
                                    $view[0]->book_room_count  ?></small></p></th>
                                    <th><p><b>Check Out</b></p><p><small><?php echo $view[0]->check_out  ?></small></p></th>
                                    <th><p><b>Check Out</b></p><p><small><?php echo $view[0]->check_out  ?></small></p></th>
                                </tr>
                            </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Adults and childs details -->
                    <div class="row">
                        <div class="col-sm-12" style="background-color: ghostwhite;">
                           <div class="col-xs-6" style="border-right: 1px dashed #bbb; border-radius: 5px;">
                               <label>Adult(s) Details <span class="badge"><?php echo 
                                    $view[0]->adults_count*$view[0]->book_room_count  ?></span></label>
                           </div>
                           <div class="col-xs-6">
                               <label>Child(s) Details <span class="badge"><?php echo 
                                    $view[0]->childs_count*$view[0]->book_room_count  ?></span></label>
                           </div>
                        </div>
                    </div>
                     <!-- INVOICE ITEMS -->
                     <?php
                        $start = $view[0]->check_in;
                        $end = $view[0]->check_out;
                        $first_date = strtotime($start);
                        $second_date = strtotime($end);
                        $offset = $second_date-$first_date; 
                        $result = array();
                        $checkin_date=date_create($view[0]->check_in);
                        $checkout_date=date_create($view[0]->check_out);
                        $no_of_days=date_diff($checkin_date,$checkout_date);
                        $tot_days = $no_of_days->format("%a");
                        for($i = 0; $i <= floor($offset/24/60/60); $i++) {
                            $result[1+$i]['date'] = date('d-m-Y', strtotime($start. ' + '.$i.'  days'));
                            $result[1+$i]['day'] = date('l', strtotime($start. ' + '.$i.' days'));
                        }
                        $total_markup = $view[0]->agent_markup+$view[0]->admin_markup+$view[0]->search_markup;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                <thead>
                                    <tr><th>Rank</th><th>Date</th><th>day</th><th>Amount</th></tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=1; $i <= $tot_days; $i++) { ?>
                                    <tr><th>1</th><td><?php echo $result[$i]['date'] ?></td><td><?php echo $result[$i]['day'] ?></td><td><?php echo $view[0]->Preferred_Currency ?> <?php echo ((($view[0]->normal_price*$total_markup)/100)+$view[0]->normal_price*$view[0]->book_room_count); ?></td></tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- INVOICE SUMMARY -->
                    <div class="row m-t-20">
                        <div class="col-xs-9">
                            <h5>Terms and Conditions</h5>
                            <ul>
                                <li>Termination of using or accessing your website</li>
                                <li>Disclosure to inform country laws</li>
                                <li>Contact details to inform users how they contact you with questions</li>
                            </ul>
                        </div>
                        <div class="col-xs-3 m-t-30">
                            <?php $sub_total = (((($view[0]->normal_price*$total_markup)/100)+$view[0]->normal_price*$view[0]->book_room_count)*$view[0]->no_of_days); 
                                $tax_amount = ($sub_total*$view[0]->tax)/100;
                            ?>
                            <p class="text-right m-b-0">
                                <b>Sub-total: </b>
                                <span><?php echo $view[0]->Preferred_Currency ?> <?php echo $sub_total; ?></span>
                            </p>
                            <p class="text-right m-0">
                                Tax Amount:
                                <span><?php echo $view[0]->Preferred_Currency ?> <?php echo $tax_amount; ?></span>
                            </p>
                            <p class="text-right m-0">
                                Round Off :
                                <span><?php echo $view[0]->Preferred_Currency ?> <?php echo ceil($tax_amount+$sub_total); ?></span>
                            </p>
                            <hr class="m-t-0" />
                            <h3 class="text-right">Total
                                <span><?php echo $view[0]->Preferred_Currency ?> <?php echo ceil($tax_amount+$sub_total); ?></span>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </form>
    </div>

</body>
</html>