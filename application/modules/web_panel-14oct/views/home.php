<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_index', array()); ?>
<!--end header section header v1-->
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Raleway" rel="stylesheet">
<link href="<?php echo base_url() . "web_assets/"; ?>css/home-slider.css" rel="stylesheet" type="text/css" />
<style>
    span.multiselect-native-select {
        position: relative
    }
    span.multiselect-native-select select {
        border: 0!important;
        clip: rect(0 0 0 0)!important;
        height: 1px!important;
        margin: -1px -1px -1px -3px!important;
        overflow: hidden!important;
        padding: 0!important;
        position: absolute!important;
        width: 1px!important;
        left: 50%;
        top: 30px
    }
    .multiselect-container {
        position: absolute;
        list-style-type: none;
        margin: 0;
        padding: 0
    }
    .multiselect-container .input-group {
        margin: 5px
    }
    .multiselect-container>li {
        padding: 0
    }
    .multiselect-container>li>a.multiselect-all label {
        font-weight: 700
    }
    .multiselect-container>li.multiselect-group label {
        margin: 0;
        padding: 3px 20px 3px 20px;
        height: 100%;
        font-weight: 700
    }
    .multiselect-container>li.multiselect-group-clickable label {
        cursor: pointer
    }
    .multiselect-container>li>a {
        padding: 0
    }
    .multiselect-container>li>a>label {
        margin: 0;
        height: 100%;
        cursor: pointer;
        font-weight: 400;
        padding: 3px 0 3px 30px
    }
    .multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
        margin: 0
    }
    .multiselect-container>li>a>label>input[type=checkbox] {
        margin-bottom: 5px
    }
    .btn-group>.btn-group:nth-child(2)>.multiselect.btn {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px
    }
    .form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
        padding: 3px 20px 3px 40px
    }
    .form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
        margin-left: -20px;
        margin-right: 0
    } 



    #home_banner_bg{
        background:url(<?php echo base_url() ?>web_assets/images/1.jpg) no-repeat ;
        width:100%;
        height:600px;
        background-size: 100%;
        z-index:9999999999999;
        margin-top: -76px;

    }

    .search-select-grp{ margin: 0; padding: 0;}
    .select-grp{margin: 0; margin-top: 10px; margin-bottom: 10px; margin-right: 8%;
                padding: 0; }




    .bootstrap-select .btn.btn-default {
        border: 1px solid rgba(204, 204, 204, 0);
        color: #cac6c6;
        font-size: 14px;
        text-transform: none;
        height: 30px;
        width: 120px;
        background-color: rgba(255, 255, 255, 0);
        font-weight: 400;

        top: auto; bottom: 100%;}

.selected-item {
  margin: 20px 0;
  text-align: center;
}
.selected-item p {
  font-size: 18px;
}
.selected-item p span {
  font-weight: bold;
}
/* dropdown list */
.dropdown {
  margin: 0px auto;
  xwidth: 300px;
  position: relative;
  -webkit-perspective: 800px;
          perspective: 800px;
}
.dropdown.active .selLabel:after {
  content: '\25B2';
}
.dropdown.active .dropdown-list li:nth-child(1) {
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
}
.dropdown.active .dropdown-list li:nth-child(2) {
  -webkit-transform: translateY(200%);
          transform: translateY(200%);
}
.dropdown.active .dropdown-list li:nth-child(3) {
  -webkit-transform: translateY(300%);
          transform: translateY(300%);
}
.dropdown.active .dropdown-list li:nth-child(4) {
  -webkit-transform: translateY(400%);
          transform: translateY(400%);
}
.dropdown > span {
  width: 100%;
  height: 60px;
  line-height: 60px;
  color: #6b6b6b;
  font-size: 18px;
  letter-spacing: 1px;
  background: #fff;
  display: block;
  padding: 0 50px 0 13px;
  position: relative;
  z-index: 9999;
  cursor: pointer;
}
.dropdown > span:after {
  content: '\25BC';
  position: absolute;
  right: -8px;
  top: 15%;
  width: 50px;
  text-align: center;
  font-size: 12px;
  padding: 10px;
  height: 70%;
  line-height: 24px;
  xborder-left: 1px solid #ddd;
}
/*.dropdown > span:active {
  -webkit-transform: rotateX(45deg);
          transform: rotateX(45deg);
}*/
.dropdown > span:active:after {
  content: '\25B2';
}
.dropdown-list {
  position: absolute;
  top: 0px;
  width: 100%;
}
.dropdown-list li {
  display: block;
  list-style: none;
  left: 0;
  opacity: 1;
  -webkit-transition: -webkit-transform 300ms ease;
  transition: -webkit-transform 300ms ease;
  transition: transform 300ms ease;
  transition: transform 300ms ease, -webkit-transform 300ms ease;
  position: absolute;
  top: 0;
  width: 100%;
}
.dropdown-list li:nth-child(1) {
  background-color: #fff;
  z-index: 4;
}
.dropdown-list li:nth-child(2) {
  background-color: #fff;
  z-index: 3;
}
.dropdown-list li span {
  width: 100%;
  font-size: 18px;
  line-height: 60px;
  padding: 0 16px;
  display: block;
  color: #6b6b6b;
  cursor: pointer;
  letter-spacing: 2px;
}
</style>                  
<section id="home_banner_bg">


    <div class="hero">
        <div class="hero-content">
            <div class="search-form-container">
                <form action="" class="search-form" method="post">
                    <div class="search-form-recommend">
