<link href="<?php echo base_url("upload/css/select/select2.min.css")?>" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Profile</h3>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">



                        <div class="row">
                            <form class="form-horizontal form-label-left" novalidate>

                                <div id="error" class="alert alert-danger avater-alert" style="display:none;" ></div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Change Photo <span class="required">*</span>
                                    </label>
                                <div class="profile_img">

                                    <!-- end of image cropping -->
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <div class="avatar-view" >
                                            <img src="<?php echo base_url("upload/images/picture.jpg")?>" alt="Avatar">
                                        </div>



                                    </div>

                                </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="firstname" name="firstname" class="form-control col-md-7 col-xs-12"  value="<?php echo $users[0]['FirstName']?>" required="required" type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name: <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="lastname" name="lastname" value="<?php echo $users[0]['LastName']?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">UserName <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="username" name="username" disabled="disabled" value="<?php echo $users[0]['UserName']?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" required="required" data-validate-linked="email"  value="<?php echo $users[0]['Email']?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="password" name="password" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="passconf">Password Confirmation <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="passconf" type="password" name="passwordConfirmation"  class="optional form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender :<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p>
                                        M:

                                        <input type="radio" class="flat" name="gender" id="genderM" value="M"  <?php if($users[0]["Gender"]=="M"){echo "checked";}?>  /> F:
                                        <input type="radio" class="flat" name="gender" id="genderF" value="F" <?php if($users[0]["Gender"]=="F"){echo "checked";} ?>/>
                                    </p>
                                        </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BirthDate">BirthDate :<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="  xdisplay_inputx form-group has-feedback">
                                                    <input type="text" name="birthdate" class="form-control  has-feedback-left" id="single_cal4" placeholder="BirthDate" value="<?php echo $users[0]["BirthDate"]?>" aria-describedby="inputSuccess2Status4">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                        </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job">Job :<span class="required">*</span></label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select id="job" name="JobId" value="<?php echo $users[0]["JobId"]?>" class="select2_single form-control" tabindex="-1">
                                        <?php echo   DrawDropDownMenu('jobs','Id','Name',"choose your job")?>
                                    </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url("user/get_profile")?>" class="btn btn-primary">Cancel</a>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url("upload/js/moment/moment.min.js")?>"></script>
<script type="text/javascript" src="<?php echo base_url("upload/js/datepicker/daterangepicker.js") ?>"></script>
<script src="<?php echo base_url("upload/js/select/select2.full.js")?>"></script>
<script src="<?php echo base_url("upload/js/validator/validator.js");?>"></script>
<script src="<?php echo base_url("upload/js/cropping/cropper.min.js")?>"></script>
<script src="<?php echo base_url("upload/js/cropping/main.js")?>"></script>
<script>
    $(".select2_single").select2({
        minimumResultsForSearch: Infinity,


    });
    $(".select2_single").select2().select2('val',"<?php echo $users[0]["JobId"]?>");


    $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2",
        format: 'YYYY-MM-DD'
    }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });

    var saveURL = "<?php echo site_url("user/save_update_Profile")?>";
    var redirectURL = "<?php echo site_url('user/get_profile')?>";


</script>

<script src="<?php echo base_url('upload/Application/formvalidation.js');?>"></script>
