<?php //pre($properties); die; 
echo $this->load->view('custome_link/custome_css', array()); ?>
<link href="<?php echo base_url() . "web_assets/"; ?>css/emi_calc_css.css" rel="stylesheet" type="text/css" />
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<!--end header section header v1-->
<link href="<?php echo base_url() . "web_assets/"; ?>css/properties_css.css" rel="stylesheet" type="text/css" />


<style>
    /*    .map-interation{ background-color: #ccc;
        width: 100%;
        height: 500px;}
    */
    #map {
        height: 500px;
        width: 100%;
    }

</style>


<!--start advanced search section-->
<div class="advanced-search advance-search-header houzez-adv-price-range ">
    <div class="container">
        <div class="row" style="border: 1px solid #009bd6; padding: 12px 8px;  background: #009bd6;">
            <div class="col-sm-12">
                 <form method="post" autocomplete="off" action="">

                    <div class="form-group search-long">

                        <div class="search">
                            <div class="input-search input-icon">

                                <input id="pac-input" type="text" name="location_keyword" value="<?php if(isset($serch_inputs)){ echo $serch_inputs['location_keyword']; }?>"  class="form-control" placeholder="Search property by location">

<!--                                <input class="form-control" type="text" value="" name="keyword" placeholder="Enter keyword...">-->
                                <div id="auto_complete_ajax" class="auto-complete"></div>
                            </div>
                            <?php /* <select name="city" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Cities</option>
                                <?php foreach ($cities as $city) { ?>
                                    <option  value="<?php echo $city['city'] ?>" <?php if(isset($serch_inputs['city'])){ if($city['city']==$serch_inputs['city']){ echo 'selected';}}?>><?php echo $city['city'] ?></option>
                                <?php } ?>
                            </select>

                            <select name="state" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Areas</option>
                                <?php foreach ($states as $state) {
                                    ?>
                                    <option value="<?php echo $state['state'] ?>" <?php if(isset($serch_inputs['state'])){ if($state['state']==$serch_inputs['state']){ echo 'selected';}}?>><?php echo $state['state'] ?></option>
                                <?php } ?>
                            </select> */ ?>


                            <div class="advance-btn-holder">
                                <button class="advance-btn btn" type="button"><i class="fa fa-gear"></i> Advanced</button>
                            </div>

                        </div>
                        <div class="search-btn">
                            <button id="submit" name="submit" type="submit" class="btn btn-secondary">Go</button>
                        </div>
                    </div>


                    <div class="advance-fields">
                        <div class="row">

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" id="selected_status" name="is_sold" data-live-search="false" data-live-search-style="begins">
                                        <option value="" style="display: none;">All</option><option value="1" <?php if(isset($serch_inputs['is_sold'])){ if($serch_inputs['is_sold']==1){ echo 'selected';}}?>> Sold</option><option value="0" <?php if(isset($serch_inputs)){ if($serch_inputs['is_sold']==0){ echo 'selected';}}?>> Unsold</option></select>
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="property_type" data-live-search="false" data-live-search-style="begins">
                                        <option value="" style="display: none;">All Types</option>
                                        <?php foreach ($property_types as $property_type) {
                                            ?>
                                            <option value="<?php echo $property_type['id'] ?>" <?php if(isset($serch_inputs['property_type'])){ if($property_type['id']==$serch_inputs['property_type']){ echo 'selected';}}?> ><?php echo $property_type['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="beds" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="" style="display: none;">Beds</option>
                                        <?php for($i=1; $i<=10; $i++) {?>
                                        <option value="<?php echo $i ?>" <?php if(isset($serch_inputs['beds']) && $serch_inputs['beds']== $i){  echo 'selected';}?> ><?php echo $i ?></option>
                                        <?php } ?>
                                        <option value="">Any</option>                                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="baths" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="" style="display: none;">Baths</option>
                                        <?php for($i=1; $i<=10; $i++) {?>
                                        <option value="<?php echo $i ?>" <?php if(isset($serch_inputs['baths']) && $serch_inputs['baths']== $i){  echo 'selected';}?> ><?php echo $i ?></option>
                                        <?php } ?>
                                        <option value="any">Any</option>                                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <select name="area" id="area" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="" style="display: none;">Area</option>
                                        <option value="1" <?php if (isset($serch_inputs['square_ft_min']) && $serch_inputs['square_ft_min'] <= 600 ) { echo "Selected" ;}?>>0 - 600 sqm</option>
                                        <option value="2"<?php if (isset($serch_inputs['square_ft_min']) && $serch_inputs['square_ft_min'] > 600 ) { echo "Selected" ;}?>>> 600 sqm</option>                                    
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="square_ft_min" id="square_ft_min" value="<?php if (isset($serch_inputs['square_ft_min'])) { echo $serch_inputs['square_ft_min'];}?>">
                            <input type="hidden" name="square_ft_max" id="square_ft_max" value="<?php if (isset($serch_inputs['square_ft_max'])) { echo $serch_inputs['square_ft_max'];}?>">
                            

                            <div class="col-sm-6 col-xs-6">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" value="<?php if (isset($serch_inputs['price_min'])) {
    echo $serch_inputs['price_min'];
} ?>" name="price_min" id="price_min" class="min-price-range-hidden_rent range-input" readonly >
                                        <input type="hidden" value="<?php if (isset($serch_inputs['price_max'])) {
    echo $serch_inputs['price_max'];
} ?>" name="price_max" id="price_max" class="max-price-range-hidden_rent range-input" readonly >
                                        <p><span class="range-title">Price Range:</span> From <span class="min-price-range_rent"></span> to <span class="max-price-range_rent"></span></p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced_rent"></div>
                                    </div>
                                </div>
                            </div>

                            <!--                            <div class="col-sm-12 col-xs-12 features-list">
                            
                                                            <label class="advance-trigger text-uppercase title"><i class="fa fa-plus-square"></i> Other Features </label>
                                                            <div class="clearfix"></div>
                                                            <div class="field-expand">
                                                                <label class="checkbox-inline"><input name="feature[]" id="feature-air-conditioning" type="checkbox"  value="air-conditioning">Air Conditioning</label><label class="checkbox-inline"><input name="feature[]" id="feature-barbeque" type="checkbox"  value="barbeque">Barbeque</label><label class="checkbox-inline"><input name="feature[]" id="feature-dryer" type="checkbox"  value="dryer">Dryer</label><label class="checkbox-inline"><input name="feature[]" id="feature-gym" type="checkbox"  value="gym">Gym</label><label class="checkbox-inline"><input name="feature[]" id="feature-laundry" type="checkbox"  value="laundry">Laundry</label><label class="checkbox-inline"><input name="feature[]" id="feature-lawn" type="checkbox"  value="lawn">Lawn</label><label class="checkbox-inline"><input name="feature[]" id="feature-microwave" type="checkbox"  value="microwave">Microwave</label><label class="checkbox-inline"><input name="feature[]" id="feature-outdoor-shower" type="checkbox"  value="outdoor-shower">Outdoor Shower</label><label class="checkbox-inline"><input name="feature[]" id="feature-refrigerator" type="checkbox"  value="refrigerator">Refrigerator</label><label class="checkbox-inline"><input name="feature[]" id="feature-sauna" type="checkbox"  value="sauna">Sauna</label><label class="checkbox-inline"><input name="feature[]" id="feature-swimming-pool" type="checkbox"  value="swimming-pool">Swimming Pool</label><label class="checkbox-inline"><input name="feature[]" id="feature-tv-cable" type="checkbox"  value="tv-cable">TV Cable</label><label class="checkbox-inline"><input name="feature[]" id="feature-washer" type="checkbox"  value="washer">Washer</label><label class="checkbox-inline"><input name="feature[]" id="feature-wifi" type="checkbox"  value="wifi">WiFi</label><label class="checkbox-inline"><input name="feature[]" id="feature-window-coverings" type="checkbox"  value="window-coverings">Window Coverings</label>                                </div>
                                                        </div>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="section-body" class="">

    <div id="map"></div>
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
                    <ol class="breadcrumb"><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="<?php echo site_url('web_panel/home');?>"><span itemprop="title">Home</span></a></li><li>For Rent</li></ol>            <div class="page-title-left">
                        <h2>For Rent</h2>
                    </div>
                    <div class="page-title-right">
                        <div class="view">
                            <div class="sort-tab table-cell">
                                <form method="post" accept-charset="" id="order_by" >
<!--                               <input type="hidden" id='last_query' value="<?php //echo $last_query;?>">-->
                                    Sort by:<select id="sort_properties" class="selectpicker bs-select-hidden" name="order_by" title="" data-live-search-style="begins" data-live-search="false">
                                        <?php ?><option value="">Default Order</option>


                                        <option class="sort_property" value="re_properties.price__asc">Price (Low to High)</option>
                                        <option class="sort_property" value="re_properties.price__desc">Price (High to Low)</option>
                                        <option class="sort_property" value="re_properties.create_date__asc">Date Old to New</option>
                                        <option class="sort_property" value="re_properties.create_date__desc">Date New to Old</option>
                                    </select>
                                </form>
                            </div>

                            <div class="table-cell hidden-xs">
                                <span class="view-btn btn-list active"><i class="fa fa-th-list"></i></span>
                                <span class="view-btn btn-grid "><i class="fa fa-th-large"></i></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
                <div id="content-area">

                    <!--start featured property items-->
                    <div id="refresh_div">
                    <div class="property-listing list-view">
                        <div class="row" style="margin-bottom:30px;">

                            <?php
                            $i = '415';
                            if(!empty($properties)){
                            foreach ($properties as $property) {
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
                                                            if ($property['type'] == 0) {
                                                                echo "OMR " . number_format_short($property['price']) . "mo";
                                                            } else {
                                                                echo "OMR " . number_format_short($property['price']);
                                                            }
                                                            ?></span></div>
                                                    
                                                    <a class="hover-effect property-img-thumb " href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>">
                                                        <img width="385" height="184" src="<?php if(!empty($property['images'])){ echo base_url('uploads/properties/images/').$property['images']['0']['image'];} else{ echo base_url('uploads/properties/images/default.jpg'); } ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" /></a>
                                                    <ul class="actions">

                                                        <li>

                                                            <span style="color:greenyellow; " class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i></span>
                                                        </li>
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
                                                    <h2 class="property-title"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>"><?php echo $property['property_name'] ?></a></h2>
                                                    <address class="property-address"><?php echo $property['city']; ?></address>
                                                    <small style="color:#999" class="property-address"><?php echo $property['property_type']; ?></small>
                                                </div>
                                                <div class="info-row amenities hide-on-grid">
                                                    <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?>
                                                        <span>Sq M: <?php echo $property['property_size'] ?></span></p>                    
                                                    <p><?php echo $property['state'] ?></p>
                                                </div>

                                                <div class="info-row date hide-on-grid">
                                                    <?php if(isset($property['agent_detail']['name'])){?>
                                                    <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name']."  "; ?></a> </p>
                                                    <?php }?>
                                                    <p style="margin-left:10px;"><i class="fa fa-phone"></i><?php echo $property['property_contact_no'] ?></p>
                                                    <p><i class="fa fa-calendar"></i><?php echo $property['agent_detail']['posted_date'] ?></p>
                                                </div>

                                            </div>
                                            <div class="body-right table-cell hidden-gird-cell">

                                                <div class="info-row price"><span class="item-price"><?php
                                                        if ($property['type'] == 1) {
                                                            echo "OMR " . number_format_short($property['price']) . "/mo";
                                                        } else {
                                                            echo "OMR " . number_format_short($property['price']);
                                                        }
                                                        ?></span></div>

                                                <div class="info-row phone text-right">
                                                    <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary">Details</a>
                                                </div>
                                            </div>

                                            <div class="table-list full-width hide-on-list">
                                                <div class="cell">
                                                    <div class="info-row amenities">
                                                        <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?><span>Sq M: <?php echo $property['property_size'] ?></span></p><p><?php echo $property['state'] ?></p>

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
                            <?php } } } else{ echo "<h3>Couldn't find anything matching your search criteria!</h3>";} ?>
                        </div>
                    </div>
                    </div>
                    <!--end featured property items-->
                 
                    <?php if(isset($pagination_show)){ ?><center>
                      <div id="text-center" >
                      <!-- Show pagination links -->
                      <?php
                      foreach ($links as $link) {
                      echo $link;
                      }
                      ?>
                      </div>
                      </center><?Php  } ?>
                    
                    
                </div>
            </div>

            <!-- end container-content -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
                <aside id="sidebar" class="sidebar-white">
                    <div id="houzez_property_taxonomies-11" class="widget widget-categories">
                        <div class="widget-top">
                            <h3 class="widget-title">Property Status</h3>
                            <hr>
                        </div>
                        <div class="widget-body">
                            <ul class="children">
                                <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_rent_properties'); ?>">For Rent</a><span class="cat-count">(<?php echo $type_count['rent']; ?>)</span></li>
                                <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_sale_properties'); ?>">For Buy</a><span class="cat-count">(<?php echo $type_count['buy']; ?>)</span></li>
                            </ul>
                        </div>
                    </div>
                    <div id="houzez_property_taxonomies-12" class="widget widget-categories">
                        <div class="widget-top">
                            <h3 class="widget-title">Property Type</h3>
                            <hr>
                        </div>
                        <div class="widget-body">
                            <ul class="children">
                                <?php foreach ($property_types as $property_type) { ?>
                                    <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_rent_properties?gfgd=') . base64_encode($property_type['id']); ?>"><?php echo ucfirst($property_type['name']); ?></a><span class="cat-count">(<?php echo $property_type_count[$property_type['name']]; ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(!empty($recent_views) && isset($recent_views)){ ?>
                    <div id="houzez_properties_viewed-4" class="widget widget_houzez_properties_viewed">
                        <div class="widget-top">
                            <h3 class="widget-title">Recently Viewed </h3>
                        </div>
                        <hr>
                        <div class="widget-body">
                            <?php foreach($recent_views as $recent_view){ ?>
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
                            <p><?php if($recent_view['property_type_id'] != 1 && $recent_view['property_type_id'] != 4 && $recent_view['property_type_id'] != 10){ echo $recent_view['beds']; ?> beds • <?php echo $recent_view['beds']; ?> baths • <?php } echo $recent_view['property_size']; ?> Sq M</p>
                                        <p><?php echo $recent_view['property_type']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if(!empty($featured)){ //pre($featured); ?>
                    <div id="houzez_featured_properties-13" class="widget widget_houzez_featured_properties"><div class="widget-top"><h3 class="widget-title">Featured Properties</h3></div>            
                        <div class="widget-body">
                            <div class="property-widget-slider slide-animated owl-carousel owl-theme">
                                <?php foreach ($featured as $feature) {
                                    if($feature['status'] == 1){ ?>
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
                                                    <img width="385" height="184" src="<?php if(!empty($feature['images'])){echo base_url('uploads/properties/images/').$feature['images'][0]['image'];} else{ echo base_url('uploads/properties/images/default.jpg');} ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" /></a>
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

                                <?php } } ?>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </aside>    
            </div> <!-- end container-sidebar -->

        </div>

    </div> <!--.container Start in header-->
</div> <!--Start in header end #section-body-->

<button class="scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>


<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->
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
            url: "<?php echo base_url('index.php/web_panel/Properties/emi_calculator')?>",
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
                if (data.status) {
                    $('#emi_calculator_form input');
                } else {
                    $('#emi_calculator_error_validation').text(data.message);
                    $('#emi_calculator_error_validation').css({"font-size": "14px", "color": "red"});
                    $('#emi_value').hide();
                }
            }
        });
    });</script>
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
<script type="text/javascript">
    function reverseEMI(obj) {
        //alert('aaf');

        if (!isNaN(obj.value) && obj.value.length !== 0) {

        var emi = 0;
                var P = 0;
                var n = 1;
                var r = 0;
                if ($("#loan_amount").val() !== "")
                emi = parseFloat($("#number").val());
                if ($("#loan_amount").val() !== "")
                P = parseFloat($("#loan_amount").val());
                if ($("#interest_rate").val() !== "")
                r = parseFloat(parseFloat($("#interest_rate").val()) / 100);
                emi = (P * r / 12) * [Math.pow((1 + r / 12), n)] / [Math.pow((1 + r / 12), n) - 1];
                n = ;
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
            });</script>

