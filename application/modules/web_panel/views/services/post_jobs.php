<?php //pre($main_sub['cat_id']); die;  ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script type="text/javascript" src="map.js"></script>
<style type="text/css">
    #map{ width:96%; height: 300px; margin: auto; margin-bottom: 2%; }
    .job_post_submit{    
        margin-left: 15px;
        margin-bottom: 30px;}
    </style>


    <section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-left">
                        <h1 class="title-head"><?php echo $subs[0]['cat_name']; ?></h1>
                    </div>
                    <div class="page-title-right"><ol class="breadcrumb"><li ><a href="#">Services</a></li>
                            <li class="active"><?php echo $subs[0]['cat_name']; ?></li></ol></div>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar job-description">
                    <div class="job-form">
                        <!--                    <div class="col-sm-12 job-heading">
                                                <h4><?php //foreach($subs as $sub){ echo $sub['sub_name'] ;}        ?></h4>
                                            </div>-->
                        <div class="col-sm-6 col-xs-12">

                            <div class="form-group">
                                <label>Date</label>
                                <input style="background-color:#fff;" name="dated" id="datepicker" class="form-control " placeholder="Select Date" readonly required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Time</label>
                                <select name="timed" class="form-control" title="Select Time" required>
                                    <option value="" selected disabled>Select Time</option
                                    <option value="08:00 - 09:00 AM">08:00 - 09:00 AM</option>
                                    <option value="09:00 - 10:00 AM">09:00 - 10:00 AM</option>
                                    <option value="10:00 - 11:00 AM">10:00 - 11:00 AM</option>
                                    <option value="11:00 - 12:00 AM">11:00 - 12:00 AM</option>
                                    <option value="12:00 - 01:00 PM">12:00 - 01:00 PM</option>
                                    <option value="01:00 - 02:00 PM">01:00 - 02:00 PM</option>
                                    <option value="02:00 - 03:00 PM">02:00 - 03:00 PM</option>
                                    <option value="03:00 - 04:00 PM">03:00 - 04:00 PM</option>
                                    <option value="04:00 - 05:00 PM">04:00 - 05:00 PM</option>
                                    <option value="05:00 - 06:00 PM">05:00 - 06:00 PM</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="title">Job Title</label><br />
                                <input type="text" name="title" value="" size="40" maxlength="50" class="form-control" aria-required="true" aria-invalid="false" required placeholder="Enter Job Title" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <!--                            <div class="form-group">
                                                            <label class="required" for="budget">Job Budget</label><br />
                                                            <input type="text" maxlength="8" name="budget" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" id="job_budget" required placeholder="Budget in OMR"/>
                                                        </div>-->
                        </div>
                        <!--                        <div class="col-sm-12 col-xs-12">
                                                   <div class="form-group">
                                                       <label class="required" for="workforce">No. of Workforce required</label><br />
                                                       <input type="number" name="workforce" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required />
                                                   </div>
                                               </div>-->
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="mobile">Phone</label><br />
                                <input type="text" maxlength="16" id="mobile" maxlength="12" name="mobile" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required placeholder="Enter mobile number"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group" >
                                <label class="required" for="address">House no. / Flat no. / Building no.</label><br />
                                <input type="text" name="h_no" id="h_no" maxlength="12" value="" size="40" class="form-control"  placeholder="Enter House no. / Flat no. / Building no." required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="address">Address</label><br />
                                <input type="text" name="address" id="address" value="" size="40" class="form-control"  placeholder="Please Click on map to get location" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="display:none">
                            <div class="form-group">
                                <label class="required" for="lat">Latitude</label><br />
                                <input class="form-control" type="text" id="lat" name="latitude" placeholder="Latitude" readonly="yes"><br>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12" style="display:none">
                            <div class="form-group">
                                <label class="required" for="lng">longitude</label><br />
                                <input class="form-control" type="text" id="lng" name="longitude" placeholder="longitude" readonly="yes">
                            </div>
                        </div>

                        <div class="picker-map"id="map"></div>
                        <?php if(isset($main_sub['cat_id']) && $main_sub['cat_id'] ==3) { ?>
                        <div class="col-sm-12 col-xs-12" style="margin-bottom:10px;">
                            <div class="form-group radio-option">
                                <legend><p class="radio-heading">Gender Prefrence</p></legend>
                                <label class="radio-inline">
                                    <input type="radio" name="gender_priority" value="1" checked>Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender_priority" value="0" >Female
                                </label>
                            </div>

                        </div>
                        <?php } ?>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="description">Job Description</label><br />
                                <textarea class="form-control" name="description" rows="4" id="message" data-bv-field="message" maxlength="250" required></textarea>
                                <small style="color:red; font-size: 12px;">*max 250 character</small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
    <!--                            <div class="attach-image"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Drop files here to upload or <a id="trigger_file"><u>choose file</u></a><input type="file" id="job_upload" name="files" style="display:none;" ></div>-->
                            </div>
                        </div>

                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="checkbox" name="self_material" value="1"> I will supply all material
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12" style="margin:20px 0; padding-left: 0" >
                            <div class="form-group col-sm-6">
                                <input type="file" name="job_image[]" id="job_image" multiple> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12" style="margin:20px 0; padding-left: 0">
                            <div class="form-group col-sm-12">
                                <label>
                                    <input type="checkbox" id="reg_user_check" required >
                                    I agree with your <a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" target="_blank" >Terms & Conditions</a>.
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12" style="margin:20px 0; padding-left: 0; text-align: right" >
                            <div class="form-group col-sm-12">
                                <a id="have_promo"><p style="text-align:right">Apply Promocode ?</p></a>
                            </div>
                            <div id="insert_promocode" style="padding-right:3%">
                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-xs-offset-5 col-sm-1 col-xs-1">
                                        <input type="checkbox" class="form-control" name="check_promocode" value="1" id="check_promocode">
                                    </div>
                                    <div class="col-sm-5 col-xs-5">
                                        <input type="text" class="form-control promoinput" name="promocode" id="promocode" placeholder="Enter promocode">
                                        <span id="promo_validate_msg" style="padding-top:10px; text-align: left;"></span>
                                    </div>
                                    <div class="col-sm-1 col-xs-1">
                                        <button type="button" class="btn btn-info" id="promocode_apply">Apply</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12" style="margin:20px 0" >
                            <div class="form-group">
                                <?php if (!$this->session->userdata('active_user_data')) { ?> 
                                    <button type="button" id="job_post_submit_without_login" class="btn btn-secondary btn-request job_post_submit_without_login">Post Job</button>
                                <?php } else { ?>
                                    <button type="submit" id="job_post_submit" class="btn btn-secondary btn-request job_post_submit_without_login">Post Job</button>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
                <aside id="sidebar" class="sidebar-white">
                    <div class="widget widget-range">
                        <div class="widget-body services-menu">
                            <ul><?php foreach ($subs as $sub) { ?>

                                    <li><img width="24" src="<?php echo $sub['icon']; ?>"><a  href="<?php echo base_url('/index.php/web_panel/Job_post?ghvj=') . base64_encode($sub['sub_id']); ?> " class=" <?php
                                        if ($sub['sub_id'] == $sub_id) {
                                            echo "active";
                                        }
                                        ?>"><?php echo $sub['sub_name']; ?></a></li>
                                    <!--                          <li><a href="#" class="fan-icon">Fan</a></li>
                                                                <li><a href="#" class="wiring-icon">Wiring</a></li>
                                                                 <li><a href="#" class="lights-icon">Lights</a></li>
                                                                 <li><a href="#" class="inverter-icon">Inverter</a></li>
                                                                 <li><a href="#" class="others-icon">Others</a></li>-->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>

<!--start footer section-->

<?php echo $this->load->view('custome_link/custome_js'); ?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjW3Y3DMDgI9CwSv81az8BEeyL5BRmd0c&callback=initMap"></script><script src="<?php echo base_url('web_assets/') ?>js/locationpicker.jquery.js"></script>


<script>
//Set up some of our variables.
    var map; //Will contain map object.
    var marker = false; ////Has the user plotted their location marker? 

//Function called to initialize / create the map.
//This is called when the page has loaded.


    function initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                showPosition(position);
            });

        } else {
            var error = "Geolocation is not supported by this browser.";
            alert(error);
        }

        function showPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            if (position.coords.latitude === null) {
                var lat = '23.590261';
                var long = '58.411045';
            }

            //alert(lat);alert(long);

            //The center location of our map.
            var centerOfMap = new google.maps.LatLng(lat, long);

            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 14 //The zoom value.
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('map'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function (event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if (marker === false) {
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        markerLocation();
                    });
                } else {
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }
    }




