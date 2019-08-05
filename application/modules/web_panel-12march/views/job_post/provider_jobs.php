<?php //pre($user_posts); die;
//error_reporting(all);
?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>




<style>
    #section-body {
        background-color: #e8e8e8;
    }
    .rating-xs {
        font-size: 16px;
    }
    .rating-container .clear-rating {
        padding-right: 5px;
        color: #aaa;
        cursor: not-allowed;
        display: none;
        vertical-align: middle;
        font-size: 60%;
    }


    .rating-container .clear-rating {
        display: none !important;
    }

    .clear-rating-active {
        cursor: pointer !important;
    }
    .rating {
        cursor: default;
        position: relative;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        padding-left: 1px;
    }

    .rating {
        font-size: 13px;
        line-height: 13px;
        margin: 0;
        font-weight: 400;
        text-transform: inherit;
        text-align: inherit;
    }
    .empty-stars {
        color: #f8b42b;
    }
    .filled-stars {
        transition: width 0.25s ease;
        -webkit-transition: width 0.25s ease;
    }

    .rating-container .filled-stars {
        position: absolute;
        left: 1px;
        top: 0;
        margin: auto;
        color: #f8b42b;
        white-space: nowrap;
        overflow: hidden;
    }

    .rating {
        color: #9b9b9b;
    }
    .star {
        display: inline-block;
        margin-right: 4px;
        text-align: center;
    }
    .carousel-module .carousel .item .item-thumb, .carousel-module .carousel .item figure {

        text-align: center;
        margin: auto;
    }
    .disabled{ display: none;}
    .owl-dots{margin: auto; text-align: center;}
    .btn-trans{    background: transparent;
                   border: #ff6e00 1px solid;
                   color: #ff6e00;} 
    .property-address{
        font-size: 14px;
        font-weight: 200px;

    }
    .remove-margin{
        margin: 4px 0;
    }
    .hide-on-grid p{
        font-size: 15px;
        color: #666;
        font-weight: 200 !important;

    }
</style>




<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.minc225.js?ver=5.4.1'></script>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.minc225.js?ver=5.4.1'></script>

<!--<script type='text/javascript' src='<?php //echo base_url('web_assets/')   ?>wp-content/themes/houzez/js/infoboxc5c9.js?ver=1.1.9'></script>
<script type='text/javascript' src='<?php //echo base_url('web_assets/')   ?>wp-content/themes/houzez/js/markerclusterere1fc.js?ver=2.1.1'></script>-->


<!--start section page body-->
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="pull-right active">Job List</li>
                        <li class="pull-right" ><a href="<?php echo base_url('index.php/web_panel/Home')?>">Home<!-- <i class="fa fa-home"></i> --></a></li>
                        
                        <li class="pull-left"><h1 class="title-head">Job List</h1></li>
                    </ol>
                    <div class="page-title-left">

                    </div>
                    <!--                        <div class="page-title-right">
                                                <div class="view hidden-xs">
                                                    <div class="table-cell">
                                                        <span class="view-btn btn-list active"><i class="fa fa-th-list"></i></span>
                                                        <span class="view-btn btn-grid"><i class="fa fa-th-large"></i></span>
                                                    </div>
                                                </div>
                                            </div>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 list-grid-area">
                <div id="content-area">
                    <!--start list tabs-->
                    <div class="list-tabs table-list full-width">
                        <div class="tabs table-cell">
                            <ul style="margin-left: -15px;">
                                <li>
                                    <a class="tab_filter to_be_active0" data-bind="0" id="0" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs/all'); ?>">Available</a>
                                </li>
                                <!--                                <li>
                                                                    <a class="tab_filter to_be_active0" data-bind="0" id="0" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs/available'); ?>">Available</a>
                                                                </li>-->
                                <li>
                                    <a class="tab_filter to_be_active1" data-bind="1" id="1" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs/accepted'); ?>">ACCEPTED</a>
                                </li>
                                <li>
                                    <a class="tab_filter to_be_active5" data-bind="5" id="5" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs/started'); ?>">STARTED</a>
                                </li>
                                <li>
                                    <a class="tab_filter to_be_active2" data-bind="2" id="2" href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs/completed'); ?>">COMPLETED</a>
                                </li>
                            </ul>
                        </div>
                        <div class="page-title-right">
                            <div class="view hidden-xs pull-right" style="display: none;">
                                <div class="table-cell">
                                    <span class="view-btn btn-list"><i class="fa fa-th-list"></i></span>
                                    <span class="view-btn btn-grid active"><i class="fa fa-th-large"></i></span>
                                </div>
                            </div>
                        </div>
                        <!--                            <div class="sort-tab table-cell text-right">
                                                        Sort by:
                                                        <select class="selectpicker bs-select-hidden" title="Please select" data-live-search="true">
                                                            <option>Relevance</option>
                                                            <option>Relevance</option>
                                                            <option>Relevance</option>
                                                        </select>
                                                    </div>-->
                    </div>
                    <!--end list tabs-->

                    <!--start property items-->
                    <?php
                    $i = 1;
                    if ($user_posts) {
                        foreach ($user_posts as $user_post) {
                            ?>

                            <div class="row job-post-listing"<?php
                            if ($user_post['status'] == 3) {
                                echo "#ab0606";
                            } if ($user_post['status'] == 2) {
                                echo '#1082ad';
                            } if ($user_post['status'] == 1) {
                                echo "#5a940c";
                            } if ($user_post['status'] == 0) {
                                echo "#f3bc41";
                            }
                            ?> solid; ">
                                <div class="col-lg-12">
                                    <div class="property-listing list-view">
                                        <div class="row">
                                            <div id="ID-282" class="item-wrap infobox_trigger item-renovated-apartment">
                                                <div class="property-item table-list">
                                                    <div class="table-cell">
                                                        <div class="figure-block">
                                                            <figure class="item-thumb">
<!--                                                                <div class="price hide-on-list">
                                                                    <?php //if(!empty($user_post['budget'])){?>
                                                                    <span class="item-price">OMR <?php //echo number_format_short($user_post['budget']) ?></span>
                                                                    <?php //} else { ?>
                                                                    <span class="item-price">OMR 0</span>
                                                                    <?php //} ?>
                                                                </div>-->
                                                                <a class="hover-effect" href="<?php echo base_url('index.php/web_panel/Job_post/provider_job_detail?jhj=') . base64_encode($user_post['id']) . '&hjfh=' . base64_encode($user_post['fk_service_cat_id']) ?>">
                                                                    <?php if(!empty($user_post['post_images'])) { ?>
                                                                    <img width="385" height="258" src="<?php echo base_url('uploads/job_posts/').$user_post['post_images'][0]['image']; ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""  />
                                                                    <?php } else {?>
                                                                    <img width="385" height="258" src="<?php echo base_url('uploads/job_posts/default.jpg')?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""  />
                                                                    <?php } ?>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <div class="item-body table-cell">

        <?php if ($user_post['fk_service_cat_id'] == 4) { ?>
                                                            <div class="body-left table-cell">
                                                                <div class="info-row">
                                                                    <h2 class="property-title"><a href="<?php echo base_url('index.php/web_panel/Job_post/provider_job_detail?jhj=') . base64_encode($user_post['id']) . '&hjfh=' . base64_encode($user_post['fk_service_cat_id']) ?>"><?php echo "Transport Job"; ?></a></h2>
                                                                    <address class="property-address remove-margin"><strong>Source: </strong><?php echo $user_post['source']; ?></address>
                                                                    <address class="property-address remove-margin"><strong>Destination: </strong><?php echo $user_post['destination']; ?></address>
                                                                </div>
                                                                <div class="info-row amenities ">
                                                                    <p><strong>Item to be moved: </strong><?php echo $user_post['items']; ?></p>

                                                                    <p><strong>Insured: </strong><?php
                                                                        if ($user_post['is_insured']) {
                                                                            echo 'Yes';
                                                                        } else {
                                                                            echo "No";
                                                                        }
                                                                        ?></p>
                                                                </div>
                                                                <div class="info-row amenities hide-on-grid">
                                                                    <p><?php echo ucfirst($user_post['description']) ?></p>
                                                                </div>
                                                                <?php $datetime = explode(' ', $user_post['create_date']);
                                                                        $date = $datetime[0]; $time = $datetime[1];?>
                                                                <div class="info-row date hide-on-grid" style="margin-top: 105px;">
                                                                <p class="prop-user-agent"><i class="fa fa-calendar" aria-hidden="true"></i> <a href="javascript:void()"><?php echo $date; ?></a> </p>
                                                                <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $time; ?></p>
                                                            </div>



                                                            </div>
        <?php } else { ?>

                                                            <div class="body-left table-cell">
                                                                <div class="info-row">
                                                                    <h2 class="property-title"><a href="<?php echo base_url('index.php/web_panel/Job_post/provider_job_detail?jhj=') . base64_encode($user_post['id']) . '&hjfh=' . base64_encode($user_post['fk_service_cat_id']) ?>"><?php echo ucfirst($user_post['title']) ?></a></h2>
                                                                    <address class="property-address"><?php echo $user_post['address'] ?></address>
                                                                </div>
                                                                <div class="info-row amenities hide-on-grid">
                                                                    <p><?php echo ucfirst($user_post['description']) ?></p>
                                                                </div>
                                                                <?php $datetime = explode(' ', $user_post['create_date']);
                                                                      $date = $datetime[0]; $time = $datetime[1];?>
                                                                <div class="info-row date hide-on-grid" style="margin-top: 105px;">
                                                                <p class="prop-user-agent"><i class="fa fa-calendar" aria-hidden="true"></i> <a href="javascript:void()"><?php echo $date; ?></a> </p>
                                                                <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $time; ?></p>
                                                            </div>

                                                            </div>
        <?php } ?>
                                                        <div class="body-right table-cell hidden-gird-cell">
<!--                                                            <div class="info-row price">
                                                                <?php //if(!empty($user_post['budget'])){?>
                                                                <span class="item-price">OMR <?php //echo number_format_short($user_post['budget']) ?></span>
                                                                <?php //} else { ?>
                                                                <span class="item-price">OMR 0</span>
                                                                <?php //} ?>
                                                                
                                                            </div>-->
                                                            <div class="info-row phone text-right">
                                                                <a href="<?php echo base_url('index.php/web_panel/Job_post/provider_job_detail?jhj=') . base64_encode($user_post['id']) . '&hjfh=' . base64_encode($user_post['fk_service_cat_id']) ?>" class="btn btn-primary">Read More <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>

                                                        <div class="table-list full-width hide-on-list">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p><?php echo $user_post['description'] ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <div class="phone">
                                                                    <a href="<?php echo base_url('index.php/web_panel/Job_post/provider_job_detail?jhj=') . base64_encode($user_post['id']) . '&hjfh=' . base64_encode($user_post['fk_service_cat_id']) ?>" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="item-foot date hide-on-list">
                                                    <div class="item-foot-left">
                                                        <p class="prop-user-agent"><i class="fa fa-calendar" aria-hidden="true"></i> <a href="index.html"><?php echo $user_post['dated'] ?></a> </p>
                                                    </div>

                                                    <div class="item-foot-right">
                                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $user_post['timed'] ?>pm</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php /*
                                  <div class="col-lg-12">
                                  <div class="property-item">
                                  <div class="vc_column-inner ">
                                  <div class="wpb_wrapper">
                                  <div id="carousel-module-grid" class="houzez-module carousel-module">
                                  <div class="module-title-nav clearfix">

                                  <div class="module-nav">
                                  <?php if (!empty($user_post['providers'] && isset($user_post['providers']))) { ?>
                                  <button class="btn btn-carousel btn-sm btn-prev-<?php echo $i; ?>">Prev</button>
                                  <button class="btn btn-carousel btn-sm btn-next-<?php echo $i; ?>">Next</button>
                                  <?php } ?>
                                  </div>

                                  </div>

                                  <div class="row grid-row">

                                  <div id="properties-carousel-v2-<?php echo $i; ?>" data-token="<?php echo $i; ?>" class="carousel slide-animated slide-animated owl-carousel owl-theme">
                                  <?php
                                  foreach ($user_post['providers'] as $provider) {
                                  if ($provider['customer_status'] == 0 OR $provider['customer_status'] == 1) {
                                  ?>
                                  <div class="item">
                                  <div class="agents-block user-block">
                                  <figure class="auther-thumb provider-img">
                                  <a href="#" class="view">
                                  <img src="<?php echo base_url('web_assets/') ?>wp-content/uploads/2016/02/agent-3-150x150.jpg" class="img-circle" width="150" height="150">
                                  </a>
                                  </figure>

                                  <div class="block-body">
                                  <p class="auther-info">
                                  <span class="blue"><?php echo $provider['name'] ?></span>
                                  </p>
                                  <p>
                                  <span><input type="text" class="rating rating-loading" value="2" data-size="xs" title=""></span>
                                  </p>
                                  <p class="auther-info">
                                  <span>Operations Tech/Electrician at Navisite</span>
                                  <span><?php echo $provider['name'] ?></span>
                                  </p>
                                  <div class="confirm-button">
                                  <form action="" method="post">
                                  <?php if ($provider['customer_status'] == 0) { ?>
                                  <button type="button" class="agent_contact_form btn btn-secondary status-btn"  fk_job_request_id='<?php echo $provider['id'] ?>' data-status="1"  id="confirm" >Confirm</button>
                                  <button type="button" class="btn btn-secondary btn-trans status-btn" fk_job_request_id='<?php echo $provider['id'] ?>' data-status="2" id="reject"  style=" background-color: transparent; border:1px solid #000;"> Reject </button>
                                  <?php } if ($provider['customer_status'] == 1) { ?>
                                  <button type="button" class="agent_contact_form btn btn-primary" fk_provider_id='<?php echo $provider['fk_provider_id'] ?>' fk_job_post_id='<?php echo $provider['fk_job_post_id'] ?>'  id="confirm" >Accepted</button>
                                  <?php } ?>
                                  </form>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  <?php
                                  }
                                  }
                                  ?>
                                  </div>

                                  </div>

                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                  </div>
                                 */ ?>
                            </div>

                            <?php
                            $i++;
                        }
                        
                    } else {
                        ?>
                        <div class="row job-post-listing" >
                            <div class="col-lg-12">
                                <div class="property-listing list-view">
                                    <div class="row">
                                        <div id="ID-282" class="item-wrap infobox_trigger item-renovated-apartment">
                                            <div class="property-item table-list" >
                                                <h3 style="padding:6%">No Record found !</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>



<?php }
?>
                    <!--end property items-->

                    <hr>

                    <!--start Pagination-->
<!--                    <div class="pagination-main">
                        <ul class="pagination">
                            <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a aria-label="Next" href="#"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                        </ul>
                    </div>-->
                    <!--start Pagination-->

                </div>
            </div>

        </div>
    </div>
</section>
<!--end section page body-->


<!--Start in header end #section-body-->

<button class="scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>

<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/themes/houzez/js/bootstrap.min46df.js?ver=3.3.5'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var hz_plugin = {
        "rating_terrible": "Terrible",
        "rating_poor": "Poor",
        "rating_average": "Average",
        "rating_vgood": "Very Good",
        "rating_exceptional": "Exceptional"
    };
    /* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5'></script>

<script type='text/javascript'>
    /* <![CDATA[ */
    var HOUZEZ_ajaxcalls_vars = {
        "admin_url": "http:\/\/houzez01.favethemes.com\/wp-admin\/",
        "houzez_rtl": "no",
        "redirect_type": "same_page",
        "login_redirect": "http:\/\/houzez01.favethemes.com",
        "login_loading": "Sending user info, please wait...",
        "direct_pay_text": "Processing, Please wait...",
        "user_id": "0",
        "transparent_menu": "no",
        "simple_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color.png",
        "retina_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_height": "24",
        "retina_logo_width": "140",
        "property_lat": "",
        "property_lng": "",
        "property_map": "",
        "property_map_street": "",
        "is_singular_property": "",
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
        "fave_page_template": "template-homepage.php",
        "google_map_style": "[{\"featureType\":\"administrative\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"#444444\"}]},{\"featureType\":\"landscape\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#f2f2f2\"}]},{\"featureType\":\"poi\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"road\",\"elementType\":\"all\",\"stylers\":[{\"saturation\":-100},{\"lightness\":45}]},{\"featureType\":\"road.highway\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"labels.icon\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"transit\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#46bcec\"},{\"visibility\":\"on\"}]}]",
        "googlemap_default_zoom": "1",
        "googlemap_pin_cluster": "yes",
        "googlemap_zoom_cluster": "5",
        "map_icons_path": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/",
        "infoboxClose": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/close.png",
        "clusterIcon": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/cluster-icon.png",
        "google_map_needed": "yes",
        "paged": "1",
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
        "header_map_selected_city": ["new-york"],
        "thousands_separator": ",",
        "current_tempalte": "template\/template-homepage.php",
        "monthly_payment": "Monthly Payment",
        "weekly_payment": "Weekly Payment",
        "bi_weekly_payment": "Bi-Weekly Payment",
        "compare_button_url": "http:\/\/houzez01.favethemes.com\/compare-properties\/",
        "template_thankyou": "http:\/\/houzez01.favethemes.com\/thank-you\/",
        "compare_page_not_found": "Please create page using compare properties template",
        "property_detail_top": "v1",
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
<script type='text/javascript' src='<?php echo base_url('web_assets/') ?>wp-content/themes/houzez/js/custom2846.js?ver=1.5.5'></script>

<script type='text/javascript'>
    /* <![CDATA[ */
<?php for ($i = 1; $i <= count($user_posts); $i++) { ?>
        var prop_carousel_v2_<?php echo $i ?> = {
            "slide_auto": "false",
            "auto_speed": "3000",
            "slide_dots": "true",
            "slide_infinite": "false",
            "slides_to_scroll": "1"
        };
<?php } ?>

    /* ]]> */
</script>
<script>
    $(document).ready(function () {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    })
</script>


<script>

    jQuery(document).ready(function ($) {


        $('.carousel[id^="properties-carousel-v2-"]').each(function () {
            var $div = jQuery(this);
            var token = $div.data('token');
            //alert(token);
            var obj = window['prop_carousel_v2_' + token];
            //alert('prop_carousel_v2_' + token);
            var slidesToShow = parseInt(obj.slides_to_show),
                    slidesToScroll = parseInt(obj.slides_to_scroll),
                    autoplay = parseBool(obj.slide_auto),
                    autoplaySpeed = parseInt(obj.auto_speed),
                    slide_infinite = parseBool(obj.slide_infinite),
                    dots = parseBool(obj.slide_dots);

            var houzez_rtl = HOUZEZ_ajaxcalls_vars.houzez_rtl;

            if (houzez_rtl == 'yes') {
                houzez_rtl = true;
            } else {
                houzez_rtl = false;
            }

            function parseBool(str) {
                if (str == 'true') {
                    return true;
                } else {
                    return false;
                }
            }

            var faveOwl = $('#properties-carousel-v2-' + token);

            faveOwl.owlCarousel({
                rtl: houzez_rtl,
                loop: slide_infinite,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                dots: dots,
                smartSpeed: 700,
                slideBy: slidesToScroll,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                }
            });


            $('.btn-prev-' + token).on('click', function () {
                faveOwl.trigger('prev.owl.carousel', [1000])
            })
            $('.btn-next-' + token).on('click', function () {
                faveOwl.trigger('next.owl.carousel')
            })

        });



    });
</script>

<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<script>

    $(".status-btn").click(function () {
        //alert('dsgsdf');

        //var fk_provider_id = $(this).attr('fk_provider_id');
        var fk_job_request_id = $(this).attr('fk_job_request_id');
        var action = $(this).attr('data-status');
        //alert(fk_job_request_id); alert(action); exit;

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Ajax_provider_request_update/status'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                fk_job_request_id: fk_job_request_id,
                action: action
            },
            success: function (data) {
                if (data) {
                    document.location.href = "provider_jobs";
                    //alert("updated");

                } else {
                    alert("Not updated");
                }
            }
        });


    });
</script>
<?php //die('working'); ?>
<script>
    var xyz = "<?php echo $active_tab; ?>";
    //alert(xyz);
    $('.to_be_active' + xyz).addClass('active');
</script>
