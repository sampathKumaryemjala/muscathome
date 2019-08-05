<?php //pre($agent); die;                         ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>

<div id="section-body" class="">

    <div class="container">



        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb"><li itemscope><a itemprop="url" href="<?php base_url('index.php/web_panel/home')?>"><span itemprop="title">Home</span></a></li><li class="active"><?php echo $agent['name']; ?></li></ol>            <div class="page-title-left">
                        <h1 class="title-head"><?php echo $agent['name']; ?></h1>
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
                                <img width="350" height="auto" src="<?php if(!empty($agent['profile_image'])){ echo base_url('uploads/profile_images/').$agent['profile_image']; } else { echo base_url('uploads/profile_images/default.png'); }  ?>" class="attachment-houzez-image350_350 size-houzez-image350_350 wp-post-image" alt=""  />

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-12">
                            <div class="profile-description">
                                <p class="agent-title"><?php echo ucfirst($agent['name']); ?></p>
                                <p class="position">
                                    <?php echo $agent['agent_position']; ?> at <?php echo $agent['company_name']; ?>                            </p>

                                <p><?php echo $agent['about_agent']; ?> </p>

                                <ul class="profile-contact">

                                    <li><span>OFFICE:</span> <a href="tel:<?php echo $agent['office_number']; ?>"><?php echo $agent['office_number']; ?></a></li>
                                    <li><span>MOBILE:</span> <a href="tel:<?php echo $agent['mobile']; ?>"><?php echo $agent['mobile']; ?></a></li>
                                    <li><span>FAX:</span> <a><?php echo $agent['fax_number']; ?></a></li>
                                    <li><span>Email:</span> <a href="mailto:<?php echo $agent['email']; ?>"><?php echo $agent['email']; ?></a></li>

                                </ul>
                                <ul class="profile-social">
                                    
                                    <?php /* $is_fb =  explode('/', $agent['facebook_link']); 
                                    if(!empty($is_fb[4])){ ?> 
                                    <li><a class="btn-facebook" href="<?php echo $agent['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <?php } $is_li =  explode('/', $agent['linkedin_link']);
                                    if(!empty($is_li[4])){  ?>
                                    <li><a class="btn-linkedin" href="<?php echo $agent['linkedin_link']; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                    <?php } $is_yt =  explode('/', $agent['youtube_link']);
                                    if(!empty($is_yt[4])){  ?>
                                    <li><a class="btn-youtube" href="<?php echo $agent['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
                                    <?php } $is_pin =  explode('/', $agent['pinterest_link']);
                                    if(!empty($is_pin[4])){  ?>
                                    <li><a class="btn-pinterest" href="<?php echo $agent['pinterest_link']; ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
                                    <?php } */ ?>
                                    
                                    <?php 
                                    if(!empty($agent['facebook_link'])){ ?> 
                                    <li><a class="btn-facebook" href="<?php echo $agent['facebook_link']; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                    <?php } 
                                    if(!empty($agent['linkedin_link'])){  ?>
                                    <li><a class="btn-linkedin" href="<?php echo $agent['linkedin_link']; ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                    <?php } 
                                    if(!empty($agent['youtube_link'])){  ?>
                                    <li><a class="btn-youtube" href="<?php echo $agent['youtube_link']; ?>" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
                                    <?php } 
                                    if(!empty($agent['pinterest_link'])){  ?>
                                    <li><a class="btn-pinterest" href="<?php echo $agent['pinterest_link']; ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
                                    <?php } ?>
                                 </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">


                            <div class="form-small">

                                <p class="agent-contact-title" style="text-transform:uppercase">CONTACT <?php echo $agent['name']; ?></p>

                                <form method="post" action="" name="contact_info1" id="contact_info1" >
                                    <span id="contact_user_error_validation1"></span>
                                    <input type="hidden" value="<?php echo $agent['id']; ?>" name="agent_id" id="agent_id">
                                    <div class="form-group">
                                        <input class="form-control alphabets" maxlength="36" name="contact_user_name1" id="contact_user_name1" type="text"
                                               placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="contact_user_phone1" maxlength="16" id="contact_user_phone1" type="text"
                                               placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="contact_user_email1" maxlength="50" id="contact_user_email1" type="email"
                                               placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="contact_user_msg1" id="contact_user_msg1" maxlength="250" rows="3" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-trans btn-block contact_user_button1"> Send Message </button>
                                </form>
                                <div id="form_messages"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
                <div id="content-area">

                    <!--start property items-->
                    <div class="property-listing list-view">
                        <div class="row">

                            <?php
                            $i = '415';
                            if(!empty($properties)){ foreach ($properties as $property) {
                                 if($property['status'] == 1){
                                $i++;
                                ?>
                                <div id="ID-<?php echo $i; ?>" class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                                    <div class="property-item table-list">
                                        <div class="table-cell">
                                            <div class="figure-block">
                                                <figure class="item-thumb">

                                        <!--                                                   <span class="label-featured label label-success">Featured</span>-->

                                                    <div class="label-wrap label-right hide-on-list">
                                                        <span class="label-status label-status-8 label label-default"><?php
                                                            if ($property['type'] == 0) {
                                                                echo "For Buy";
                                                            } else {
                                                                echo "For Rent";
                                                            }
                                                            ?></span>                    </div>

                                                    <div class="price hide-on-list"><span class="item-price"><?php
                                                            if ($property['type'] == 1) {
                                                                echo "$" . number_format_short($property['price']) . "mo";
                                                            } else {
                                                                echo "$" . number_format_short($property['price']);
                                                            }
                                                            ?></span></div>
                                                    <a class="hover-effect property-img-thumb " href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>">
                                                        <img width="385" height="184" src="<?php
                                                        $image = "default.jpg";
                                                        if (!empty($property["images"][0]['image'])) {
                                                            $image = $property["images"][0]['image'];
                                                        } echo base_url() . 'uploads/properties/images/' . $image;
                                                        ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" /></a>
                                                    <ul class="actions">

                                                        <li>

                                                            <span style="color:greenyellow;" class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i></span>
                                                        </li>

                                                        <!--
                                                                                                                    <li>
                                                                                                                        <span data-toggle="tooltip" data-placement="top" title="(7) Photos">
                                                                                                                            <i class="fa fa-camera"></i>
                                                                                                                        </span>
                                                                                                                    </li>
                                                        
                                                                                                                    <li>
                                                                                                                        <span id="compare-link-416" class="compare-property" data-propid="416" data-toggle="tooltip" data-placement="top" title="Compare">
                                                                                                                            <i class="fa fa-plus"></i>
                                                                                                                        </span>
                                                                                                                    </li>-->
                                                    </ul>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="item-body table-cell">

                                            <div class="body-left table-cell">
                                                <div class="info-row">
                                                    <div class="label-wrap hide-on-grid">
                                                        <span class="label-status label-status-8 label label-default"><?php
                                                            if ($property['type'] == 0) {
                                                                echo "For Buy";
                                                            } else {
                                                                echo "For Rent";
                                                            }
                                                            ?></span>                    </div>
                                                    <h2 class="property-title"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>"><?php echo $property['location'] ?></a></h2>
                                                    <address class="property-address"><?php echo $property['city']; ?></address>                </div>
                                                <div class="info-row amenities hide-on-grid">
                                                    <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?>
                                                        <span>Sq M: <?php echo $property['property_size'] ?></span></p>                    
                                                    <p><?php echo $property['state'] ?></p>
                                                </div>

                                                <div class="info-row date hide-on-grid">
                                                    <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name']."  " ?></a> </p>
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
                                                        ?></span></div>

                                                <div class="info-row phone text-right">
                                                    <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                </div>
                                            </div>

                                            <div class="table-list full-width hide-on-list">
                                                <div class="cell">
                                                    <div class="info-row amenities">
                                                        <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?>
                                                         <span>Sq M: <?php echo $property['property_size'] ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="phone">
                                                        <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            <?php }  } }
                            else {
                                echo "<br><br><h3>No Properties added !</h3>";
                            }
                            
                            ?>
                        </div>
                    </div>
                    <!--end property items-->
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
                <aside id="sidebar" class="sidebar-white">
<!--                    <div id="houzez_featured_properties-6" class="widget widget_houzez_featured_properties"><div class="widget-top"><h3 class="widget-title">Featured Properties</h3></div>            


                        <div class="widget-body">

                            <div class="property-widget-slider slide-animated owl-carousel owl-theme">


                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">Featured</span>
                                            <div class="label-wrap label-right">
                                                <span class="label-status label-status-8 label label-default">For Rent</span>										</div>

                                            <a href="http://houzez01.favethemes.com/property/modern-apartment-on-the-bay-2/" class="hover-effect">
                                                <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-06.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px" />										</a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> $1,900.00&#47;mo</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="7 Photos">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>




                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">Featured</span>
                                            <div class="label-wrap label-right">
                                                <span class="label-status label-status-7 label label-default">For Sale</span><span class="label label-default label-color-289">Hot Offer</span>										</div>

                                            <a href="http://houzez01.favethemes.com/property/luxury-villa-with-pool/" class="hover-effect">
                                                <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px" />										</a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> $990,000.00</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="7 Photos">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>




                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">Featured</span>
                                            <div class="label-wrap label-right">
                                                <span class="label-status label-status-7 label label-default">For Sale</span>										</div>

                                            <a href="http://houzez01.favethemes.com/property/ample-apartment-at-last-floor-2/" class="hover-effect">
                                                <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-04.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px" />										</a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> $245,000.00</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="7 Photos">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>




                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">Featured</span>
                                            <div class="label-wrap label-right">
                                                <span class="label-status label-status-8 label label-default">For Rent</span><span class="label label-default label-color-289">Hot Offer</span>										</div>

                                            <a href="http://houzez01.favethemes.com/property/penthouse-apartment-2/" class="hover-effect">
                                                <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px" />										</a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> $9,000.00&#47;mo</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="7 Photos">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>




                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">Featured</span>
                                            <div class="label-wrap label-right">
                                                <span class="label-status label-status-7 label label-default">For Sale</span>										</div>

                                            <a href="http://houzez01.favethemes.com/property/luxury-apartment-bay-view/" class="hover-effect">
                                                <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-05.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px" />										</a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> $97,000.00</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span title="" data-placement="top" data-toggle="tooltip" data-original-title="13 Photos">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>



                            </div>

                        </div>


                    </div>-->
                    <div id="houzez_property_taxonomies-6" class="widget widget-categories">
                        <div class="widget-top"><h3 class="widget-title">Property Type</h3></div>
                        <div class="widget-body">
                            <ul class="children">
                                <?php foreach ($property_types as $property_type) { ?>
                                    <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_sale_properties?gfgd=') . base64_encode($property_type['id']); ?>"><?php echo ucfirst($property_type['name']); ?></a><span class="cat-count">(<?php echo $property_type_count[$property_type['name']]; ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
<!--                    <div id="houzez_property_taxonomies-6" class="widget widget-categories">
                        <div class="widget-top"><h3 class="widget-title">Contact Us</h3></div>
                        <div class="widget-body">
                            <div class="contact_text"></div>
                            <ul class="list-unstyled">
                                <?php //if(!empty($agent['address'])) { ?>
                                <li><i class="fa fa-location-arrow"></i> <?php //echo $agent['address']?></li>
                                <?php //} if(!empty($agent['office_number'])) { ?>
                                <li><i class="fa fa-phone"></i> Call us <?php //echo $agent['office_number']?></li>
                                <?php //} ?>
                            </ul>
                        </div>
                    </div>-->
                </aside>   
            </div>
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
                    $('#contact_user_error_validation1').text(data.message);
                    $('#contact_user_error_validation1').css({"font-size": "14px", "color": "green"});
                    $('#contact_info1 input').val('');
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
<style>
#contact_user_msg1:focus::-webkit-input-placeholder  {color:transparent;}
#contact_user_msg1:focus::-moz-placeholder   {color:transparent;}
#contact_user_msg1:-moz-placeholder   {color:transparent;}
</style>
