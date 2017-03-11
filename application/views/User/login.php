

<link href="<?php echo base_url("upload/css/select/select2.min.css")?>" rel="stylesheet">

<body style="background:#F7F7F7;">

<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <form id="login_form">
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" >Log in</button>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">

                        <p class="change_link">New to site?
                            <a href="#toregister" class="to_register"> Create Account </a>
                        </p>

                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
        <div id="register" class="animate form">
            <section class="login_content">
                <form id="create_account" method="POST">
                    <h1>Create Account</h1>
                    <div class="error" id="error"></div>
                    <div>
                        <input type="text" class="form-control" name="firstname" placeholder="First name"  />
                    </div>
                    <div>
                        <input type="text" class="form-control" name="lastname" placeholder="Last name"  />
                    </div>
                    <div>
                        <input type="text" class="form-control" name="username" placeholder="Username"  />
                    </div>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="E-mail"  />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password"  />
                    </div>
                    <div>
                        <input type="password" class="form-control" data-validate-linked="password" name="passwordConfirmation" placeholder="Password Confirmation" />
                    </div>
                    <div>
                    <label>Gender *:</label>
                    <p>
                        M:

                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked=""  /> F:
                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                    </p>
                    </div>
                    <div>
                        <fieldset>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                        <input type="text" name="birthdate" class="form-control has-feedback-left" id="single_cal4" placeholder="BirthDate" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div >


                        <select id="job" name="JobId" class="select2_single form-control" >
                            <?php echo   DrawDropDownMenu('jobs','Id','Name',"choose your job")?>
                        </select>

                    </div>
                    <div>
                        <button id="registerButton" class="btn btn-default submit" href="index.html">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">

                        <p class="change_link">Already a member ?
                            <a href="#tologin" class="to_register"> Log in </a>
                        </p>

                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url("upload/js/moment/moment.min.js")?>"></script>
<script type="text/javascript" src="<?php echo base_url("upload/js/datepicker/daterangepicker.js") ?>"></script>
<script src="<?php echo base_url("upload/js/select/select2.full.js")?>"></script>


<script>
    $(".select2_single").select2({
        minimumResultsForSearch: Infinity,


    });
    var registerUrl="<?php echo site_url('user/register')?>";
    var welcomeUrl="<?php echo site_url('home')?>";
    var loginUrl="<?php echo site_url('user/login')?>";



</script>
<script src="<?php echo base_url("upload/Application/User/user.js");?>"></script>



