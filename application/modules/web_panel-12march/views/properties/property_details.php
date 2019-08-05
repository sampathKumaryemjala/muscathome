<?php //pre($property); die;    ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<head>
<meta property="og:url"           content="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . base64_encode($property['id']) ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $property['location'] ?>" />
<meta property="og:description"   content="<?php echo $property['description'] ?>" />
<?php if (!empty($property['images'])) { ?>
<meta property="og:image"         content="<?php echo $property['images'][0]['image']; ?>" />  
<?php } ?> 
</head>
<link href="<?php echo base_url() . "web_assets/"; ?>css/emi_calc_css.css" rel="stylesheet" type="text/css" />
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<!--end header section header v1-->
<style type="text/css">
    .detail-media{
        max-height: 620px;
        overflow: hidden;
        width: 100%;
        padding-top: 20px;
    }
    #PropertyMap { 
        height:450px;
        width:100%;
        overflow:hidden;}
    .media-tabs {
        top: 60px;    
    }

    .header-detail .label-wrap {
        top: -4px;
        padding-left: 10px;
    }

    .item-thumb .hover-effect:before,
    figure .hover-effect:before,
    .carousel-module .carousel .item figure .hover-effect:before,
    .item-thumb .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main .item-thumb .slick-slide:before,
    figure .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main figure .slick-slide:before {
        background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 65%, rgba(0,0,0,.75) 100%);
    }
    .slideshow .slide .slick-prev:hover,
    .slideshow .slideshow-nav .slick-prev:hover,
    .slideshow .slide .slick-next:hover,
    .slideshow .slideshow-nav .slick-next:hover,
    .slideshow .slide .slick-prev:focus,
    .slideshow .slideshow-nav .slick-prev:focus,
    .slideshow .slide .slick-next:focus,
    .slideshow .slideshow-nav .slick-next:focus
    .item-thumb:hover .hover-effect:before,
    figure:hover .hover-effect:before,
    .carousel-module .carousel .item figure:hover .hover-effect:before,
    .item-thumb:hover .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main .item-thumb:hover .slick-slide:before,
    figure:hover .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main figure:hover .slick-slide:before,
    .item-thumb:hover .hover-effect:before,
    figure:hover .hover-effect:before,
    .carousel-module .carousel .item figure:hover .hover-effect:before,
    .item-thumb:hover .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main .item-thumb:hover .slick-slide:before,
    figure:hover .slideshow .slideshow-nav-main .slick-slide:before,
    .slideshow .slideshow-nav-main figure:hover .slick-slide:before {
        color: #fff;
        background-color: rgba(255,255,255,.5);
    }
    .figure-grid .detail h3,
    .detail-above.detail h3 {
        color: #fff;
    }
    .detail-bottom.detail h3 {
        color: #000;
    }
    .agent-contact a {
        font-weight: 700;
    }
    label {
        font-weight: 400;
        font-size: 14px;
    }
    .label-status {
        background-color: #333;
        font-weight: 700;
    }
    .read .fa {
        top: 1px;
        position: relative;
    }            
    .label-primary,
    .fave-load-more a,
    .widget_tag_cloud .tagcloud a,
    .pagination-main .pagination li.active a,
    .other-features .btn.btn-secondary,
    .my-menu .active am {
        font-weight: 500;
    }       

    /*.features-list {
        padding-bottom: 15px;
    }*/
    .advanced-search .advance-btn i {
        float: inherit;
        font-size: 14px;
        position: relative;
        top: 0px;
        margin-right: 6px;
    }
    @media (min-width: 992px) {
        .advanced-search .features-list .checkbox-inline {
            width: 14%;
        }
    }
    .header-detail.table-cell .header-right {
        margin-top: 27px;
    }
    .header-detail h1 .actions span, .header-detail h4 .actions span {
        font-size: 18px;
        display: inline-block;
        vertical-align: middle;
        margin: 0 3px;
    }        
    .header-detail .property-address {
        color: #707070;
        margin-top: 12px;
    }        
    .white-block {
        padding: 40px;
    }
    .wpb_text_column ul,
    .wpb_text_column ol {
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
    }
    #sidebar .widget_houzez_latest_posts img {
        max-width: 90px;
        margin-top: 0;
    }
    #sidebar .widget_houzez_latest_posts .media-heading,
    #sidebar .widget_houzez_latest_posts .read {
        font-size: 14px;
        line-height: 18px;
        font-weight: 500;
    }        
    #sidebar .widget-range .dropdown-toggle,
    .bootstrap-select.btn-group,        
    .search-long .search input,
    .advanced-search .search-long .advance-btn,        
    .splash-search .dropdown-toggle {
        font-weight: 400;
        color: #959595 !important;
        font-size: 15px;
    }

    .advanced-search .input-group .form-control {
        border-left-width: 0;
    }        
    .location-select {
        max-width: 170px;
    }             

    .vegas-overlay {
        opacity: 1;
        background-image: url(https://houzez01.favethemes.com/wp-content/uploads/2016/03/bg-video-1.png);
    }
    .label-color-289 {
        background-color: #dd3333;
    }

    .label-color-288 {
        background-color: #ea923a;
    }

    .user-dashboard-left,
    .board-header-4{
        background-color:#00365e;
    }
    .board-panel-menu > li a,
    .board-header-4 .board-title,
    .board-header-4 .breadcrumb > .active,
    .board-header-4 .breadcrumb li:after,
    .board-header-4 .steps-progress-main{ 
        color:#ffffff; 
    }
    .board-panel-menu > li.active {
        color: #4cc6f4;
    }
    .board-panel-menu .sub-menu {
        background-color: #002B4B;
    }
    .board-panel-menu .sub-menu > li.active > a, .board-panel-menu > li a:hover {
        color: #4cc6f4;
    }

    #ihf-main-container .btn-primary, 
    #ihf-main-container .ihf-map-search-refine-link,
    #ihf-main-container .ihf-map-search-refine-link {
        background-color: #ff6e00;
        border-color: #ff6e00;
        color: #fff;
    }
    #ihf-main-container .btn-primary:hover, 
    #ihf-main-container .btn-primary:focus, 
    #ihf-main-container .btn-primary:active, 
    #ihf-main-container .btn-primary.active {
        background-color: rgba(255,110,0,1);
    }
    #ihf-main-container a {
        color: #00aeef;       
    }
    .ihf-grid-result-basic-info-container,
    #ihf-main-container {
        color: #000000;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        text-transform: none;
    }
    #ihf-main-container .fs-12,
    .ihf-tab-pane,
    #ihf-agent-sellers-rep,
    #ihf-board-detail-disclaimer,
    #ihf-board-detail-updatetext  {
        font-size: 16px;
    }
    #ihf-main-container .title-bar-1,
    .ihf-map-icon{
        background-color: #00aeef;
    }
    .ihf-map-icon{
        border-color: #00aeef;
    }
    .ihf-map-icon:after{
        border-top-color: #00aeef;
    }
    #ihf-main-container h1, 
    #ihf-main-container h2, 
    #ihf-main-container h3, 
    #ihf-main-container h4, 
    #ihf-main-container h5, 
    #ihf-main-container h6, 
    #ihf-main-container .h1, 
    #ihf-main-container .h2, 
    #ihf-main-container .h3, 
    #ihf-main-container .h4, 
    #ihf-main-container .h5, 
    #ihf-main-container .h6,
    #ihf-main-container h4.ihf-address,
    #ihf-main-container h4.ihf-price  {
        font-family: Roboto;
        font-weight: 500;
        text-transform: inherit;
        text-align: inherit;
    }
    .facbook .cat-list h3 {
        color: #03876d;
        position: relative;
    }
    .cat-list h3 a {
        color: #03876d;
        position: relative;
    }
    .ln-shadow {
        background-color: #16A085;
        border-radius: 3px;
        color: #fff;
        display: inline-block;
        font-size: 45px;
        height: 65px;
        line-height: 63px;
        overflow: hidden;
        text-align: center;
        vertical-align: middle;
        width: 65px;
        text-shadow: 0px 0px #138a72, 1px 1px #138a72, 2px 2px #138a72, 3px 3px #138a72, 4px 4px #138a72, 5px 5px #138a72, 6px 6px #138a72, 7px 7px #138a72, 8px 8px #138a72, 9px 9px #138a72, 10px 10px #138a72, 11px 11px #138a72, 12px 12px #138a72, 13px 13px #138a72, 14px 14px #138a72, 15px 15px #138a72, 16px 16px #138a72, 17px 17px #138a72, 18px 18px #138a72, 19px 19px #138a72, 20px 20px #138a72, 21px 21px #138a72, 22px 22px #138a72, 23px 23px #138a72, 24px 24px #138a72, 25px 25px #138a72, 26px 26px #138a72, 27px 27px #138a72, 28px 28px #138a72, 29px 29px #138a72, 30px 30px #138a72, 31px 31px #138a72, 32px 32px #138a72, 33px 33px #138a72, 34px 34px #138a72, 35px 35px #138a72, 36px 36px #138a72, 37px 37px #138a72, 38px 38px #138a72, 39px 39px #138a72, 40px 40px #138a72, 41px 41px #138a72, 42px 42px #138a72, 43px 43px #138a72, 44px 44px #138a72, 45px 45px #138a72, 46px 46px #138a72, 47px 47px #138a72, 48px 48px #138a72, 49px 49px #138a72, 50px 50px #138a72, 51px 51px #138a72, 52px 52px #138a72, 53px 53px #138a72, 54px 54px #138a72, 55px 55px #138a72, 56px 56px #138a72, 57px 57px #138a72, 58px 58px #138a72, 59px 59px #138a72, 60px 60px #138a72, 61px 61px #138a72, 62px 62px #138a72, 63px 63px #138a72, 64px 64px #138a72, 65px 65px #138a72, 66px 66px #138a72, 67px 67px #138a72, 68px 68px #138a72, 69px 69px #138a72, 70px 70px #138a72, 71px 71px #138a72, 72px 72px #138a72, 73px 73px #138a72, 74px 74px #138a72, 75px 75px #138a72, 76px 76px #138a72, 77px 77px #138a72, 78px 78px #138a72, 79px 79px #138a72, 80px 80px #138a72, 81px 81px #138a72, 82px 82px #138a72, 83px 83px #138a72, 84px 84px #138a72, 85px 85px #138a72, 86px 86px #138a72, 87px 87px #138a72, 88px 88px #138a72, 89px 89px #138a72, 90px 90px #138a72, 91px 91px #138a72, 92px 92px #138a72, 93px 93px #138a72, 94px 94px #138a72, 95px 95px #138a72, 96px 96px #138a72, 97px 97px #138a72, 98px 98px #138a72, 99px 99px #138a72, 100px 100px #138a72, 101px 101px #138a72, 102px 102px #138a72, 103px 103px #138a72, 104px 104px #138a72, 105px 105px #138a72, 106px 106px #138a72, 107px 107px #138a72, 108px 108px #138a72, 109px 109px #138a72, 110px 110px #138a72, 111px 111px #138a72, 112px 112px #138a72, 113px 113px #138a72, 114px 114px #138a72, 115px 115px #138a72, 116px 116px #138a72, 117px 117px #138a72, 118px 118px #138a72, 119px 119px #138a72, 120px 120px #138a72, 121px 121px #138a72, 122px 122px #138a72, 123px 123px #138a72, 124px 124px #138a72, 125px 125px #138a72, 126px 126px #138a72, 127px 127px #138a72, 128px 128px #138a72, 129px 129px #138a72, 130px 130px #138a72, 131px 131px #138a72, 132px 132px #138a72, 133px 133px #138a72, 134px 134px #138a72, 135px 135px #138a72, 136px 136px #138a72, 137px 137px #138a72, 138px 138px #138a72, 139px 139px #138a72, 140px 140px #138a72, 141px 141px #138a72, 142px 142px #138a72, 143px 143px #138a72, 144px 144px #138a72, 145px 145px #138a72, 146px 146px #138a72, 147px 147px #138a72, 148px 148px #138a72, 149px 149px #138a72, 150px 150px #138a72, 151px 151px #138a72, 152px 152px #138a72, 153px 153px #138a72, 154px 154px #138a72, 155px 155px #138a72, 156px 156px #138a72, 157px 157px #138a72, 158px 158px #138a72, 159px 159px #138a72, 160px 160px #138a72, 161px 161px #138a72, 162px 162px #138a72, 163px 163px #138a72, 164px 164px #138a72, 165px 165px #138a72, 166px 166px #138a72, 167px 167px #138a72, 168px 168px #138a72, 169px 169px #138a72, 170px 170px #138a72, 171px 171px #138a72, 172px 172px #138a72, 173px 173px #138a72, 174px 174px #138a72, 175px 175px #138a72, 176px 176px #138a72, 177px 177px #138a72, 178px 178px #138a72, 179px 179px #138a72, 180px 180px #138a72, 181px 181px #138a72, 182px 182px #138a72, 183px 183px #138a72, 184px 184px #138a72, 185px 185px #138a72, 186px 186px #138a72, 187px 187px #138a72, 188px 188px #138a72, 189px 189px #138a72, 190px 190px #138a72, 191px 191px #138a72, 192px 192px #138a72, 193px 193px #138a72, 194px 194px #138a72, 195px 195px #138a72, 196px 196px #138a72, 197px 197px #138a72, 198px 198px #138a72, 199px 199px #138a72, 200px 200px #138a72;
    }
    .social-share{
        display: inline-block;
        padding: 30px 30px;
    }
