<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<?php if ($this->session->flashdata('request_send')) {

//echo $_SESSION['request_send'];die;

 ?>
    <script>alert('Request has been sent')</script>
<?php }  if($this->session->flashdata('without_login')){ 

//echo $_SESSION['without_login'];die;

//echo '<a href="#" data-toggle="modal" data-target="#pop-login">Sign In / Register</a>';

    ?>
    <script> //alert('Please login first');

 // $(document).ready(function(){
 //     $('#pop-login').modal('show');
 // });


function show_login_popup(){


$('#pop-login').modal('show');

return true;

}

    </script>
<?php }?>
<style type="text/css">
    .fb-profile img.fb-image-lg{
        z-index: 0;
        width: 100%;  
        margin-bottom: 10px;
        height: 330px;
        margin-top: -10px;
    }

    .fb-image-profile
    {
        margin: -130px 10px 20px 80px;
        z-index: 9;
        width: 20%; 
    }

    /***
    Bootstrap Line Tabs by @keenthemes
    A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
    Licensed under MIT
    ***/

    /* Tabs panel */
    .tabbable-panel {
        border:1px solid #eee;
        padding: 10px;
    }

    /* Default mode */
    .tabbable-line > .nav-tabs {
        border: none;
        margin: 0px;
    }
    .tabbable-line > .nav-tabs > li {
        margin-right: 2px;
    }
    .tabbable-line > .nav-tabs > li > a {
        border: 0;
        margin-right: 0;
        color: #737373;
    }
    .tabbable-line > .nav-tabs > li > a > i {
        color: #a6a6a6;
    }
    .tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
        border-bottom: 4px solid #fbcdcf;
    }
    .tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
        border: 0;
        background: none !important;
        color: #333333;
    }
    .tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
        color: #a6a6a6;
    }
    .tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
        margin-top: 0px;
    }
    .tabbable-line > .nav-tabs > li.active {
        border-bottom: 4px solid #f3565d;
        position: relative;
    }
    .tabbable-line > .nav-tabs > li.active > a {
        border: 0 !important;
        color: #333333;
    }
    .tabbable-line > .nav-tabs > li.active > a > i {
        color: #404040;
    }
    .tabbable-line > .tab-content {
        margin-top: -3px;
        background-color: #fff;
        border: 0;
        border-top: 1px solid #eee;
        padding: 18px 15px;
    }
    .portlet .tabbable-line > .tab-content {
        padding-bottom: 0;
    }

    /* Below tabs mode */

    .tabbable-line.tabs-below > .nav-tabs > li {
        border-top: 4px solid transparent;
    }
    .tabbable-line.tabs-below > .nav-tabs > li > a {
        margin-top: 0;
    }
    .tabbable-line.tabs-below > .nav-tabs > li:hover {
        border-bottom: 0;
        border-top: 4px solid #fbcdcf;
    }
    .tabbable-line.tabs-below > .nav-tabs > li.active {
        margin-bottom: -2px;
        border-bottom: 0;
        border-top: 4px solid #f3565d;
    }
    .tabbable-line.tabs-below > .tab-content {
        margin-top: -10px;
        border-top: 0;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .menu_title {
        padding: 15px 10px;
        border-bottom: 1px solid #eee;
        margin: 0 5px;
    }

    .fb-profile-text h1{
        float: left;
    }
    @media (max-width:768px){

        .fb-profile-text>h1{
            font-weight: 700;
            font-size:16px;
        }

        .fb-image-profile
        {
            margin: -45px 10px 0px 25px;
            z-index: 9;
            width: 20%; 
        }
    }
</style>
<div id="section" style="min-height: 530px;">
    <div class="container-fluid">
        <div class="row">


            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="https://muscathome.com/web_assets/images/2.JPG" alt="Profile image example"/>
                <img align="left" class="fb-image-profile thumbnail" src="<?php if (!empty($servent_detail['image_url'])) {
    echo base_url('uploads/profile_images/') . $servent_detail['image_url'];
} else {
    echo base_url('uploads/profile_images/default.png');
} ?>" alt="Profile image example"/>
                <div class="fb-profile-text">
                    <h1><?php echo $servent_detail['name']; ?></h1>

                </div>
            </div>
        </div>
    </div> <!-- /container fluid-->  

