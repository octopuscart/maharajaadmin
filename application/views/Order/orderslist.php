<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo base_url(); ?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
<style>
    .order_panel{
        padding: 10px;
        padding-bottom: 11px!important;
        border: 1px solid #c5c5c5;
        background: #fff;

    }
    .order_panel li{
        line-height: 19px!important;
        padding: 7px!important;
        border: none!important;
    }

    .order_panel li i{
        float: left!important;
        line-height: 19px!important;
        margin-right: 13px!important;
    }
    .order_panel h6{
        margin-top: 0px;
        margin-bottom: 5px;
    }

    .blog-posts article {
        margin-bottom: 10px;
    }
</style>


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading with-border">
                    <?php
                    $this->load->view('Order/orderdates');
                    ?>
                    <div  style="clear:both"></div>
                    <div class="col-md-12 " style="margin: 10px 0px;">
                        <p>Filter Order By Status</p>
                        <a class="btn btn-inverse" href="<?php echo site_url("Order/orderslist/All"); ?>">All Status</a>

                        <?php
                        foreach ($statuslist as $key => $value) {
                            ?>
                            <a class="btn btn-inverse" href="<?php echo site_url("Order/orderslist/$value"); ?>"><?php echo $value; ?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- /.panel-header -->
                <div class="panel-body">

                    <table id="tableDataOrder" class="table table-bordered  tableDataOrder">
                        <thead>
                            <tr>
                                <th style="width: 70px">S. No.</th>
                                <th style="width:200px">Order Information</th>
                                <th style="width:200px">Customer Information</th>
                                <th style="width:250px">Shipping Address</th>
                                <th style="width:100px">Payment Type</th>
                                <th>Status</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($orderslist)) {
                                $count = 1;
                                foreach ($orderslist as $key => $value) {
                                    ?>
                                    <tr style="border-bottom: 1px solid #000;">
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>

                                            <table class="small_table">
                                                <tr>
                                                    <th>Ord. No.</th>
                                                    <td>: <?php echo $value->order_no; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amt.</th>
                                                    <td>: {{<?php echo $value->total_price; ?>|currency:" "}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Prd.</th>
                                                    <td>: {{<?php echo $value->total_quantity; ?>}}</td>
                                                </tr>
                                            </table>

                                        </td>

                                        <td>

                                            <b> <?php echo $value->name; ?></b>
                                            <table class="small_table">
                                                <tr>
                                                    <th><i class="fa fa-envelope"></i> &nbsp; </th>
                                                    <td class="overtext"> <a href="#" title="<?php echo $value->email; ?>"><?php echo $value->email; ?></a></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fa fa-phone"></i>  &nbsp;</th>
                                                    <td> <?php echo $value->contact_no; ?></td>
                                                </tr>

                                            </table>

                                        </td>
                                        <td style="font-size: 10px;">

                                            <?php echo $value->address1; ?><br/>
                                            <?php echo $value->address2; ?><br/>
                                            <?php echo $value->state; ?>
                                            <?php echo $value->city; ?>

                                            <?php echo $value->country; ?> <?php echo $value->zipcode; ?>


                                        </td>


                                        <td>
                                            <?php
                                            echo $value->payment_mode;
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo "" . $value->status . "<br/>";
                                            echo $value->status_datetime;
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url("order/orderdetails/" . $value->order_key); ?>" class="btn btn-primary btn-sm" style="    margin-top: 20%;">Update <i class="fa fa-arrow-circle-right"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                            } else {
                                ?>
                            <h4><i class="fa fa-warning"></i> No order found</h4>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/table-manage-default.demo.min.js"></script>
<?php
$this->load->view('layout/footer');
?> 

<script>
$(function () {

    setTimeout(function () {
        location.reload();
    }, 500000);

})


$(function () {
    $("#daterangepicker").daterangepicker({
        format: 'YYYY-MM-DD',
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            "Today's": [moment(), moment()],
            "Yesterday's": [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'right',
        drops: 'down',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-primary',
        cancelClass: 'btn-default',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Cancel',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    }, function (start, end, label) {
        $('input[name=daterange]').val(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('#tableDataOrder').DataTable({
        "language": {
            "search": "Search Order By Email, Order No., Order Date Etc."
        }
    })
})
</script>