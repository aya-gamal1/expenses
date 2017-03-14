

<link href="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.css")?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("upload/js/datatables/scroller.bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>   income table </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6">
                            Filter:
                            <button class="btn btn-info" id="month">This month</button>
                            <button class="btn btn-info" id="year">This Year</button>
                                </div>
                        </div>
                        <div class="row">

                        <div class="col-md-6">
                                <label class="control-label col-md-1 col-sm-2 col-xs-12" for="date">From
                                </label>
                                <div class="col-md-5 col-sm-5 col-xs-12 xdisplay_inputx form-group has-feedback">
                                    <input type="text" name="from" class="form-control has-feedback-left single_cal4" id="from"  placeholder="Date" aria-describedby="inputSuccess2Status4" required="required">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>



                        </div>
                        <div class="col-md-6">
                            <label class="control-label col-md-1 col-sm-2 col-xs-12" for="date">To
                            </label>

                            <div class="col-md-5 col-sm-5 col-xs-12 xdisplay_inputx form-group has-feedback">
                                <input type="text" name="to" class="form-control has-feedback-left single_cal4" id="to" placeholder="Date" aria-describedby="inputSuccess2Status4" required="required">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
<button  id="search" class="btn btn-success">Search</button>
                        </div>
                        </div>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Income</th>
                                <th>Category</th>



                            </tr>
                            </thead>



                        </table>
                    </div>
                </div>
            </div>


</div>
        <script type="text/javascript" src="<?php echo base_url("upload/js/moment/moment.min.js")?>"></script>
        <script type="text/javascript" src="<?php echo base_url("upload/js/datepicker/daterangepicker.js")?>"></script>

        <script src="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.js")?>"></script>
        <script src="<?php echo base_url("upload/js/datatables/dataTables.bootstrap.js")?>"></script>
        <script src="<?php echo base_url("upload/js/datatables/dataTables.scroller.min.js")?>"></script>



        <script type="text/javascript">
            $(document).ready(function() {



                table = $('#datatable').DataTable({

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('IncomeReport/get_income_tables')?>",
                        "type": "POST",
                        "data": function(d){
                            d.from = $("#from").val();
                            d.to = $("#to").val();
                        }
                    },


                    //Set column definition initialisation properties.
                    "columnDefs": [
                        {
                            "targets": [ 0 ], //first column / numbering column
                            "orderable": false, //set not orderable
                        },
                    ],

                });



                $("#search").click(function(e){
                    e.preventDefault();
//                    table.clear().draw();
                    table.ajax.reload();
                })

                $('.single_cal4').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_1",
                    format: 'YYYY-MM-DD',

                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });

                date=new Date();
                var endDate = new Date(date.getFullYear(), date.getMonth()+1, 1);
                var startDate = new Date(date.getFullYear(), date.getMonth() , 2);
                console.log(startDate);
                console.log(endDate);
                $('#month').click(function(){
                    $('#from').val( startDate.toISOString().slice(0,10));
                    $('#to').val( endDate.toISOString().slice(0,10));

                })
                var startYDate = new Date(date.getFullYear(), 0, 2);

                var endYDate = new Date(date.getFullYear(), 12, 1);
                $('#year').click(function(){
                    $('#from').val( startYDate.toISOString().slice(0,10));
                    $('#to').val( endYDate.toISOString().slice(0,10));

                })



            });
//            console.log(moment().date())
//            console.log(moment().month())
//            console.log(moment().year())



        </script>