</style>
<style type="text/css">
    /********************************/
/*          Main CSS     */
/********************************/


#first-slider .main-container {
  padding: 0;
}


#first-slider .slide1 h3, #first-slider .slide2 h3, #first-slider .slide3 h3, #first-slider .slide4 h3{
    color: #fff;
    font-size: 30px;
      text-transform: uppercase;
      font-weight:700;
}

#first-slider .slide1 h4,#first-slider .slide2 h4,#first-slider .slide3 h4,#first-slider .slide4 h4{
    color: #fff;
    font-size: 30px;
      text-transform: uppercase;
      font-weight:700;
}
#first-slider .slide1 .text-left ,#first-slider .slide3 .text-left{
    padding-left: 40px;
}


#first-slider .carousel-indicators {
  bottom: 0;
}
#first-slider .carousel-control.right,
#first-slider .carousel-control.left {
  background-image: none;
}
#first-slider .carousel .item {
  min-height: 425px; 
  height: 100%;
  width:100%;
}

.carousel-inner .item .container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}


#first-slider h3{
  animation-delay: 1s;
}
#first-slider h4 {
  animation-delay: 2s;
}
#first-slider h2 {
  animation-delay: 3s;
}


#first-slider .carousel-control {
    width: 6%;
        text-shadow: none;
}


