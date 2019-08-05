<?php //pre($offer_properties);die;   ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<style type="text/css">
  @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
   
    margin-top: 5px;
    text-align: left !important;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
    color: #219FD1;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
    margin-bottom: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
.Offers-price span{
    font-size: 15px;
    text-decoration: line-through;
    color: #8e8e8e;
    margin-left: 5px;
}
.Offers-price h1{
    color:#fbb838; 
}
</style>
<section class="offeres">
    <div class="banner-offer" style="background-image: url(<?php echo base_url("uploads/properties/offers/") . $offer_properties[0]['banner_image']; ?>)" >
    </div>
    <h1 class="offers-heding">Best Offers</h1>
    <div class="container-fluid" style="background-color: ">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <?php  if(!empty($offer_properties)){ 
                foreach ($offer_properties as $offer_property) { 
                ?>
                <div class="row offeres-row">
                    <div class="offer-list">
                        <div class="offer-wrap">
                            <div class="offer-img">
                                <img src="<?php
                                if (!empty($offer_property['images'])) {
                                   echo base_url("uploads/properties/images/").$offer_property['images'][0]['image'];
                                } else {
                                    echo base_url("uploads/properties/images/default.jpg");
                                }
                                ?>">
                            </div>
                            <div class="offer-contact">
                                <h1><?php echo ucfirst($offer_property['location']) ?></h1>
                                <h4><?php echo $offer_property['property_type'] ?></h4>
                                <p><?php echo $offer_property['description'] ?></p>
                            </div>
                            <div class="offer-price">
                                <?php if ($offer_property['discount'] > 0) { ?>
                                    <h5><?php echo "OMR " . number_format_short($offer_property['price']); ?></h5>
                                    <?php
                                    $price = $offer_property['price'];
                                    $discount = $offer_property['discount'];
                                    $discounted_price = $discount * $price / 100;
                                    $new_price = $price - $discounted_price;
                                    ?>
                                    <h1><span>OMR </span><?php echo number_format_short($new_price); ?></h1>
                                    <br>
                                <?php } else { ?>
                                    <h1><span>OMR </span><?php echo number_format_short($offer_property['budget']) ?></h1>
    <?php } ?>
                                <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($offer_property['fk_property_id']); ?>" class="btn btn-danger">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
        <div class="col-md-4 col-sm-4">
            <?php if(!empty($recent_views) && isset($recent_views)){ ?>
                    <div id="houzez_properties_viewed-4" class="widget widget_houzez_properties_viewed">
                        <div class="widget-top">
                            <h3 class="widget-title">Recently Viewed </h3>
                        </div>
                        <hr>
                        <div class="widget-body">
                            <?php  foreach($recent_views as $recent_view){ ?>
                            <div class="media">
                                <div class="media-left">
                                    <figure class="item-thumb">
                                        <a class="hover-effect" href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($recent_view['id']); ?>">
                                            <img width="150" height="110" src="<?php if(!empty($recent_view['images'])){ echo base_url('uploads/properties/images/').$recent_view['images'][0]['image'];} else { echo base_url('uploads/properties/images/default.jpg'); } ?> "></a>
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($recent_view['id']); ?>"><?php echo ucfirst($recent_view['property_name']); ?></a></h3>
                                    <h4> <?php echo "OMR ".number_format_short($recent_view['price']); ?></h4>
                                    <div class="amenities">
                                        <p><?php echo $recent_view['beds']; ?> beds • <?php echo $recent_view['beds']; ?> baths • <?php echo $recent_view['property_size']; ?> Sq M</p>
                                        <p><?php echo $recent_view['property_type']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
        </div> 
    </div>
</section>
<section style="margin-bottom: 50px;">
	<div class="container">
      <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3>
                    Best Offers</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                
                 <?php  
                 $i=0;
                 //$i1='active';
                 if(!empty($offer_properties)){ 
                 foreach ($offer_properties as $offer_property) { 
                 if($i==0){echo "<div class='item active'> <div class='row'>";}
                   else{     echo ($i%3==0?"<div class='item'>   <div class='row'>":"");} ?>
                
                       <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($offer_property['fk_property_id']); ?>"><img src="<?php if(!empty($offer_property['images'])) { echo base_url('uploads/properties/images/').$offer_property['images'][0]['image']; } else { echo base_url('uploads/properties/images/default.jpg');} ?>" class="img-responsive" alt="a" /></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                         
                                        <div class="price col-md-12">
                                            <h5><?php echo explode(',', $offer_property['location'])[0] ; ?> </h5>
                                            <div class="Offers-price">
                                                <?php $discount = $offer_property['discount']*$offer_property['price']/100;
                                                $price_after_dicount = $offer_property['price'] - $discount;
                                                ?> 
                                                <h1><?php echo "OMR ".$price_after_dicount; ?><span><?php echo "OMR ".$offer_property['price']; ?></span></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                
                         <?php 
                       if(($i%3==2))
                           {echo '</div> </div>';}      
                         $i++; 
                 }} ?>
                  
                
                
            </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
   
</script>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




