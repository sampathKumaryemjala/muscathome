<!DOCTYPE html>
<?php if ($this->session->flashdata('no_property_location')) { ?> 
    <script>alert("Please choose the valid location !")</script>
<?php } ?>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin|Muscat Home</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .txtarea{ display:none;}
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">


        <div class="wrapper">
            <?php
            $this->load->view('segments/header');
            $this->load->view('segments/sidebar');
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div id="map"></div>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php echo $title; ?></h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-body">
                                <!-- /.box-header -->
                                <div class="setting">
                                    <input type="hidden" id="show_model" value="">
                                </div>

                                <form id="property_form" name="form1" method="post" enctype="multipart/form-data" >        
                                    <?php if (isset($properties)) { ?>
                                        <input type="hidden" value="<?php echo $properties['id'] ?>" name="id" id="id" >
                                    <?php } ?>
                                    <input type="hidden" value="<?php
                                    if (isset($properties)) {
                                        echo $properties['status'];
                                    } else {
                                        echo "0";
                                    }
                                    ?>" name="status" id="status" >
                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <label><h4> Type</h4></label>
                                            <div>

                                                <select  class="setting col-md-6 form-control" name="type" required>
                                                    <option>Select</option>
                                                    <option value="0" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['type'] == 0) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Buy</option>
                                                    <option value="1" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['type'] == 1) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>> Rent</option> 
                                                </select>
                                            </div>
                                        </div>  
                                        <div class="setting col-md-6">
                                            <div class="price">
                                                <label><h4>Price (OMR)</h4></label>
                                                <input  type="text" id="price" name="price" maxlength="7"  class="form-control" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['price'];
                                                }
                                                ?>" required>
                                            </div>
                                        </div> 

                                    </fieldset> 
                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Property Type </h4></label>
                                                <select name="property_type" id="property_type" class="form-control" required>
                                                    <option>Select</option>
                                                    <option value="1" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 1) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Office</option>
<!--                                                        <option value="2" <?php //if(isset($properties)){ if($properties['property_type']==2){ echo 'selected';}}  ?>>Home</option>-->
<!--                                                        <option value="3" <?php //if(isset($properties)){ if($properties['property_type']==3){ echo 'selected';}}  ?>>Town House</option>-->
                                                    <option value="4" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 4) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Land</option>
<!--                                                        <option value="9" <?php //if(isset($properties)){ if($properties['property_type']==9){ echo 'selected';}}   ?>>Residential</option>-->
                                                    <option value="10" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 10) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Industrial</option>
                                                    <option value="11" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 11) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Villa</option>
                                                    <option value="12" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 12) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Commercial</option>
                                                    <option value="13" <?php
                                                    if (isset($properties)) {
                                                        if ($properties['property_type'] == 13) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>Flat</option>
                                                </select>	
                                            </div>
                                        </div>                                        

                                        <div class="setting col-md-6">
                                            <div >
                                                <label><h4>Property Size (Sq Meter) </h4></label>
                                                <input  type="text" name="property_size" maxlength="5"   class="form-control"   id="property_size" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['property_size'];
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                    </fieldset> 

                                    <fieldset>
                                        <div class="setting col-md-6 property_toggle_div">
                                            <div>
                                                <label><h4>Beds</h4></label>
                                                <input  type="number" name="beds"id="beds" maxlength="2"  class="form-control" min="0" max="10" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['beds'];
                                                }
                                                ?>"  required>
                                            </div>
                                        </div>                                        

                                        <div class="setting col-md-6 property_toggle_div">
                                            <div>
                                                <label><h4>Baths</h4></label>
                                                <input  type="number" name="baths"  class="form-control" maxlength="2"  value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['baths'];
                                                }
                                                ?>"   min="0" max="10" required>
                                            </div>
                                        </div>                                        
                                    </fieldset> 

                                    
                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Location</h4></label>
                                                <input  type="text" name="location" id="pac-input"  class="form-control" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['location'];
                                                }
                                                ?>" required>
                                            </div>
                                        </div>

                                        <div class="setting col-md-6">
                                            <div id="pac-container">
                                                <label><h4>Property Address </h4></label>