#first-slider h1 {
  text-align: center;  
  margin-bottom: 30px;
  font-size: 30px;
  font-weight: bold;
}

#first-slider .p {
  padding-top: 125px;
  text-align: center;
}

#first-slider .p a {
  text-decoration: underline;
}
#first-slider .carousel-indicators li {
    width: 14px;
    height: 14px;
    background-color: #ccc;
  border:none;
}
#first-slider .carousel-indicators .active{
    width: 16px;
    height: 16px;
    background-color: rgba(0, 174, 239, 0.6);
  border:none;
}


.carousel-fade .carousel-inner .item {
  -webkit-transition-property: opacity;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .item,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  opacity: 0;
}
.carousel-fade .carousel-inner .active,
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-inner .next,
.carousel-fade .carousel-inner .prev,
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.carousel-fade .carousel-control {
  z-index: 2;
}

.carousel-control .fa-angle-right, .carousel-control .fa-angle-left {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
}
.carousel-control .fa-angle-left{
    left: 50%;
    width: 38px;
    height: 38px;
    margin-top: -15px;
    font-size: 30px;
    color: rgba(0, 174, 239, 0.6);
    border: 3px solid rgba(0, 174, 239, 0.6);
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 53px;
}
.carousel-control .fa-angle-right{
    right: 50%;
    width: 38px;
    height: 38px;
    margin-top: -15px;
    font-size: 30px;
    color: rgba(0, 174, 239, 0.6);
    border: 3px solid rgba(0, 174, 239, 0.6);
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 53px;
}
.carousel-control {
    opacity: 1;
    filter: alpha(opacity=100);
}


/********************************/
/*       Slides backgrounds     */
/********************************/
#first-slider .slide1 {
}




/********************************/
/*          Media Queries       */
/********************************/
@media screen and (min-width: 980px){
      
}
@media screen and (max-width: 640px){
      
}

</style>

<body class="property-template-default single single-property postid-416  transparent- wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
    <div id="fb-root"></div>



    <!--start compare panel-->
    <div id="compare-controller" class="compare-panel">
        <div class="compare-panel-header">
            <h4 class="title"> Compare Listings <span class="panel-btn-close pull-right"><i class="fa fa-times"></i></span></h4>
        </div>

        <div id="compare-properties-basket">
        </div>
    </div>
    <!--end compare panel-->

    <!--start detail top-->
    <section class="detail-top detail-top-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    
                        <!-- <div class="header-detail">
                            <div class="header-left">
                                    
                            </div>
                            <div class="header-right">
                                <ul class="actions media-tabs-list">
                                    <li class="fvrt-btn">
                                        <span class="add_fav" data-placement="right" data-toggle="tooltip" data-original-title="Favorite" data-propid="416"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart fa-2x <?php } ?> addfav"></i></span>            
                                    </li>
                                    <li class="print-btn">
                                        <span data-toggle="tooltip" data-placement="right" data-original-title="Print"><i id="houzez-print" class="fa fa-print" data-propid="416"></i></span>
                                    </li>
                                    <li data-placement="bottom" data-toggle="tooltip" data-original-title="Map View">
                                        <a href="#PropertyMap" data-toggle="tab" id="PropertyMapview" >
                                            <i class="fa fa-map"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    
                    <div class="detail-media">
                        <!-- <div class="tab-content">
                            <div id="gallery" class="tab-pane fade in active" style="background-image: url(http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-1170x600.jpg)">
                                <span class="label-wrap visible-sm visible-xs">
                                    <span class="label label-primary label-status-8"><?php
                        if ($property['type'] == 0) {
                            echo "For Buy";
                        } else {
                            echo "For Rent";
                        }
                        ?></span>
                                </span>
                                <a href="#" class="popup-trigger">
                                </a>
                                <div class="form-small form-media">
                                    <form method="post" action="" name="contact_info1" id="contact_info1" >
                                        <input type="hidden" value="<?php //echo $property['fk_agent_id'];     ?>" name="agent_id" id="agent_id">
                                        <div class="media agent-media"><div class="media-left">
                                                <a href="http://houzez01.favethemes.com/agencies/eco-house-real-estate/">
                                                    <img src="http://houzez01.favethemes.com/wp-content/uploads/2016/10/Artboard-2-Copy-2-150x150.jpg" alt="Eco House Real Estate" width="75" height="75"></a></div><div class="media-body"><dl><dd><i class="fa fa-user"></i> Eco House Real Estate</dd><dd><i class="fa fa-phone"></i>(580) 453-6432</dd><dd><a href="#" class="view">View listings</a></dd></dl></div></div>                                    <input type="hidden" name="target_email" value="a&#103;&#101;&#110;&#99;&#121;4&#64;hou&#122;&#101;&#122;&#46;c&#111;">
                                        <span id="contact_user_error_validation1"></span>
                                        <div class="form-group">
                                            <input class="form-control" name="contact_user_name1" id="contact_user_name1" type="text"
                                                   placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="contact_user_phone1" id="contact_user_phone1" type="text"
                                                   placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="contact_user_email1" id="contact_user_email1" type="email"
                                                   placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="contact_user_msg1" id="contact_user_msg1" rows="4" placeholder="Description">Hello, I am interested in <?php //echo $property['property_name']    ?></textarea>
                                        </div>


                                        <button class="agent_contact_form btn btn-secondary btn-block">Request info</button>
                                        <button type="button" class="btn btn-secondary btn-trans btn-block contact_user_button1"> Send Message </button>
                                        <div class="form_messages"></div>
                                    </form>
                                </div>

                            </div>

                            
                            <div id="PropertyMap" class="fade" ></div>
                                           

                            <div id="street-map" class="tab-pane fade "></div>

                        </div> -->
