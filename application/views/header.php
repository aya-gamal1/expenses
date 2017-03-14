<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title?> </title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url("upload/css/bootstrap.min.css");?>" rel="stylesheet">

    <link href="<?php echo base_url("upload/fonts/css/font-awesome.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("upload/css/animate.min.css");?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url("upload/css/custom.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("upload/css/icheck/flat/green.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("upload/css/floatexamples.css")?>" rel="stylesheet" type="text/css" />


    <script src="<?php echo base_url("upload/js/jquery.min.js");?>"></script>
    <script src="<?php echo base_url("upload/js/nprogress.js")?>"></script>
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



    <![endif]-->



</head>
<?php if ($this->session->userdata('username')) {?>

<body class="nav-md">

<div class="container body">


    <div class="main_container">

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-money"></i> <span>Expenses!</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo base_url ("upload/images/img.jpg")?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('username');?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>Main Menu</h3>
                <ul class="nav side-menu">
                    <li><a  href="<?php echo site_url()?>"><i class="fa fa-home"></i> Home </a>

                    </li>
                    <li><a ><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo site_url("user/get_profile")?>">Profile</a>
                            </li>
                            <li><a href="<?php echo site_url("user/update_profile")?>">Edit Profile</a>
                            </li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-plus "></i> Income <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo site_url("IncomeReport/create")?>">create Income</a>
                            </li>
                            <li><a href="<?php echo site_url("IncomeReport/get_income_charts")?>">Income Report(charts)</a>
                            </li>
                            <li><a href="<?php echo site_url("IncomeReport/open_income_tables")?>">Income Report(tables)</a>
                            </li>


                        </ul>
                    </li>
                    <li><a><i class="fa fa-minus"></i> Outcome <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">

                            <li><a href="<?php echo site_url("OutcomeReport/create")?>">create Outcome</a>
                            </li>
                            <li><a href="<?php echo site_url("OutcomeReport/get_outcome_charts")?>">Outcome Report(charts)</a>
                            </li>
                            <li><a href="<?php echo site_url("OutcomeReport/open_outcome_tables")?>">Outcome Report(tables)</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo site_url("Report/get_income_outcome_charts")?>">Income & Outcome(charts)</a>
                            </li>
                            <li><a href="<?php echo site_url("Report/get_income_outcome_tables")?>">Income & Outcome(tables) </a>
                            </li>


                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->


    </div>
</div>
        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url("upload/images/img.jpg")?>" alt=""><?php echo $this->session->userdata('username');?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="<?php echo site_url("user/get_profile")?>">  Profile</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("home/setting")?>">
                                        <span>Settings</span>
                                    </a>
                                </li>

                                <li><a href="<?php echo site_url("user/logout");?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->
<?php }?>