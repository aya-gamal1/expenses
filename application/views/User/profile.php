
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-6 col-sm-6 col-xs-12 profile_left">

                            <div class="profile_img">

                                <!-- end of image cropping -->
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="avatar-view" >
                                        <img src="<?php echo base_url("upload/images/users/".$users[0]['Picture'])?>" alt="Avatar">
                                    </div>



                                </div>

                            </div>
                            <h3><?php echo $users[0]['UserName']?></h3>

                            <ul class="list-unstyled user_data">


                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $users[0]['Name']?>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-birthday-cake user-profile-icon"></i>
                                    <?php echo $users[0]['BirthDate']?>
                                </li>
                            </ul>

                            <a href="<?php echo site_url("user/update_profile")?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />


                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <h3 style="color:blue;font-size: 30px";>First Name</h3>
                            <label style="font-size: 20px";> <?php echo $users[0]['FirstName']?></label>
                            <h3 style="color:blue;font-size: 30px";>Last Name</h3>
                            <label style="font-size: 20px";> <?php echo $users[0]['LastName']?></label>
                            <h3 style="color:blue;font-size: 30px";>Email</h3>
                            <label style="font-size: 20px";> <?php echo $users[0]['Email']?></label>
                            <h3 style="color:blue;font-size: 30px";>Gender</h3>
                            <label style="font-size: 20px";> <?php echo( $users[0]["Gender"]=="F"?"Female":"Male") ?></label>




                        </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>