<!--                                                    <textarea rows="3" ><?php //if(isset($properties)){ echo $properties['addresss'];}   ?></textarea>-->
                                                <input name="addresss" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['addresss'];
                                                }
                                                ?>" id="pac-input" class="form-control" type="text" placeholder="Enter address" required>
                                            </div>
                                        </div>
                                        <div class="setting col-md-12">
                                            <div>
                                                <label><h4>Description </h4></label>
                                                <textarea  type="text" rows="4" name="description" placeholder="Enter Description" maxlength="1000"  class="form-control" required><?php
                                                    if (isset($properties)) {
                                                        echo $properties['description'];
                                                    }
                                                    ?></textarea>
                                                <small style="color:red; font-size: 12px;">*max 1000 character</small>
                                            </div>
                                        </div>                                        
                                    </fieldset>
                                    <fieldset>
                                        <div class="setting col-sm-2">
                                            <div>
                                                <label><h4>Country Code</h4></label>
                                                <select class="form-control" name="country_code"> 
                                                    <?php foreach ($country_code as $code) { ?>
                                                        <option <?php
                                                        if (isset($properties)) {
                                                            if ($properties['country_code'] == $code['country_code']) {
                                                                echo 'selected';
                                                            } 
                                                        }else if($code['country_code']==968){  echo 'selected';}
                                                        ?> value="<?php echo "+" . $code['country_code'] ?>"><?php echo $code['country_name'] . " (+" . $code['country_code'] . ")" ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-10">
                                            <div>
                                                <label><h4>Contact Number</h4></label>
                                                <input  type="text" id="conatct_mobile" maxlength="16"  name="contact_number"  class="form-control" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['contact_number'];
                                                }
                                                ?>" required>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <br>
                                        <div class="col-sm-6 col-xs-6">
                                            <div>
                                                <label><h4>Property Images</h4></label>
                                                <input type="file" name="property_images[]" multiple="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <br>
                                                <input type="checkbox" name="is_featured" value="1"> Featured Property
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="submit col-md-offset-6 col-md-6 text-right"><button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                            if (isset($properties)) {
                                                echo "Update";
                                            } else {
                                                ?>Submit<?php } ?></button>
                                    </div>
                                    <br><br><br><br>
                                </form>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content-wrapper -->
            </div>

            <?php
            $this->load->view('segments/footer');
//include('include/footer.php'); 
            ?>

            <!-- ./wrapper -->

        </div>

        <!-- MODEL START--->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="modal-title" id="mydiv"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODEL END --->

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
        $(document).ready(function () {
            $('#date_from').datepicker({
                format: 'yyyy-mm-dd',
                //startDate: '-3d',
                endDate: '-1d',
                autoclose: true
            });
            $('#admissionDate').datepicker({
                format: 'yyyy-mm-dd',
                //startDate: '-3d',
                //endDate: '-2d',
                autoclose: true
            });
        });

        </script>
        <script
    </script>

    <script>
        $('#submit1').click(function (event) {
            event.preventDefault();
            var username = $("#name").val();
            var mobile = $("#mobile").val();
            $.ajax({
                type: "POST",
                url: "<?php //echo base_url()    ?>index.php/admin_panel/Validation/validate_data",
                data: {
                    id: id,
                    username: username,
                    email: email,
                    phone: phone
                },
                success: function (response) { //alert(response);
                    if (response == 0) {
                        $('#form1').submit();
                    } else {
                        var res = "#" + response;
                        $('.error').html('');
                        $(res).focus();
                        $(res).siblings('.error').html('this ' + response + ' is already exist');
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });
    </script>
    <script>
        $("#price").keydown(function (e) {
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
        $("#price").keydown(function (e) {
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
        $("#property_size").keydown(function (e) {
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
        $("#id").keydown(function (e) {
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
        $("#beds").keydown(function (e) {
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
        $("#txtarea").hide();

        $("#slct").change(function () {
            var val = $("#slct").val();
            if (val == "1") {
                $("#txtarea").show();
            } else {
                $("#txtarea").hide();
            }
        });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initAutocomplete"
    async defer></script>					



    <div id="map" ></div>


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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initMap"
    async defer></script>

    <script>
        $("#conatct_mobile").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_user_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
    </script>

    <script>
        $("#property_form").submit(function () {
            $(this).submit(function () {
                return false;
            });
            return true;
        });
    </script>
    <script>
    $('#property_type').change(function () {
        var value = $(this).val();
        if (value == 1 || value == 4 || value == 10) {
            $('.property_toggle_div').hide();
        } else {
            $('.property_toggle_div').show();
        }
    });
</script>

</body>
</html>