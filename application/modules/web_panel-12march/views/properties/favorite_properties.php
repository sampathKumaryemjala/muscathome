
<?php //pre($properties);die;   
if ($this->router->fetch_method() != "index") { //pre($this->session->userdata);
            if (empty($this->session->userdata['active_user_data'])) { //die('w');
                redirect('web_panel/Home');
            }
        }
?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<link href="<?php echo base_url() . "web_assets/"; ?>css/emi_calc_css.css" rel="stylesheet" type="text/css" />
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<!--end header section header v1-->
<link href="<?php echo base_url() . "web_assets/"; ?>css/properties_css.css" rel="stylesheet" type="text/css" />




<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=217780371604666";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>

<!--start advanced search section-->
<!--<div class="advanced-search advance-search-header houzez-adv-price-range " data-sticky='1'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" autocomplete="off" action="">

                    <div class="form-group search-long">

                        <div class="search">
                            <div class="input-search input-icon">
                                <input class="form-control" type="text" value="" name="keyword" placeholder="Enter keyword...">
                                <div id="auto_complete_ajax" class="auto-complete"></div>
                            </div>




                            <select name="city" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Cities</option>
<?php foreach ($cities as $city) {
    ?>
                                        <option value="<?php echo $city['city'] ?>"><?php echo $city['city'] ?></option>
<?php } ?>
                            </select>

                            <select name="state" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Areas</option>
