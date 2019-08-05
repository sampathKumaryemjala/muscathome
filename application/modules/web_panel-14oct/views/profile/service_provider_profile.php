<?php //pre($agent); die;                         ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>
<style type="text/css">
	.comments {
  max-width: 86%;
  margin: 70px auto;
}
.comments article {
  position: relative;
  border-bottom: solid 1px rgba(178, 179, 153, 0.125);
  margin: 0 auto 50px auto;
}
.comments article:last-child {
  border: none;
}
.comments article:hover time {
  opacity: 1;
}
.comments article img {
  position: absolute;
  top: -10px;
  left: -75px;
  width: 50px;
  height: 50px;
  border-width: 0;
  border-radius: 100%;
}
.comments article h4 {
  display: inline-block;
  font-weight: 400;
  margin-bottom: 25px;
}	
.comments article h4 a {
  color: #404040;
  text-transform: lowercase;
  text-decoration: none;
}
.comments article h4 a:hover {
  color: #BFBFA8;
}
.comments article time {
  color: #545454;
  margin-left: 1rem;
  text-transform: uppercase;
}
.comments article .icon-rocknroll {
  color: #545454;
  font-size: .85rem;
}
.comments article .icon-rocknroll:hover {
  opacity: .5;
}
html body .comments article time,
html body .comments article .like-count,
html body .comments article .icon-rocknroll {
  font-size: .75rem;
  opacity: 0;
}
.comments article time, html body .comments article .like-count {
  font-weight: 300;
}
.comments article p {
  margin-bottom: 50px;
}
.comments article p .reply {
  color: #BFBFA8;
  cursor: pointer;
}
.comments article .active {
  opacity: 1;
}
.like-data {
  float: right;
}

.icon-rocknroll {
  background: none;
  border: 0;
  outline: none;
  cursor: pointer;
  margin: 0 .125rem 0 0;
  padding: 0;
}

.comments article:hover .icon-rocknroll,
.comments article:hover .like-count {
  opacity: 1;
}

@media (max-width: 650px) {
  .comments {
    width: 100%;
    padding: 0 1rem;
  }
  .comments article {
    width: 90%;
  }
  .comments article #profile-photo {
    position: relative;
    left: -1rem;
    display: inline-block;
    vertical-align: middle;
  }
  .comments article h4 {
    display: inline-block;
    vertical-align: middle;
  }
  .comments article h4 time {
    display: block;
    margin-left: 0 !important;
    opacity: .5 !important;
  }
}
</style>

