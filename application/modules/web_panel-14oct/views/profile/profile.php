<?php //pre($users); die;                               ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>

<style>
    .add-margin{
        margin-right: 1.5% !important;}

    .request_list{
        min-height: 120px;
        border-radius: 5px;
        margin-bottom: 25px;
        box-shadow: 0 1px 5px #ccc;
    }
    .request_details{
        position: relative;
        top:-10px;
        left: 20px;
    }
    .requested_user_name{
        margin-bottom: 0px;
    }
    .requested_user_details{
        font-size: 13px;
        margin-bottom: 0px;
    }
    .request_status{ 
        font-size: 12px;
        margin-left: 10px;
        padding:2px 5px;
        border-radius: 4px;
        color:#fff
    }
    .video_opt{
        display:none;
    }

</style>
<!-- notifiaction style -->
<style type="text/css">
    .addon {
        background: #fff;
        margin-bottom: 20px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
    }

    .addon li {
        padding: 12px 0px;
        border-top: 1px solid #eee;
        overflow: hidden;
        border-radius: 3px;
        margin-bottom: 5px;
    }
    .addon li {
        list-style:none;
    }

    .clearfix {
        display: block;
    }
    .clearfix:after {
        content: " ";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
        overflow: hidden;
    }

    li {
        display: list-item;
        text-align: -webkit-match-parent;
    } ul {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
    ul {
        list-style: none;
    }
    .round {
        border-radius:100%;
        display: block;
        height: 48px;
        width: 49px;
        float: left;
        margin-left: 7px;
        overflow: hidden;
    }

    .addon li em.extra {
        background-position: -118px 0;
    }
    .addon li em.hot {
        background-position: -58px 0;
    }
    .addon p {
        padding: 10px 15px;
        margin: 0;
        font: 600 16px/22px "myriad-pro",Arial,"Helvetica Neue",Helvetica,sans-serif;
    }
    p {
        display: block;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
    }

    .addon li .legend-info {
        float: left;
        margin-left: 10px;
        width: 65%;
    }

    .addon strong {
        display: block;
        margin: 0 0 4px;
    }
    .list-active{
        background-color: #d8eaf5;
    }
    .comment-icon{
        float: right;
    }
    .comment-text{
        float: right;
        margin-top: -9px;
    }
    strong {
        font-weight: bold;
    }
    .unread_count_value{
        background-color:red; 
        color:white; 
        padding: 1.5px 5px; 
        position: relative;  
        font-size: 11px; 
        border-radius:50%; 
        top:-6px;
    }
</style>
<!--start section page body-->
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="pull-left" ><a href="<?php echo base_url('index.php/web_panel/home'); ?>"><!-- <i class="fa fa-home"></i> -->Home</a></li>
                        <li class="pull-left active">My Profile</li>

                        <!--                        <li class="pull-right"><h1 class="title-head">My Profile</h1></li>-->
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 list-grid-area">
                <div id="content-area">
                    <div class="col-md-3 col-sm-12 white-block" style="min-height: 450px; width: 24%; margin-right:1% ">
                        <ul class="nav nav-pills nav-stacked">
                            <?php 
                                $is_count = "";
                                if(isset($unread_count['unread_count']) && $unread_count['unread_count']!=0){
                                $is_count = '<span class="unread_count_value">'.$unread_count['unread_count'].'</span>';
                            }?>
                            <li class="active0"><a href="<?php echo base_url('index.php/web_panel/Profile/myProfile'); ?>"><span><i class="fa fa-user" aria-hidden="true"></i></span> &nbsp My Profile</a></li>
                            <li class="active6"><a href="<?php echo base_url('index.php/web_panel/Notifications'); ?>"><span><i class="fa fa-globe" aria-hidden="true"></i></span> &nbsp Notification <?php echo $is_count;?></a>
                            </li>
                            <?php if ($this->session->userdata['active_user_data']['login_type'] == 0) { ?>
                                <li class="active1"><a href="<?php echo base_url('index.php/web_panel/Profile/changePassword'); ?>"><span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span> &nbsp Change Password</a></li>
                            <?php } if ($this->session->userdata['active_user_data']['user_type'] == 1) { ?>
                                <li><a href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs'); ?>"><span><i class="fa fa-suitcase" aria-hidden="true"></i></span> Jobs List</a></li>
                            <?php } if ($this->session->userdata['active_user_data']['user_type'] == 0) { ?>
                                <li><a href="<?php echo base_url('index.php/web_panel/Job_post/user_posts'); ?>"><span><i class="fa fa-suitcase" aria-hidden="true"></i></span>&nbsp My Posted Jobs</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url('index.php/web_panel/Properties/favorite_properties'); ?>"><span><i class="fa fa-heart" aria-hidden="true"></i></span>&nbsp My Favorite Properties</a></li>
                            <li class="active2"><a href="<?php echo base_url('index.php/web_panel/Profile/add_property'); ?>"><span><i class="fa fa-building-o" aria-hidden="true"></i></span>&nbsp Add Property</a></li>
                            <li class="active3"><a href="<?php echo base_url('index.php/web_panel/Profile/list_properties'); ?>"><span><i class="fa fa-building" aria-hidden="true"></i></i></span>&nbsp View Properties</a></li>
                            <?php if ($this->session->userdata['active_user_data']['user_type'] == 0) { ?>
                                <li class="active4"><a href="<?php echo base_url('index.php/web_panel/Servent_request/my_sent_request'); ?>"><span><i class="fa fa-heart" aria-hidden="true"></i></span>&nbsp My Requsets</a></li>
                            <?php } ?>
                            <?php if ($this->session->userdata['active_user_data']['user_type'] == 3) { ?>
                                <li class="active5"><a href="<?php echo base_url('index.php/web_panel/Servent_request/myrequest'); ?>"><span><i class="fa fa-heart" aria-hidden="true"></i></span>&nbsp Pending Requests</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url('index.php/web_panel/Login/logout'); ?>"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>&nbsp Logout</a></li>
                        </ul>
                    </div>
                    <?php if ($active_tab == 0) { ?>
                        <?php if ($this->session->flashdata('mobile_exist')) {
                            ?><script>alert("This mobile number alerady registered.")</script><?php } ?>
                        <form class="form-horizontal" method="POST" id="profile_form" enctype="multipart/form-data">
                            <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                                <div class="col-md-9 col-sm-12 white-block">

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="name">Name</label>
                                        <div class="col-sm-10"> 
                                            <input type="text" class="form-control alphabets" value="<?php echo $users['name'] ?>" id="name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value="<?php echo $users['email'] ?>" id="email" name="email" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="mobile">Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="<?php echo $users['mobile'] ?>" id="mobile" name="mobile" placeholder="Mobile" required>
                                        </div>
                                    </div>
                                    <?php if ($users['user_type'] == 1 or $users['user_type'] == 3) { ?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="mobile">Category</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['fk_service_cat_name'])) {
                                                    echo $users['fk_service_cat_name'];
                                                }
                                                ?>" id="category" name="category" placeholder="Category" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="mobile">Sub Category</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['fk_service_sub_cat_name'])) {
                                                    echo $users['fk_service_sub_cat_name'];
                                                }
                                                ?>" id="sub_category" name="sub_category" placeholder="Sub category" readonly>
                                            </div>
                                        </div>
                                        <?php if (!empty($users['document'])) { ?>
                                            <!--                                <div class="form-group">
                                                                                <label class="control-label col-sm-2" for="mobile">Document Uploaded</label>
                                                                                <div class="col-sm-10">
                                                                                    <img width="470"  src="<?php echo base_url('uploads/agent_documents/') . $users['document'] ?>" alt="Document" name="document" id="document" class="thumbanil">
                                                                                </div>
                                                                            </div>-->
                                            <?php
                                        }
                                    } if ($users['user_type'] == 3) {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="age">Age</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control number" value="<?php
                                                if (!empty($users['servent_details']['age']) && isset($users['servent_details']['age'])) {
                                                    echo $users['servent_details']['age'];
                                                }
                                                ?>" id="category" name="age" placeholder="Age" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="gender">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option>Select Gender</option>
                                                    <option value="1" <?php
                                                    if (isset($users['servent_details']['gender']) && $users['servent_details']['gender'] == 1) {
                                                        echo "selected";
                                                    }
                                                    ?>>Male</option>
                                                    <option value="0" <?php
                                                    if (isset($users['servent_details']['gender']) && $users['servent_details']['gender'] == 0) {
                                                        echo "selected";
                                                    }
                                                    ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="occupation">Occupation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['servent_details']['occupation']) && isset($users['servent_details']['occupation'])) {
                                                    echo $users['servent_details']['occupation'];
                                                }
                                                ?>" id="category" name="occupation" placeholder="Occupation" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="experience">Experience</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control number" value="<?php
                                                if (!empty($users['servent_details']['experience']) && isset($users['servent_details']['experience'])) {
                                                    echo $users['servent_details']['experience'];
                                                }
                                                ?>" id="category" name="experience" placeholder="Experience in months" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="highest_degree">Highest Degree</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['servent_details']['highest_degree']) && isset($users['servent_details']['highest_degree'])) {
                                                    echo $users['servent_details']['highest_degree'];
                                                }
                                                ?>" id="highest_degree" name="highest_degree" placeholder="Highest Degree" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="experience">Current Organisation</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['servent_details']['current_org']) && isset($users['servent_details']['current_org'])) {
                                                    echo $users['servent_details']['current_org'];
                                                }
                                                ?>" id="category" name="current_org" placeholder="Current Organisation" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="experience">Nationality</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php
                                                if (!empty($users['servent_details']['nationality']) && isset($users['servent_details']['nationality'])) {
                                                    echo $users['servent_details']['nationality'];
                                                }
                                                ?>" id="category" name="nationality" placeholder="Nationality" required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="country">Country</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="selected_country" id="selected_country" value="<?php
                                                if (!empty($users['servent_details']['country']) && isset($users['servent_details']['country'])) {
                                                    echo $users['servent_details']['country'];
                                                }
                                                ?>">
                                                <select class="form-control" name="country" id="nationality" required>
                                                    <option>Select Country</option>
                                                    <?php foreach ($country_list as $country) { ?>
                                                        <option <?php
                                                        if (isset($users['servent_details']['country']) && ($users['servent_details']['country'] == $country['country_name'])) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $country['country_name']; ?>" data-id="<?php echo $country['id']; ?>"><?php echo $country['country_name']; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="city">City</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="selected_city" id="selected_city" value="<?php
                                                if (!empty($users['servent_details']['city']) && isset($users['servent_details']['city'])) {
                                                    echo $users['servent_details']['city'];
                                                }
                                                ?>">
                                                <select class="form-control" name="city" id="city" required>
                                                    <option>Select City</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="about_servent">About</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="about_servent" id="about_servent" placeholder="Enter some text about yourself" required><?php
                                                    if (!empty($users['servent_details']['about_servent']) && isset($users['servent_details']['about_servent'])) {
                                                        echo $users['servent_details']['about_servent'];
                                                    }
                                                    ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="user_cv">Upload CV</label>
                                            <div class="col-sm-10">
                                                <?php
                                                $cv_required = "required";
                                                if ($users['servent_details']['cv_url']) {
                                                    $cv_required = "";
                                                }
                                                ?>
                                                <input type="file"  <?php echo $cv_required; ?> class="form-control" id="user_cv" name="user_cv[]"  accept="application/msword, application/pdf, image/*"  >
                                            </div>
                                            <?php if (!empty($users['servent_details']['cv_url']) && isset($users['servent_details']['cv_url'])) { ?>
                                                <div class="col-sm-offset-2 col-sm-10 cv_container" style="text-align:right">
                                                    <a href="<?php echo $users['servent_details']['cv_url']; ?>" class="file_text"><?php echo "<i style='color:#7d7d7a' class='fa fa-file'></i> CV: " . basename($users['servent_details']['cv_url']); ?></a> 
                                                    <a style="color:red" href="javascript:void()" onclick="delete_cv()" id="cv" data-id="<?php echo $users['servent_details']['id']; ?>" ><i class="fa fa-times-circle"></i></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Upload Video</label>
                                            <div class="col-sm-10">
                                                <label class="radio-inline">
                                                    <input type="radio" value="1" class="upload_video_option" name="upload_video_option"> Upload video from My computer
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" value="2" class="upload_video_option" name="upload_video_option"> Youtube video
                                                </label>
                                            </div>
                                            <br><br>
                                            <div class="col-sm-offset-2 col-sm-10 video_opt" id="user_video_cv_opt1">
                                                <input type="file" class="form-control" id="user_video_cv" name="user_video_cv[]" accept="video/mp4,video/x-m4v,video/3gp" >
                                            </div>
                                            <div class="col-sm-offset-2 col-sm-10 video_opt" id="user_video_cv_opt2">
                                                <input type="text" class="form-control" id="user_video_cv" placeholder="Enter youtube link" name="user_video_cv">
                                            </div>
                                            <?php if (!empty($users['servent_details']['video_url']) && isset($users['servent_details']['video_url'])) { ?>
                                                <div class="col-sm-offset-2 col-sm-10 video_cv_container" style="text-align:right">
                                                    <a href="<?php echo $users['servent_details']['video_url']; ?>" class="file_text"><?php echo "<i style='color:#7d7d7a' class='fa fa-file-video-o '></i> Video CV: " . basename($users['servent_details']['video_url']); ?></a> 
                                                    <a style="color:red" href="javascript:void()" onclick="delete_video_cv()" id="video_cv" data-id="<?php echo $users['servent_details']['id']; ?>" ><i class="fa fa-times-circle"></i></a>
                                                </div>



                                            <?php } ?>
                                            <!-- <div class="col-sm-offset-2 col-sm-10 progress">
                                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                      40%
                                                    </div>
                                                </div>-->
                                        </div>
                                        <style>
                                            .file_text{
                                                color: #4CAF50;
                                                font-size: 13px;
                                                text-align: right;
                                                line-height: 4;
                                            }
                                        </style>


                                    <?php } if ($users['user_type'] == 1 or $users['user_type'] == 0) { ?>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="address">Created On</label>
                                            <div class="col-sm-10">
                                                <?php
                                                $date1 = explode(' ', $users['create_date']);
                                                $date2 = date_create($date1[0]);
                                                $date = date_format($date2, "d-M-Y");
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo $date; ?>" id="create_date" name="create_date" readonly>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group" style="margin-top: 30px;"> 
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" id="save" value="save" name="save" class="btn btn-block btn-primary">Save Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 white-block">
                                    <div class="thumbnail" style="height: 132px;">

                                        <img src="<?php
                                        if (!empty($users['profile_image'])) {
                                            $pos = strpos($users['profile_image'], "http");
                                            if ($pos === false) {
                                                echo base_url('uploads/profile_images/') . $users['profile_image'];
                                            } else {
                                                echo $users['profile_image'];
                                            }
                                        } else {
                                            echo base_url('uploads/profile_images/default.png');
                                        }
                                        ?>" class="img-rounded" alt="" style="width:100%; height: 121px;">
                                        <div class="change-profile" style="position: absolute; margin-top: -32px;">
                                            <!-- <a href=""></a> -->
                                            <button type="button" style="background-color: #fff; position: inherit; margin-left: 85px; margin-top: -5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><img src="<?php echo base_url('web_assets/images/camera.png'); ?>"></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } if ($active_tab == 1) { ?>
                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">

                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-9"> 
                                    <span id="profile_error_validation"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="o_password">Old Password</label>
                                <div class="col-sm-9"> 
                                    <input style="margin-bottom: 8px;" type="password" class="form-control" id="o_password" name="o_password" placeholder="Enter your old password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">New Password</label>
                                <div class="col-sm-9"> 
                                    <input style="margin-bottom: 8px;" type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="r_password">Retype Password</label>
                                <div class="col-sm-9"> 
                                    <input style="margin-bottom: 8px;" type="password" class="form-control" id="r_password" name="r_password" placeholder="Confirm your new password">
                                </div>
                            </div>
                            <div class="form-group" style="margin-top: 30px;"> 
                                <div class="col-sm-offset-2 col-sm-9">
                                    <button type="button" value="change" id="change" name="change" id="change" class="btn btn-block btn-primary">Change Password</button>
                                </div>
                            </div>
                        </div>

                    <?php } if ($active_tab == 2) { ?> 


                        <?php if ($this->session->flashdata('no_property_location')) { ?>
                            <script>alert("Please choose the valid location !")</script>
                        <?php } ?>

                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <form id="property_form" name="property_form" method="post" enctype="multipart/form-data" > 
                                <input type="hidden" name="id" value="<?php
                                if (isset($properties)) {
                                    echo $properties['id'];
                                }
                                ?>" id="id">
                                <div id="map" style="display:none"></div>
                                <div class="form-group col-md-6">
                                    <label>Type</label>
                                    <select  class="form-control col-md-6" name="type" required>
                                        <option>Select</option>
                                        <option value="0" <?php
                                        if (isset($properties)) {
                                            if ($properties['type'] == 0) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Buy</option>
                                        <option value="1" <?php
                                        if (isset($properties)) {
                                            if ($properties['type'] == 1) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>> Rent</option> 
                                    </select>
                                </div>  
                                <div class="form-group col-md-6 ">
                                    <label>Property Type</label>
                                    <select name="property_type" id="property_type" class="form-control" required>
                                        <option>Select</option>
                                        <option value="1" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Office") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Office</option>
                                        <!--                                            <option value="2" <?php
//                                            if (isset($properties)) {
//                                                if ($properties['property_type'] == "Home") {
//                                                    echo 'selected';
//                                                }
//                                            }
                                        ?>>Home</option>-->
                                        <!--                                            <option value="3" <?php
//                                                    if (isset($properties)) {
//                                                        if ($properties['property_type'] == "Town House") {
//                                                            echo 'selected';
//                                                        }
//                                                    }
                                        ?>>Town House</option>-->
                                        <option value="4" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Land") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Land</option>
                                        <!--                                            <option value="9" <?php
//                                            if (isset($properties)) {
//                                                if ($properties['property_type'] == 'Residential') {
//                                                    echo 'selected';
//                                                }
//                                            }
                                        ?>>Residential</option>-->
                                        <option value="10" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Industrial") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Industrial</option>
                                        <option value="11" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Villa") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Villa</option>
                                        <option value="12" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Commercial") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Commercial</option>
                                        <option value="13" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Flat") {
                                                echo 'selected';
                                            }
                                        }
                                        ?>>Flat</option>
                                    </select>	
                                </div>

                                <!--                                    <div class="form-group col-md-6">
                                                                        <label>Property Name</label>
                                                                        <input  type="text" name="property_name"  class="form-control" value="<?php
//                                                if (isset($properties)) {
//                                                    echo $properties['property_name'];
//                                                }
                                ?>" required>
                                                                    </div>-->

                                <div class="form-group col-md-6">
                                    <label>Property Size (sq meter)</label>
                                    <input  type="text" name="property_size"  class="form-control"  maxlength="8"  id="property_size" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['property_size'];
                                    }
                                    ?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <input   type="text" id="addresss" name="addresss"  class="form-control" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['addresss'];
                                    }
                                    ?>" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Location </label>
                                    <input name="location" id="pac-input" class="form-control" type="text" placeholder="Enter a location" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['location'];
                                    }
                                    ?>" required>

                                </div>                                       

                                <div class="form-group col-md-6 property_toggle_div">
                                    <label>Beds</label>
                                    <input  type="text" name="beds"id="beds" class="form-control number" maxlength="2" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['baths'];
                                    }
                                    ?>" value="<?php
                                            if (isset($properties)) {
                                                echo $properties['beds'];
                                            }
                                            ?>"  >
                                </div>                                        

                                <div class="form-group col-md-6 property_toggle_div">

                                    <label>Bathrooms</label>
                                    <input  type="text" name="baths"  class="form-control number" maxlength="2" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['baths'];
                                    }
                                    ?>" value="<?php
                                            if (isset($properties)) {
                                                echo $properties['baths'];
                                            }
                                            ?>"  >

                                </div>


                                <div class="form-group col-md-6 ">

                                    <label>Price (OMR)</label>
                                    <input  type="text" id="price" name="price" maxlength="7" id="price"  class="form-control" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['price'];
                                    }
                                    ?>" required>

                                </div>
                                <div class="form-group col-md-3">
                                    <label>Country Code</label>
                                    <select class="form-control" name="country_code">
                                        <?php foreach ($country_code as $code) { ?>
                                            <option <?php
                                            if (isset($properties)) {
                                                if ($properties['country_code'] == $code['country_code']) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?> value="<?php echo "+" . $code['country_code'] ?>"><?php echo $code['country_name'] . " (+" . $code['country_code'] . ")" ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-9">
                                    <label>Mobile Number</label>
                                    <input  type="text" name="contact_number" maxlength="16" id="mobile" class="form-control" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['contact_number'];
                                    }
                                    ?>" required>
                                </div>

                                <div class="form-group col-md-12">

                                    <label>Property Description</label>

                                    <textarea name="description" rows="5" class="form-control"  maxlength="1000" required><?php
                                        if (isset($properties)) {
                                            echo $properties['description'];
                                        }
                                        ?></textarea>
                                    <small style="color:red; font-size: 12px;">*max 1000 character</small>
                                </div>

                                <div class="form-group col-md-12">

                                    <label></label>

                                    <input type="file" name="property_images[]" value="" multiple>

                                </div> 

                                <div class="col-sm-12 col-xs-12" style="margin:20px 0">
                                    <label>
                                        <input type="checkbox" id="reg_user_check" required >
                                        I agree with your <a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" target="_blank" >Terms & Conditions</a>.
                                    </label>
                                </div>

                                <div class="form-group col-md-6"><button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                        if (isset($properties)) {
                                            echo "Update";
                                        } else {
                                            ?>Submit<?php } ?></button>
                                </div>

                            </form>
                        </div>
                    <?php } if ($active_tab == 3) { ?> 

                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <h3 style="border-bottom:solid thin #ccc; padding-bottom:15px;">My Properties</h3>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div id="content-area">

                                    <!--start featured property items-->
                                    <div class="property-listing list-view">
                                        <div class="row">

                                            <?php
                                            $i = '415';
                                            //pre($properties); die;
                                            if (!empty($properties)) {
                                                foreach ($properties as $property) {
                                                    $i++;
                                                    ?>
                                                    <div style="margin-bottom: -27px;" id="ID-<?php echo $i; ?>" class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                                                        <div class="property-item table-list">
                                                            <div class="table-cell">
                                                                <div class="figure-block">
                                                                    <figure class="item-thumb">
                                                                        <div class="label-wrap label-right hide-on-list">
                                                                            <span class="label-status label-status-8 label label-default"><?php
                                                                                if ($property['type'] == 0) {
                                                                                    echo "For Buy";
                                                                                } else {
                                                                                    echo "For Rent";
                                                                                }
                                                                                ?></span> 
                                                                        </div>

                                                                        <div class="price hide-on-list"><span class="item-price"><?php
                                                                                if ($property['type'] == 0) {
                                                                                    echo "OMR " . number_format_short($property['price']);
                                                                                } else {
                                                                                    echo "OMR " . number_format_short($property['price']) . "/mo";
                                                                                }
                                                                                ?></span></div>
                                                                        <a class="hover-effect property-img-thumb " href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']) . '&hhg=' . base64_encode($this->session->userdata['active_user_data']['id']); ?>">
                                                                            <img width="385" height="184" src="<?php
                                                                            if (!empty($property['images'])) {
                                                                                echo base_url('uploads/properties/images/') . $property['images'][0]['image'];
                                                                            } else {
                                                                                echo base_url('uploads/properties/images/default.jpg');
                                                                            }
                                                                            ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""  sizes="(max-width: 385px) 100vw, 385px" /></a>
                                                                        <div class="label-wrap hide-on-grid">
                                                                            <span class="label-status label-status-8 label label-default" style="text-align: left;"><?php
                                                                                if ($property['type'] == 0) {
                                                                                    echo "For Buy";
                                                                                } else {
                                                                                    echo "For Rent";
                                                                                }
                                                                                ?></span> 
                                                                        </div>
                                                                        <ul class="actions">

                                                                            <li>

                                                                                <span style="color:greenyellow;" class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="<?php
                                                                                if ($property['is_fav'] == 0) {
                                                                                    echo "Add Favorite";
                                                                                } else {
                                                                                    echo "Remove Favorite";
                                                                                }
                                                                                ?>"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </figure>
                                                                </div>
                                                            </div>

                                                            <div class="item-body table-cell">
                                                                <?php
                                                                $color = "#f36e2d";
                                                                if ($property['status'] == 1) {
                                                                    $color = "#73bd61";
                                                                }
                                                                ?>
                                                                <style>
                                                                    .property_status{
                                                                        width: 30%;
                                                                        border-radius:4px;
                                                                        color: #fff;
                                                                        font-size: 13px;
                                                                        font-weight:400;
                                                                        text-align: center;
                                                                        margin-bottom: 6px;
                                                                    }
                                                                </style>
                                                                <div class="body-left table-cell">
                                                                    <div class="info-row">
                                                                        <h2 class="property-title"><a href="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . base64_encode($property['id']) . '&hhg=' . base64_encode($this->session->userdata['active_user_data']['id']); ?>"><?php echo ucfirst($property['location']) ?></a></h2>
                                                                        <h6 class="property_status" style="background-color:<?php echo $color; ?>"><?php
                                                                            if ($property['status'] == 0) {
                                                                                echo "Pending";
                                                                            } else {
                                                                                echo "Active";
                                                                            }
                                                                            ?></h6>
                                                                        <address class="property-address"><?php echo $property['city']; ?></address>                </div>
                                                                    <div class="info-row amenities hide-on-grid" style="height: 57px;">
                                                                        <p><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span>
                                                                            <span>Size: <?php echo $property['property_size'] ?> Sq M</span></p>                    
                                                                        <p><?php echo $property['state'] ?></p>
                                                                    </div>

                                                                    <div class="info-row date hide-on-grid">
                                                                        <?php if (isset($property['agent_detail']['name'])) { ?>
                                                                            <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name'] . "  "; ?></a> </p>
                                                                        <?php } ?>
                                                                        <p><i class="fa fa-calendar"></i><?php echo $property['agent_detail']['posted_date'] ?></p>
                                                                    </div>

                                                                </div>
                                                                <div class="body-right table-cell hidden-gird-cell">
                                                                    <div class="info-row price"><span class="item-price"><?php
                                                                            if ($property['type'] == 0) {
                                                                                echo "OMR " . number_format_short($property['price']);
                                                                            } else {
                                                                                echo "OMR " . number_format_short($property['price']) . "/mo";
                                                                            }
                                                                            ?></span>
                                                                    </div>

                                                                    <div class="info-row phone text-right">
                                                                        <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']) . '&hhg=' . base64_encode($this->session->userdata['active_user_data']['id']); ?>" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                    </div>

                                                                </div>

                                                                <div class="table-list full-width hide-on-list">
                                                                    <div class="cell">
                                                                        <div class="info-row amenities">
                                                                            <p><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><span>Sq M: <?php echo $property['property_size'] ?></span></p><p><?php echo $property['state'] ?></p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="cell">
                                                                        <div class="phone">
                                                                            <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']) . '&hhg=' . base64_encode($this->session->userdata['active_user_data']['id']); ?>" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="" style="float: right;">
                                                        <a href="<?php echo site_url('web_panel/Profile/add_property'); ?>?kjh=<?php echo $property['id'] ?>"  class="btn" style="background-color: #e2e2e2; border:double 5px #fff; margin-top: 8px; margin-right: 0px; padding: 7px 15px;"><span><i class="fa fa-pencil-square" aria-hidden="true"></i></span> Edit</a>
                                                        <a href="<?php echo site_url('web_panel/Profile/list_properties'); ?>?jghj=<?php echo $property['id'] ?>" class="btn" style="background-color: #e2e2e2; border:double 5px #fff; margin-top: 8px; padding: 7px 15px; "><span><i data-id="<?php echo $property['id'] ?>" class="fa  fa-trash" aria-hidden="true"></i></span> Delete</a>
                                                    </div>
                                                    <br>
                                                    <hr>

                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <h4 style="font-weight:400">No Property Added !</h4>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--end featured property items-->
                                    <?php
                                    if (count($properties) > 10) {
                                        $pages = round(count($properties) / 10);
                                        ?>

                                        <!--start Pagination-->
                                        <!--                        <div class="pagination-main ">
                                                                    <ul class="pagination">
                                                                        <li class="disabled">
                                                                            <a aria-label="Previous">
                                                                                <span aria-hidden="true">
                                                                                    <i class="fa fa-angle-left"></i>
                                                                                </span></a>
                                                                        </li>
                                                                        <li class="active"><a data-houzepagi="1" href="#">1 <span class="sr-only"></span></a></li>
                                        <?php for ($i = 1; $i < $pages; $i++) {
                                            ?>
                                                                                                                        <li><a data-houzepagi="2" href="">2</a></li>
                                        <?php } ?> 
                                                                        <li><a data-houzepagi="2" rel="Next" href="#"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                                                                    </ul>
                                                                </div>            start Pagination-->

                                    <?php } ?>
                                </div>
                            </div>


                            <!-- /.row -->
                            <div style=" width: 100%; " id="menu_pop_up"></div>  



                        </div>
                    <?php } if ($active_tab == 5) { ?>
                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <h3>All Requests</h3><hr>
                            <?php
                            if (!empty($request)) {
                                foreach ($request as $list) {
                                    ?>
                                    <div class="col-sm-6 servent_request_container<?php echo $list['id']; ?> ">
                                        <div class="alert request_list">
            <!--                                            <a href="javascript:void()" title="Reject request" class="close servent_request_id" data-id="<?php //echo $list['id'];    ?>" >&times;</a>-->
                                            <div class="row">
                                                <div class="img-thumb col-sm-3 col-md-3 center-block">
                                                    <img src="<?php
                                                    if (!empty($list['user_profile']['profile_image'])) {
                                                        echo base_url('uploads/profile_images/') . $list['user_profile']['profile_image'];
                                                    } else {
                                                        echo base_url('uploads/profile_images/default.png');
                                                    }
                                                    ?>" height="90" width="90">
                                                </div>
                                                <div class="request_details  col-sm-9 col-md-9" style="margin-top:15px;">
                                                    <h3 class="requested_user_name"><?php echo ucfirst($list['user_profile']['name']); ?></h3>
                                                    <p class="requested_user_details">Email: <span><?php echo ucfirst($list['user_profile']['email']); ?></span></p>
                                                    <p class="requested_user_details">Mobile: <span><?php echo ucfirst($list['user_profile']['mobile']); ?></span></p>

                                                </div>
                                            </div>     
                                        </div> 
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<h4>No request!</h4>";
                            }
                            ?>


                        </div>
                        <!-- notification -->
                    <?php } if ($active_tab == 6) { ?>
                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <div class="col-sm-6">
                                <h3 style="text-align: left;">All Notification</h3>
                            </div>
                            <div class="col-sm-6">
                                <h5 style="text-align: right;"><a href="javascript:void()" id="n_all_list" style="color: #000;"> Read All</a></h5>
                            </div>
                            <div class="col-sm-12 servent_request_container">
                                <div class="addon">
                                    <ul>
                                        <?php if(!empty($notifications)){
                                            foreach($notifications as $notification){
                                                $active_class_name = "list-active";
                                                if($notification['is_read']==1){
                                                    $active_class_name = "";
                                                }
                                            ?>
                                            <li class="clearfix <?php echo $active_class_name; ?>">
                                                <a href="<?php echo $notification['redirect_path']; ?>" class="n_list" list-id="<?php echo $notification['id']; ?>" target="_blank">
                                                    <img class="round" src="<?php echo $notification['sender_image'];?>">
                                                    <div class="legend-info">
                                                        <?php echo $notification['description']; ?>
                                                    </div>
                                                    <div class="time">
                                                        <div class="comment-text">
                                                            <p><?php echo date('d M ', $notification['created']).'at '. date('H:i', $notification['created']); ?></p>
                                                        </div> 
                                                        <div class="comment-icon">
                                                            <img class="" src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/AN4PFNRulRD.png" alt="">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php } } else { echo "<p style='font-weight:400'>No notifications!</p>"; } ?>
                                        
                                    </ul>
                                </div>

                            </div>

                        </div>



                    <?php } if ($active_tab == 4) { ?>
                        <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <h3>All Requests</h3><hr>
                            <?php
                            if (!empty($request)) {
                                foreach ($request as $list) {
                                    ?>
                                    <div class="col-sm-6  request_container<?php echo $list['id']; ?>">
                                        <div class="alert request_list">
                                            <a href="javascript:void()" title="Delete request" class="close request_id"  data-id="<?php echo $list['id']; ?>">&times;</a>
                                            <div class="row">
                                                <div class="img-thumb col-sm-3 col-md-3 center-block">
                                                    <img src="<?php
                                                    if (!empty($list['servent_profile']['profile_image'])) {
                                                        echo base_url('uploads/profile_images/') . $list['servent_profile']['profile_image'];
                                                    } else {
                                                        echo base_url('uploads/profile_images/default.png');
                                                    }
                                                    ?>" height="90" width="90">
                                                </div>
                                                <?php
                                                $status_text = array("Pending", "Accepted", "Rejected");
                                                $request_status = $status_text[$list['status']];
                                                $bg_color = array("#ef992e", "#569c3f", "#ff2805");
                                                $request_color = $bg_color[$list['status']];
                                                ?>

                                                <div class="request_details  col-sm-9 col-md-9">
                                                    <h3 class="requested_user_name"><?php echo ucfirst($list['servent_profile']['name']); ?><span class="request_status" style="background-color: <?php echo $request_color; ?>"><?php echo $request_status ?></span></h3>
                                                    <?php if($list['status']==1){ ?>
                                                    <p class="requested_user_details">Email: <span><?php echo ucfirst($list['servent_profile']['email']); ?></span></p>
                                                    <p class="requested_user_details">Mobile: <span><?php echo ucfirst($list['servent_profile']['mobile']); ?></span></p>
                                                    <?php } ?>
                                                    <p class="requested_user_details">Request Sent to: <span><strong><?php echo ucfirst($list['service_sub_cat']); ?></strong></span></p>
                                                </div>
                                            </div>     
                                        </div> 
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<h4>No request!</h4>";
                            }
                            ?>


                        </div>
                    <?php } ?>




                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<div id="getmodal"> </div>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
                        $(document).ready(function () {
                            $('#example2').DataTable({
                                "scrollX": true
                                        // serverSide: true,
                                        //ajax: '/data-source'
                            });
                        });
</script>



<style>
    .tble-width{
        width:200px !important;
        height:20px !important;
        overflow:hidden !important;
    }
</style>

<!--end section page body-->
<div class="container">
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 60%; margin:auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CHANGE PROFILE PICTURE</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <center>
                            <img id="blah" alt="your image" src="<?php
                            if (!empty($users['profile_image'])) {
                                $pos = strpos($users['profile_image'], "http");
                                if ($pos === false) {
                                    echo base_url('uploads/profile_images/') . $users['profile_image'];
                                } else {
                                    echo $users['profile_image'];
                                }
                            } else {
                                echo base_url('uploads/profile_images/default.png');
                            }
                            ?>" class="img-rounded" alt="" style="width:43%; margin:0px auto;">
                            <br>
                            <br>
                            <br>
                            <input type="file" onchange="readURL(this);" name="choseprofilepic" style="margin-left: 60px; font-size: 12px;">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <input style="background-color: #00aeef;" type="submit" name="image_submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="Submit">
                        <button style="margin-right: 49px; line-height: 1;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!--Start in header end #section-body-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<?php echo $this->load->view('custome_link/custome_js'); ?>





<!--start footer section-->

<script>
    $('#change').click(function () {
        //alert('sadf'); exit;
        var o_password = $('#o_password').val();
        var password = $('#password').val();
        var r_password = $('#r_password').val();
        var change = $('#change').val();
        //alert(o_password); alert(password); alert(n_password); exit;
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/changePassword') ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                o_password: o_password,
                password: password,
                r_password: r_password,
                change: change

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    $('#profile_form input');
                    $('#profile_error_validation').text(data.message);
                    $('#profile_error_validation').css({"font-size": "14px", "color": "green"});


                } else {
                    $('#profile_error_validation').text(data.message);
                    $('#profile_error_validation').css({"font-size": "14px", "color": "red"});

                }
            }
        });
    });


</script>
<script>
    $(document).ready(function () {
        var country_name = $('#selected_country').val();
        var selected_city = $('#selected_city').val();
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/ajax_city_list') ?>",
            method: 'POST',
            data: {
                country_name: country_name,
                selected_city: selected_city
            },
            success: function (data) {
                if (data) {
                    $('#city').html(data);
                }
            }
        });

    });
    $('#nationality').change(function () {
        var country = $('#nationality').find(":selected").data('id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/ajax_city_list') ?>",
            method: 'POST',
            data: {
                country: country,
            },
            success: function (data) {
                if (data) {
                    $('#city').html(data);
                }
            }
        });

    });
