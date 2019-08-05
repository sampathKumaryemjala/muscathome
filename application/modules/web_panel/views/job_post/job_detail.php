<?php //pre($user_posts);die;                 ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>


<style id='houzez-style-inline-css' type='text/css'>
    #hearts { color: #ee8b2d;}
    #hearts-existing { color: #ee8b2d;}

    .owl-prev{
        width: 9%;
        position: absolute;
        top: 47%;
        height: 56px;
        color: #fff;
        padding-top: 4px;
        padding-left: 10px;
        background-color: rgba(0, 155, 214, 0.56);

    }
    .owl-prev:hover{background-color: #00aeef;}
    .owl-next{
        width: 9%;
        position: absolute;
        top: 47%;
        right:0%;
        height: 56px;
        color: #fff;
        padding-top: 4px;
        padding-left: 10px;
        background-color: rgba(0, 155, 214, 0.56);

    }
    .owl-next:hover{background-color: #00aeef;}
    .none{display:none !important;}
    .detail-slider-nav-wrap{margin-top: 10px;}
    .detail-media {
        position: relative;
        padding-top: 0px !important;
    }
    .detail-content-slideshow .item {height:240px;}
    .item-body .phone {
        position:relative; 
        margin-top: 100px;
    }
</style>
<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;    
    }

    .process-row {
        display: table-row;
    }

    .process {
        display: table;     
        width: 100%;
        position: relative;
    }

    .process-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .process-row:before {
        top: 24px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .process-step {    
        display: table-cell;
        text-align: center;
        position: relative;
        padding-right: 35px;
    }

    .process-step p {
        margin-top:10px;

    }

    .btn-circle {
        width: 45px;
        height: 45px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src=<?php echo base_url('web_assets/') ?>'wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>

<div id="section-body" class="">

    <!--start compare panel-->
    <div id="compare-controller" class="compare-panel">
        <div class="compare-panel-header">
            <h4 class="title"> Job Post Detail <span class="panel-btn-close pull-right"><i class="fa fa-times"></i></span></h4>
        </div>

        <div id="compare-properties-basket">
        </div>
    </div>
    <!--end compare panel-->

    <!--start detail top-->
    <section class="detail-top detail-top-grid no-margin">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="header-detail">
                        <div class="header-left">
                            <ol class="breadcrumb">
                                <li itemscope ><a itemprop="url" href="<?php echo base_url('index.php/web_panel/Home') ?>"><span itemprop="title">Home</span></a></li>
                                <li itemscope ><a itemprop="url" href="<?php echo base_url('index.php/web_panel/Job_post/user_posts') ?>"><span itemprop="title">Posted Jobs</span></a></li>
                                <li class="active">Job Post Detail</li>
                            </ol>
                            <div class="table-list">
                                <div class="table-cell">
                                    <h1><?php
                                        if ($user_posts[0]['fk_service_cat_id'] == 4) {
                                            echo "Transport Job";
                                        } else {
                                            echo ucfirst($user_posts[0]['title']);
                                        }
                                        ?></h1></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end detail top-->

    <!--start detail content-->
    <section class="section-detail-content">

        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">

                    <div class="detail-bar">

                        <div class="detail-media detail-content-slideshow">
                            <div class="tab-content">

                                <div id="gallery" class="tab-pane fade in active">
<!--                                        <span class="label-wrap visible-sm visible-xs">
                                <span class="label label-primary label-status-7">For Sale</span>
                                    </span>-->
                                    <div class="detail-slider-wrap">
                                        <div class="detail-slider owl-carousel owl-theme">
                                            <?php
                                            if (!empty($user_posts[0]['images'])) {
                                                foreach ($user_posts[0]['images'] as $image) {
                                                    ?>
                                                    <div class="item" style="background-size:100% 100%; background-image: url(<?php echo base_url('uploads/job_posts/') . $image['image'] ?>)">
                                                        <a class="popup-trigger banner-link" href="#"></a>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="item" style="background-size:100% 100%; background-image: url(<?php echo base_url('uploads/job_posts/default.jpg') ?>)">
                                                    <a class="popup-trigger banner-link" href="#"></a>
                                                </div> 
<?php } ?>
                                        </div>
                                        <div class="detail-slider-nav-wrap">
                                            <div class="detail-slider-nav owl-carousel owl-theme none">
<!--                                                    <div class="item"><img src="<?php echo base_url('web_assets/') ?>wp-content/uploads/2016/03/los-angeles-08-150x110.jpg" alt="los-angeles-08" width="100" height="70" /></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-md-offset-0 col-sm-offset-3">
                    <aside id="sidebar" class="sidebar-white">

                        <div class="widget widget-contact-agent hidden-sm hidden-xs">
                            <div class="widget-body">
                                <div class="form-small">
                                    <form method="post" action="#">
                                        <div class="media">
                                            <div class="media-body " style="width: 75%;">
                                                <?php if ($user_posts[0]['fk_service_cat_id'] == 4) { ?>
                                                    <div class="col-sm-6" style="padding-left:0"><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Source: </strong><?php echo $user_posts[0]['source'] ?></div>
                                                    <div class="col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Destination: </strong><?php echo $user_posts[0]['destination'] ?></div><br><br>
                                                <?php } else { ?>
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $user_posts[0]['address'] ?>
                                            <?php } ?>
                                            </div>
                                            <!--                                            <div class="media-right" style="width: 25%; float: right; margin-top: -26px;">
                                            <?php //if (!empty($user_posts[0]['budget'])) { ?>
                                                                                                <div class="item-price" style="font-size: 30px; color: #fbb838; text-align: right;"><b>OMR <?php //echo number_format_short($user_posts[0]['budget']);   ?></b></div>
                                            <?php //} else { ?>
                                                                                                <div class="item-price" style="font-size: 30px; color: #fbb838; text-align: right;"><b>OMR 0</b></div>
<?php //}   ?>
                                                                                        </div>-->
                                            <div class="date-time">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $user_posts[0]['dated'] ?></li>
                                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $user_posts[0]['timed'] ?> </li>
                                                </ul>
                                            </div>
                                        </div>


<?php if ($user_posts[0]['fk_service_cat_id'] == 4) { ?>
                                            <div><?php if ($user_posts[0]['fk_service_cat_id'] == 4) { ?>
                                                    <div class="info-row amenities ">
                                                        <p><strong>Item to be moved: </strong><?php echo $user_posts[0]['items']; ?></p>

                                                        <p><strong>Insured: </strong><?php
                                                            if ($user_posts[0]['is_insured']) {
                                                                echo 'Yes';
                                                            } else {
                                                                echo "No";
                                                            }
                                                            ?></p>
                                                    </div>
    <?php } ?> 

                                            </div>


<?php } ?>

                                        <div class="description-text service-content">
                                            <h3>Job Description</h3>
                                            <p><?php echo $user_posts[0]['description'] ?></p>
                                        </div>

                                            <?php if ($user_posts[0]['fk_service_cat_id'] != 4) { ?>
                                            <div class="job-material">
                                                <?php
                                                if ($user_posts[0]['self_material'] == 1) {
                                                    echo "I will supply all materials";
                                                }
                                                ?>
                                            </div>
                                        <?php } ?>

                                            <?php if ($user_posts[0]['fk_service_cat_id'] == 3) { ?> 
                                            <div class="description-text service-content"><i class="fa fa-user" aria-hidden="true"></i><strong> Gender Prefrence: </strong><?php
                                                if ($user_posts[0]['gender_priority'] == 0) {
                                                    echo "Female";
                                                } else {
                                                    echo "Male";
                                                }
                                                ?></div><br><br>
<?php } ?>
                                        <div class="form_messages"></div>
                                    </form>
                                </div>
                            </div>

                            <?php
//pre($user_posts);
                            foreach ($user_posts[0]['providers'] as $provider) { //pre($provider);
                                if ($provider['provider_status'] == 2 && $provider['customer_status'] == 1) {
                                    ?>
                                    <div class="pull-right" style="position: relative; bottom:20px;">
                                        <form action="" method="post">
                                            <button type="button" data-confirm="<?php echo $provider['id'] ?>" class="btn btn-primary confirm-btn" id="confirm-btn">Confirm Job Completed</button>
                                        </form>
                                    </div>
        <?php
    }
    if ($provider['provider_status'] == 2 && $provider['customer_status'] == 2) {
        ?>
                                    <div class="pull-right" style="position: relative; bottom:20px;">
                                        <form action="" method="post">
                                            <?php if ($payment_status == 0) { ?>
                                                <button type="button" class="btn btn-primary" id="paynow">Pay Now</button>
                                    <?php } else { ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paid">Paid</button>
                                    <?php } ?>
                                        </form>
                                    </div>
        <?php
    }
}
?>
                            <div class="clearfix"></div>
                            <div class="process">
                                <div class="process-row">
                                    <div class="process-step">
                                        <button type="button" class="btn btn-success btn-circle" disabled="disabled"><i class="fa fa-clock-o fa-2x"></i></button>
                                        <p>Pending</p>
                                    </div> 
                                    <?php
                                    $status_accepted = ["btn-disable", "btn-success", "btn-success", "btn-disable", "btn-disable", "btn-success"];
                                    $status_started = ["btn-disable", "btn-disable", "btn-success", "btn-disable", "btn-disable", "btn-success"];
                                    $status_compelete = ["btn-disable", "btn-disable", "btn-success", "btn-disable", "btn-disable", "btn-disable"];
                                    ?>
                                    <div class="process-step">
                                        <button type="button" class="btn <?php echo $status_accepted[$user_posts[0]['status']]; ?> btn-circle" disabled="disabled"><i class="fa fa-check-circle fa-2x"></i></button>
                                        <p>Accepted</p>
                                    </div>
                                    <div class="process-step">
                                        <button type="button" class="btn <?php echo $status_started[$user_posts[0]['status']]; ?> btn-circle" disabled="disabled"><i class="fa fa-hourglass-start fa-2x"></i></button>
                                        <p>Started</p>
                                    </div>
                                    <div class="process-step">
                                        <button type="button" class="btn <?php echo $status_compelete[$user_posts[0]['status']]; ?> btn-circle" disabled="disabled"><i class="fa fa-check-square-o fa-2x"></i></button>
                                        <p>Completed</p>
                                    </div> 
                                </div>
                            </div>
                        </div>



<!--                        <div style="height:40px; width: 100%; background-color:<?php //echo $status_color[$user_posts[0]['status']];     ?>; text-align: center; ">
    <h3 style="color: white; line-height: 40px; font-weight: 200; text-transform: uppercase"><? //php echo $status_text[$user_posts[0]['status']]; ?></h3>
</div> -->

                    </aside>

                </div>

            </div>

            <!-- PAYMENT MODAL -->
            <div id="modalforpayment"></div>
            <!--End PAYMENT MODAL -->



            <!-- Provider Requests -->
            <?php if (!empty($user_posts[0]['providers'])) { ?>
                <hr><h3>All Request By Providers</h3>
    <?php
    foreach ($user_posts[0]['providers'] as $provider) {
        if ($provider['customer_status'] == 0 OR $provider['customer_status'] == 1 OR $provider['customer_status'] == 2) {
            ?>
                        <div class="row job-post-listing">
                            <div class="col-lg-12">
                                <div class="property-listing list-view">
                                    <div class="row">
                                        <div id="ID-282" class="item-wrap infobox_trigger item-renovated-apartment">
                                            <div class="property-item table-list">
                                                <div class="table-cell">
                                                    <div class="figure-block">
                                                        <figure class="item-thumb">
                                                            <div class="price hide-on-list">
                                                                <?php if (!empty($provider['final_price'])) { ?>
                                                                    <span class="item-price">OMR <?php echo number_format_short($provider['final_price']); ?></span>
            <?php } else { ?>
                                                                    <span class="item-price">OMR <?php echo number_format_short($provider['quotation']); ?></span>
                                                                <?php } ?>
                                                            </div>

                                                            <a  href="<?php echo base_url('index.php/web_panel/profile/service_provider?ghfg=') . base64_encode($provider['fk_provider_id']); ?>">
                                                                <?php if (!empty($provider['profile_image'])) { ?>
                                                                    <img class="thumbnail" style="border-radius:50%; margin-top: 15px; width: 70%; height: 70%;"  src="<?php echo base_url('uploads/profile_images/') . $provider['profile_image']; ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" />
            <?php } else { ?>
                                                                    <img style="border-radius:50%; margin-top: 15px; width: 70%; height: 70%;"  src="<?php echo base_url('uploads/profile_images/default.png'); ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" />
            <?php } ?>
                                                            </a>



                                                        </figure>
                                                    </div>
                                                </div>
            <?php //pre($provider); die;   ?>
                                                <div class="item-body table-cell">

                                                    <div class="body-left table-cell">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="<?php echo base_url('index.php/web_panel/profile/service_provider?ghfg=') . base64_encode($provider['fk_provider_id']); ?>"><?php echo ucfirst($provider['name']) ?></a></h2>
                                                        </div>
                                                        <div class="description-text service-content">
                                                            <p style="font-size: 13px;">Service Provider</p>
                                                        </div>
                                                        <div class="info-row amenities hide-on-grid" style="min-height: 95px; max-height: 95px; overflow: hidden;">
                                                            <p><?php echo ucfirst($provider['quotation_description']) ?></p>
                                                        </div>
                                                        <?php
                                                        $datetime = explode(' ', $provider['posted_date']);
                                                        $date = $datetime[0];
                                                        $time = $datetime[1];
                                                        ?>

                                                        <div class="info-row date hide-on-grid">
                                                            <p class="prop-user-agent"><i class="fa fa-calendar" aria-hidden="true"></i> <a href="javascript:void()"><?php echo $date; ?></a> </p>
                                                            <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $time; ?></p>
                                                        </div>

                                                    </div>
                                                    <div class="body-right table-cell hidden-gird-cell">
                                                        <div class="info-row price">
                                                            <?php if (!empty($provider['final_price'])) { ?>
                                                                <span class="item-price">OMR <?php echo number_format_short($provider['final_price']); ?></span>
            <?php } else { ?>
                                                                <span class="item-price">OMR <?php echo number_format_short($provider['quotation']); ?></span>
                                                                <?php } ?>
                                                        </div>
                                                        <div class="phone text-right">

                                                            <form action="" method="post">
            <?php if ($provider['customer_status'] == 0) { ?>
                                                                    <button type="button" class="agent_contact_form btn btn-secondary status-btn" fk_job_request_id='<?php echo $provider['id'] ?>' data-status="1" id="confirm" >Confirm</button>
                <!--                                                                    <button type="button" class="btn btn-secondary btn-trans status-btn" fk_job_request_id='<?php //echo $provider['id']      ?>' id="reject" data-status="2"  style=" background-color: transparent; border:1px solid #000; color: #ff6e00"> Reject </button>-->
            <?php } ?>
                                                            </form>
                                                        </div>

                                                    </div>


                                                    <div class="table-list full-width hide-on-list">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p><?php echo $provider['quotation_description'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="" class="btn btn-primary">
                                                                    <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>


                                                    </div>

                                                            <?php if ($provider['customer_status'] == 1 OR $provider['customer_status'] == 2) { ?>
                                                        <div class="item-foot-right">
                                                            <h5>Job Status: 
                                                                <?php
                                                                if ($provider['provider_status'] == 0) {
                                                                    ?>
                                                                    <span style='color:#f35526'>Pending</span>

                                                                <?php } if ($provider['provider_status'] == 5) {
                                                                    ?>
                                                                    <span style='color:#4fb0de'>Work has been started</span>
                                                                <?php } if ($provider['provider_status'] == 2) {
                                                                    ?>
                                                                    <span style='color:#148222'>Completed</span>
                                                        <?php }
                                                        ?>                                                                       

                                                            </h5>
                                                        </div>
            <?php } ?>
                                                </div>

                                            </div>

                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p class="prop-user-agent"><i class="fa fa-calendar" aria-hidden="true"></i> <a href="javascript:void()"><?php echo $provider['create_time'] ?></a> </p>
                                                </div>

                                                <div class="item-foot-right">
                                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $provider['create_time'] ?></p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>





                                        <?php if ($user_posts[0]['status'] == 2 && !empty($payment_status)) { ?>
                                        <div class="col-lg-12 job-post-listing property-listing list-view" style="padding:30px 0">
                                            <!--                                            <div class="col-sm-2 col-xs-12 ">
                                                                                            <img src="<?php
//                                                if (empty($users['profile_image'])) {
//                                                    echo base_url('uploads/profile_images/default.png');
//                                                } else {
//                                                    echo base_url('uploads/profile_images/') . $users['profile_image'];
//                                                }
                                            ?>" class="img-round" height="160" width="160">
                                            
                                                                                        </div>-->
                                            <style>
                                                .rating-stars{color: #ee8b2d;}
                                                .over_all_rating{float: left; position: relative; top: -4px; left: -20px; }  
                                            </style>
                                            <div class="col-sm-10 col-xs-12">

                                                <div class="container">
                                                    <div class="row lead">
                                                        <h2 style="float: left; margin-right: 20px;"><?php echo ucfirst($users['name']); ?> Rating (<?php echo number_format((float) $ratings['over_all'], 1, '.', ''); ?>) </h2><div style="float: left; display: none" id="hearts-existing" class="starrr" data-rating='<?php //echo $ratings['over_all'];  ?>'></div>
                                                        <div class="over_all_rating">
                                                            <?php
                                                            $user_ratings = number_format((float) $ratings['over_all'], 1, '.', '');
                                                            if ($user_ratings == 0) {
                                                                ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings >= 0.1 && $user_ratings <= 0.9) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings == 1) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings >= 1.1 && $user_ratings <= 1.9) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings == 2) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings >= 2.1 && $user_ratings <= 2.9) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings == 3) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings >= 3.1 && $user_ratings <= 3.9) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i><i class="fa fa-star-o"></i></div>
                                                            <?php } if ($user_ratings == 4) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                <?php } if ($user_ratings >= 4.1 && $user_ratings <= 4.9) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-full"></i></div>
                                                    <?php } if ($user_ratings == 5) { ?>
                                                                <div class="col-sm-12 rating-stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                <?php } ?>

                                                        </div></div>
                <?php if ($ratings['job_ratings'] == null) { ?>
                                                        <form id="rating-form" method="post" >
                                                            <div class="row lead" id="do_rating">
                                                                <h5>Rate <?php echo (ucfirst($users['name'])); ?></h5>
                                                                <div id="hearts" class="starrr"></div>
                    <!--                                                                You gave a rating of <span id="count">0</span> Star(s)-->
                                                                <span style="display:none" id="count">0</span>
                                                                <div>
                                                                    <textarea name="review" id="review"  maxlength="300" class="form-control" style="width:97%" rows="5" placeholder="comments" ></textarea>
                                                                    <small style="color:red; font-size: 12px;">*max 300 character</small>
                                                                </div>
                                                                <div class="form-group" style="margin-top:25px;">
                                                                    <button class="btn btn-primary" type="button" name="review_submit" id="review_submit">Submit</button>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <span style="color:#598e30" id="rating_success_text"></span>
                                                            </div>
                                                        </form>
                <?php } else { ?>
                                 <!--                                <div style="float: left" id="hearts-existing" class="starrr" data-rating='<?php //echo $job_rating['job_rating'];  ?>'></div><br>-->
                                                        <h4>You have given a rating of <span id="count"><?php echo $ratings['job_ratings']; ?></span> Star(s).</h4>
                                                    </div>
                <?php } ?>

                                            </div>
                                        </div>
            <?php } ?>

                                </div>
                            </div>


                        </div>
                        <?php
                    }
                }
            } else {
                echo "<hr><h3>Thank you, one of our service provider will contact you.</h3>";
            }
            ?>
            <!--End of Provider Requests -->
        </div>

    </section>
    <!--end detail content-->

