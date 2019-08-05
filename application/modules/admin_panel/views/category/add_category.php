<?php
//pre($categories); die();
?>
<!DOCTYPE html>
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
        
        </head>
        <body class="hold-transition skin-blue sidebar-mini">

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initMap"
            async defer></script>

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
                                    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >        
                                        <?php if (isset($categories)) { ?>
                                            <input type="hidden" value="<?php echo $categories['id'] ?>" name="id" id="id" >
                                        <?php } ?>
                                        <fieldset>
                                             
                                            <div class="setting col-md-12">
                                                <div class="price">
                                                    <label><h4>Category name</h4></label>
                                                    <input  type="text" id="name" name="name"  class="form-control" value="<?php if(isset($categories)){ echo $categories['name'];}?>" required>
                                                </div>
                                            </div> 
                                            <div class="setting col-md-12">
                                                
                                                    <label><h4>Icon</h4></label>
                                                    <?php if(isset($categories) && !empty($categories['icon'])){ ?>
                                                    <br><image src="<?php echo base_url('uploads/services/icons/').$categories['icon'] ?>" height="90" width="90">
                                                    <?php } ?>
                                                    <input  type="file" id="icon_image" name="icon_image[]"  class="form-control" accept="image/x-png, image/png,">
                                                    <small style="color:red">upload image size(90 x 90)px / PNG format only</small>
                                                
                                            </div> 
                                           
                                        </fieldset> 

                                            </br></br>
                                    <fieldset> 
                                        <div class="form-group col-md-6">
                                            <button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                                if (isset($categories)) {
                                                    echo "Update";
                                                } else {
                                                    ?>Submit<?php } ?>
                                            </button>
                                        </div>
                                    </fieldset> 
                                           </br>
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
					
    </body>
</html>































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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initMap"
    async defer></script>
</body>
</html>