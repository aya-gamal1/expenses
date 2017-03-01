
<!--<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">-->
<!--<link href="--><?php //echo base_url("upload/css/editor/external/google-code-prettify/prettify.css")?><!--" rel="stylesheet">-->
<!--<link href="--><?php //echo base_url("upload/css/editor/index.css")?><!--" rel="stylesheet">-->
<!--<!-- select2 -->-->
<!--<link href="--><?php //echo base_url("upload/css/select/select2.min.css")?><!--" rel="stylesheet">-->
<!--<!-- switchery -->-->
<!--<link rel="stylesheet" href="--><?php //echo base_url("upload/css/switchery/switchery.min.css")?><!--" />-->

<!--<link rel="stylesheet" href="--><?php //echo base_url("upload/css/normalize.css");?><!--" />-->
<!--<link rel="stylesheet" href="--><?php //echo base_url("upload/css/ion.rangeSlider.css");?><!--" />-->
<!--<link rel="stylesheet" href="--><?php //echo base_url("upload/css/ion.rangeSlider.skinFlat.css");?><!--" />-->

<body style="background:#F7F7F7;">

<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <form>
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Log in</a>
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

                    <div >


                        <select id="job" name="JobId" class="form-control" >
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





<!---->
<!--<script src="--><?php //echo base_url("upload/js/bootstrap.min.js")?><!--"></script>-->
<!---->
<!--<!-- bootstrap progress js -->-->
<!--<script src="--><?php //echo base_url("upload/js/progressbar/bootstrap-progressbar.min.js")?><!--"></script>-->
<!--<script src="--><?php //echo base_url("upload/js/nicescroll/jquery.nicescroll.min.js")?><!--"></script>-->
<!--<!-- icheck -->-->
<!--<script src="--><?php //echo base_url("upload/js/icheck/icheck.min.js")?><!--"></script>-->
<!--<!-- tags -->-->
<!--<script src="--><?php //echo base_url("upload/js/tags/jquery.tagsinput.min.js")?><!--"></script>-->
<!--<!-- switchery -->-->
<!--<script src="--><?php //echo base_url("upload/js/switchery/switchery.min.js")?><!--"></script>-->
<!--<!-- daterangepicker -->-->
<!--<script type="text/javascript" src="--><?php //echo base_url("upload/js/moment/moment.min.js")?><!--"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url("upload/js/datepicker/daterangepicker.js")?><!--"></script>-->
<!--<!-- richtext editor -->-->
<!--<script src="--><?php //echo base_url("upload/js/editor/bootstrap-wysiwyg.js")?><!--"></script>-->
<!--<script src="--><?php //echo base_url("upload/js/editor/external/jquery.hotkeys.js")?><!--"></script>-->
<!--<script src="--><?php //echo base_url("upload/js/editor/external/google-code-prettify/prettify.js")?><!--"></script>-->
<!--<!-- select2 -->-->
<!--<script src="--><?php //echo base_url("upload/js/select/select2.full.js")?><!--"></script>-->
<!--<!-- form validation -->-->
<!--<script type="text/javascript" src="--><?php //echo base_url("upload/js/parsley/parsley.min.js")?><!--"></script>-->
<!--<!-- textarea resize -->-->
<!--<script src="--><?php //echo base_url("upload/js/textarea/autosize.min.js")?><!--"></script>-->
<!--<script>-->
<!--    autosize($('.resizable_textarea'));-->
<!--</script>-->
<!--<!-- Autocomplete -->-->
<!--<script type="text/javascript" src="--><?php //echo base_url("upload/js/autocomplete/countries.js")?><!--"></script>-->
<!--<script src="--><?php //echo base_url("upload/js/autocomplete/jquery.autocomplete.js")?><!--"></script>-->
<!--<!-- pace -->-->
<!--<script src="--><?php //echo base_url("upload/js/pace/pace.min.js")?><!--"></script>-->
<script>


    $("#registerButton").click(function(e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($('#create_account'))) {
            submit = false;
        }

        if (submit) {


            data = $("#create_account").serialize();
            $.ajax({
                url: "<?php echo site_url('user/register')?>",
                type: 'post',
                data: data,
                success: function (data, textStatus, jQxhr) {

                    if (data == 1) {

                        window.location = "<?php echo site_url('welcome/welcome_message')?>";
                    } else {
                        $("#error").html(data);
                    }
                }
                ,
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(jqXhr, textStatus);
                }
            });
        }
        return false;
    });





</script>



