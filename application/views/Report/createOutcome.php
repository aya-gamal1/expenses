

<link href="<?php echo base_url("upload/css/select/select2.min.css")?>" rel="stylesheet">





        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">

                                <form id="outcome" class="form-horizontal form-label-left" novalidate>


                                    <span class="section">Outcome Form</span>
                                    <div id="error" class="alert alert-danger avater-alert" style="display:none;" ></div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="money">I Paid <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="money" class="form-control col-md-7 col-xs-12"  name="moneyAmount" placeholder="money amount" required="required" type="number">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">as <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="category" name="categoryId" class="select2_single form-control" required="required">
                                                <?php echo   DrawDropDownMenu('outcome_categories','Id','Name',"choose category")?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">On Date <span class="required">*</span>
                                        </label>



                                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                                            <input type="text" name="date" class="form-control has-feedback-left" id="single_cal4" placeholder="Date" aria-describedby="inputSuccess2Status4" required="required">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>


                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="Description" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary" id="reset">Reset</button>
                                            <button id="send" type="submit" class="btn btn-success">Finish</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script type="text/javascript" src="<?php echo base_url("upload/js/moment/moment.min.js")?>"></script>
<script type="text/javascript" src="<?php echo base_url("upload/js/datepicker/daterangepicker.js") ?>"></script>
<script src="<?php echo base_url("upload/js/select/select2.full.js")?>"></script>

<script src="<?php echo base_url("upload/js/validator/validator.js");?>"></script>

<script>
    $(".select2_single").select2({
        minimumResultsForSearch: Infinity,


    });

    $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2",
        format: 'YYYY-MM-DD'
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    var saveURL = "<?php echo site_url("OutcomeReport/store")?>";
    var redirectURL = "<?php echo site_url('welcome/welcome_message')?>";
    //        var data = $("#income").serialize();
    //        console.log(data);

</script>

<script src="<?php echo base_url('upload/Application/formvalidation.js');?>"></script>