</script>

<script>
    var xyz = "<?php echo $active_tab; ?>";
//alert(xyz);
    $('.active' + xyz).addClass('active');
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function () {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
                .addEventListener('click', function () {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initMap"
async defer></script>

<script>
    $("#txtarea").hide();

    $("#slct").change(function () {
        var val = $("#slct").val();
        if (val == "1") {
            $("#txtarea").show();
        } else {
            $("#txtarea").hide();
        }
    });
</script>

<script>
    $('#property_delete').click(function () {
        var id = $(this).attr('data-id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/ajax_delete_properties'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                if (data.status) {
                    alert('Property deleted');
                    window.location.href = 'list_properties';
                } else {
                    alert('Property not deleted');
                }
            }
        });

    });


</script>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<script>
    $("#property_form").submit(function () {
        $(this).submit(function () {
            return false;
        });
        return true;
    });

    $(".number").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
            return false;
        }
    });
</script>

<script>
    function delete_cv() {
        var id = $("#cv").attr('data-id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/ajax_delete_cv'); ?>",
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data) {
                    $(".cv_container").empty();
                    $("#user_cv").attr("required", "");
                } else {
                    alert('CV not deleted');
                }
            }
        });
    }

    function delete_video_cv() {
        var id = $("#video_cv").attr('data-id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/ajax_delete_video_cv'); ?>",
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data) {
                    $(".video_cv_container").empty();
                } else {
                    alert('Your Video CV not deleted');
                }
            }
        });
    }