</div>


<!-- Modal Paid Success Popup -->
<div class="modal fade success-popup" id="paid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Thank You !</h4>
            </div>
            <div class="modal-body text-center">
                <img src="<?php echo base_url('web_assets/images/checkAds.png'); ?>">
                <p class="lead">You have already paid!</p>
                <!--                <a href="index.php" class="rd_more btn btn-default">Go to Home</a>-->
            </div>

        </div>
    </div>
</div>

<!--Start in header, end #section-body-->

<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5'></script>

<script type='text/javascript'>
    /* <![CDATA[ */
    var HOUZEZ_ajaxcalls_vars = {
        "admin_url": "http:\/\/houzez01.favethemes.com\/wp-admin\/",
        "houzez_rtl": "no",
        "redirect_type": "same_page",
        "login_redirect": "http:\/\/houzez01.favethemes.com\/property\/luxury-apartment-bay-view\/",
        "login_loading": "Sending user info, please wait...",
        "direct_pay_text": "Processing, Please wait...",
        "user_id": "0",
        "transparent_menu": "",
        "simple_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color.png",
        "retina_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_height": "24",
        "retina_logo_width": "140",
        "property_lat": "41.8810242",
        "property_lng": "-87.70078209999997",
        "property_map": "1",
        "property_map_street": "show",
        "is_singular_property": "yes",
        "process_loader_refresh": "fa fa-spin fa-refresh",
        "process_loader_spinner": "fa fa-spin fa-spinner",
        "process_loader_circle": "fa fa-spin fa-circle-o-notch",
        "process_loader_cog": "fa fa-spin fa-cog",
        "success_icon": "fa fa-check",
        "prop_featured": "Featured",
        "featured_listings_none": "You have used all the \"Featured\" listings in your package.",
        "prop_sent_for_approval": "Sent for Approval",
        "paypal_connecting": "Connecting to paypal, Please wait... ",
        "mollie_connecting": "Connecting to mollie, Please wait... ",
        "confirm": "Are you sure you want to delete?",
        "confirm_featured": "Are you sure you want to make this a featured listing?",
        "confirm_featured_remove": "Are you sure you want to remove from featured listing?",
        "confirm_relist": "Are you sure you want to relist this property?",
        "delete_property": "Processing, please wait...",
        "delete_confirmation": "Are you sure you want to delete?",
        "not_found": "We didn't find any results",
        "for_rent": "for-rent",
        "for_rent_price_range": "for-rent",
        "currency_symbol": "$",
        "advanced_search_widget_min_price": "1000",
        "advanced_search_widget_max_price": "4500000",
        "advanced_search_min_price_range_for_rent": "50",
        "advanced_search_max_price_range_for_rent": "26000",
        "advanced_search_widget_min_area": "50",
        "advanced_search_widget_max_area": "13000",
        "advanced_search_price_slide": "1",
        "fave_page_template": "page.php",
        "google_map_style": "[{\"featureType\":\"administrative\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"#444444\"}]},{\"featureType\":\"landscape\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#f2f2f2\"}]},{\"featureType\":\"poi\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"road\",\"elementType\":\"all\",\"stylers\":[{\"saturation\":-100},{\"lightness\":45}]},{\"featureType\":\"road.highway\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"labels.icon\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"transit\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#46bcec\"},{\"visibility\":\"on\"}]}]",
        "googlemap_default_zoom": "1",
        "googlemap_pin_cluster": "yes",
        "googlemap_zoom_cluster": "5",
        "map_icons_path": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/",
        "infoboxClose": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/close.png",
        "clusterIcon": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/cluster-icon.png",
        "google_map_needed": "yes",
        "paged": "0",
        "search_result_page": "normal_page",
        "search_keyword": "",
        "search_country": "",
        "search_state": "",
        "search_city": "",
        "search_feature": "",
        "search_area": "",
        "search_status": "",
        "search_label": "",
        "search_type": "",
        "search_bedrooms": "",
        "search_bathrooms": "",
        "search_min_price": "",
        "search_max_price": "",
        "search_min_area": "",
        "search_max_area": "",
        "search_publish_date": "",
        "search_no_posts": "10",
        "search_location": "",
        "use_radius": "on",
        "search_lat": "",
        "search_long": "",
        "search_radius": "",
        "transportation": "Transportation",
        "supermarket": "Supermarket",
        "schools": "Schools",
        "libraries": "Libraries",
        "pharmacies": "Pharmacies",
        "hospitals": "Hospitals",
        "sort_by": "",
        "measurement_updating_msg": "Updating, Please wait...",
        "autosearch_text": "Searching...",
        "currency_updating_msg": "Updating Currency, Please wait...",
        "currency_position": "before",
        "submission_currency": "USD",
        "wire_transfer_text": "To be paid",
        "direct_pay_thanks": "Thank you. Please check your email for payment instructions.",
        "direct_payment_title": "Direct Payment Instructions",
        "direct_payment_button": "SEND ME THE INVOICE",
        "direct_payment_details": "Please send payment to\u00a0<strong>Houzez Inc<\/strong>. <br\/>\r\n\r\nBank Account -\u00a0<strong>BWA7849843FAVE007<\/strong>\u00a0\u00a0<br\/>\r\n\r\nPlease include the invoice number in payment details Thank you for your business with us! <br\/>",
        "measurement_unit": "sqft",
        "header_map_selected_city": [],
        "thousands_separator": ",",
        "current_tempalte": "",
        "monthly_payment": "Monthly Payment",
        "weekly_payment": "Weekly Payment",
        "bi_weekly_payment": "Bi-Weekly Payment",
        "compare_button_url": "http:\/\/houzez01.favethemes.com\/compare-properties\/",
        "template_thankyou": "http:\/\/houzez01.favethemes.com\/thank-you\/",
        "compare_page_not_found": "Please create page using compare properties template",
        "property_detail_top": "v3",
        "keyword_search_field": "prop_title",
        "keyword_autocomplete": "1",
        "houzez_date_language": "",
        "houzez_default_radius": "30",
        "enable_radius_search": "0",
        "enable_radius_search_halfmap": "1",
        "houzez_primary_color": "#00aeef",
        "geocomplete_country": "",
        "houzez_logged_in": "no",
        "ipinfo_location": "0",
        "gallery_autoplay": "1",
        "stripe_page": "http:\/\/houzez01.favethemes.com\/stripe\/",
        "twocheckout_page": "http:\/\/houzez01.favethemes.com\/"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/themes/houzez/js/houzez_ajax_calls2846.js?ver=1.5.5'></script>



<?php echo $this->load->view('include/footer_inc', array()); ?>
<?php echo $this->load->view('custome_link/custome_js'); ?>

<script>

    $(".status-btn").click(function () {
        //alert('dsgsdf');
        var job_id = btoa(<?php echo $user_posts[0]['fk_job_post_id']; ?>);
        var service_id = btoa(<?php echo $user_posts[0]['fk_service_cat_id']; ?>);
        var fk_job_post_id = <?php echo $user_posts[0]['fk_job_post_id']; ?>;
        var fk_service_cat_id = $(this).attr('fk_service_cat_id');
        var fk_job_request_id = $(this).attr('fk_job_request_id');
        var action = $(this).attr('data-status');
        //alert(fk_job_request_id); alert(fk_job_post_id); exit;

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Ajax_provider_request_update'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                job_post_id: fk_job_post_id,
                fk_job_request_id: fk_job_request_id,
                action: action
            },

            success: function (data) {
                if (data) {
                    document.location.href = "job_detail?jhj=" + job_id + "&hjfh=" + service_id;
                    //alert("updated");

                } else {
                    //alert("Not updated");
                }
            }
        });


    });
