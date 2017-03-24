<link href="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.css")?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("upload/js/datatables/scroller.bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
<!-- page content -->
<div class="right_col" role="main">
    <h1>Settings</h1>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" id='income_category_tab' class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Income Categories </a>
            </li>
            <li role="presentation" id='outcome_category_tab' class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">OutCome Categories</a>
            </li>
            <li role="presentation" id='job_tab' class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Jobs</a>
            </li>
        </ul>


        <div id="myTabContent" class="tab-content">
            <!-- income -->
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                <div class="collapse" id="Income">
                    <div class="row">
                        <div class=" col-lg-6 col-md-6 col-sm-6">
                            <div id="incomeerror" class="alert alert-danger avater-alert" style="display:none;" ></div>

                            <input type="text" class="form-control " placeholder="write new income category " id="income_category_name" name="income_category">
                            <button class="btn btn-success" id="createIncomeCategory">Save</button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success"  data-toggle="collapse" data-target="#Income" aria-expanded="false" aria-controls="Income">Create Income Category</button>


                <table id="incomedatatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Options</th>

                    </tr>
                    </thead>

                </table>

            </div>


            <!-- outcome -->
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                <div class="collapse" id="Outcome">
                    <div class="row">
                        <div class=" col-lg-6 col-md-6 col-sm-6">
                            <div id="outcomeerror" class="alert alert-danger avater-alert" style="display:none;" ></div>

                            <input type="text" class="form-control " placeholder="write new outcome category " id="outcome_category_name" name="outcome_category">
                            <button class="btn btn-success" id="createOutcomeCategory">Save</button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success"  data-toggle="collapse" data-target="#Outcome" aria-expanded="false" aria-controls="Outcome">Create Outcome Category</button>


                <table id="outcomedatatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Options</th>

                    </tr>
                    </thead>

                </table>
            </div>


            <!-- jobs -->
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                <div class="collapse" id="Job">
            <div class="row">
                    <div class=" col-lg-6 col-md-6 col-sm-6">
                        <div id="joberror" class="alert alert-danger avater-alert" style="display:none;" ></div>

                        <input type="text" class="form-control " placeholder="write new job " id="job_name" name="job">
                        <button class="btn btn-success" id="createJob">Save</button>
                    </div>
            </div>
                </div>
                <button class="btn btn-success"  data-toggle="collapse" data-target="#Job" aria-expanded="false" aria-controls="Job">Create Job</button>


                <table id="jobdatatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Options</th>

                    </tr>
                    </thead>

                </table>
            </div>
        </div>

<!-- modal -->
        <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="generalModalLabel">Edit Job</h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <div id="error" class="alert alert-danger avater-alert" style="display:none;" ></div>

                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name_val">
                    <input type="hidden"  id="id_val">

                </div>

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
</div>


<script src="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.js")?>"></script>
<script src="<?php echo base_url("upload/js/datatables/dataTables.bootstrap.js")?>"></script>
<script src="<?php echo base_url("upload/js/datatables/dataTables.scroller.min.js")?>"></script>



<script type="text/javascript">
    $(document).ready(function() {


        income_table = $('#incomedatatable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo site_url('IncomeCategory')?>",
                "type": "POST",
                "data": function (d) {

                }
            },
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [2], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
        outcome_table = $('#outcomedatatable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo site_url('OutcomeCategory')?>",
                "type": "POST",
                "data": function (d) {

                }
            },
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [2], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });

        job_table = $('#jobdatatable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?php echo site_url('Job')?>",
                "type": "POST",
                "data": function (d) {

                }
            },
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [2], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
        $('#generalModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var name = button.data('name')
            var id = button.data('id')

            var modal = $(this)
            modal.find('#name_val').val(name)
            modal.find('#id_val').val(id)


        })
        $('#saveEdit').click(function(e){
            e.preventDefault();
            if($("#income_category_tab").hasClass('active')){
                $.ajax({
                    url: "<?php echo site_url('IncomeCategory/update')?>",
                    type: 'post',
                    data: {name:$("#name_val").val(),id:$("#id_val").val()},
                    success: function (data, textStatus, jQxhr) {

                        if (data == 1) {
                            $('#generalModal').modal('toggle');
                            $("#name_val").val("")
                            income_table.ajax.reload();
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

            }else if ($("#outcome_category_tab").hasClass('active')){
                $.ajax({
                    url: "<?php echo site_url('OutcomeCategory/update')?>",
                    type: 'post',
                    data: {name:$("#name_val").val(),id:$("#id_val").val()},
                    success: function (data, textStatus, jQxhr) {

                        if (data == 1) {
                            $('#generalModal').modal('toggle');
                            $("#name_val").val("")
                            outcome_table.ajax.reload();
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

            }else if ($("#job_tab").hasClass('active')){
                $.ajax({
                    url: "<?php echo site_url('Job/update')?>",
                    type: 'post',
                    data: {name:$("#name_val").val(),id:$("#id_val").val()},
                    success: function (data, textStatus, jQxhr) {

                        if (data == 1) {
                            $('#generalModal').modal('toggle');
                            $("#name_val").val("")
                            job_table.ajax.reload();
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

            }


        });



        $("#createJob").click(function(e){
            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url('Job/store')?>",
                type: 'post',
                data: {name:$("#job_name").val()},
                success: function (data, textStatus, jQxhr) {

                    if (data == 1) {
                        $("#job_name").val("")
                        job_table.ajax.reload();
                        $("#joberror").hide();

                    } else {
                        $("#joberror").show();

                        $("#joberror").html(data);

                    }
                }
                ,
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(jqXhr, textStatus);
                }
            });

        })

        $("#createOutcomeCategory").click(function(e){
            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url('OutcomeCategory/store')?>",
                type: 'post',
                data: {name:$("#outcome_category_name").val()},
                success: function (data, textStatus, jQxhr) {

                    if (data == 1) {
                        $("#outcome_category_name").val("")
                        outcome_table.ajax.reload();
                        $("#outcomeerror").hide();

                    } else {
                        $("#outcomeerror").show();

                        $("#outcomeerror").html(data);

                    }
                }
                ,
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(jqXhr, textStatus);
                }
            });

        })

        $("#createIncomeCategory").click(function(e){
            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url('IncomeCategory/store')?>",
                type: 'post',
                data: {name:$("#income_category_name").val()},
                success: function (data, textStatus, jQxhr) {

                    if (data == 1) {
                        $("#income_category_name").val("")
                        income_table.ajax.reload();
                        $("#incomeerror").hide();

                    } else {
                        $("#incomeerror").show();

                        $("#incomeerror").html(data);

                    }
                }
                ,
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(jqXhr, textStatus);
                }
            });

        })


    });


    </script>