<!--                        <span class="icon-new">NEW</span> 
                        <a class="search-form-recommend-link" href="#">We are now the place for home loans</a> -->
<!--                        <i class="rui-icon rui-icon-arrow-right-small"></i>-->
                    </div>
                    <h1>Search Properties  in Muscat - On Demand Services</h1>
                    <div class="search-container">
                        <div class="search-inner-container">
                            <div class="rui-select-wrapper search-channel-container  list-option1">
                      <div class="dropdown">
                        <span class="selLabel">Buy</span>
                        <input id="input_type" type="hidden" name="type" value="1">
                            <ul class="dropdown-list">
                                <li data-value="1" class="choose_type">
                                 <span>Buy</span>
                              </li>
                              <li data-value="2" class="choose_type">
                                <span>Rent</span>
                              </li>
                            </ul>
                      </div>
  
                                <!--  <div class="rui-select-wrapper">
                                      <div id="rui-sel-search-channel" class="rui-select-link rui-input rui-select">
                                          <span class="buy_rent">Buy</span><input type="text" tabindex="1"><i class="rui-icon rui-icon-arrow-down"></i>
                                      </div>
                                      
                                      <ul class="rui-select-menu menu-list1 menu-close" >
                                          <li class="rui-select-list rui-selected" value="0" data-value="0" data-label="Buy">Buy</li>
                                          <li class="rui-select-list" value="1" data-value="1" data-label="Rent">Rent</li>
                                      </ul>
                                  </div>-->
                            </div>
                            <div class="rui-search-container search-input-container">
                                <i class="rui-icon rui-icon-search search-icon"></i>
                                <div id="pac-container" >
                                    <input id="pac-input" type="text" class="rui-input rui-location-box rui-auto-complete-input" name="location_keyword" tabindex="2"  data-max-results="7"  placeholder="Search property by location">
                                </div>
                                <div class="clear-text-container"><a class="rui-icon rui-icon-cross" title="Clear text"> </a></div>
                                <button class="rui-search-button" id="search_button" type="submit"> <span class="rui-visually">Search</span> </button>
                                <div class="focus-border"></div>
                            </div>
                            <div id="map" style="display:none;"></div>
                            <div class="col-sm-12 search-select-grp">
                                <div class="col-sm-1 col-xm-12 select-grp">
                                    <select class="selectpicker" name="property_type" data-live-search="false" data-live-search-style="begins" >
                                        <option value="" style="display: none;">All Types</option>
                                        <?php foreach ($property_types as $property_type) {
                                            ?>
                                            <option value="<?php echo $property_type['id'] ?>"><?php echo $property_type['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-xm-12 select-grp">
                                    <select name="beds" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="" style="display: none;">
                                        <option value="" data-all="Any" style="display: none;">Beds</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="">Any</option>                                    
                                    </select>

                                </div>
                                <div class="col-sm-1 col-xm-12 select-grp">
                                    <select name="baths" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="" style="display: none;">Baths</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="">Any</option>                                    
                                    </select>
                                </div>
                                <div class="col-sm-1 col-xm-12 select-grp">
                                    <select name="price_min" class="selectpicker select-grp-xtra">
                                        <option value="" style="display: none;">Min Price</option>
                                        <option value="100">OMR 100</option>
                                        <option value="500">OMR 500</option>
                                        <option value="1000">OMR 1,000</option>
                                        <option value="5000">OMR 5,000</option>
                                        <option value="10000">OMR 10,000</option>
                                        <option value="50000">OMR 50,000</option>
                                        <option value="100000">OMR 1,00,000</option>
                                        <option value="1000000">OMR 10,00,000</option>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-1 col-xm-12 select-grp">
                                    <select name="price_max"  class="selectpicker select-grp-xtra">
                                        <option value="" style="display: none;" >Max Price</option>
                                        <option value="500">OMR 500</option>
                                        <option value="1000">OMR 1,000</option>
                                        <option value="5000">OMR 5,000</option>
                                        <option value="10000">OMR 10,000</option>
                                        <option value="50000">OMR 50,000</option>
                                        <option value="100000">OMR 1,00,000</option>
                                        <option value="1000000">OMR 10,00,000</option>
                                        <option value="2500000">OMR 25,00,000</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="rui-clearfix"></div>

                    </div>
                </form>
            </div>
               <div class="download-native-app">
                <center>
                    <div class="app-image">
                        <a href="https://itunes.apple.com/us/app/muscathome/id1376578662?mt=8&ign-mpt=uo%3D4"><img src="<?php echo base_url('web_assets/images/apple_store.png'); ?>" style="width: 175px;">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.avi.realestatenservice" target="_blank"><img src="<?php echo base_url('web_assets/images/google-play.png'); ?>" style="width: 175px;">
                        </a>
                    </div>
                    <br>
                    <div class="download-app-content">DOWNLOAD OUR APP</div>
                    <!-- <a class="ios-app-link" href="#">
                      <i class="fa fa-apple" aria-hidden="true"></i>
                      <span>iPhone &amp; iPad</span> 
                    </a> 
                    <a class="android-app-link" href="#">
                      <i class="fa fa-android" aria-hidden="true"></i>
                      <span>Android</span> 
                      </a>  -->
                  </center>    
               </div>
        </div>
    </div>
</section>

<!--start section page body-->
<section id="section-body">

    <!--start carousel module-->
    <?php echo $this->load->view('include/latest_sale', array()); ?>
    <!--end carousel module-->

    <!--start carousel module-->
    <?php echo $this->load->view('include/latest_rent', array()); ?>
    <!--end carousel module-->

    <!--start location module-->
    <?php echo $this->load->view('include/latest_offers', array()); ?>
    <!--end location module-->

    <!--start property item module-->
    <?php //echo $this->load->view('include/best_property_value', array()); ?>
    <!--end property item module-->

    <!--start agents module-->
    <?php echo $this->load->view('include/agents', array()); ?>
    <!--end agents module-->

</section>
<!--end section page body-->

<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->

<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

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
            marker.setVisible(true);

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
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function () {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
                .addEventListener('click', function () {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM6n4Yg0U4IcvZTx6qCF3dCPax9xjvnfk&libraries=places&callback=initMap"
async defer></script>


<script>
    $(".list-option1").click(function () {
        $(".menu-list1").toggle('menu-close menu-open');
    });
    $(".list-option2").click(function () {
        $(".menu-list2").toggle('menu-close menu-open');
    });
    $(".list-option3").click(function () {
        $(".menu-list3").toggle('menu-close menu-open');
    });
    $(".list-option4").click(function () {
        $(".menu-list4").toggle('menu-close menu-open');
    });
    $(".list-option5").click(function () {
        $(".menu-list5").toggle('menu-close menu-open');
    });
    $(".list-option6").click(function () {
        $(".menu-list6").toggle('menu-close menu-open');
    });

</script>



<script>
    var type = 0;
    $('.rui-select-link').click(function () {


    });



    $(".rui-select-list").click(function () {
        var value = $(this).val();
        //alert(value);
        $("#type").val(value);
    });


</script>
<script type="text/javascript">
      $(document).ready(function() {
  
  $(".selLabel").click(function () {
    $('.dropdown').toggleClass('active');
  });
  
  $(".dropdown-list li").click(function() {
      var valu = $(this).data('value');
      $("#input_type").val(valu);
      //alert(valu);
    $('.selLabel').text($(this).text());
    $('.dropdown').removeClass('active');
    $('.selected-item p span').text($('.selLabel').text());
  });
  
});
  </script>

<style>

    .menu-open{display: block;}
    .menu-close{display: none;}

</style>

</body>

</html>