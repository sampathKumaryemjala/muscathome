<?php
//pre($this->session->userdata['active_user_data']['user_type']); die; 

$usertype = 0;

if (isset($this->session->userdata['active_user_data']['user_type']) && $this->session->userdata['active_user_data']['user_type'] == 1) {
    $usertype = 1;
}
?>
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit&hl=en" async defer></script>
<?php
$this->db->where('id', $this->session->userdata('active_user_data')['id']);
$data['login_user'] = $this->db->get('users')->row_array();
$login_name = $data['login_user']['name'];

echo $this->load->view('include/language_variable', array());

$social_auth = social_login_authUrl();
$google_authUrl = $social_auth['google_authUrl'];
$facebook_authUrl = $social_auth['facebook_authUrl'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#option").click(function () {
            alert("The paragraph is now hidden");
            $("p").hide("slow", function () {

            });
        });
    });
</script>
<style>
    .input-group-addon{
        border: 1px solid #ccc0;
    }
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>web_assets/js/bootstrap-show-password.min.js"></script>
<script type="text/javascript">
    $(".users_password").password('toggle');
</script>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<div class="modal fade" id="pop-login" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li id="login_tab" class="active">Login</li>
                    <li id="reg_tab">Register</li>
                    <!-- <li>Agents</li> -->
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>

            </div>
            <div class="modal-body login-block">
                <div class="tab-content"> 
                    <div class="tab-pane fade in active">
                        <div class="message">
                            <!--<p class="error text-danger"><i class="fa fa-close"></i> You are not Logedin</p>
                            <p class="success text-success"><i class="fa fa-check"></i> You are not Logedin</p> -->
                        </div>
                        <form id="login_users" method="post" role="form" autocomplete="off" enctype="multipart/form-data" class="form_style">


                            <h2>Login as</h2>
                            <ul>
                                <li class="col-sm-4">
                                    <input type="radio" class="sel_user" id="f-option" value="0" name="toggler" checked>
                                    <label for="f-option">User</label>
                                    <div class="check"></div>
                                </li>
                                <li class="col-sm-4">
                                    <input type="radio"  class="sel_user"  id="s-option" value="1" name="toggler">
                                    <label for="s-option">Agent</label>
                                    <div class="check"></div>
                                </li>
                                <li class="col-sm-4">
                                    <input type="radio"  class="sel_user"  id="a-option" value="3" name="toggler">
                                    <label for="a-option">Servant</label>
                                    <div class="check"></div>
                                </li>
                            </ul>
                            <span id="login_user_error_validation"></span>
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input value="<?php
                                    if (get_cookie('remember_me')) {
                                        echo json_decode(get_cookie('remember_me'))->username;
                                    }
                                    ?>" type="text" placeholder="Phone or Email id" id="login_users_username">
                                </div>
                                <div class="input-pass input-icon">
                                    <input value="<?php
                                    if (get_cookie('remember_me')) {
                                        echo json_decode(get_cookie('remember_me'))->password;
                                    }
                                    ?>" type="password" placeholder="Password" class="users_password"  data-toggle="password" id="login_users_password" >
                                </div>
                            </div>
                            <div class="forget-block clearfix">
                                <div class="form-group pull-left">
                                    <div class="checkbox">
                                        <label>
                                            <input <?php
                                            if (get_cookie('remember_me')) {
                                                echo "checked";
                                            }
                                            ?> type="checkbox" id="checkbox_login" name="checkbox_login">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <a href="#" title="Forgot password" data-toggle="modal" data-dismiss="modal" title="forgot password" data-target="#pop-reset-pass">forgot password</a>
                                </div>
                            </div>

                            <button type="button"  class="btn btn-primary btn-block login_users agent_contact_form" data-status="1" >Login</button>
                        </form>

                        <hr>
                        <div id="social_login_section">
                            <a href="<?php echo $facebook_authUrl; ?>" title="Facebook login" class="btn btn-social btn-bg-facebook btn-block" title="Facebook login"><i class="fa fa-facebook"></i> login with facebook</a>
                            <!--<a href="#" class="btn btn-social btn-bg-linkedin btn-block"><i class="fa fa-linkedin"></i> login with linkedin</a>-->
                            <a href="<?php echo $google_authUrl; ?>" title="Gmail Login" class="btn btn-social btn-bg-google-plus btn-block" title="Gmail login"><i class="fa fa-google-plus"></i> login with Google</a>
                        </div>
                    </div>
                    <div class="tab-pane fade">
                        <h2>Register as</h2>
                        <ul style="list-style: none;">
                            <li class="col-sm-4" style="text-align:left; padding: 10px" >
                                <input type="radio" class="user_sel_for_reg" value="0" id="f-option" class="option" name="selector" checked> 
                                <label for="f-option">User</label>
                                <div class="check1"></div>
                            </li>
                            <li class="col-sm-4" style="text-align:left; padding: 10px">
                                <input type="radio" class="user_sel_for_reg" value="1" id="s-option" name="selector">
                                <label for="s-option">Agent</label>
                                <div class="check1"><div class="inside"></div></div>
                            </li>
                            <li class="col-sm-4" style="text-align:left; padding: 10px">
                                <input type="radio" class="user_sel_for_reg" value="2" id="a-option" name="selector">
                                <label for="a-option">Servant</label>
                                <div class="check1"><div class="inside"></div></div>
                            </li>
                        </ul>
                        <div id="form_user">
                            <span id="reg_user_error_validation"></span>
                            <form id="register_form"  method="post" role="form" enctype="multipart/form-data" autocomplete="off" >

                                <div class="form-group field-group">
                                    <div class="input-user input-icon">
                                        <input type="text" placeholder="Name" maxlength="24" id="reg_user_name" >
                                    </div>
                                    <div class="fa-mobile input-icon">
                                        <input type="text" placeholder="Mobile" maxlength="16" id="reg_user_phone"  autocomplete="off">
                                    </div>
                                    <div class="input-email input-icon">
                                        <input type="email" placeholder="Email"  maxlength="30" id="reg_user_email" autocomplete="off">
                                    </div>
                                    <div class="input-pass input-icon">
                                        <input type="password"  placeholder="Password"  maxlength="16" id="reg_user_password" class="users_password"  data-toggle="password" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="reg_user_check" value="1" >
                                            I agree with your <a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" title="Terms & Condition" target="_blank" >Terms & Conditions</a>.
                                        </label>
                                    </div>
                                </div>
                                <div style="width:100%" id="g-recaptcha-user" data-widget-id="1" class="g-recaptcha" data-sitekey="6LdQET4UAAAAAB7nM1Zuepi2OeJPJ7nk5HsOajpy"></div>
                                <br>
                                <button type="button"  class="btn btn-primary btn-block registration_form agent_contact_form" data-status="1" >Register</button>
                            </form>
                            <hr>

                            <a href="<?php echo $facebook_authUrl; ?>" class="btn btn-social btn-bg-facebook btn-block" title="Facebook login" ><i class="fa fa-facebook"></i> login with facebook</a>

                            <a href="<?php echo $google_authUrl; ?>" class="btn btn-social btn-bg-google-plus btn-block" title="Gmail login"><i class="fa fa-google-plus"></i> login with Google</a>
                        </div>
                        <div id="form_agent">  
                            <span id="reg_agent_error_validation"></span>
                            <form id="register_agent_form" action="<?php echo base_url('index.php/web_panel/register/register_agent/register_agent_submit'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group field-group" style="margin-bottom:0;">
                                    <input type="hidden" name="category" value=""  id="reg_agent_category_value">
                                    <div class="input-user input-icon">
                                        <input type="text" placeholder="Name" name="reg_agent_name"  maxlength="24" value=""  id="reg_agent_name" required>
                                    </div>
                                    <div class="fa-mobile input-icon" style="font-size: 1.5em">
                                        <input type="text" placeholder="Mobile" name="reg_agent_mobile" value=""  maxlength="16"  id="reg_agent_mobile" required autocomplete="off">
                                    </div>
                                    <div class="input-email input-icon">
                                        <input type="email" placeholder="Email" name="reg_agent_email" value=""  maxlength="30" id="reg_agent_email" required  autocomplete="off">
                                    </div>

                                    <div class="fa-lock input-icon">
                                        <input type="password" placeholder="Password" value=""  maxlength="16" name="reg_agent_password" class="users_password"  data-toggle="password" id="reg_agent_password" required>
                                    </div>

                                </div><br>
                                <div class="form-group login-select ">
                                    <select class="form-control" name="ser_category" data-live-search="false" title="category" class="reg_agent_category" id="reg_agent_category" required>
                                        <option value="0" >Select category</option>
                                    </select>
                                </div>

                                <div class="form-group login-select">
                                    <select class="form-control" name="ser_sub_category"  title="Sub-category" id="reg_agent_sub_category">
                                        <option>Select sub category</option>
                                    </select>
                                </div>


                                <div class="doc-upload" style="margin-top: 20px;">
                                    <button type="button" class="upload-button" id="trigger_file"><i class="fa fa-arrow-up" aria-hidden="true"></i>Upload Document</button>
                                    <input type="file" id="file_upload" name="files[]" style="display:none;" accept="image/x-png,image/gif,image/jpeg" multiple required >
                                    <p class="siginup-policy-txt">By signing up, you agree to <a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" title="Terms & Condition" target="_blank" >terms of use</a></p>
                                </div>

                                <!--                                <div style="width:100%" id="g-recaptcha-agent" data-widget-id="2" class="g-recaptcha" data-sitekey="6LdQET4UAAAAAB7nM1Zuepi2OeJPJ7nk5HsOajpy"></div>-->
                                <button type="button"  class="btn btn-primary btn-block registration_agent_form register_agent" style="margin-top:30px;" >Submit</button>

                            </form> 
                        </div>


                    </div>
                    <div class="tab-pane fade">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pop-reset-pass" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">Reset Password</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <p>Please enter your username or email address. You will receive a link to create a new password via email.</p>
                <span id="reset_error_validate"></span>
                <form action="" method="post" name="reset_password_form" id="reset_password_form" role="form" autocomplete="off" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="input-user input-icon">
                            <input placeholder="Enter your username or email" id="reset_email" name="reset_email" class="form-control">
                        </div>
                    </div>
                    <button type="button" data-toggle="modal" class="btn btn-primary btn-block reset_button">Get new password</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- OPT modal --->