</script>

<script>

    $("#confirm-btn").click(function () {
        //alert('dsgsdf');
        var job_id = btoa(<?php echo $user_posts[0]['fk_job_post_id']; ?>);
        var id = <?php echo $user_posts[0]['fk_job_post_id']; ?>;
        var service_id = btoa(<?php echo $user_posts[0]['fk_service_cat_id']; ?>);
        var fk_user_id = <?php echo $user_posts[0]['fk_user_id']; ?>;
        var fk_job_request_id = $(this).attr('data-confirm');
        //alert(fk_job_request_id); exit;

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Ajax_provider_request_update'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                fk_job_post_id: id,
                fk_job_request_id: fk_job_request_id
            },

            success: function (data) {
                if (data) {
                    document.location.href = "job_detail?jhj=" + job_id + "&hjfh=" + service_id;
                    //alert("updated");

                } else {
                    alert("Not updated");
                }
            }
        });


    });
</script>
<script>

    // Starrr plugin (https://github.com/dobtco/starrr)
    var __slice = [].slice;

    (function ($, window) {
        var Starrr;

        Starrr = (function () {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, value) {}
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on('mouseover.starrr', 'span', function (e) {
                    return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
                });
                this.$el.on('mouseout.starrr', function () {
                    return _this.syncRating();
                });
                this.$el.on('click.starrr', 'span', function (e) {
                    return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
                });
                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function () {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function (rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function (rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                    }
                }
                if (!rating) {
                    return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function () {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var data;
                    //alert(data);
                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function () {
        return $(".starrr").starrr();
    });

    $(document).ready(function () {

        $('#hearts').on('starrr:change', function (e, value) {
            $('#count').html(value);
        });

        $('#hearts-existing').on('starrr:change', function (e, value) {
            $('#count-existing').html(value);
        });
    });

</script>

<script>
    $(document).ready(function () {
        $("#paynow").click(function () {

            var fk_user_id = <?php echo $user_posts[0]['fk_user_id']; ?>;
            var fk_provider_id = <?php echo $user_posts[0]['providers'][0]['fk_provider_id']; ?>;
            var job_post_id = <?php echo $user_posts[0]['fk_job_post_id']; ?>;
            var fk_job_request_id = <?php echo $user_posts[0]['providers'][0]['id']; ?>;
            //alert(fk_user_id);alert(fk_provider_id);alert(job_post_id);alert(fk_job_request_id); exit;
            jQuery.ajax({
                url: "<?php echo base_url('index.php/web_panel/Ajax_provider_request_update/payment'); ?>",
                method: 'POST',
                data: {
                    fk_user_id: fk_user_id,
                    fk_provider_id: fk_provider_id,
                    job_post_id: job_post_id,
                    fk_job_request_id: fk_job_request_id
                },
                success: function (data) {
                    if (data) {
                        $('#modalforpayment').html(data);
                        $('#paymentModal').modal('show');
                    }
                }
            });
        });
    });

</script>
<script>
    $('#review_submit').click(function () {
        var review_stars = $('#count').text();
        var review = $('#review').val();
        var fk_job_post_id = <?php echo $data_for_rating['fk_job_post_id']; ?>;
        var fk_job_request_id = <?php echo $data_for_rating['id']; ?>;
        var from_id = <?php echo $data_for_rating['fk_provider_id']; ?>;
        var to_id = <?php echo $data_for_rating['fk_customer_id']; ?>;

        //alert(fk_job_post_id); alert(fk_job_request_id); alert(from_id); alert(to_id);exit;
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Job_post/ajax_rating_customer') ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                fk_job_post_id: fk_job_post_id,
                fk_job_request_id: fk_job_request_id,
                from_id: from_id,
                to_id: to_id,
                ratings: review_stars,
                review: review

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    //alert(data);
                    $('#rating_success_text').html("You have succesfully rated customer ! ");
                    $('#do_rating').hide();
                    //alert(data);
                }
            }
        });

    });
</script>


