<?php
//pre($ads); die();
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
                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>Agent Name</h4></label>
                                                <input  type="text"  class="form-control" maxlength="40" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['name'];
                                                }
                                                ?>"  name="name" id="name" required>
                                            </div>
                                        </div> 
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Email</h4></label>
                                                <input  type="email"  class="form-control" maxlength="40" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['email'];
                                                }
                                                ?>"  name="email" id="email" required>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Mobile</h4></label>
                                                <input  type="mobile" maxlength="16" minlength="8" class="form-control" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['mobile'];
                                                }
                                                ?>"  name="mobile" id="mobile" required>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Password</h4></label>
                                                <input  type="password"  class="form-control" maxlength="16" minlength="6" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['password'];
                                                }
                                                ?>"  name="password" id="password" required>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Confirm Password</h4></label>
                                                <input  type="password"  class="form-control" maxlength="16" minlength="6"  required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['password'];
                                                }
                                                ?>"  name="c_password" id="c_password" required>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Comapany Name</h4></label>
                                                <input  type="text"  class="form-control" maxlength="60"  required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['company_name'];
                                                }
                                                ?>"  name="company_name" id="company_name" required>
                                            </div>
                                        </div> 
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Position</h4></label>
                                                <input  type="text"  class="form-control" maxlength="40" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['agent_position'];
                                                }
                                                ?>"  name="agent_position" id="agent_position" required>
                                            </div>
                                        </div> 
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Office contact number</h4></label>
                                                <input  type="text"  class="form-control" maxlength="16" minlength="8" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['office_number'];
                                                }
                                                ?>"  name="office_number" id="office_number">
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Fax number</h4></label>
                                                <input  type="text"  class="form-control" required="" maxlength="16" minlength="8" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['fax_number'];
                                                }
                                                ?>"  name="fax_number" id="fax_number">
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Address</h4></label>
                                                <input  type="text"  class="form-control" maxlength="160" required="" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['address'];
                                                }
                                                ?>"  name="address" id="address" required>
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Facebook url</h4></label>
                                                <input  type="text"  class="form-control" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['facebook_link'];
                                                }
                                                ?>" name="facebook_link" id="facebook_link" placeholder="https://facebook.com/">
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Linkedin url</h4></label>
                                                <input  type="text"  class="form-control" value="<?php
                                                if (isset($agents)) {
                                                    echo $agents['linkedin_link'];
                                                }
                                                ?>" name="linkedin_link" id="linkedin_link" placeholder="https://linkedin.com/">
                                            </div>
                                        </div>
                                        <div class="setting col-sm-6">
                                            <div>
                                                <label><h4>Pinterest url</h4></label>
                                                <input  type="text"  class="form-control" rvalue="<?php
                                                if (isset($agents)) {
                                                    echo $agents['pinterest_link'];
                                                }
                                                ?>"  name="pinterest_link" id="pinterest_link" placeholder="https://pinterest.com/">
                                            </div>
                                        </div>
                                        <div class="setting col-sm-12">
                                            <div>
                                                <label><h4>About Agent</h4></label>
                                                <textarea name="about_agent" id="about_agent" maxlength="200" class="form-control" rows="5" required><?php
                                                    if (isset($agents)) {
                                                        echo $agents['about_agent'];
                                                    }
                                                    ?></textarea>

                                            </div>
                                        </div>
                                    </fieldset> 

                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Image upload </h4></label>
                                                <input type="file" name="ad_image[]">
                                            </div>
                                        </div>
                                    </fieldset> 

                                    <br><br>


                                    <div class="submit col-sm-12">
                                        <button id="submit12" type="submit" class="btn btn-primary" <?php if (isset($agents)) {
                                                        echo "name='update'";
                                                    } ?> style="width:200px;" >
                                            <?php
                                            if (isset($agents)) {
                                                echo "Update";
                                            } else {
                                                ?>Submit<?php } ?>
                                        </button>
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
  