<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>



<div id="section-body" class="">


    <style type="text/css" scoped>
        .banner-inner{
            height: 450px; 
        }
        .banner-inner:before {
            opacity: 0.5;
        }
        .vc_column-inner::after, .vc_column-inner::before {
    content: " ";
    display: table;
}
.main-banner{
    background: url(<?php echo base_url('web_assets/images/1.jpg');?>) no-repeat; 
    background-size: 100%;
    background-repeat: no-repeat;
    height: 450px;
    width: 100%;
}
.banner-parallax{
    
   
}
.vc_custom {
    padding-top: 20px !important;
    padding-right: 20px !important;
    padding-bottom: 20px !important;
    padding-left: 20px !important;
    background-color: rgba(0,174,239,0.1) !important;
    font-size: 14px;
    margin-bottom:30px
}

    </style>
    <div class="main-banner">
        <div class="banner-bg-wrap">
                    <div class="banner-inner">
                        <div class="banner-caption" style="z-index: 5;">
                         <h1 style="font-weight: 500; font-size: 55px; color:#fff8f0;">Contact us</h1>
                        </div>
                        
                    </div>
         </div>
    </div>
    <!-- <div class="header-media-wrap">
        <div class="header-media">
            <div class="banner-parallax " style='height: 380px; width: 100%;'>
                <div class="banner-bg-wrap">
                    <div class="banner-inner"></div>
                </div>
            </div>
            <div class="banner-caption">

                <h1>Contact us</h1>
                <h2></h2>


            </div>
        </div>
    </div> -->

    <div class="container">


        <!--start compare panel-->
        <div id="compare-controller" class="compare-panel">
            <div class="compare-panel-header">
                <h4 class="title"> Compare Listings <span class="panel-btn-close pull-right"><i class="fa fa-times"></i></span></h4>
            </div>

            <div id="compare-properties-basket">
            </div>
        </div>
        <!--end compare panel-->
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb"><li itemscope ><a itemprop="url" href="<?php echo base_url('index.php/web_panel/Home'); ?>"><span itemprop="title">Home</span></a></li><li class="active">Contact</li></ol>            <div class="page-title-left">
                        <h1 class="title-head">Contact</h1>
                    </div>


                </div>
            </div>
        </div>

        <section class="section-detail-content houzez-page-template">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-main">
                        <div class="white-block ">
                            <article id="post-1100" class="post-1100 page type-page status-publish hentry">
                                <div class="entry-content">
                                    <div class="row row-fluid"><div class="col-sm-8"><div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div role="form" class="wpcf7" id="contact_form" lang="en-US">
                                                        
                                                        <form action="" method="post" class="wpcf7-form" id="contact_form" novalidate="novalidate">
                                                            <span id="contact_validation"></span>
                                                            <span class="name"></span>
                                                            <div class="form-group">
<!--                                                                <label class="required" for="yourName"></label><br/>-->
                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                    <input type="text" name="name" id="name" value="" size="40" maxlength="36" class="form-control alphabets" aria-required="true" aria-invalid="false" placeholder="Enter name" />
                                                                </span> </p>
                                                            </div>
                                                            <span class="email"></span>
                                                            <div class="form-group">
<!--                                                                <label class="required" for="yourEmail"></label><br />-->
                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                    <input type="email" id="email" name="email" value="" size="40" maxlength="50" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter email"  />
                                                                </span> </p>
                                                            </div>
                                                            <span class="mobile"></span>
                                                            <div class="form-group">
<!--                                                                <label class="required" for="yourPhone"></label><br />-->
                                                                <span class="tel-179">
                                                                    <input type="tel" name="mobile" id="mobile" value="" size="40" maxlength="16" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter mobile"  />
                                                                </span>
                                                            </div>
                                                             <span class="subject"></span>
                                                            <div class="form-group">
<!--                                                                <label class="required" for="yourSubject"></label><br />-->
                                                                <span class="your-subject">
                                                                    <input type="text" name="subject" id="subject" value="" size="40" maxlength="60" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter subject"  />
                                                                </span>
                                                            </div>
                                                            <span class="message"></span>
                                                            <div class="form-group">
<!--                                                                <label class="required" for="yourMessage"></label><br />-->
                                                                <span class="your-message">
                                                                    <textarea name="message" id="message" cols="40" rows="6" class="form-control" maxlength="250" aria-required="true" aria-invalid="false" placeholder="Meassage body" ></textarea>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" id="contact_submit" class="btn btn-primary btn-lg" style="width:200px"/>Send</Button>
                                                            </div>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div></div></div><div class="col-sm-3"><div class="vc_column-inner "><div class="wpb_wrapper">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-4"><div class="vc_column-inner "><div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element  vc_custom" >
                                                        <div class="wpb_wrapper">
<!--                                                            <p class="padding-top"><strong>For All Press Inquiries,</strong><br />
                                                                <strong>please contact:</strong></p>-->
                                                            <p><strong>Badar Barwani</strong><br />
                                                                       Co-Owner<br />
                                                                       <a href="mailto:info@muscathome.com">info@muscathome.com</a></p>


                                                        </div>
                                                    </div>

                                                    <div class="wpb_text_column wpb_content_element  vc_custom" >
                                                        <div class="wpb_wrapper">
                                                            <p class="padding-top"><strong>Corporate Headquarters</strong><br />
                                                                Muscat, OMAN</p>

                                                        </div>
                                                    </div>
                                                </div></div></div></div>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>
                    </div>
                </div>


            </div>

        </section>



    </div> <!--.container Start in header-->
</div> <!--Start in header end #section-body-->

<button class="scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>


<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




<script>
    $('#contact_submit').click(function () {  
        var name       = $('#name').val();
        var email      = $('#email').val();
        var mobile     = $('#mobile').val();
        var subject    = $('#subject').val();
        var message    = $('#message').val();
        
        $.ajax({ 
            url: "<?php echo base_url('index.php/web_panel/Contact'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name:  name,
                email: email,
                mobile:  mobile,
                subject: subject,
                message:   message
                
                
            }, 
            success: function (data) { 
                //alert('sdafds');
                console.log(data); 
                if (data.status) {
                    $('#contact_form input').val('');
                    $('#contact_form textarea').val('');
                    $('#user_contact_modal').modal('show');
                    
                } else {
                    //alert(data.message);
                     
                    $('.'+data.error_class).fadeIn();
                    $('.'+data.error_class).text(data.message);
                    $('.'+data.error_class).css({"font-size": "14px", "color": "red"});
                    $('.'+data.error_class).fadeOut(3000);
                  }
                 
                
            }
         });
    })
    function resetErrors() {
    $('contact_form input, contact_form select').removeClass('inputTxtError');
    $('label.error').remove();
}
    
</script>

<style>
    
    .error {
   color: #ff0000;
   font-size: 12px;
   margin-top: 5px;
   margin-bottom: 0;
}
 
.inputTxtError {
   border: 1px solid #ff0000;
   color: #0e0e0e;
}
    
</style>