<div id="section-body" class="">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb"><li itemscope><a itemprop="url" href="<?php base_url('index.php/web_panel/home')?>"><span itemprop="title">Home</span></a></li><li class="active"><?php echo $provider['name']; ?></li></ol>            <div class="page-title-left">
                        <h1 class="title-head"><?php echo $provider['name']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
 <div class="row">
    <div class="col-sm-12">
            <div class="profile-detail-block">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="profile-image">
                                <img width="350" height="auto" src="<?php if(!empty($provider['profile_image'])){ echo base_url('uploads/profile_images/').$provider['profile_image']; } else { echo base_url('uploads/profile_images/default.png'); }  ?>" class="attachment-houzez-image350_350 size-houzez-image350_350 wp-post-image" alt=""  />

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-descriptionn">
                                <h2 style="margin-bottom:30px"><?php echo ucfirst($provider['name']); ?></h2>
                                <ul class="profile-contact" class="clearfix" style="margin-top:20px; font-size:18px;">

                                    <li style="font-size: 15px;"><span>MOBILE:</span> <a href="tel:<?php echo $provider['mobile']; ?>"><?php echo $provider['mobile']; ?></a></li>
                                    <li style="font-size: 15px;"><span>Email:</span> <a href="mailto:<?php echo $provider['email']; ?>"><?php echo $provider['email']; ?></a></li>
                                    
                                </ul>
                                <p style="font-size:20px; margin-top:20px; padding: 0 15px; line-height: 40px" class="btn-success"><span style="margin-right:15px;">Serivce: </span><?php echo $provider['fk_service_sub_cat_name']; ?></p>
                                <div class="col-xs-10" style="text-align:right"><h4 style="text-align:left; margin-top: 0px !important;"><span>Ratings: </span>( <?php echo number_format((float) $provider['avg_rating'], 1, '.', ''); ?> )</h4></div>
                                    <div class="col-xs-10" style="color:orange; font-size: 19px; position: relative; top: -2px; text-align: left; padding: 0; margin: 0;" >
                                                                <?php $user_ratings = number_format((float) $provider['avg_rating'], 1, '.', '');
                                                                if ($user_ratings == 0 ) { ?>
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

                                                            </div>

                                

                                
                                
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                        	<div class="form-small">
                                <strong><p class="agent-contact-title" style="text-transform:uppercase; font-size: 20px">CONTACT <?php echo $provider['name']; ?></p></strong>

                                <form method="post" action="" name="contact_info1" id="contact_info1" >
                                    <span id="contact_user_error_validation1"></span>
                                    <input type="hidden" value="<?php echo $provider['id']; ?>" name="agent_id" id="agent_id">
                                    <div class="form-group">
                                        <input class="form-control alphabets" maxlength="36" name="contact_user_name1" id="contact_user_name1" type="text"
                                               placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" maxlength="16" name="contact_user_phone1" id="contact_user_phone1" type="text"
                                               placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" maxlength="50" name="contact_user_email1" id="contact_user_email1" type="email"
                                               placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="contact_user_msg1" maxlength="250" id="contact_user_msg1" rows="3"
                                                  class="form-control" placeholder="Meassage"></textarea>
                                    </div>
                                    <button type="button" style="width:200px" class="btn btn-secondary btn-trans contact_user_button1"> Send Message </button>
                                </form>
                                <div id="form_messages"></div>

                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<section id="app" class="comments">
                                    <?php if($reviews){ foreach ($reviews as $review) { ?>
                                    <article>
                                        <img id="profile-photo" src="<?php if(!empty($review)) { echo base_url('uploads/profile_images/').$review['profile_image']; } else { echo base_url('uploads/profile_images/default.png');} ?>" />
                                        <h4><?php echo ucfirst($review['name']); ?></h4>
                                        <?php $date1 = date('Y-m-d');
                                            $datee2 = explode(' ', $review['create_date']);
                                            $date2 = $datee2[0];
                                            $date1 = date_create($date1);
                                            $date2 = date_create($date2);
                                            $interval = $date2->diff($date1);
                                            $diffr = $interval->format('%m month, %d days ago');
                                            $date_diffr = explode(',', $diffr);
                                            $date_diffrence = $date_diffr[0];
                                            if ($date_diffrence[0] == 0) {
                                                $posted_date = $date_diffr[1];
                                            } else {
                                                $posted_date = $diffr;
                                            }
                                            if ($date_diffr[1][1] == 0) {
                                                $posted_date = "Recently posted";
                                            } ?>
                                      <time><?php echo $posted_date; ?></time>
                                      <like></like>
                                      <p><?php echo $review['review']; ?></p>
                                    </article>
                                    <?php } } ?>
                                </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
        </div>



    </div> <!--.container Start in header-->
</div> <!--Start in header end #section-body-->

<button class="scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>



<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<?php echo $this->load->view('custome_link/custome_js'); ?>

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
    $('.contact_user_button1').click(function () {  
        var fk_user_id       = $('#agent_id').val();
        var name       = $('#contact_user_name1').val();
        var email      = $('#contact_user_email1').val();
        var phone      = $('#contact_user_phone1').val();
        var msg        = $('#contact_user_msg1').val();
        
        $.ajax({ 
            url: "<?php echo base_url('index.php/web_panel/Properties/user_contact_info'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name:  name,
                email: email,
                phone:  phone,
                message:   msg,
                fk_user_id: fk_user_id
                
            }, 
            success: function (data) { 
                //alert('sdafds');
                console.log(data); 
                if (data.status) {
                    $('#contact_info1 input').val('');
                    $('#contact_user_error_validation1').text(data.message);
                    $('#contact_user_error_validation1').css({"font-size": "14px", "color": "green"});
                    $('#contact_user_msg1').val('');
                } else {
                    //alert(data.message);
                    $('#contact_user_error_validation1').text(data.message);
                    $('#contact_user_error_validation1').css({"font-size": "14px", "color": "red"});
                }
                
            }
         });
    })
    
    
</script>
<script>
    var xyz = "<?php echo $active_tab; ?>";
//alert(xyz);
    $('.active' + xyz).addClass('active');
</script>