<div class="container-fluid">
                            
                            <div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php if(!empty($property['images'])){ $active='active'; $i=0; foreach($property['images'] as $image){  ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
            <?php $active=''; $i++; } } else { ?>
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> 
            <?php } ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php if(!empty($property['images'])){ $active='active'; foreach($property['images'] as $image){  ?>
            <div style="background-image: url(<?php echo base_url('uploads/properties/images/') . $image['image']; ?>); background-position: center; background-repeat: no-repeat; background-size: auto 100%;" class="item <?php echo $active; ?> slide1">
                <div class="row">
                    <div class="col-md-3 text-right"></div>
                </div>
             </div> 
            <?php $active=''; } } else { ?>
             <div style="background-image: url(<?php echo base_url('uploads/properties/images/default.jpg'); ?>); background-position: center; background-repeat: no-repeat; background-size: auto 100%;" class="item active slide1">
                <div class="row">
                    <div class="col-md-3 text-right"></div>
                </div>
             </div>
            <?php } ?>
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</div>
                        <div class="table-cell hidden-sm hidden-xs">
                            <span class="label-wrap">
                                <span class="label-status label-status-8 label label-default"><?php
                                    if ($property['type'] == 0) {
                                        echo "For Buy";
                                    } else {
                                        echo "For Rent";
                                    }
                                    ?></span>
                            </span>
                        </div>
                    </div>
                    <div class="media-tabs">
                        <ul class="actions">
                            <li class="share-btn">
                             <span title="" data-placement="right" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span></li>
                            <li>
                                <span class="add_fav" data-placement="right" data-toggle="tooltip" data-original-title="Favorite" data-propid="416"><i class="fa fa-heart-o"></i></span>        
                            </li>
                        </ul>
                        <ul class="media-tabs-list">
                            <li class="" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>">

                                <a href="#gallery" data-toggle="tab">
                                    <span class="add_fav" data-placement="right"  data-propid="416"><i style="color:greenyellow; padding: 12px;" data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i></span>            
                                </a>
                            </li>

                            <li data-placement="bottom" data-toggle="tooltip" data-original-title="Share With">
                                <a href="" data-toggle="modal" data-target="#shareModal" ><i class="fa fa-share"></i></a>
                            </li>
                            <li data-placement="bottom" data-toggle="tooltip" data-original-title="Map View" >
                                <a data-toggle="modal"  data-target="#PropertyMapview" id="view_in_map"  >
                                    <i class="fa fa-map"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </section><!--end detail top-->
    <!-- Modal google map -->
    <div class="modal" style="display: block; height: 0"  id="PropertyMapview" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="padding-top:6px !important;"><?php echo ucfirst($property['location']) ?> in map</h4>
                </div>
                <div class="modal-body">
                    <div id="PropertyMap" ></div> 
                </div>

            </div>

        </div>
    </div>


    <!-- <div id="PropertyMap" class="fade" ></div> -->
    <div class="container">
        <ol class="breadcrumb" style="margin-top: -30px">
            <li itemscope ><a itemprop="url" href="<?php echo base_url('index.php/web_panel/home'); ?>"><span itemprop="title">Home</span>
                </a>
            </li>
            <li class="active"><?php if ($property['type'] == 1) {
                                                            echo "For Rent";
                                                        } else {
                                                            echo "For Buy";
                                                        } ?></li>
        </ol>
    </div>
    <br><br>

    <div class="container">
        <div style="float: left;">        
            <div class="table-list">
                <div class="table-cell"><h1><?php echo ucfirst($property['location']) ?></h1></div>
            </div>
            <address class="property-address"><?php echo $property['addresss'] ?></address>
        </div>
        <div style="float: right;">
           
            <span class="price-details" style="font-weight: bold; font-size: 28px; ">
                <?php if(empty($offer_on_property)) {
                if ($property['type'] == 1) {
                    echo "OMR " . number_format_short($property['price']) . "/mo";
                } else {
                    echo "OMR " . number_format_short($property['price']);
                } } else { 
                    $discount = $offer_on_property['discount'];
                    $discount_amount = $discount/100*$property['price'];
                    $discounted_price = $property['price'] - $discount_amount;
                    if ($property['type'] == 1) {
                    echo "OMR " . number_format_short($discounted_price) . "/mo";
                } else {
                    echo "OMR " . number_format_short($discounted_price);
                } } ?>  
            </span>
            <?php if(!empty($offer_on_property)) { ?>
            <div class="offer-price-details">
               <h5><?php if ($property['type'] == 1) {
                    echo "OMR " . number_format_short($property['price']) . "mo";
                } else {
                    echo "OMR " . number_format_short($property['price']);
                }?></h5>
            </div>
            <?php } ?>
        </div>
    </div>

    <!--start detail content-->
    <section class="section-detail-content">


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">


                    <div class="detail-bar">

                        <div id="description" class="property-description detail-block target-block">
                            <div class="detail-title">
                                <h2 class="title-left">Description</h2>
                            </div>

                            <p><?php echo $property['description'] ?></p>

                            
                            <h3>Address:</h3>
                            <p><?php echo $property['addresss'] ?></p>
                            <strong><small>Contact Number</small></strong>
                            <?php if(!empty($property['property_contact_no'])) { echo "<p>".$property['property_contact_no']."</p>"; } ?>
                        </div>