</body>


<script>
    
            
    var map;
    function initMap() {
        
        if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPositionn);
                //alert(position);
            } else { 
                var error = "Geolocation is not supported by this browser.";
                var lat =  '23.572705'; 
                var long =  '58.413877';
            }
    function showPositionn(position) {
    <?php $i = 0; if(!empty($properties)) { foreach ($properties as $property) {
        $propID = base64_encode($property['id']);
        if ($property['latitude'] != null && $property['status'] == 1) { ?>
           var lat = <?php echo $property['latitude']; ?>;
           var long = <?php echo $property['longitude']; ?>;
           var a<?php echo $i; ?> = {
                       info: '<strong> <?php echo $property['property_name']; ?></strong><br>\
                              <?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><strong>Beds:</strong><?php echo $property['beds'] . "   "; ?><strong>Baths:</strong><?php echo $property['baths']; ?><br>\<?php } ?>
           <img height="120" width="160" src="<?php if (!empty($property['images'])) { echo base_url('uploads/properties/images/') . $property['images'][0]['image']; } else { echo base_url('uploads/properties/images/default.jpg'); } ?> "><br>\
           <?php echo explode(',', $property['location'])[0] . ", "; ?> <?php echo $property['city']; ?><br><br>\
           <center><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo $propID; ?>">View Details</a></center>',           
               lat: lat,
               long: long
               };
    <?php } $i++; } } else { ?>
            var lat =  position.coords.latitude; 
            var long =  position.coords.longitude;
    <?php } ?>
        var locations = [
    <?php $i = 0; foreach ($properties as $property) {
        if ($property['latitude'] != null) { ?>
            [a<?php echo $i ?>.info, a<?php echo $i ?>.lat, a<?php echo $i ?>.long, <?php echo $i ?>],
    <?php } $i++; } ?>];
   
        var search_lat = '<?php echo $home_latitude; ?>';
        if (search_lat !== '') {

            //alert('if');
            var curr_latitude = "<?php echo $home_latitude; ?>";
            var curr_longitude = "<?php echo $home_longitude; ?>";

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: new google.maps.LatLng(curr_latitude, curr_longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var infowindow = new google.maps.InfoWindow({});
            var marker, i;
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }


            var input = document.getElementById('pac-input');

            var autocomplete = new google.maps.places.Autocomplete(input);

            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(false);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
           
            document.getElementById('use-strict-bounds')
                    .addEventListener('click', function () {
                        console.log('Checkbox clicked! New state=' + this.checked);
                        autocomplete.setOptions({strictBounds: this.checked});
                    });




        }
        if (search_lat === '') {
            //alert('else');
            
        if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                var error = "Geolocation is not supported by this browser.";
                alert(error);
                var cur_latitude =  '23.572705'; 
                var cur_longitude =  '58.413877';
            }


            function showPosition(position) {
                //var lat =  position.coords.latitude; 
                //var long =  position.coords.longitude;
                //alert(lat);alert(long);
            }
                var cur_latitude = position.coords.latitude;
                var cur_longitude = position.coords.longitude;
                
                
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: new google.maps.LatLng(cur_latitude, cur_longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                
                var infowindow = new google.maps.InfoWindow({});
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                var input = document.getElementById('pac-input');

                var autocomplete = new google.maps.places.Autocomplete(input);

                // Bind the map's bounds (viewport) property to the autocomplete object,
                // so that the autocomplete requests use the current map bounds for the
                // bounds option in the request.
                autocomplete.bindTo('bounds', map);

                var infowindow = new google.maps.InfoWindow();
                var infowindowContent = document.getElementById('infowindow-content');
                infowindow.setContent(infowindowContent);
                var marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29)
                });

                autocomplete.addListener('place_changed', function () {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        // User entered the name of a Place that was not suggested and
                        // pressed the Enter key, or the Place Details request failed.
                        window.alert("No details available for input: '" + place.name + "'");
                        return;
                    }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);  // Why 17? Because it looks good.
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(false);

                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }

                    infowindowContent.children['place-icon'].src = place.icon;
                    infowindowContent.children['place-name'].textContent = place.name;
                    infowindowContent.children['place-address'].textContent = address;
                    infowindow.open(map, marker);
                });

                // Sets a listener on a radio button to change the filter type on Places
                // Autocomplete.
                document.getElementById('use-strict-bounds')
                        .addEventListener('click', function () {
                            console.log('Checkbox clicked! New state=' + this.checked);
                            autocomplete.setOptions({strictBounds: this.checked});
                });
            
        }
    }
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM6n4Yg0U4IcvZTx6qCF3dCPax9xjvnfk&libraries=places&callback=initMap"
async defer></script>
<script>
    $('#area').change(function () {
        var val = $('#area').val();
        if (val == 1) {
            $('#square_ft_min').val('0');
            $('#square_ft_max').val('600');
        }
        if (val == 2) {
            $('#square_ft_min').val('601');
            $('#square_ft_max').val('');
        }
    });
        
  $('#sort_properties').change( function(){
     var sorted_element = $('#sort_properties').find(":selected").val();
     
     var type = 1;
     var keyword = $('#pac-input').val();
     var city = $('#city').find(":selected").val();
     var state = $('#state').find(":selected").val();
     var is_sold = $('#selected_status').find(":selected").val();
     var property_type = $('.property_type').find(":selected").val();
     var beds = $('#beds').val();
     var baths = $('#baths').val();
     var square_ft_min = $('#square_ft_min').val();
     var square_ft_max = $('#square_ft_max').val();
     var price_min = $('#price_min').val();
     var price_max = $('#price_max').val();
     
     //alert(price_min); alert(price_max);
     
     //alert(city);alert(state);alert(is_sold);alert(type);alert(beds);alert(baths);alert(square_ft_min);alert(price_min); exit;
     
     //var last_query = $('#last_query').val();
     //alert(sorted_element); alert(last_query); exit;
      jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/ajax_sort_properties'); ?>",
            method: 'POST',
            data: {
              type: type,
              sorted_element : sorted_element,
              keyword: keyword,
              city : city,
              state : state,
              is_sold : is_sold,
              property_type : property_type,
              beds : beds,
              baths : baths,
              square_ft_min : square_ft_min,
              square_ft_max : square_ft_max,
              price_min : price_min,
              price_max : price_max
            },

            success: function (response) {
                if (response) {
                    //alert(response);
                    $('#refresh_div').empty();
                    $('#refresh_div').html(response);
                    
                }
            }
        }); 
  });


</script>



</html>










