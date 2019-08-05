<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php $this->session->flashdata('error'); ?>


<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<div class="modal fade" id="pop-login" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li id="login_tab" class="active">Login</li>
                    <li id="reg_tab">User</li>
                    <li>Agents</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>

            </div>
            <div class="modal-body login-block">
                <div class="tab-content">
                    
                    <div class="tab-pane fade in active">
                        <div class="message">
                            <!--<p class="error text-danger"><i class="fa fa-close"></i> You are not Logedin</p>
                            <p class="success text-success"><i class="fa fa-check"></i> You are not Logedin</p> -->
                        </div>
                        <form id="login_users">
                            <span id="login_user_error_validation"></span>
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input type="text" placeholder="Username" id="login_users_username">
                                </div>
                                <div class="input-pass input-icon">
                                    <input type="password" placeholder="Password" id="login_users_password">
                                </div>
                            </div>
                            <div class="forget-block clearfix">
                                <div class="form-group pull-left">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#pop-reset-pass">I forgot username and password</a>
                                </div>
                            </div>

                            <button type="button"  class="btn btn-primary btn-block login_users">Login</button>
                        </form>
                        
                        <hr>
                        <a href="<?php echo $facebook_authUrl; ?>" class="btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</a>
                        <!--<a href="#" class="btn btn-social btn-bg-linkedin btn-block"><i class="fa fa-linkedin"></i> login with linkedin</a>-->
                        <a href="<?php echo $google_authUrl; ?>" class="btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with Google</a>
                    </div>
                    <div class="tab-pane fade">
                        <span id="reg_user_error_validation"></span>
                        <form id="register_form"  method="">
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input type="text" placeholder="Username" id="reg_user_name">
                                </div>
                                <div class="input-email input-icon">
                                    <input type="email" placeholder="Email" id="reg_user_email">
                                </div>
                                <div class="input-pass input-icon">
                                    <input type="password" placeholder="Password" id="reg_user_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="reg_user_check" value="1" >
                                        I agree with your <a href="#">Terms & Conditions</a>.
                                    </label>
                                </div>
                            </div>
                            <button type="button"  class="btn btn-primary btn-block registration_form" >Register</button>
                        </form>
                        <hr>
                        
                        <a href="<?php echo $facebook_authUrl; ?>" class="btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</a>
                        
                        <a href="<?php echo $google_authUrl; ?>" class="btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with Google</a>
                    </div>
                    <div class="tab-pane fade">
                        <span id="reg_agent_error_validation"></span>
                        <form id="register_agent_form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input type="text" placeholder="Username" name="reg_agent_name" id="reg_agent_name">
                                </div>
                                <div class="input-email input-icon">
                                    <input type="email" placeholder="Email" name="reg_agent_email" id="reg_agent_email">
                                </div>
                                <div class="fa-mobile input-icon">
                                    <input type="text" placeholder="Mobile" name="reg_agent_mobile" id="reg_agent_mobile">
                                </div>
                                <div class="fa-lock input-icon">
                                    <input type="password" placeholder="Create Password" name="reg_agent_password" id="reg_agent_password">
                                </div>
                               
                                    <div class="form-group">
                                        <select class="selectpicker" name="ser_category" data-live-search="false" title="Category" id="reg_agent_category">
                                        <option value="">Select Category</option>
                                        <?php $ser_category = $this->db->get('re_service_category')->result_array(); 
                                            foreach ($ser_category as $value) {
                                               echo '<option value="'.$value['id'].'">'.$value['name'].'</option>'; 
                                            }

                                        ?>
                                        </select>
                                    </div>
                               
                                    <div class="form-group">
                                        <select class="selectpicker" name="ser_sub_category" data-live-search="false" title="Sub-Category" id="reg_agent_sub_category">
                                        <option>Select Sub Category</option>
                                        <?php
                                            $sub_cat = $this->db->get('re_service_sub_category')->result_array();
                                            foreach ($sub_cat as $value) {
                                               echo '<option value="'.$value['id'].'">'.$value['name'].'</option>'; 
                                            }
                                         ?>
                                        </select>
                                    </div>
                                
                            </div>
                            <div class="doc-upload">
                                <button type="button" class="upload-button" id="trigger_file"><i class="fa fa-arrow-up" aria-hidden="true"></i>Upload Document</button>
                                <input type="file" id="files" name="files" style="display:none;" >
                                <p>By signing up, you agree to <u>terms of use</u> and <u>privacy policy</u></p>
                            </div>
                            <button type="submit"  class="btn btn-primary btn-block registration_agent_form">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pop-reset-pass" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">Reset Password</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <p>Please enter your username or email address. You will receive a link to create a new password via email.</p>
                <span id="reset_error_validate"></span>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-user input-icon">
                            <input placeholder="Enter your username or email" id="reset_email" name="reset_email" class="form-control">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block reset_button">Get new password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    