</script>
<script>
    $('.request_id').on('click', function () {
        var id = $(this).attr('data-id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Servent_request/ajax_delete_servent_request'); ?>",
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data == 1) {
                    $(".request_container" + id).empty();
                    location.reload();
                } else {
                    alert('Your request is not deleted');
                }
            }
        });
    });
    $('.servent_request_id').on('click', function () {
        var id = $(this).attr('data-id');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Servent_request/ajax_update_servent_request'); ?>",
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                if (data == 1) {
                    $(".servent_request_container" + id).empty();
                    location.reload();
                } else {
                    alert('Your request is not deleted');
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
//    $('#user_video_cv_opt1').hide();
//    $('#user_video_cv_opt2').hide();
        $('.upload_video_option').on('click', function () {
            var value = $(this).val();
            if (value == 1) {
                $('#user_video_cv_opt1').show();
                $('#user_video_cv_opt2').hide();
            }
            if (value == 2) {
                $('#user_video_cv_opt1').hide();
                $('#user_video_cv_opt2').show();
            }
        });
    });
    $('#user_video_cv').bind('change', function () {
        if (this.files[0].size / 1024 / 1024 > 50) {
            alert("Please upload video less than 50MB");
            $('#user_video_cv').val('');
        }
    });

</script>
<script>
    $('#property_type').change(function () {
        var value = $(this).val();
        if (value == 1 || value == 4 || value == 10) {
            $('.property_toggle_div').hide();
        } else {
            $('.property_toggle_div').show();
        }
    });
</script>
<?php if ($this->session->flashdata('profile_incomplete')) { ?>
    <script>alert("Please complete your profile.")</script>
<?php } ?>
<script>
$('.n_list').click( function(){
    var id =  $(this).attr('list-id');
    //alert(id); exit;
    jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Notifications/ajax_update_notification_status'); ?>",
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                //alert('read');
                location.reload();
            }
        });
    
});
$('#n_all_list').click( function(){
    var read_all =  1;
    jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Notifications/ajax_update_notification_status'); ?>",
            method: 'POST',
            data: {
                read_all: read_all
            },
            success: function (data) {
                //alert('read_all');
                location.reload();
            }
        });
    
});
</script>