<!--                        <div id="address" class="detail-address detail-block target-block">
                            <div class="detail-title">
                                <h2 class="title-left">Address</h2>
                                
                            </div>
                            <ul class="list-three-col">
                                <li class="detail-address"><strong> </strong><?php echo $property['addresss'] ?></li><li class="detail-city"><strong>City: </strong> <?php echo $property['city'] ?></li><li class="detail-state"><strong>Country: </strong> <?php echo $property['country'] ?></li><li class="detail-zip"><strong>Zip/Postal Code:</strong> 6759</li><li class="detail-area"><strong>Neighborhood:</strong> Westwood</li><li class="detail-country"><strong>State: </strong><?php echo $property['state'] ?></li>    </ul>
                        </div>-->
                        <div id="detail" class="detail-list detail-block target-block">
                            <div class="detail-title">
                                <h2 class="title-left">Detail</h2>

                                <div class="title-right">
                                    <p>Updated on <?php echo date("d-m-Y", strtotime($property['create_date'])) ?></p>
                                </div>

                            </div>
                            <div class="alert alert-info">
                                <ul class="list-three-col">
                                    <!-- <li><strong>Property ID:</strong> <?php// echo "PID" . $property['id'] ?></li> --><li><strong>Property Type:</strong> <?php echo $property['property_type'] ?></li><li><strong>Price: </strong><?php
                                        if ($property['type'] == 1) {
                                            echo "OMR " . number_format_short($property['price']) . "/mo";
                                        } else {
                                            echo "OMR " . number_format_short($property['price']);
                                        }
                                        ?></li><li><strong>Property Size: </strong> <?php echo $property['property_size'] ?> Sq M</li><li><strong>Bedrooms:</strong> <?php echo $property['beds'] ?></li><li><strong>Bathrooms:</strong> <?php echo $property['baths'] ?></li><!--<li><strong>Garage:</strong> 1</li><li><strong>Garage Size:</strong> 200 SqFt</li><li><strong>Year Built:</strong> 2016-01-09</li>-->        </ul>
                            </div>
                        </div>