//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
    function markerLocation() {
        //Get location.
        var currentLocation = marker.getPosition();

        //Add lat and lng values to a field that we can save.
        document.getElementById('lat').value = currentLocation.lat(); //latitude
        document.getElementById('lng').value = currentLocation.lng(); //longitude

        var newlat = currentLocation.lat();
        var newlng = currentLocation.lng();

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Ajax_calls/map_data'); ?>",
            method: 'POST',
            data: {
                latlong: newlat + ',' + newlng
            },
            success: function (data) {
                //alert(data);
                document.getElementById('address').value = data;
            }
        });
    }


//Load the map when the page has finished loading.
    google.maps.event.addDomListener(window, 'load', initMap);
</script>




<?php echo $this->load->view('include/footer_inc', array()); ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        //$('#datepicker').datepicker({ minDate: 0 });
        $("#datepicker").datepicker({
            minDate: 0,
            beforeShowDay: function (date) {

                var day = date.getDay();
                console.log(day);
                if (day == 5)
                    return [false];
                return [true];
            }
        });
    });
</script>

<script>
    $('#trigger_file').click(function () {
        $('#job_upload').trigger('click');
    })
</script>

<?php
if (!$this->session->userdata('active_user_data')) {
    ?>
    <script>    $('#pop-login').modal('show');</script>
    <?php
}
?>
<script>
    $("#insert_promocode").hide();
    $('#check_promocode').hide();
    $("#have_promo").click(function () {
        $("#insert_promocode").toggle();
    });

    $("#promocode_apply").click(function () {
        var promocode = $("#promocode").val();
        //alert(promocode);
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Job_post/ajax_check_promocode'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                promocode: promocode
            },
            success: function (data) {
                if (data.status) {
                    $('#promo_validate_msg').text(data.message);
                    $('#promo_validate_msg').css({"font-size": "14px", "color": "green"});
                    $('.promoinput').css({"border-color": "green"});
                    //$('#check_promocode').show();
                    $('#check_promocode').prop('checked', true);

                } else {
                    $('#promo_validate_msg').text(data.message);
                    $('#promo_validate_msg').css({"font-size": "14px", "color": "red"});
                    $('.promoinput').css({"border-color": "red"});
                    $('#check_promocode').prop('checked', false);
                }
            }
        });


    });



    $('#job_post_submit_without_login').click(function () {
        //alert('Login First');
        $('#pop-login').modal('show');
    });
</script>








