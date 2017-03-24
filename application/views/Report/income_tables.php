

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

                                <th>Date</th>
                                <th>Income</th>
                                <th>Category</th>
                                <th>Options</th>


                            </tr>
                            </thead>



                        </table>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="generalModalLabel">Edit Job</h4>
                        </div>
                        <div class="modal-body">
                            <form>

                                    <div id="error" class="alert alert-danger avater-alert" style="display:none;" ></div>


                                    <div class="form-group">
                                        <label for="money" class="control-label">Money AMount:</label>
                                        <input id="money" class="form-control "  name="moneyAmount" placeholder="money amount"  type="number">
                                    </div>

                                    <div class="form-group">
                                        <label for="category" class="control-label">Money AMount:</label>

                                        <select id="category" name="categoryId" class="select2_single form-control" required="required">
                                                <?php echo   DrawDropDownMenu('income_categories','Id','Name',"choose category")?>
                                            </select>
                                     </div>


                                    <div class="form-group">
                                        <label class="control-label" for="date">On Date <span class="required">*</span>
                                        </label>
                                            <input type="text" name="date" class="form-control has-feedback-left single_cal4" id="single_cal4" placeholder="Date" aria-describedby="inputSuccess2Status4" required="required">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="Description">Description <span class="required">*</span>
                                        </label>
                                            <textarea id="Description" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>

                                    </div>

<input type="hidden" id="Id" name="Id">


                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button"  id="saveEdit" class="btn btn-primary">Save</button>
                        </div>
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


                $('#generalModal').on('shown.bs.modal', function (event) {

                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var id = button.data('id')
                    var modal = $(this)
                    $.ajax({
                        url: "<?php echo site_url('IncomeReport/find')?>",
                        type: 'post',
                        data: {id:id},
                        success: function (data, textStatus, jQxhr) {

                            income=JSON.parse(data)[0];
                            console.log(income);
                            modal.find('#money').val(income['MoneyAmount'])
                            modal.find('#category').val(income['CategoryId'])
                            modal.find('#single_cal4').val(income['Date'])
                            modal.find('#Description').val(income['Description'])
                            modal.find('#Id').val(income['Id'])


                        }
                        ,
                        error: function (jqXhr, textStatus, errorThrown) {
                            console.log(jqXhr, textStatus);
                        }
                    });
                })


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
                            "targets": [ 3 ], //first column / numbering column
                            "orderable": false, //set not orderable
                        },
                    ],

                });


                $("#saveEdit").click(function(){

                    $.ajax({
                        url: "<?php echo site_url('IncomeReport/update')?>",
                        type: 'post',
                        data: $("form").serialize(),
                        success: function (data, textStatus, jQxhr) {

                            if (data == 1) {
                                $('#generalModal').modal('toggle');

                                table.ajax.reload();
                            } else {
                                $("#error").show();

                                $("#error").html(data);

                            }
                        }
                        ,
                        error: function (jqXhr, textStatus, errorThrown) {
                            console.log(jqXhr, textStatus);
                        }
                    });

                })



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




        </script>