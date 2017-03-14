<link href="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.css")?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url("upload/js/datatables/scroller.bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
<!-- page content -->
<div class="right_col" role="main">
    <h1>Settings</h1>
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Income Categories </a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">OutCome Categories</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Jobs</a>
            </li>
        </ul>


        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                    synth. Cosby sweater eu banh mi, qui irure terr.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                    booth letterpress, commodo enim craft beer mlkshk aliquip</p>
            </div>


            <!-- jobs -->
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                <div class="collapse" id="Job">
            <div class="row">
                    <div class=" col-lg-6 col-md-6 col-sm-6">
                        <input type="text" class="form-control " placeholder="write new job " id="job_name" name="job">
                        <button class="btn btn-success" id="createJob">Save</button>
                    </div>
            </div>
                </div>
                <button class="btn btn-success"  data-toggle="collapse" data-target="#Job" aria-expanded="false" aria-controls="Job">Create Job</button>


                <table id="datatable" class="table table-striped table-bordered">
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


        </div>















</div>


<script src="<?php echo base_url("upload/js/datatables/jquery.dataTables.min.js")?>"></script>
<script src="<?php echo base_url("upload/js/datatables/dataTables.bootstrap.js")?>"></script>
<script src="<?php echo base_url("upload/js/datatables/dataTables.scroller.min.js")?>"></script>



<script type="text/javascript">
    $(document).ready(function() {


        job_table = $('#datatable').DataTable({
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

    });


    </script>