<?php //pre($agent); ?>
                        <div id="agent_bottom" class="detail-contact detail-block target-block">
                            <div class="detail-title">
                                <h2 class="title-left">Contact info</h2>
                                <div class="title-right"><strong><a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=').base64_encode($property['agent_detail']['id']); ?>">View Profile</a></strong></div>
                         </div>



                            <!-- Load Facebook SDK for JavaScript -->







                            <form method="post" action="#" name="contact_info2" id="contact_info2">
                                <input type="hidden" value="<?php echo $property['fk_agent_id']; ?>" name="agent_id" id="agent_id">
                                <div class="media agent-media"><div class="media-left"><a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=').base64_encode($property['fk_agent_id']); ?>">
                                            <img src="<?php if(!empty($property['agent_detail']['profile_image'])){ echo base_url('uploads/profile_images/').$property['agent_detail']['profile_image'];} else{ echo base_url('uploads/profile_images/default.png');} ?>" alt="Eco House Real Estate" width="80" height="auto"></a></div>
                                    <div class="media-body"><dl><dd><i class="fa fa-user"></i> <?php echo $property['agent_detail']['name']; ?></dd>
                                    <?php if ($property['agent_detail']['office_number']) { ?>
                                                <dd><span><i class="fa fa-phone"></i><?php echo $property['agent_detail']['office_number']; ?></span>
                                                    <span><i class="fa fa-mobile"></i><?php echo $property['agent_detail']['mobile']; ?></span>
                                                </dd>
                                                <dd>
                                                    <?php 
                                                    if(!empty($property['facebook_link'])){ ?> 
                                                    <li><a class="btn-facebook" href="<?php echo $property['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                    <?php } 
                                                    if(!empty($property['linkedin_link'])){  ?>
                                                    <li><a class="btn-linkedin" href="<?php echo $property['linkedin_link']; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                                    <?php } 
                                                    if(!empty($property['youtube_link'])){  ?>
                                                    <li><a class="btn-youtube" href="<?php echo $property['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
                                                    <?php } 
                                                    if(!empty($property['pinterest_link'])){  ?>
                                                    <li><a class="btn-pinterest" href="<?php echo $property['pinterest_link']; ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
                                                    <?php } ?>
                                                </dd>
                                                
                                                
                                                
                                        </dl>
                                    </div>
                                </div>            
                                <div class="detail-title-inner">
                                <?php } else { ?>
                                        <dd><span><i class="fa fa-phone"></i><?php echo $property['agent_detail']['mobile']; ?></span></dd>
                                    </div>
<?php } ?>

                                <h4 class="title-inner">Inquire about this property</h4>
                        </div>

                        <span id="contact_user_error_validation2"></span>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control alphabets" maxlength="36" name="contact_user_name2" id="contact_user_name2"
                                           placeholder="Your Name" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" maxlength="16"  name="contact_user_phone2" id="contact_user_phone2"
                                           placeholder="Phone" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" maxlength="50" name="contact_user_email2" id="contact_user_email2"
                                           placeholder="Email" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea class="form-control" maxlength="250" name="contact_user_msg2" id="contact_user_msg2" rows="5" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--                                <button class="agent_contact_form btn btn-secondary">Request info</button>-->
                        <button type="button" class="btn btn-secondary btn-trans contact_user_button2"> Send Message</button>
                        <div class="form_messages"></div>
                        </form>

                    </div>




                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
                <aside id="sidebar" class="sidebar-white">
<?php if ($property['type'] == 0) { ?>
                        <div id="houzez_mortgage_calculator-4" class="widget widget-calculate"><div class="widget-top"><h3 class="widget-title">Calculator Repayments</h3></div>
                            <div class="widget-body">
                                <!-- end container-content -->

                                <form method="" id="emi_calculator_form" action="#">
                                    <!--                               <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                                                   <input type="number" title="EMI" placeholder="EMI" id="number" onchange="reverseEMI(this);"  />
                                                                     <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>-->
                                    <span id="emi_calculator_error_validation"></span>
                                    <div class="form-group icon-holder">
                                        <input class="form-control" id="property_price" placeholder="Property Price" type="text">
                                        <span class="field-icon">OMR</span>
                                    </div>
                                    <div class="form-group icon-holder">
                                        <input class="form-control" id="deposit" placeholder="Deposit" type="text">
                                        <span class="field-icon">OMR</span>
                                    </div>
                                    <div class="form-group icon-holder">
                                        <input class="form-control" id="loan_amount" placeholder="Loan Amount" type="text" onchange="calculateEMI(this);">
                                        <span class="field-icon">OMR</span>
                                    </div>
                                    <div class="form-group icon-holder">
                                        <input class="form-control" id="interest_rate" placeholder="Interest Rate" type="text" onchange="calculateEMI(this);">
                                        <span class="field-icon">%</span>
                                    </div>
                                    <div class="form-group icon-holder">
                                        <input class="form-control" id="loan_term" placeholder="Loan Term (Years)" type="text" onchange="calculateEMI(this);" >
                                        <span class="field-icon"><i class="fa fa-calendar"></i></span>
                                    </div>

                                    <!--                                <div class="form-group icon-holder">
                                                                        <input class="form-control" id="mc_interest_rate" placeholder="Interest Rate" type="text">
                                                                        <span class="field-icon">%</span>
                                                                    </div>-->
                                    <!--                                <div class="form-group icon-holder">
                                                                        <select class="selectpicker" id="payment_frequency"  data-live-search="false" data-live-search-style="begins">
                                                                            <option value="12">Monthly</option>
                                                                        </select>
                                                                    </div>-->
                                    <div class="form-group icon-holder">
                                        <select class="selectpicker" id="int_type" onchange="calculateEMI(this);">
                                            <option value="0">Interest</option>
                                            <option value="1">Principal + Interest</option>
                                        </select>
                                    </div>

                                    <button id="emi_calculator" type="button" class="btn btn-secondary btn-block" onclick="calculateEMI(this);">Calculate</button>
                                    <div><center><h3 id="emi_value"><span class="emitext">EMI</span> OMR <span id="emi_value_only">0.00</span></h3></center></div>

                                    <!--                                <div class="morg-detail">
                                                                        <div class="morg-result">
                                                                            <div id="mortgage_mwbi"></div>
                                                                            <img src="http://houzez01.favethemes.com/wp-content/themes/houzez/images/icon_inspector.png" alt="icon inspector" class="show-morg">
                                                                        </div>
                                                                        <div class="morg-summery">
                                                                            <div class="result-title">
                                                                                Amount Financed:                        </div>
                                                                            <div id="amount_financed" class="result-value"></div>
                                    
                                                                            <div class="result-title">
                                                                                Mortgage Payments:                        </div>
                                                                            <div id="mortgage_pay" class="result-value"></div>
                                    
                                                                            <div class="result-title">
                                                                                Annual cost of Loan:                        </div>
                                                                            <div id="annual_cost" class="result-value"></div>
                                    
                                                                        </div>
                                                                    </div>-->
                                </form>
                            </div>
                        </div><?php } ?>


                    <div id="houzez_featured_properties-13" class="widget widget_houzez_featured_properties"><div class="widget-top"><h3 class="widget-title">Featured Properties</h3></div>            
                        <div class="widget-body">
                            <div class="property-widget-slider slide-animated owl-carousel owl-theme">
<?php foreach ($featured as $feature) { ?>
                                    <div class="item">
                                        <div class="figure-block">
                                            <figure class="item-thumb">
                                                <span class="label-featured label label-success">Featured</span>
                                                <div class="label-wrap label-right">
                                                    <span class="label-status label-status-8 label label-default"><?php
                                                        if ($feature['type'] == 1) {
                                                            echo "For Rent";
                                                        } else {
                                                            echo "For Buy";
                                                        }
                                                        ?></span>										</div>

                                                <a href="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . base64_encode($feature['id']) ?>" class="hover-effect">
                                                    <img width="385" height="184" src="<?php if(!empty($feature['images'])){echo base_url('uploads/properties/images/').$feature['images'][0]['image'];}  else{ echo base_url('uploads/properties/images/default.jpg');} ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" /></a>
                                                <figcaption class="thumb-caption">
                                                    <div class="cap-price pull-left"> OMR <?php echo number_format_short($feature['price']); ?><?php
                                                        if ($feature['type'] == 1) {
                                                            echo "&#47;mo";
                                                        }
                                                        ?></div>
                                                    <!--                                                <ul class="list-unstyled actions pull-right">
                                                                                                        <li>
                                                                                                            <span title="" data-placement="top" data-toggle="tooltip" data-original-title="7 Photos">
                                                                                                                <i class="fa fa-camera"></i>
                                                                                                            </span>
                                                                                                        </li>
                                                                                                    </ul>-->
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

<?php } ?>
                            </div>

                        </div>
                    </div>
                    <div id="houzez_property_taxonomies-11" class="widget widget-categories"><div class="widget-top"><h3 class="widget-title">Property Status</h3></div><hr>
                        <div class="widget-body">
                            <ul class="children">
                                <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_rent_properties'); ?>">For Rent</a><span class="cat-count">(<?php echo $type_count['rent']; ?>)</span></li>
                                <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_sale_properties'); ?>">For Buy</a><span class="cat-count">(<?php echo $type_count['buy']; ?>)</span></li>
                            </ul>
                        </div>
                    </div>
<!--<div id="houzez_property_taxonomies-12" class="widget widget-categories"><div class="widget-top"><h3 class="widget-title">Property Type</h3></div><div class="widget-body"><ul class="children"><li><a href="http://houzez01.favethemes.com/property-type/apartment/">Apartment</a><span class="cat-count">(29)</span></li><li><a href="http://houzez01.favethemes.com/property-type/loft/">Loft</a><span class="cat-count">(1)</span></li><li><a href="http://houzez01.favethemes.com/property-type/multi-family-home/">Multi Family Home</a><span class="cat-count">(1)</span></li><li><a href="http://houzez01.favethemes.com/property-type/single-family-home/">Single Family Home</a><span class="cat-count">(13)</span></li><li><a href="http://houzez01.favethemes.com/property-type/villa/">Villa</a><span class="cat-count">(10)</span></li></ul></div></div>-->
                    <?php if(!empty($similiar_properties)) {?>
                    <div id="houzez_properties_viewed-4" class="widget widget_houzez_properties_viewed"><div class="widget-top"><h3 class="widget-title">Similar Properties</h3></div>            


                        <div class="widget-body">

                            <?php foreach($similiar_properties as $similiar_property) { ?>
                            <div class="media">
                                <div class="media-left">
                                    <figure class="item-thumb">
                                        <a class="hover-effect" href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($similiar_property['id']); ?>">
                                            <?php if(!empty($similiar_property['images'])){ ?>
                                            <img width="150" height="110" src="<?php echo base_url('uploads/properties/images/').$similiar_property['images'][0]['image'] ?>" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="" /></a>
                                            <?php } else {?>
                                            <img width="150" height="110" src="<?php echo base_url('uploads/properties/images/default.jpg') ?>" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="" /></a>
                                            <?php }?>
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($similiar_property['id']); ?>"><?php echo ucfirst($similiar_property['location']) ?></a></h3>
                                    <h4> <?php echo "OMR ".$similiar_property['price'] ?></h4>
                                    <div class="amenities">
                                        <p><?php echo $similiar_property['beds'] ?> beds • <?php echo $similiar_property['baths'] ?> baths • <?php echo $similiar_property['property_size'] ?> Sq M</p>
                                        <p><?php echo $similiar_property['property_type'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                  <?php } ?>
                </aside>    
            </div> <!-- end container-sidebar -->
        </div>
    </div>
</aside>                
</div>
</div>
</div>
</section>
<!--end detail content-->

</div> <!--Start in header, end #section-body-->

<!--start lightbox-->
<div id="lightbox-popup-main" class="fade">
    <div class="lightbox-popup">
        <div class="popup-inner">
            <div class="lightbox-left">

                <div class="lightbox-header">
                    <div class="header-title">
                        <p>
                            <span>
                                <img height="40" width="40" src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" alt="<?php echo $property['location'] ?>" width="86" height="13">
                            </span>
                            <span class="hidden-xs"><?php echo $property['location'] ?></span>
                        </p>
                    </div>
                    <div class="header-actions">
                        <ul class="actions">
                            <li>
                                <span class="add_fav" data-placement="right" data-toggle="tooltip" data-original-title="Favorite" data-propid="416"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i></span>
                            </li>
                            <li class="lightbox-expand visible-xs compress">
                                <span><i class="fa fa-envelope"></i></span>
                            </li>
                            <li class="lightbox-close">
                                <span><i class="fa fa-close"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="lightbox-right fade in">
                <div class="lightbox-header hidden-xs">
                    <div class="header-title">
                        <p><?php
                            if ($property['type'] == 1) {
                                echo "OMR " . number_format_short($property['price']) . "mo";
                            } else {
                                echo "OMR " . number_format_short($property['price']);
                            }
                            ?></p>
                    </div>
                    <div class="header-actions">
                        <ul class="actions">
                            <li class="lightbox-close">
                                <span><i class="fa fa-close"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="agent-area">
                    <div class="form-small">
                        <form method="post" action="#" name="contact_info3" id="contact_info3">
                            <input type="hidden" value="<?php echo $property['fk_agent_id']; ?>" name="agent_id" id="agent_id">
                                    <div class="media agent-media"><div class="media-left">
                                <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=').base64_encode($property['fk_agent_id']); ?>">
                                            <img src="<?php if(!empty($property['agent_detail']['profile_image'])){ echo base_url('uploads/profile_images/').$property['agent_detail']['profile_image'];} else{ echo base_url('uploads/profile_images/default.png');} ?>" alt="Eco House Real Estate" width="80" height="80"></a>
                                            
                                </div><div class="media-body"><dl><dd><i class="fa fa-user"></i> Eco House Real Estate</dd><dd><i class="fa fa-phone"></i>(580) 453-6432</dd></dl></div></div>                                    
                            <span id="contact_user_error_validation3"></span>
                            <div class="form-group">
                                <input class="form-control" name="contact_user_name3" id="contact_user_name3" type="text"
                                       placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="contact_user_phone3" id="contact_user_phone3" type="text"
                                       placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="contact_user_email3" id="contact_user_email3" type="email"
                                       placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="contact_user_msg3" id="contact_user_msg3" rows="4" placeholder="Description">Hello, I am interested in your property.</textarea>
                            </div>


                            <!--<button class="agent_contact_form btn btn-secondary btn-block">Request info</button>-->
                            <button data-contact_user_error_validation_id="contact_user_error_validation3" type="button" class="btn btn-secondary btn-trans btn-block contact_user_button3"> Send Message </button>
                            <div class="form_messages"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    <!-- End Lightbox-->


<button class="scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>




<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->



<script>




////form1///////////////
    $('.contact_user_button1').click(function () {

        var fk_user_id = $('#agent_id').val();
        var name = $('#contact_user_name1').val();
        var email = $('#contact_user_email1').val();
        var phone = $('#contact_user_phone1').val();
        var msg = $('#contact_user_msg1').val();

        $.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/user_contact_info'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                phone: phone,
                message: msg,
                fk_user_id: fk_user_id

            },
            success: function (data) {
                //alert('sdafds');
                console.log(data);
                if (data.status) {
                    $('#contact_info1 input').val('');
                    $('#contact_user_error_validation1').text(data.message);
                    $('#contact_user_error_validation1').css({"font-size": "14px", "color": "green"});

                } else {
                    //alert(data.message);
                    $('#contact_user_error_validation1').text(data.message);
                    $('#contact_user_error_validation1').css({"font-size": "14px", "color": "red"});
                }

            }
        });
    })


////form2///////////////
    $('.contact_user_button2').click(function () {
        var prop_id = "<?php echo $_GET['prjkl'];?>";
        var property_id = atob(prop_id);
        var fk_user_id = $('#agent_id').val();
        var name = $('#contact_user_name2').val();
        var email = $('#contact_user_email2').val();
        var phone = $('#contact_user_phone2').val();
        var msg = $('#contact_user_msg2').val();

        $.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/user_property_enquiry'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                phone: phone,
                message: msg,
                fk_user_id: fk_user_id,
                property_id: property_id

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    $('#contact_user_error_validation2').text(data.message);
                    $('#contact_user_error_validation2').css({"font-size": "14px", "color": "green"});
                    $('#contact_info2 input').val('');
                    $('#contact_user_msg2').val('');

                } else {
                    //alert(data.message);
                    $('#contact_user_error_validation2').text(data.message);
                    $('#contact_user_error_validation2').css({"font-size": "14px", "color": "red"});
                }

            }
        });
    })