</style>
    <!--start header section header v1-->
    <header id="header-section" class="header-section-4 header-main nav-left hidden-sm hidden-xs" data-sticky="1">
        <div class="container">
            <div class="header-left">
                <div class="logo">
                    <a href="<?php echo base_url('index.php/web_panel/home'); ?>">
                        <img class="img-logo" src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" alt="logo">
                        <h3 class="logo-text">MuscatHome.com</h3>
                    </a>
                </div>
                
            </div>
<!--            <div class="header-right login-text">
                <div class="user">
                    <a href="add-new-property.html" class="btn btn-default">Create Listing</a>
                </div>
            </div>-->
        </div>
    </header>
    <div class="header-mobile visible-sm visible-xs">
        <div class="container">
            <!--start mobile nav-->
            <div class="mobile-nav">
                <span class="nav-trigger"><i class="fa fa-navicon"></i></span>
                <div class="nav-dropdown main-nav-dropdown"></div>
            </div>
            <!--end mobile nav-->
            <div class="header-logo">
                <a href="<?php echo base_url('web_panel/home'); ?>"><img src="images/logo-houzez-white.png" alt="logo"></a>
            </div>
            <div class="header-user">
                <ul class="account-action">
                    <li>
                        <span class="user-icon"><i class="fa fa-user"></i></span>
                        <div class="account-dropdown">
                            <ul>
                                <li> <a href="add-new-property.html"> <i class="fa fa-plus-circle"></i>Creat Listing</a></li>
                                <li> <a href="#" data-toggle="modal" data-target="#pop-login"> <i class="fa fa-user"></i> Log in / Register </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!--end header section header v1-->

<div>

    <div>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body ">
                    
                    <form id="change_pass" method="post">
                        
                        <input name="id"  type="hidden" value="15">
                        <span id="login_user_error_validation"></span>
                        <div class="form-group field-group">
                            <div class="input-pass input-icon">
                                <input name="pass" minlength="6"  type="password" placeholder="Password" id="change_password">
                            </div>
                        </div>
                        <span style="color: red"><?php echo form_error('pass'); ?></span>
                        <div class="form-group field-group">
                           <div class="input-pass input-icon">
                               <input name="c_pass" minlength="6" type="password" placeholder="Confirm Password" id="re_password">
                            </div>
                        </div>
                        <span style="color: red"><?php echo form_error('c_pass'); ?></span>
                        <button type="submit"  class="btn btn-primary btn-block change_pass">Change Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div> 
</div>

<script>
$('.change_pass').click(function() {
            var change_password = $('#change_password').val();
            var re_password = $('#re_password').val();
            
            if(change_password ==  re_password)
            {
                jQuery.ajax({
                        url: "<?php echo base_url('index.php/web_panel/Reset_password'); ?>",
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            password: change_password
                            },
                        success: function (data) {
                            console.log(data);
                            if (data.status) {
                                window.location.href = "<?php echo site_url('web_panel/Reset_password/login'); ?>";

                            } else {
                                $('#login_user_error_validation').text(data.message);
                                $('#login_user_error_validation').css({"font-size": "14px", "color": "red"});
                            }
                        }
                    });
                
                
                }
            
        })
</script>


<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->