<div class="modal fade" id="opt_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">OTP verification</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <p>Please enter OTP that you have received on your registered mobile number or Please check your email.</p>
                <span id="otp_validate"></span>
                <form action="" method="post" id="opt_form" role="form" autocomplete="off" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="input-user input-icon">
                            <input placeholder="Enter 6 digit OTP" id="otp" name="otp" maxlength="6" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" id="opt_button" >Verify OTP</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .top-menu .top-right ul li .top-login li.dropdown {
        display: inline-block;
    }
    .header-section-4 .navi > ul .lang{
        top: 25px !important;
        width: 90px;
    }
    .top-menu .top-right ul li .top-login ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        float: none;
    }
    .top-menu .top-right ul li .top-login li {
        float: left;
        margin-top: 0px;
    }
    .top-login.subMenu span {
        color: #fff;
        border: 1px solid #fff;
        padding: 3px;
    }

</style>



<!--start header section header v1-->
<header id="header-section" class="header-section-4 header-main nav-left hidden-sm hidden-xs header-none" data-sticky="1">
    <div class="container-fluid" style="padding: 0px 80px;"> 
        <div class="header-left">
            <div class="logo">
                <a href="<?php echo base_url(''); ?>" title="Muscat Home">
                    <img class="img-logo" src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" title="logo">
                    <h3 class="logo-text">Muscat Home</h3>
                </a>
            </div>
            <nav class="navi main-nav" >
                <ul>
                    <li><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/for_sale_properties" title="Buy">Buy</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/for_rent_properties" title="Rent">Rent</a></li>

                    <?php
                    $url = base_url('index.php/api_panel/Service/service_category');
                    //pre($url); die;
                    $services_details = file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
                    $services_details = (array) json_decode($services_details);
                    //pre($services_details);die;
                    if ($usertype == 0) {
                        ?>
                        <li class=""><a href="#" title="Services">Services</a>
                            <ul class="sub-menu">
                                <?php
                                if ($services_details['Result']) {
                                    foreach ($services_details['Result'] as $service) {
                                        ?>
                                        <li><img style="float:left; margin: 10px 15px 10px;" height="24" width="24" src="<?php
                                            if (!empty($service->icon)) {
                                                echo $service->icon;
                                            } else {
                                                echo base_url('uploads/services/icons/icon.png');
                                            }
                                            ?>">

                                            <a href="javascript:void(0)" title="<?php echo $service->name; ?>"><?php echo $service->name; ?></a>
                                            <ul class="sub-menu">
                                                <?php foreach ($service->sub_categories as $sub) {
                                                    if ($sub->fk_service_cat_id == 5) {
                                                        ?>
                                                        <li><img style="float:left; margin: 10px 15px 10px;" height="24" width="24" src="<?php
                                                            if (!empty($sub->icon)) {
                                                                echo $sub->icon;
                                                            } else {
                                                                echo base_url('uploads/services/icons/icon.png');
                                                            }
                                                            ?>"><a href="<?php echo base_url('index.php/web_panel/Servent_request?ghvj=') . base64_encode($sub->id); ?> " title="<?php echo $sub->name; ?>" ><?php echo $sub->name; ?></a>
                                                        </li> 
                                                        <?php } else { ?>
                                                        <li><img style="float:left; margin: 10px 15px 10px;" height="24" width="24" src="<?php
                                                            if (!empty($sub->icon)) {
                                                                echo $sub->icon;
                                                            } else {
                                                                echo base_url('uploads/services/icons/icon.png');
                                                            }
                                                            ?>"><a href="<?php echo base_url('index.php/web_panel/Job_post?ghvj=') . base64_encode($sub->id); ?> " title="<?php echo $sub->name; ?>" ><?php echo $sub->name; ?></a>
                                                        </li>
                                                    <?php }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                <!--                                <li>
                                                                    <a href="javascript:void(0)"> Outdoor </a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="#">Gardener</a></li>
                                                                        <li><a href="#">Building Maintenanec</a></li>
                                                                        <li><a href="#">car Cleaning</a></li>
                                                                        <li><a href="#">Vacation Rental</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)"> Personal </a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="#">Beautician</a></li>
                                                                        <li><a href="#">Massage</a></li>
                                                                        <li><a href="#">Trainer</a></li>
                                                                        <li><a href="#">Nurse</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a href="#"> Transport </a></li>-->
                            </ul>
                        </li> 
                        <?php } if (isset($this->session->userdata['active_user_data'])) { ?>
                        <li>
                            <a href="<?php echo base_url('index.php/web_panel/Profile/add_property'); ?>" title="Add Property" class="dropbtn"><span> Add Property</span></a>
                            <?php if ($this->session->userdata['active_user_data']['user_type'] == 0) { ?>
                                <a href="<?php echo base_url('index.php/web_panel/Job_post/user_posts'); ?>" title="My Jobs"><span> My Jobs</span></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs'); ?>" title="Available Jobs"><span> Available Jobs</span></a>
                        <?php } ?>
                        </li>
<?php } else { ?>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#pop-login" class="dropbtn" title="Add Property" ><span> Add Property</span></a>

                        </li>
<?php } ?>
                    <li>
                        <a href="<?php echo base_url('index.php/web_panel/Home/news'); ?>" title="News" class="dropbtn">News</a>
                    </li>
                    <!--                        <li class=""><a href="#">Pages</a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="#">Column 1</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="agent-list.html">All Agents</a></li>
                                                            <li><a href="agent-detail.html">Agent Profile</a></li>
                                                            <li><a href="agency-list.html">All Agencies</a></li>
                                                            <li><a href="company-profile.html">Company Profile</a></li>
                                                            <li><a href="compare-properties.html">Compare Properties</a></li>
                                                            <li><a href="landing-page.html">Landing Page</a></li>
                                                            <li><a href="map-full-search.html">Map Full Screen</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Column 2</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="about-us.html">About Houzez</a></li>
                                                            <li><a href="contact-us.html">Contact us</a></li>
                                                            <li><a href="login.html">Login Page</a></li>
                                                            <li><a href="register.html">Register Page</a></li>
                                                            <li><a href="forget-password.html">Forgot Password Page</a></li>
                                                            <li><a href="typography.html">Typography</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Column 3</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="faqs.html">FAQs</a></li>
                                                            <li><a href="simple-page.html">Simple Page</a></li>
                                                            <li><a href="404.html">404 Page</a></li>
                                                            <li><a href="headers.html">Houzez Headers</a></li>
                                                            <li><a href="footer.html">Houzez Footers</a></li>
                                                            <li><a href="widgets.html">Houzez Widgets</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Column 4</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="#">Houzez Search Bars</a></li>
                                                            <li><a href="#">Create Listing Page</a></li>
                                                            <li><a href="#">Select Packages Page</a></li>
                                                            <li><a href="#">Payment Page</a></li>
                                                            <li><a href="#">Listing Done Page</a></li>
                                                            <li><a href="#">Blog</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="#">Column 5</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="#">Blog detail</a></li>
                                                            <li><a href="#">My Account</a></li>
                                                            <li><a href="#">My Properties</a></li>
                                                            <li><a href="#">My Favourite Properties</a></li>
                                                            <li><a href="#">My Saved Searches</a></li>
                                                            <li><a href="#">My Invoices</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>-->

                </ul>
            </nav>
        </div>
        <div class="header-right login-text">
            <nav class="navi main-nav" >
                <ul>
                    <?php
                    if ($this->session->userdata('active_user_data')) {
                        //
                        if (isset($login_name)) {
                            //$login_name = $this->session->userdata('active_user_data')['name'];

                            $firstname = explode(' ', $login_name);
                            $subname = substr($firstname[0], 0, 12);

                            echo '<li><a href="#">' . ucfirst($subname) . '</a>';
                        }
                    }
                    ?>

                    <ul class="sub-menu">
                        <?php if ($this->session->userdata('active_user_data')['user_type'] == 0) { ?>
                            <li><a class="profile-menu" href="<?php echo base_url('index.php/web_panel/Job_post/user_posts'); ?>" title="My Posted Jobs">My Posted Jobs</a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata('active_user_data')['user_type'] == 1) { ?>
                            <li><a class="profile-menu" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs'); ?>" title="Jobs List">Jobs List</a></li>
<?php } ?>

                        <li><a class="profile-menu" href="<?php echo base_url('index.php/web_panel/Properties/favorite_properties'); ?>" title="My Favorite Properties">My Favorite Properties</a></li>
                        <li><a class="profile-menu" href="<?php echo base_url('index.php/web_panel/Profile/myProfile'); ?>" title="My Profile">My Profile</a></li>
                    </ul>


                    </li>
                    <li><a href="#" title="Logout"><?php
                            if ($this->session->userdata('active_user_data')) {
                                echo '<a href="' . site_url('web_panel/login/logout') . '">Logout</a>';
                            } else {
                                echo '<a href="#" data-toggle="modal" data-target="#pop-login">Sign In / Register</a>';
                            }
                            ?></a>
                    </li>
<?php if (isset($language) && !empty($language)) { ?>
                        <li>
                            <div class="top-login subMenu">
                                <form method="post">
                                    <a href="javascript:void(0)" title="Change Language" id="lang_chng" class="dropbtn"><span>
                                            <?php
                                            if (isset($this->session->userdata['lang']) && $this->session->userdata['lang'] == 1) {
                                                echo "AR";
                                            } else {
                                                echo "EN";
                                            }
                                            ?>
                                        </span></a>
                                    <ul class="lang">
                                        <li class="dropdown">
                                            <div class="dropdown-content" id="myDropdownLang">
                                                <a val="1" class="lang_sel" >English</a>
                                                <a val="0" class="lang_sel">Arabic</a>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </li>
<?php } ?>


                </ul>
            </nav>


        </div>
    </div>
</header>
<div class="header-mobile visible-sm visible-xs">
    <div class="container">
        <!--start mobile nav-->
        <div class="mobile-nav">
            <span class="nav-trigger"><i class="fa fa-navicon"></i></span>
            <div class="nav-dropdown main-nav-dropdown"></div>
        </div>
        <!--end mobile nav-->
        <div class="header-logo">
            <img class="img-logo" src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" title="logo">
            <h3 class="logo-text">MuscatHome.com</h3>
        </div>
        <div class="header-user">
            <ul class="account-action">
                <li>
                    <span class="user-icon"><i class="fa fa-user"></i></span>
                    <div class="account-dropdown">
                        <ul>
                            <li> <a href="#" title="Log in / Register" data-toggle="modal" data-target="#pop-login"> <i class="fa fa-user"></i> Log in / Register </a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0)" title="Change language" id="lang_chng" class="dropbtn"><span class="user-icon">
                            <?php
                            if (isset($this->session->userdata['lang']) && $this->session->userdata['lang'] == 1) {
                                echo "AR";
                            } else {
                                echo "EN";
                            }
                            ?>
                        </span>
                    </a>
                    <div class="account-dropdown">
                        <ul>
                            <li> <a val="1" class="lang_sel"> English </a></li>
                            <li> <a val="0" class="lang_sel"> Arbic </a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<style>
    .profile-menu{
        text-align: left important;
    }
    .header-section-4 .header-right a {
        text-align: left;
    }

</style>