////form3///////////////
    $('.contact_user_button3').click(function () {
        var fk_user_id = $('#agent_id').val();
        var name = $('#contact_user_name3').val();
        var email = $('#contact_user_email3').val();
        var phone = $('#contact_user_phone3').val();
        var msg = $('#contact_user_msg3').val();

        $.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/user_contact_info'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                phone: phone,
                message: msg,
                fk_user_id: fk_user_id

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    $('#contact_info3 input').val('');
                    $('#contact_user_error_validation3').text(data.message);
                    $('#contact_user_error_validation3').css({"font-size": "14px", "color": "green"});

                } else {
                    //alert(data.message);
                    $('#contact_user_error_validation3').text(data.message);
                    $('#contact_user_error_validation3').css({"font-size": "14px", "color": "red"});
                }

            }
        });
    })
</script>

<script>

    $(document).ready(function () {
        $('#emi_value').hide();
    });

    $('#loan_amount').click(function () {
        //alert($('#loan_amount').val());
        var property_price = $('#property_price').val();
        var deposit = $('#deposit').val();
        var loan_amount = property_price - deposit;
        $('#loan_amount').val(loan_amount);

    });


    $('#emi_calculator').click(function () {

        var property_price = $('#property_price').val();
        var deposit = $('#deposit').val();
        var loan_amount = $('#loan_amount').val();
        var interest_rate = $('#interest_rate').val();
        var loan_term = $('#loan_term').val();


        $('#emi_value').show();

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/emi_calculator');?>",
            method: 'POST',
            dataType: 'json',
            data: {
                property_price: property_price,
                deposit: deposit,
                loan_amount: loan_amount,
                interest_rate: interest_rate,
                loan_term: loan_term


            },
            success: function (data) {
                console.log(data);
                //alert(data.status);
                if (data.status) {
                    $('#emi_calculator_form input');
                } else {
                    $('#emi_calculator_error_validation').text(data.message);
                    $('#emi_calculator_error_validation').css({"font-size": "14px", "color": "red"});
                    $('#emi_value').hide();

                }
            }
        });
    });