<script>
    (function ($) {
        var theMap;
        function initMap() {
            /* Properties Array */
            var properties = [
                {"title": "h-35, sector- 63, noida", "full_address": "h-35, sector- 63, noida", "thumbnail": "<img src='http://placehold.it/385x258' alt='thumb'>", "url": "index.php", "prop_meta": "<p><span>Bed: 1</span><span>Bath: 1</span><span>Sq Ft: 1760</span></p>", "type": "Apartment", "images_count": 7, "bedrooms": 1, "bathrooms": 1, "price": "<span class='item-price'>$3,500&#47;mo</span>", "is_featured": "", "icon": "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x1-apartment.png", "retinaIcon": "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x2-apartment.png", "lat": "28.6096", "lng": "77.3303"},
                {"title": "h-35, sector- 63, noida", "full_address": "h-35, sector- 63, noida", "thumbnail": "<img src='http://placehold.it/385x258' alt='thumb'>", "url": "index.html", "prop_meta": "<p><span>Bed: 1</span><span>Bath: 1</span><span>Sq Ft: 1678</span></p>", "type": "Apartment", "images_count": 7, "bedrooms": 1, "bathrooms": 1, "price": "<span class='item-price'>$3,750&#47;mo</span>", "is_featured": "", "icon": "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x1-apartment.png", "retinaIcon": "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x2-apartment.png", "lat": "25.7744034", "lng": "-80.19121100000001"},
            ];

            var myLatLng = new google.maps.LatLng(properties[0].lat, properties[0].lng);

            var houzezMapOptions = {
                zoom: 14,
                maxZoom: 14,
                center: myLatLng,
                disableDefaultUI: true,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scroll: {x: $(window).scrollLeft(), y: $(window).scrollTop()}
            };
            var theMap = new google.maps.Map(document.getElementById("houzez-listing-map"), houzezMapOptions);

            if (Modernizr.mq('only all and (max-width: 1000px)')) {
                theMap.setOptions({'draggable': false});
            }

            var markers = new Array();
            var current_marker = 0;
            var visible;

            var offset = $(theMap.getDiv()).offset();
            theMap.panBy(((houzezMapOptions.scroll.x - offset.left) / 3), ((houzezMapOptions.scroll.y - offset.top) / 3));
            google.maps.event.addDomListener(window, 'scroll', function () {
                var scrollY = $(window).scrollTop(),
                        scrollX = $(window).scrollLeft(),
                        scroll = theMap.get('scroll');
                if (scroll) {
                    theMap.panBy(-((scroll.x - scrollX) / 3), -((scroll.y - scrollY) / 3));
                }
                theMap.set('scroll', {x: scrollX, y: scrollY});
            });

            var mapBounds = new google.maps.LatLngBounds();

            for (i = 0; i < properties.length; i++) {

                var marker_url = properties[i].icon;
                var marker_size = new google.maps.Size(44, 56);
                if (window.devicePixelRatio > 1.5) {
                    if (properties[i].retinaIcon) {
                        marker_url = properties[i].retinaIcon;
                        marker_size = new google.maps.Size(84, 106);
                    }
                }

                var marker_icon = {
                    url: marker_url,
                    size: marker_size,
                    scaledSize: new google.maps.Size(44, 56),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(7, 27)
                };

                // Markers
                markers[i] = new google.maps.Marker({
                    map: theMap,
                    draggable: false,
                    position: new google.maps.LatLng(properties[0].lat, properties[0].lng),
                    icon: marker_icon,
                    title: properties[i].title,
                    animation: google.maps.Animation.DROP,
                    visible: true
                });

                mapBounds.extend(markers[i].getPosition());

                var infoBoxText = document.createElement("div");
                infoBoxText.className = 'property-item item-grid map-info-box';
                infoBoxText.innerHTML =
                        '<div class="figure-block">' +
                        '<figure class="item-thumb">' +
                        properties[i].is_featured +
                        '<div class="price hide-on-list">' +
                        properties[i].price +
                        '</div>' +
                        '<a href="' + properties[i].url + '" tabindex="0">' +
                        properties[i].thumbnail +
                        '</a>' +
                        '<figcaption class="thumb-caption cap-actions clearfix">' +
                        '<div class="pull-right">' +
                        '<span title="" data-placement="top" data-toggle="tooltip" data-original-title="Photos">' +
                        '<i class="fa fa-camera"></i> <span class="count">(' + properties[i].images_count + ')</span>' +
                        '</span>' +
                        '</div>' +
                        '</figcaption>' +
                        '</figure>' +
                        '</div>' +
                        '<div class="item-body">' +
                        '<div class="body-left">' +
                        '<div class="info-row">' +
                        '<h2 class="property-title"><a href="' + properties[i].url + '">' + properties[i].title + '</a></h2>' +
                        '<h4 class="property-location">' + properties[i].full_address + '</h4>' +
                        '</div>' +
                        '<div class="table-list full-width info-row">' +
                        '<div class="cell">' +
                        '<div class="info-row amenities">' +
                        properties[i].prop_meta +
                        '<p>' + properties[i].type + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';


                var infoBoxOptions = {
                    content: infoBoxText,
                    disableAutoPan: true,
                    maxWidth: 0,
                    alignBottom: true,
                    pixelOffset: new google.maps.Size(-122, -48),
                    zIndex: null,
                    closeBoxMargin: "0 0 -16px -16px",
                    closeBoxURL: "images/map/close.png",
                    infoBoxClearance: new google.maps.Size(1, 1),
                    isHidden: false,
                    pane: "floatPane",
                    enableEventPropagation: false
                };

                var infobox = new InfoBox(infoBoxOptions);

                attachInfoBoxToMarker(theMap, markers[i], infobox);

            }

            if (document.getElementById('listing-mapzoomin')) {
                google.maps.event.addDomListener(document.getElementById('listing-mapzoomin'), 'click', function () {
                    var current = parseInt(theMap.getZoom(), 10);
                    current++;
                    if (current > 20) {
                        current = 20;
                    }
                    theMap.setZoom(current);
                });
            }


            if (document.getElementById('listing-mapzoomout')) {
                google.maps.event.addDomListener(document.getElementById('listing-mapzoomout'), 'click', function () {
                    var current = parseInt(theMap.getZoom(), 10);
                    current--;
                    if (current < 0) {
                        current = 0;
                    }
                    theMap.setZoom(current);
                });
            }

            // Marker Clusters
            //if( googlemap_pin_cluster != 'no' ) {
            var markerClustererOptions = {
                ignoreHidden: true,
                maxZoom: parseInt(10),
                styles: [{
                        textColor: '#ffffff',
                        url: '<?php echo base_url() . "web_assets/"; ?>images/map/cluster-icon.png',
                        height: 48,
                        width: 48
                    }]
            };

            var markerClusterer = new MarkerClusterer(theMap, markers, markerClustererOptions);
            //}

            theMap.fitBounds(mapBounds);

            function attachInfoBoxToMarker(map, marker, infoBox) {
                marker.addListener('click', function () {
                    var scale = Math.pow(2, map.getZoom());
                    var offsety = ((100 / scale) || 0);
                    var projection = map.getProjection();
                    var markerPosition = marker.getPosition();
                    var markerScreenPosition = projection.fromLatLngToPoint(markerPosition);
                    var pointHalfScreenAbove = new google.maps.Point(markerScreenPosition.x, markerScreenPosition.y - offsety);
                    var aboveMarkerLatLng = projection.fromPointToLatLng(pointHalfScreenAbove);
                    map.setCenter(aboveMarkerLatLng);
                    infoBox.close();
                    infoBox.open(map, marker);
                });
            }

            jQuery('#houzez-gmap-next').click(function () {
                current_marker++;
                if (current_marker > markers.length) {
                    current_marker = 1;
                }
                while (markers[current_marker - 1].visible === false) {
                    current_marker++;
                    if (current_marker > markers.length) {
                        current_marker = 1;
                    }
                }
                if (theMap.getZoom() < 15) {
                    theMap.setZoom(15);
                }
                google.maps.event.trigger(markers[current_marker - 1], 'click');
            });

            jQuery('#houzez-gmap-prev').click(function () {
                current_marker--;
                if (current_marker < 1) {
                    current_marker = markers.length;
                }
                while (markers[current_marker - 1].visible === false) {
                    current_marker--;
                    if (current_marker > markers.length) {
                        current_marker = 1;
                    }
                }
                if (theMap.getZoom() < 15) {
                    theMap.setZoom(15);
                }
                google.maps.event.trigger(markers[current_marker - 1], 'click');
            });


            fave_change_map_type = function (map_type) {

                if (map_type === 'roadmap') {
                    theMap.setMapTypeId(google.maps.MapTypeId.ROADMAP);
                } else if (map_type === 'satellite') {
                    theMap.setMapTypeId(google.maps.MapTypeId.SATELLITE);
                } else if (map_type === 'hybrid') {
                    theMap.setMapTypeId(google.maps.MapTypeId.HYBRID);
                } else if (map_type === 'terrain') {
                    theMap.setMapTypeId(google.maps.MapTypeId.TERRAIN);
                }
                return false;
            };

            // Create the search box and link it to the UI element.
            //var input = document.getElementById('google-map-search');
            //var searchBox = new google.maps.places.SearchBox(input);
            //theMap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            /*theMap.addListener('bounds_changed', function() {
             searchBox.setBounds(theMap.getBounds());
             });*/

            //var markers_location = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            /* searchBox.addListener('places_changed', function() {
             var places = searchBox.getPlaces();
                     
             if (places.length == 0) {
             return;
             }
                     
             // Clear out the old markers.
             markers_location.forEach(function(marker) {
             marker.setMap(null);
             });
             markers_location = [];
                     
             // For each place, get the icon, name and location.
             var bounds = new google.maps.LatLngBounds();
             places.forEach(function(place) {
             var icon = {
             url: place.icon,
             size: new google.maps.Size(71, 71),
             origin: new google.maps.Point(0, 0),
             anchor: new google.maps.Point(17, 34),
             scaledSize: new google.maps.Size(25, 25)
             };
                     
             // Create a marker for each place.
             markers_location.push(new google.maps.Marker({
             map: theMap,
             icon: icon,
             title: place.name,
             position: place.geometry.location
             }));
                     
             if (place.geometry.viewport) {
             // Only geocodes have viewport.
             bounds.union(place.geometry.viewport);
             } else {
             bounds.extend(place.geometry.location);
             }
             });
             theMap.fitBounds(bounds);
             });*/

            google.maps.event.addListenerOnce(theMap, 'tilesloaded', function () {
                $('.mapPlaceholder').hide();
            });

        }

        google.maps.event.addDomListener(window, 'load', initMap);
    })(jQuery)
</script>
</body>

</html>