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
                                    <?php if (isset($p_code)) { ?>
                                        <input type="hidden" value="<?php echo $p_code['id'] ?>" name="id" id="id" >
                                    <?php } ?>
                                    <fieldset>
                                        <div class="setting col-md-9">

                                            <label><h4>Promotional Code</h4></label>
                                            <div>
                                                <input  type="text" id="code" name="code"  class="form-control" minlength="6" value="<?php
                                                if (isset($p_code)) {
                                                    echo $p_code['code'];
                                                }
                                                ?>"  name="price" style="text-transform:uppercase" required>
                                                <span style="display:block; padding-left: 10px;" id="code_validation"></span>
                                            </div>
                                        </div>  
                                        <div class="setting col-md-3">
                                            <div>
                                                <label style="margin-top:33px"></label>
                                                <button id="gen_promocode" type="button" name="generate_code" class="btn btn-primary btn-block" id="generate_code">Generate Code</button>
                                            </div>
                                        </div> 

                                    </fieldset> 

                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Start date</h4></label>
                                                <input  type="date" id="date-picker" name="start_date"id="beds" class="form-control" min="0" max="10" value="<?php
                                                if (isset($p_code)) {
                                                    echo $p_code['start_date'];
                                                }
                                                ?>"  required>
                                            </div>
                                        </div>                                        

                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>End date</h4></label>
                                                <input  type="date" id="date-picker" name="end_date"  class="form-control" value="<?php
                                                if (isset($p_code)) {
                                                    echo $p_code['end_date'];
                                                }
                                                ?>"  required>
                                            </div>
                                        </div> 

                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Discount (%)</h4></label>
                                                <input  type="number" name="discount"  class="form-control" value="<?php
                                                if (isset($p_code)) {
                                                    echo $p_code['discount'];
                                                }
                                                ?>"   min="0" max="100" required>
                                            </div>
                                        </div> 

                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>No. of use (per user)</h4></label>
                                                <input  type="number" name="no_of_uses" id="no_of_uses" class="form-control" value="<?php
                                                if (isset($p_code)) {
                                                    echo $p_code['no_of_uses'];
                                                }
                                                ?>"   min="0" required>
                                            </div>
                                        </div>


                                        <div class="setting col-md-12">
                                            <div>
                                                <label><h4>Description</h4></label>
                                                <textarea rows="5" class="form-control" name="description" id="description"><?php
                                                    if (isset($p_code)) {
                                                        echo $p_code['description'];
                                                    }
                                                    ?></textarea>
                                            </div>
                                        </div> 
                                    </fieldset> 


                                    <br><br>
                                    <div class="setting col-md-6">
                                        <button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                            if (isset($p_code)) {
                                                echo "Update Code";
                                            } else {
                                                ?>Create<?php } ?>
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
                url: "<?php //echo base_url()        ?>index.php/admin_panel/Validation/validate_data",
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


</body>
</html>



<script>
    $('#gen_promocode').click(function () {
        //alert('efesf');
        $.ajax({
            url: "<?php echo base_url('index.php/admin_panel/Offers/ajax_generate_promocode') ?>",
            method: 'POST',
            dataType: 'json',
            data: {},
            success: function (data) {
                //alert(data);
                $("#payment_message").html(data.msg);
            }
        });

    });

    $("#code").keyup(function (event) {
        if (this.value.length >= this.getAttribute('minlength')) {

            var code = $("#code").val().toUpperCase();
            $.ajax({
                url: "<?php echo base_url('index.php/admin_panel/Offers/ajax_check_promocode') ?>",
                method: 'POST',
                dataType: 'json',
                data: {code: code},
                success: function (data) {
                    if (data.status) {
                        //alert(data.status);
                        $('#code_validation').text(data.message);
                        $('#code_validation').css({"font-size": "14px", "color": "green"});
                        //$('#code_validation').fadeOut(2000);
                    } else {
                        $('#code_validation').text(data.message);
                        $('#code_validation').css({"font-size": "14px", "color": "red"});
                        //$('#code_validation').fadeOut(2000);
                    }
                }
            });

        }
    });

</script>
</body>
</html>