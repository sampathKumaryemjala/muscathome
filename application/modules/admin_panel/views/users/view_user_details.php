<?php
//pre($agents); die();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pageTitle ?></title>
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
        <div class="wrapper">

            <?php
            $this->load->view('segments/header');
            $this->load->view('segments/sidebar');
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php echo $title ?></h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-body">
                                <!-- /.box-header -->

                                <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >        
                                    <?php if (isset($agents)) { ?>
                                        <input type="hidden" value="<?php echo $agents['id'] ?>" name="id" id="id" >
                                    <?php } ?>

                                    <fieldset>
                                        <div class="setting col-sm-10">
                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>Customer Name</h4></label>
                                                <input  type="text"  class="form-control" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['name'];
                                                }
                                                ?>"  name="name" id="name" readonly>
                                            </div>
                                        </div> 
                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>Email</h4></label>
                                                <input  type="email"  class="form-control" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['email'];
                                                }
                                                ?>"  name="email" id="email" readonly>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>Mobile</h4></label>
                                                <input  type="mobile"  class="form-control" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['country_code'].'-'.$agents['mobile'];
                                                }
                                                ?>"  name="mobile" id="mobile" readonly>
                                            </div>
                                        </div>

                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>Address</h4></label>
                                                <textarea rows="5"  class="form-control" name="address" id="address" readonly><?php
                                                if (isset($agents)) {
                                                    echo $agents['address'];
                                                }
                                                ?></textarea>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="setting col-sm-2">
                                            <div class="setting col-sm-12">
                                                <div style="margin: auto; margin-top: 40px;  text-align: center;"><img class="thumbnail" src="<?php if (!empty($agent['profile_image'])) { echo base_url('uploads/profile_images/').$agent['profile_image'];} else{ echo base_url('uploads/profile_images/default.png'); }?> " height="125" ></div>
                                            </div>
                                        </div>
                                    </fieldset> 

                                    
                                    
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
                        <h4 class="modal-title" id="mydiv">

                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODEL END -->
        
    <script>
        $('#name').keypress(function (e) {
                var regex = new RegExp(/^[a-zA-Z\s]+$/);
                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                if (regex.test(str)) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            });
            
        $("#mobile").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
            
        $("#office_number").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
            
        $("#fax_number").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
    </script>
   
    </body>
   
</html>
  