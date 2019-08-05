<?php  if(!empty($properties_sale)) { ?>
<form method="post">
    <input type="hidden" name="for_sale" id="for_sale" value="0" >
  </form>

<style> .fix-image-size{   height: 244px;}</style>
<div class="houzez-module-main">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>Latest for Buy</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-1-prev">Prev</button>
                                    <button class="btn btn-sm btn-crl-pprt-1-next">Next</button>
                                    <a href="<?php echo base_url('index.php/web_panel/Properties/for_sale_properties'); ?>" class="btn btn-carousel btn-sm redirect_to_all">All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-1 slide-animated">
                                    <?php //pre($properties_sale); 
                                    foreach($properties_sale as $property){
                                         if($property['status'] == 1){?>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default"><?php if($property['type']== 0){ echo "For Sale";} else {echo "For Rent";} ?></div>
                                                        </div>
                                                        <?php if($property['is_featured'] == 1) { ?>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=').base64_encode($property['id']); ?>" class="hover-effect fix-image-size">
                                                            <img style="height: 100%;" src="<?php if(!empty($property["images"])){echo base_url('uploads/properties/images/').$property["images"][0]['image']; } else{ echo base_url('uploads/properties/images/default.jpg'); } ?>" alt="thumb">
                                                        </a>
                                                        <ul class="actions">
<!--                                                            <li class="share-btn">
                                                                <div class="share_tooltip fade">
                                                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                                    <a href="#"  target="_blank"><i class="fa fa-google-plus"></i></a>
                                                                    <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                                </div>
                                                                <span data-toggle="tooltip" data-placement="top" title="share"><i class="fa fa-share-alt"></i></span>
                                                            </li>-->
                                                            <li>
                                                                <span data-toggle="tooltip" data-placement="top" title="Favorite"class="add_fav" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>">
                                                                    <i style="color:greenyellow; padding: 8px;" data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i>
                                                                </span>
                                                            </li>
<!--                                                            <li>
                                                                <span data-toggle="tooltip" data-placement="top" title="Photos (12)">
                                                                    <i class="fa fa-camera"></i>
                                                                </span>
                                                            </li>-->
                                                        </ul>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <!-- <div class="rating">
                                                                <span class="bottom-ratings"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span style="width: 70%" class="top-ratings"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></span></span>
                                                                <span class="star-text-right">15 Ratings</span>
                                                            </div> -->
                                                            <div class="price hide-on-list" style="width: 50%; float: right;">
                                                            <h3 style="color: #fbb838; font-weight: bold;">OMR <?php echo number_format_short($property['price']); ?></h3>
                                                            </div>
                                                            <h2 class="property-title"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>"><?php echo $property['location']; ?></a></h2>
                                                            <h4 class="property-location"><?php echo $property['addresss']; ?></h4>
                                                        </div>
                                                        <div class="table-list full-width info-row" style="margin-top: 10px !important">
                                                            <div class="cell" style="width: 100%;">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span><i class="fa fa-bed" aria-hidden="true"></i> Beds: <?php echo $property['beds']; ?></span>
                                                                        <span><i class="fa fa-tint" aria-hidden="true"></i> Baths: <?php echo $property['baths']; ?></span><?php } ?>
                                                                        <span><i class="fa fa-area-chart" aria-hidden="true"></i> Sqft: <?php echo $property['property_size']; ?></span>
                                                                    </p>
                                                                    <h5><strong><?php echo $property['property_type']; ?></strong></h5>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <div class="phone">
                                                                    <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary">Details</a>
<!--                                                                    <p><a href="#">+1 (786) 225-0199</a></p>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p><i class="fa fa-user"></i> <a href="<?php  echo base_url('index.php/web_panel/Agents?xcvc=').base64_encode($property['fk_agent_id']);?>"><?php if(isset($property['agent_detail']['name'])){ echo ucfirst($property['agent_detail']['name']);} ?></a></p>
                                                </div>
                                                <div class="item-foot-right">
                                                    <p><i class="fa fa-calendar"></i> <?php echo $property['agent_detail']['posted_date']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php  } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
window.onload = function(){
  document.forms.submit();
}
</script>

<?php } ?>