</script>
<script type="text/javascript">
    function calculateEMI(obj) {
        // Formula: 
        // EMI = (P * R/12) * [ (1+R/12)^N] / [ (1+R/12)^N-1]                               
        // isNaN(isNotaNumber): Check whether the value is Number or Not                
        if (!isNaN(obj.value) && obj.value.length !== 0) {

            var emi = 0;
            var P = 0;
            var n = 1;
            var r = 0;
            var m = 12;


            // parseFloat: This function parses a string 
            // and returns a floating point number
            if ($("#loan_amount").val() !== "")
                P = parseFloat($("#loan_amount").val());


            if ($("#interest_rate").val() !== "")
                r = parseFloat(parseFloat($("#interest_rate").val()) / 100);

            if ($("#loan_term").val() !== "")
                m = parseFloat($("#loan_term").val());
            n = m * 12;

            var int_type = $('#int_type').val();
            if ($("#deposit").val() !== "")
                deposit = parseFloat($("#deposit").val());


            //alert(int_type); 

            // Math.pow(): This function returns the value of x to power of y 
            // Example: (5^2)

            // toFixed: Convert a number into string by keeping desired decimals                   

            if (P !== 0 && n !== 0 && r !== 0) {
                emi = parseFloat((P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1]);
            }
            // alert(emi)    
            if (int_type == 0) { //alert('1');

                $('.emitext').text("EMI");
                $('#emi_value_only').text(emi.toFixed(2));

            }
            if (int_type == 1) {
                //alert('jhgjh');
                var total = deposit + n * emi;
                $('.emitext').text("Total");
                $('#emi_value_only').text(total.toFixed(2));
            }

            //$("#number").val(emi.toFixed(2));

        }
    }
</script>

<script>
    $(document).ready(function () { // alert('working'); 
        $('.clicked_tab').click(function () { //alert('nice'); 
            var clicked_tab = $(this).data('option');
            var actived_tab = $('#actived_tab').val();
            alert(clicked_tab);
            alert(actived_tab);
            if (actived_tab != clicked_tab) {
                $('#actived_tab').val(clicked_tab);
                $('#tab_change').submit();
            }
        });
    });

    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;

    }
    $("#property_price").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    $("#deposit").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    $("#loan_amount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

    $("#interest_rate").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    $("#loan_term").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
</script>
<div id="shareModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="width: 70%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Share with</h4>
            </div>
            <div class="modal-body">
<!--fb-share-button -->
                <?php $base_id = base64_encode($property['id']); ?>
                <div class="social-share" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . $base_id; ?>"><i class="fa fa-facebook ln-shadow"></i></a>
                </div>
                <div class="social-share">
                    <a href="http://twitter.com/share?url=<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . $base_id; ?>" target="_blank"><i class="fa fa-twitter ln-shadow"></i></a>
                </div>
                
                <div class="social-share">
<!--                    <a href="whatsapp://send" data-text="<?php //echo $property['location'] ?>" data-href="<?php //echo base_url('index.php/Properties/property_details?prjkl=') . base64_encode($property['id']) ?>" class="wa_btn wa_btn_s" ><i class="fa fa-whatsapp ln-shadow"></i></a>-->
                    <a href="https://api.whatsapp.com/send?text=<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . $base_id; ?>" target="_blank" data-text="<?php echo $property['location'] ?>" class="wa_btn wa_btn_s" ><i class="fa fa-whatsapp ln-shadow"></i></a>
                </div>
<!--                <div class="social-share">
                    <a href="#"><i class="fa fa-instagram ln-shadow"></i></a>
                </div>-->
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>



</body>

</html>
<script>
    $('#view_in_map').click(function () {
        $('#PropertyMapview').css("height", "800px");
        $('#PropertyMapview').animate({height: 800}, 300);
        //alert('fdsf');

    });
</script>


<script>
    function initMap() {

        var uluru = {lat: <?php echo $property['latitude'] ?>, lng: <?php echo $property['longitude'] ?>};
        var property_map = new google.maps.Map(document.getElementById('PropertyMap'), {
            zoom: 15,
            center: uluru
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: property_map

        });
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW3Y3DMDgI9CwSv81az8BEeyL5BRmd0c&callback=initMap">
</script>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript">
        (function( $ ) {

    //Function to animate slider captions 
    function doAnimations( elems ) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        
        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }
    
    //Variables on page load 
    var $myCarousel = $('#carousel-example-generic'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        
    //Initialize carousel 
    $myCarousel.carousel();
    
    //Animate captions in first slide on page load 
    doAnimations($firstAnimatingElems);
    
    //Pause carousel  
    $myCarousel.carousel('pause');
    
    
    //Other slides to be animated on carousel slide event 
    $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });  
    $('#carousel-example-generic').carousel({
        interval:3000,
        pause: "false"
    });
    </script>


