<?php
//pre($properties); die();
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
		<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
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

                                    <form id="form1" name="form1" method="post" enctype="multipart/form-data" >        
                                        <?php if (isset($edit_offer)) { ?>
                                            <input type="hidden" value="<?php echo $edit_offer['id'] ?>" name="id" id="id" >
                                        <?php } ?>
                                        <fieldset>
                                            <div class="setting col-md-12">
                                                <label><h4>Offer name</h4></label>
                                                <div>
                                                    <input  type="text" id="title" name="title"  class="form-control" value="<?php if(isset($edit_offer)){ echo $edit_offer['title'];}?>"  minlength="3" maxlength="60" required>
                                                </div>
                                            </div>  
                                            
                                           
                                        </fieldset> 

                                        <fieldset>
                                            <div class="setting col-md-6">
                                                <div>
                                                    <label><h4>Start date</h4></label>
                                                    <input  id="txtFrom" name="start_date"id="beds" class="form-control" min="0" max="10" value="<?php if(isset($edit_offer)){ echo $edit_offer['start_date'];}?>"  required>
                                                </div>
                                            </div>                                        

                                            <div class="setting col-md-6">
                                                <div>
                                                    <label><h4>End date</h4></label>
                                                    <input   id="txtTo" name="end_date"  class="form-control" value="<?php if(isset($edit_offer)){ echo $edit_offer['end_date'];}?>"   min="0" max="10" required>
                                                </div>
                                            </div> 
                                            
<!--                                            <div class="setting col-md-6">
                                                <div>
                                                    <label><h4>Offer type</h4></label>
                                                    <select  class="setting col-md-6 form-control" name="offer_type" required>
                                                        <option>Select</option>
                                                        <option value="1" <?php //if(isset($edit_offer)){ if($edit_offer['offer_type']==1){ echo 'selected';}}?>>Type 1</option>
                                                        <option value="2" <?php //if(isset($edit_offer)){ if($edit_offer['offer_type']==2){ echo 'selected';}}?>>Type 2</option> 
                                                    </select></div>
                                            </div> -->
                                             
                                            <div class="setting col-md-12">
                                                <div>
                                                    <label><h4>Discount (%)</h4></label>
                                                    <input  type="text" name="discount"  class="form-control" value="<?php if(isset($edit_offer)){ echo $edit_offer['discount'];}?>"   min="0" max="100" maxlength="3" required>
                                                </div>
                                            </div> 
                                            
                                            
                                            
                                            <div class="setting col-md-12">
                                                <div>
                                                    <label><h4>Description</h4></label>
                                                    <textarea rows="5" class="form-control" name="description" id="description"><?php if(isset($edit_offer)){ echo $edit_offer['description'];}?></textarea>
                                                </div>
                                            </div> 
                                            <div class="setting col-md-12">
                                                <div>
                                                    <?php if(!empty($edit_offer['banner_image'])){ ?><img class="thumbnail" style="width:800px; margin-top: 40px; padding-left: 0" src="<?php echo base_url().'uploads/properties/offers/'.$edit_offer['banner_image'];?>"><br><?php } ?>
                                                    <label><h4><?php if (isset($edit_offer)) {
                                                    echo "Update banner image";
                                                } else {
                                                    ?>Upload banner image<?php } ?></h4></label>
                                                    <input type="file" name="banner_image[]" multiple="">
                                                </div>
                                            </div> 
                                        </fieldset> 

                                        
                                       <br><br>
                                        <div class="setting col-md-6">
                                            <button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                                if (isset($edit_offer)) {
                                                    echo "Update Offer";
                                                } else {
                                                    ?>Create Offer<?php } ?>
                                            </button>
                                        </div>
                                        <br><br><br>
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
           

        <script>
            $('#submit1').click(function (event) {
                event.preventDefault();
                var username = $("#name").val();
                var mobile = $("#mobile").val();
                $.ajax({
                    type: "POST",
                    url: "<?php //echo base_url() ?>index.php/admin_panel/Validation/validate_data",
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


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
type="text/javascript"></script>
            <script type="text/javascript">
$(function () {
    $("#txtFrom").datepicker({
        numberOfMonths: 2,
		minDate: 0,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#txtTo").datepicker("option", "minDate", dt);
        }
    });
    $("#txtTo").datepicker({
        numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtFrom").datepicker("option", "maxDate", dt);
        }
    });
});
</script>
    </body>
</html>
