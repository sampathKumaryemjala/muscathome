<?php  if(!empty($offers)) { ?>
<div class="houzez-module-main module-white-bg">
    <div class="houzez-module module-title text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h2>Best Offers and Deals</h2>
                    <h3 class="sub-heading">One stop for your housing solutions</h3>
                </div>
            </div>
        </div>
    </div>
    <div id="location-modul" class="houzez-module location-module grid">
        <div class="container">
            <div class="row">
                <?php
                $i = 0;
                if (!empty($offers[$i]) && $offers[$i][0]) {
                    $total = count($offers[$i]);
                    ?>
                    <div class="col-sm-4">
                            <!-- <img src="<?php echo base_url() . "web_assets/"; ?>images/offer1.png" alt="offer1" style="position: absolute; z-index: 2; width: 40%; height: 40%;"> -->
                        <div class="location-block">
                            <div class="overlocation">
                                <h1 style="font-size: 32px; color: #de4747;"><?php echo ucfirst($offers[$i][$i]['title']); ?></h1>
                                <p class="sub-heading">Save up to</p>
                                <h3 class="heading" style="color: #009bd6; font-size: 35px;"><?php echo $offers[$i][$i]['discount'] . " %"; ?></h3>
                                <p class="sub-heading"><?php echo $total; ?> Properties</p>    
                                <!-- <figcaption class="location-fig-caption">
                                </figcaption> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="location-block">
                            <figure>
                                <a href="<?php echo base_url('index.php/web_panel/Offers/latest_offers?jyfh=') . base64_encode($offers[$i][$i]['id']); ?>">
                                    <img src="<?php echo base_url('uploads/properties/offers/') . $offers[$i][$i]['banner_image']; ?>" width="770" height="370" alt="Loft">
                                </a>
                                <div class="location-fig-caption">
                                    <h3 class="heading"><?php echo ucfirst($offers[$i][$i]['title']); ?></h3>
                                    <!-- <p class="sub-heading">1 Property</p> -->
                                </div>
                            </figure>
                        </div>
                    </div>
                <?php }
                $j = 1;
                if (!empty($offers[$j]) && $offers[$j][0]) {
                    $total = count($offers[$j]);
                    ?>
                    <div class="col-sm-8">
                        <div class="location-block">
                            <figure>
                                <a href="<?php echo base_url('index.php/web_panel/Offers/latest_offers?jyfh=') . base64_encode($offers[$j][0]['id']); ?>">
                                    <img src="<?php echo base_url('uploads/properties/offers/') . $offers[$j][0]['banner_image']; ?>" width="770" height="370" alt="Loft">
                                </a>
                                <div class="location-fig-caption">
                                    <h3 class="heading"><?php echo ucfirst($offers[$j][0]['title']); ?></h3>
                                    <!-- <p class="sub-heading">1 Property</p> -->
                                </div>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- <img src="<?php echo base_url() . "web_assets/"; ?>images/offer1.png" alt="offer1" style="position: absolute; z-index: 2; width: 40%; height: 40%;"> -->
                        <div class="location-block">
                            <div class="overlocation">
                                <h1 style="font-size: 32px; color: #de4747;"><?php echo ucfirst($offers[$j][0]['title']); ?></h1>
                                <p class="sub-heading">Save up to</p>
                                <h3 class="heading" style="color: #009bd6; font-size: 35px;"><?php echo $offers[$j][0]['discount'] . " %"; ?></h3>
                                <p class="sub-heading"><?php echo $total; ?> Properties</p>    
                                <!-- <figcaption class="location-fig-caption">
                                </figcaption> -->
                            </div>
                        </div>
                    </div>
<?php } ?>
            </div>
        </div>
    </div>
    <center><a href="<?php echo base_url('index.php/web_panel/offers/all_offers')?>" class="btn btn-info">View More</a></center>
 <br>
</div>
<?php  } ?>