<?php foreach ($states as $state) {
    ?>
                                        <option value="<?php echo $state['state'] ?>"><?php echo $state['state'] ?></option>
<?php } ?>
                            </select>


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
                                        <option value="">All</option><option value="1"> Sold</option><option value="0"> Unsold</option></select>
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="property_type" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Types</option>
<?php foreach ($property_types as $property_type) {
    ?>
                                                <option value="<?php echo $property_type['id'] ?>"><?php echo $property_type['name'] ?></option>
<?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="beds" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Beds</option>
                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="any">Any</option>                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="baths" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Baths</option>
                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="any">Any</option>                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="square_ft_min" placeholder="Min Area (sqft)">
                                </div>
                            </div>

                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="square_ft_max" placeholder="Max Area (sqft)">
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-6">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" name="price_min" class="min-price-range-hidden range-input" readonly >
                                        <input type="hidden" name="price_max" class="max-price-range-hidden range-input" readonly >
                                        <p><span class="range-title">Price Range:</span> From <span class="min-price-range"></span> to <span class="max-price-range"></span></p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>
                            </div>

                                                        <div class="col-sm-12 col-xs-12 features-list">
                            
                                                            <label class="advance-trigger text-uppercase title"><i class="fa fa-plus-square"></i> Other Features </label>
                                                            <div class="clearfix"></div>
                                                            <div class="field-expand">
                                                                <label class="checkbox-inline"><input name="feature[]" id="feature-air-conditioning" type="checkbox"  value="air-conditioning">Air Conditioning</label><label class="checkbox-inline"><input name="feature[]" id="feature-barbeque" type="checkbox"  value="barbeque">Barbeque</label><label class="checkbox-inline"><input name="feature[]" id="feature-dryer" type="checkbox"  value="dryer">Dryer</label><label class="checkbox-inline"><input name="feature[]" id="feature-gym" type="checkbox"  value="gym">Gym</label><label class="checkbox-inline"><input name="feature[]" id="feature-laundry" type="checkbox"  value="laundry">Laundry</label><label class="checkbox-inline"><input name="feature[]" id="feature-lawn" type="checkbox"  value="lawn">Lawn</label><label class="checkbox-inline"><input name="feature[]" id="feature-microwave" type="checkbox"  value="microwave">Microwave</label><label class="checkbox-inline"><input name="feature[]" id="feature-outdoor-shower" type="checkbox"  value="outdoor-shower">Outdoor Shower</label><label class="checkbox-inline"><input name="feature[]" id="feature-refrigerator" type="checkbox"  value="refrigerator">Refrigerator</label><label class="checkbox-inline"><input name="feature[]" id="feature-sauna" type="checkbox"  value="sauna">Sauna</label><label class="checkbox-inline"><input name="feature[]" id="feature-swimming-pool" type="checkbox"  value="swimming-pool">Swimming Pool</label><label class="checkbox-inline"><input name="feature[]" id="feature-tv-cable" type="checkbox"  value="tv-cable">TV Cable</label><label class="checkbox-inline"><input name="feature[]" id="feature-washer" type="checkbox"  value="washer">Washer</label><label class="checkbox-inline"><input name="feature[]" id="feature-wifi" type="checkbox"  value="wifi">WiFi</label><label class="checkbox-inline"><input name="feature[]" id="feature-window-coverings" type="checkbox"  value="window-coverings">Window Coverings</label>                                </div>
                                                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->

<div id="section-body" class="">


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
                    <ol class="breadcrumb"><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="<?php echo base_url('index.php/web_panel/Home'); ?>"><span itemprop="title">Home</span></a></li><li>Favorite Properties</li></ol>            <div class="page-title-left">
                        <h2>Favorite Properties</h2>
                    </div>
                    <div class="page-title-right">
                        <div class="view">
                            <!--                            <div class="sort-tab table-cell">
                                                            Sort by:                            <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                                                                <option value="">Default Order</option>
                                                                <option  value="a_price">Price (Low to High)</option>
                                                                <option  value="d_price">Price (High to Low)</option>
                                                                <option  value="featured">Featured</option>
                                                                <option  value="a_date">Date Old to New</option>
                                                                <option  value="d_date">Date New to Old</option>
                                                            </select>
                                                        </div>-->

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
                    <?php if (!empty($properties)) { ?>
                        <div class="property-listing list-view">
                            <div class="row">

                                <?php
                                $i = 0;
                                foreach ($properties as $property) {
                                    if($property['status'] == 1){
                                    $i++;
                                    ?>
                                    <div id="ID-<?php echo $i; ?>" class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                                        <div class="property-item table-list">
                                            <div class="table-cell">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">

                        <!--                                                    <span class="label-featured label label-success">Featured</span>-->

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
                                                            <img width="385" height="184" src="<?php if(!empty($property['images'])){ echo base_url('uploads/properties/images/').$property['images']['0']['image'];} else{ echo base_url('uploads/properties/images/default.jpg'); } ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""/></a>
                                                        <ul class="actions">

                                                            <li>

                                                                <span style="color:greenyellow;" class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i></span>
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
                                                        <h2 class="property-title"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>"><?php echo $property['location'] ?></a></h2>
                                                        <address class="property-address"><?php echo $property['city']; ?></address>                
                                                        <small style="color:#999" class="property-address"><?php echo $property['property_type']; ?></small>
                                                    </div>
                                                    <div class="info-row amenities hide-on-grid">
                                                        <p><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span>
                                                            <span>Sq M: <?php echo $property['property_size'] ?></span></p>                    
                                                        <p><?php echo $property['state'] ?></p>
                                                    </div>

                                                    <div class="info-row date hide-on-grid">
                                                        <?php if(isset($property['agent_detail']['name'])){?>
                                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name']."  "; ?></a> </p>
                                                        <?php } ?>
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
                                                        <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="table-list full-width hide-on-list">
                                                    <div class="cell">
                                                        <div class="info-row amenities">
                                                            <p><span class="h-beds">Beds: <?php echo $property['beds'] ?></span><span  class="h-baths">Baths: <?php echo $property['baths'] ?></span><span class="h-area">Sq M: <?php echo $property['property_size'] ?></span></p><p><?php echo $property['state'] ?></p>

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
                                <?php } } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <h3>No favorite added yet !</h3>

                    <?php } ?>
                    <!--end featured property items-->
                    <?php
                    if (count($properties) > 8) {
                        $pages = round(count($properties) / 8);
                        ?>

                        <!--start Pagination-->
<!--                        <div class="pagination-main ">
                            <ul class="pagination">
                                <li class="disabled">
                                    <a aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="fa fa-angle-left"></i>
                                        </span></a>
                                </li>
                                <li class="active"><a data-houzepagi="1" href="#">1 <span class="sr-only"></span></a></li>
                                <?php //for ($i = 1; $i < $pages; $i++) {
                                    ?>
                                    <li><a data-houzepagi="2" href="">2</a></li>
                                <?php //} ?> 
                                <li><a data-houzepagi="2" rel="Next" href="#"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                            </ul>
                        </div>            start Pagination-->

                    <?php } ?>
                </div>
            </div>
            <!-- end container-content -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
                <aside id="sidebar" class="sidebar-white">
                    <div id="houzez_mortgage_calculator-5" class="widget widget-calculate"><div class="widget-top"><h3 class="widget-title">Calculator Repayments</h3></div>
                        <div class="widget-body">
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
                    </div>
                  
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
                                                    <span class="label-status label-status-8 label label-default"><?php if ($feature['type'] == 1) {
                                    echo "For Rent";
                                } else {
                                    echo "For Buy";
                                } ?></span>										</div>

                                                <a href="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=') . base64_encode($feature['id']) ?>" class="hover-effect">
                                                    <img width="385" height="184" src="<?php if(!empty($feature['images'])){echo base_url('uploads/properties/images/').$feature['images'][0]['image'];} else{ echo base_url('uploads/properties/images/default.jpg');} ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""  /></a>
                                                <figcaption class="thumb-caption">
                                                    <div class="cap-price pull-left">OMR <?php echo number_format_short($feature['price']); ?><?php if ($feature['type'] == 1) {
                                    echo "&#47;mo";
                                } ?></div>
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
                    
                    
                    <div id="houzez_property_taxonomies-11" class="widget widget-categories">
                        <div class="widget-top">
                            <h3 class="widget-title">Property Status</h3>
                            <hr>
                        </div>
                        <div class="widget-body"><ul class="children">
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
                                    <li><a href="<?php echo base_url('index.php/web_panel/Properties/for_sale_properties?gfgd=') . base64_encode($property_type['id']); ?>"><?php echo ucfirst($property_type['name']); ?></a><span class="cat-count">(<?php echo $property_type_count[$property_type['name']]; ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    
                    <?php if(!empty($recent_views)){ ?>
                    <div id="houzez_properties_viewed-4" class="widget widget_houzez_properties_viewed">
                        <div class="widget-top">
                            <h3 class="widget-title">Recently Viewed </h3>
                        </div>
                        <div class="widget-body">
                            <?php foreach($recent_views as $recent_view){ ?>
                            <div class="media">
                                <div class="media-left">
                                    <figure class="item-thumb">
                                         <a class="hover-effect" href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($recent_view['id']); ?>">
                                            <img width="150" height="110" src="<?php if(!empty($recent_view['images'])){ echo base_url('uploads/properties/images/').$recent_view['images'][0]['image'];} else { echo "http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-10-150x110.jpg";}?>" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-10-150x110.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-10-380x280.jpg 380w" sizes="(max-width: 150px) 100vw, 150px" />								</a>
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
                  <?php }?>
                    
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
            url: "http://localhost/real_estate_ec2_server/index.php/web_panel/Properties/emi_calculator",
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
            });
</script>



<script>
    $(".addfav").click(function () {
        var id = $(this).data('id');
        //alert(id);
        $(".addfav").toggleClass('fa-heart-o fa-heart');
    });
</script>


</body>

</html>










