<?php // pre($offers);die;  ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<style type="text/css">
    /** page structure **/
    #fh5co-logo {
        padding-top: 3.5em;
        text-align: center;
    }
    #fh5co-logo > a {
        position: relative;
        display: block;
        font-size: 50px;
        text-align: center;
        width: 200px;
        margin: 0 auto;
        height: 50px;
    }
    #fh5co-logo > a i, #fh5co-logo > a em {
        position: absolute;
        top: 0;
        left: 0;
        width: 200px;
        text-align: center;
        display: block;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
    }
    #fh5co-logo > a em {
        opacity: 0;
        visibility: hidden;
        font-size: 26px;
        top: 2px;
        font-family: "Playfair Display", times, serif;
    }
    #fh5co-logo > a:hover i {
        opacity: 0;
        visibility: hidden;
    }
    #fh5co-logo > a:hover em {
        opacity: 1;
        visibility: visible;
    }

    #fh5co-main {
        padding: 3.5em 0 7em 0;
    }
    @media screen and (max-width: 768px) {
        #fh5co-main {
            padding: 2em 0;
        }
    }
    #fh5co-main > .container {
        position: relative;
    }
    .fh5co-heading {
        margin-bottom: 1.5em;
    }
    .fh5co-heading.padding-right {
        padding-right: 1em;
    }
    @media screen and (max-width: 768px) {
        .fh5co-heading.padding-right {
            padding-right: 0em;
        }
    }

    .fh5co-intro {
        margin-bottom: 2em;
    }
    .fh5co-intro.padding-right {
        padding-right: 1em;
        width: 50%;
        float: left;
    }
    @media screen and (max-width: 768px) {
        .fh5co-intro.padding-right {
            padding-right: 0em;
        }
    }
    .fh5co-intro h1 {
        line-height: 1.5;
        margin-top: 60px;
    }
    @media screen and (max-width: 768px) {
        .fh5co-intro h1 {
            font-size: 20px;
        }
    }
    .fh5co-intro h1 a {
        font-size: 20px;
    }

    .fh5co-img {
        position: relative;
        background: #f2f2f2;
        float: left;
        width: 100%;
    }

    .fh5co-grid {
        position: relative;
    }
    .fh5co-grid .fh5co-col-1,
    .fh5co-grid .fh5co-col-2 {
        width: 100%;
    }
    @media screen and (max-width: 480px) {
        .fh5co-grid .fh5co-col-1,
        .fh5co-grid .fh5co-col-2 {
            width: 100%;
        }
    }
    .fh5co-grid .fh5co-col-1.margintop,
    .fh5co-grid .fh5co-col-2.margintop {
        margin-top: 29%;
    }
    .fh5co-grid .fh5co-col-1 img,
    .fh5co-grid .fh5co-col-2 img {
        max-width: 100%;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item,
    .fh5co-grid .fh5co-col-2 .fh5co-item {
        margin-bottom: .5em;
        float: left;
        width: 50%;
        position: relative;
        background: #f2f2f2;
        padding: 10px;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a,
    .fh5co-grid .fh5co-col-2 .fh5co-item a {
        position: relative;
        display: block;
        overflow: hidden;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a.image-popup h2,
    .fh5co-grid .fh5co-col-2 .fh5co-item a.image-popup h2 {
        opacity: 0;
        visibility: hidden;
        -webkit-transition: 0.9s;
        -o-transition: 0.9s;
        transition: 0.9s;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text-wrap,
    .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text-wrap {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        -webkit-transition: 0.9s;
        -o-transition: 0.9s;
        transition: 0.9s;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text,
    .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text {
        position: absolute;
        z-index: 99;
        text-align: center;
        top: 25%;
        width: 100%;
        vertical-align: middle;
        margin-top: -18px;
    }
    @media screen and (max-width: 768px) {
        .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text,
        .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text {
            margin-top: -12px;
        }
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text h2,
    .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text h2 {
        margin: 0;
        padding: 0;
        color: #fff;
        font-family: "Roboto", arial, sans-serif;
        font-size: 30px;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text h1,
    .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text h1 {
        margin: 0;
        padding: 0;
        color: #fff;
        font-family: "Roboto", arial, sans-serif;
        font-size: 40px;
        padding: 10px;
        margin-top: 12px;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text p,
    .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text p {
        margin: 0;
        padding: 0;
        color: #fff;
        font-family: "Roboto", arial, sans-serif;
        padding: 2px 30px;
    }
    @media screen and (max-width: 768px) {
        .fh5co-grid .fh5co-col-1 .fh5co-item a .fh5co-item-text h2,
        .fh5co-grid .fh5co-col-2 .fh5co-item a .fh5co-item-text h2 {
            font-size: 20px;
        }
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a img,
    .fh5co-grid .fh5co-col-2 .fh5co-item a img {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -ms-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
        -webkit-transition: 0.9s;
        -o-transition: 0.9s;
        transition: 0.9s;
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a:hover img,
    .fh5co-grid .fh5co-col-2 .fh5co-item a:hover img {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a:hover .fh5co-item-text-wrap,
    .fh5co-grid .fh5co-col-2 .fh5co-item a:hover .fh5co-item-text-wrap {
        background: rgba(0, 0, 0, 0.2);
    }
    .fh5co-grid .fh5co-col-1 .fh5co-item a.image-popup:hover h2,
    .fh5co-grid .fh5co-col-2 .fh5co-item a.image-popup:hover h2 {
        opacity: 1;
        visibility: visible;
    }
    .fh5co-grid .fh5co-col-1 {
        float: left;
        padding-right: .25em;
    }
    @media screen and (max-width: 480px) {
        .fh5co-grid .fh5co-col-1 {
            padding-right: 0em;
        }
    }
    .fh5co-grid .fh5co-col-2 {
        float: right;
        padding-left: .25em;
    }
    @media screen and (max-width: 480px) {
        .fh5co-grid .fh5co-col-2 {
            padding-left: 0em;
        }
    }
    .mfp-with-zoom .mfp-container,
    .mfp-with-zoom.mfp-bg {
        opacity: 0;
        -webkit-backface-visibility: hidden;
        /* ideally, transition speed should match zoom duration */
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .mfp-with-zoom.mfp-ready .mfp-container {
        opacity: 1;
    }

    .mfp-with-zoom.mfp-ready.mfp-bg {
        opacity: 0.8;
    }

    .mfp-with-zoom.mfp-removing .mfp-container,
    .mfp-with-zoom.mfp-removing.mfp-bg {
        opacity: 0;
    }

    .fh5co-social-wrap {
        padding: 0em 0 0 0;
        float: left;
    }

    .fh5co-social {
        padding: 0;
        margin: 30px 0 0 0;
        position: relative;
    }
    .fh5co-social li {
        padding: 0;
        margin: 0;
        list-style: none;
        display: inline;
    }
    .fh5co-social li a {
        font-size: 40px;
        padding: 4px;
        color: #000;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
    }
    @media screen and (max-width: 768px) {
        .fh5co-social li a {
            font-size: 26px;
        }
    }
    .fh5co-social li a:hover {
        color: #f3ac2b;
    }

    figure {
        margin-bottom: 1.5em;
    }
    figure figcaption {
        padding-top: 15px;
        font-size: 14px;
        color: #999999;
    }
    #fh5co-footer {
        padding: 3em 0 0 0em;
        float: left;
    }
    #fh5co-footer.padding-left {
        padding-left: 2em;
    }
    @media screen and (max-width: 480px) {
        #fh5co-footer.padding-left {
            padding-left: 0em;
        }
    }
    @media screen and (max-width: 480px) {
        #fh5co-footer {
            padding: 2em 0 0 0;
        }
    }

</style>
<section class="offeres">
    <div class="fh5co-loader"></div>

    <div id="fh5co-logo">
        <h1>All Offers</h1> 
    </div>

    <div id="fh5co-main" role="main">


        <div class="container">

            <div class="fh5co-grid">

                <div class="fh5co-col-1">
<!--                    <div class="fh5co-intro padding-right">
                        <h1>I'm Jean Smith <em>&amp;</em> I'm a Photographer. I love capture life. <a href="http://ec2-34-207-7-22.compute-1.amazonaws.com/real_estate/index.php/web_panel/Home/about" class="transition"><em>About Me</em></a></h1>
                        <ul class="fh5co-social">
                            <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                            <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                            <li><a href="#"><i class="icon-instagram-with-circle"></i></a></li>
                            <li><a href="#"><i class="icon-whatsapp-with-circle"></i></a></li>
                        </ul>
                    </div>-->
                    <?php foreach ($offers as $offer) {
                        if (!empty($offer)) { ?>
                            <div class="fh5co-item">
                                <a href="<?php echo base_url('index.php/web_panel/Offers/latest_offers?jyfh='). base64_encode($offer[0]['id'])?>" class="transition animate-box">
                                    <img height="300px;" src="<?php echo base_url('uploads/properties/offers/').$offer[0]['banner_image']?>" alt="<?php echo $offer[0]['banner_image']?>" style="width: 100%;">
                                    <div class="fh5co-item-text-wrap">
                                        <div class="fh5co-item-text">

                                            <h2><?php echo $offer[0]['title'];?></h2>
                                            <h1><?php echo $offer[0]['discount'];?>% off</h1>
                                            <p><?php echo $offer[0]['description'];?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php } else {
                        echo "<h3>No Offer available !</h2>";
                    }} ?>
<!--                    <div id="fh5co-footer" class="padding-left">
                        <p><small>&copy; 2016 Epic. All Rights Reserved. <br> Designed by <a href="" target="_blank">MuscatHome</a> </small></p>
                        <ul class="fh5co-social">
                            <li><a href="#"><i class="icon-twitter-with-circle"></i></a></li>
                            <li><a href="#"><i class="icon-facebook-with-circle"></i></a></li>
                            <li><a href="#"><i class="icon-instagram-with-circle"></i></a></li>
                             <li><a href="#"><i class="icon-dribbble-with-circle"></i></a></li> 
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('.crsl-items').carousel({
            visible: 3,
            itemMinWidth: 180,
            itemEqualHeight: 370,
            itemMargin: 9,
        });

        $("a[href=#]").on('click', function (e) {
            e.preventDefault();
        });
    });
</script>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