<?php // if ($this->session->flashdata('request_send')) {      ?>
    <div class="container-fluid">
        <div class="col-sm-8">

            <div data-spy="scroll" class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab">
                                About </a>
                        </li>
                        <li>
                            <a href="#tab_default_2" data-toggle="tab">
                                Education& Career</a>
                        </li>
                        <li>
                            <a href="#tab_default_3" data-toggle="tab">
                                Personal Details</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                             <p>
                           About
                            </p>

                            <div class="form-group">
                                        <label for="email">Description :</label>
                                        <p>
                                             <?php echo $servent_detail['servent_details']['about_servent']; ?>
                                       </p>
                                </div>
                           
                             
                            
                                    <div class="form-group">
                                        <label for="email">Experience :</label>
                                        <p> <?php echo $servent_detail['servent_details']['experience'] . " months"; ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Nationality :</label>
                                        <p> <?php echo $servent_detail['servent_details']['nationality']; ?></p>
                                    </div>
                               
                            <!-- <h4>Education </h4> -->
                            <!-- <h4>Occupation</h4> -->
                            <!-- <h4>Video</h4> -->
                            <style>
                                body:-webkit-full-page-media {
                                background-color: #fff !important;
}
                            </style>
                            <div id="video" class="property-video detail-block target-block">
                                <div class="video-block">
                               <?php 
                                    $url = $servent_detail['servent_details']['video_url']; 
                                    $url_array = explode('/',$url);
                                        if(in_array('www.youtube.com', $url_array)){
                                            $get_video_link = explode('=',end($url_array));
                                            $video_url = "https://www.youtube.com/embed/".$get_video_link[1]."?controls=1";
                                            }else {
                                                 $video_url = $url;
                                            }
                                    ?>
                                    <?php if(!empty($video_url)){ ?>
                                    <iframe style="background-color:white; border:none; width: 854px; height: 450px"
                                            src="<?php echo $video_url; ?>">
                                    </iframe>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab_default_2">
                        <p>
                               Education & Career
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Highest Education:</label>
                                        <p> <?php echo $servent_detail['servent_details']['highest_degree']; ?></p>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email"> Curriculum Vitae (CV)</label>
                                        <p><a href="<?php echo $servent_detail['servent_details']['cv_url']; ?>" download> Download Now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_default_3">
                            <p>
                                Personal Details
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Name:</label>
                                        <p> <?php echo $servent_detail['name']; ?></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Gender:</label>
                                        <p> <?php if ($servent_detail['servent_details']['gender'] == 1) {
    echo "Male";
} else {
    echo "Female";
} ?></p>
                                    </div>
<!--                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <p> <?php //echo $servent_detail['email']; ?></p>
                                    </div>-->
                                    
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">City:</label>
                                        <p> <?php echo $servent_detail['servent_details']['city']; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Age:</label>
                                        <p> <?php echo $servent_detail['servent_details']['age']; ?></p>
                                    </div>
<!--                                    <div class="form-group">
                                        <label for="email">Phone:</label>
                                        <p> <?php //echo $servent_detail['mobile']; ?></p>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="email">Sevice Category:</label>
                                        <p> <?php echo $servent_detail['sub_cat_name']; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="menu_title">
                    Quick Look
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" name="servent_requset_form">
                                <div class="form-group">
                                    <label for="email">Name:</label>
                                    <p> <?php echo $servent_detail['name']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Age:</label>
                                    <p> <?php echo $servent_detail['servent_details']['age']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Gender:</label>
                                    <p> <?php if ($servent_detail['servent_details']['gender'] == 1) {
    echo "Male";
} else {
    echo "Female";
} ?></p> 
                                </div>
<!--                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <p> <?php //echo $servent_detail['email']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone:</label>
                                    <p> <?php //echo $servent_detail['mobile']; ?></p>
                                </div>-->
                                <div class="form-group">
                                    <label for="email">Sevice Category:</label>
                                    <p> <?php echo $servent_detail['sub_cat_name']; ?></p>
                                </div>
                                <input type="hidden" name="fk_servent_id" value="<?php echo $servent_detail['id']; ?>">
                                <?php if(isset($_SESSION['without_login'])){ ?>
                                <button type="button" onclick="show_login_popup();" class="btn btn-danger btn-block">Send a Request</button>
                                <?php }else if(!isset($_SESSION['without_login'])){

?>
 <button type="submit" class="btn btn-danger btn-block">Send a Request</button>
<?php


                                    } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <?php 

//}
    ?>
</div>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




