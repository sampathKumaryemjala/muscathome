<?php
//pre($job_post); die();
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
                                    <fieldset>
                                        <div class="setting col-sm-3">
                                            <img height="240" width="240" style="overflow: hidden;" src="<?php
                                            if (!empty($job_post['post_images'])) {
                                                echo $job_post['post_images'][0];
                                            } else {
                                                echo base_url('uploads/job_posts/default.jpg');
                                            }
                                            ?>">
                                        </div>
                                        <div class="setting col-sm-9">
                                            <div class="media">
                                                <!--                                                <div class="description-text service-content" class="clearfix">
                                                                                                    <h4><a href="<?php //echo base_url('index.php/admin_panel/Users/user_detail?id=') . $job_posts['fk_user_id'];  ?>"><strong>Customer Details</strong></a></h4>
                                                                                                </div>-->
                                                <div class="media-body ">
                                                    <?php if ($job_posts['fk_service_cat_id'] == 4) { ?>
                                                        <div class="col-sm-6" style="padding-left:0"><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Source: </strong><?php echo $job_posts['source'] ?></div>
                                                        <div class="col-sm-6"><i class="fa fa-map-marker" aria-hidden="true"></i><strong> Destination: </strong><?php echo $job_posts['destination'] ?></div><br><br>
                                                    <?php } else { ?>
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $job_posts['address'] ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="media-right">
                                                    <div class="item-price" style="font-size: 30px; color: #fbb838; position: absolute; left: 82%; top:0px;"><h2>OMR <?php
                                                            if (!empty($job_posts['budget'])) {
                                                                echo number_format_short($job_posts['budget']);
                                                            } else {
                                                                echo "0";
                                                            }
                                                            ?></h2></div>
                                                </div>
                                                <div class="date-time">
                                                    <ul style="list-style: none; padding: 10px 0px; ">
                                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $job_posts['dated'] ?></li>
                                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $job_posts['timed'] ?></li>
                                                    </ul>
                                                </div>
                                                <?php if ($job_posts['fk_service_cat_id'] == 4) { ?>
                                                    <div><?php if ($job_posts['fk_service_cat_id'] == 4) { ?>
                                                            <div class="info-row amenities ">
                                                                <p><strong>Item to be moved: </strong><?php echo $job_posts['items']; ?></p>

                                                                <p><strong>Insured: </strong><?php
                                                                    if ($job_posts['is_insured']) {
                                                                        echo 'Yes';
                                                                    } else {
                                                                        echo "No";
                                                                    }
                                                                    ?></p>
                                                            </div>
                                                        <?php } ?> 

                                                    </div>
                                                <?php } ?>
                                                <div class="description-text service-content" class="clearfix" style="margin-top: 30px;">
                                                    <h4><strong>Job Description</strong></h4>
                                                    <p><?php echo $job_posts['description'] ?></p>
                                                </div>

                                                <?php if ($job_posts['fk_service_cat_id'] != 4) { ?>
                                                    <div class="job-material" style="color: #77c720">
                                                        <?php
                                                        if ($job_posts['self_material'] == 1) {
                                                            echo "I will supply all materials";
                                                        }
                                                        ?>
                                                    </div>
                                                <?php } ?>

                                                <?php
                                                $pending_text_color = ["#fff", "#fff", "#fff", "#fff", "#fff", "#fff"];
                                                $pending_bg_color = ["#009bd6", "#009bd6", "#009bd6", "#009bd6", "#009bd6", "#009bd6"];
                                                $completed_text_color = ["#b7b5b5", "#b7b5b5", "#348c34", "#b7b5b5", "#b7b5b5", "#b7b5b5"];
                                                $completed_bg_color = ["#d63636", "#009bd6", "#348c34", "#e2e2e2", "#e2e2e2", "#3b8c9a"];
                                                $job_text = ["Pending", "Accepted", "Completed", "Rejected", "", "Started"];
                                                ?>
<!--                        <div style="height:40px; width: 100%; background-color:<?php //echo $status_color[$user_posts[0]['status']];        ?>; text-align: center; ">
<h3 style="color: white; line-height: 40px; font-weight: 200; text-transform: uppercase"><? //php echo $status_text[$user_posts[0]['status']];      ?></h3>
                        </div> -->              
                                                <div class="job-status">
                                                    <div class="btn-group btn-group-justified">
                                                        <h4>Job status:<span style="margin-left: 20px; color:<?php echo $completed_bg_color[$job_posts['status']]; ?>; "><?php echo $job_text[$job_posts['status']]; ?></span></h4>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </fieldset> 
                                    <br>
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

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-body">
                                <!-- /.box-header -->
                                <?php if (!empty($job_posts['customer'])) { ?>
                                    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >        
                                        <fieldset>
                                            <div class="setting col-sm-2">
                                                <div class="setting col-sm-12">
                                                    <div style="margin: auto; margin-top: 40px;  text-align: center;"><img class="thumbnail" src="<?php
                                                        if (!empty($job_posts['providers']['profile_image'])) {
                                                            echo base_url('uploads/profile_images/') . $job_posts['providers']['profile_image'];
                                                        } else {
                                                            echo base_url('uploads/profile_images/default.png');
                                                        }
                                                        ?> " height="125" ></div>
                                                </div>
                                            </div>
                                            <div class="setting col-sm-10">
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Customer Name</h4></label>
                                                        <input  type="text"  class="form-control" required="" value="<?php echo $job_posts['customer']['name']; ?>"  name="name" id="name" readonly>
                                                    </div>
                                                </div> 
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Email</h4></label>
                                                        <input  type="email"  class="form-control" required="" value="<?php echo $job_posts['customer']['email']; ?>"  name="email" id="email" readonly>
                                                    </div>
                                                </div>
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Mobile</h4></label>
                                                        <input  type="mobile"  class="form-control" required="" value="<?php echo $job_posts['customer']['country_code'] . '-' . $job_posts['customer']['mobile']; ?>"  name="mobile" id="mobile" readonly>
                                                    </div>
                                                </div>

                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Address</h4></label>
                                                        <textarea rows="5"  class="form-control" name="address" id="address" readonly><?php echo $job_posts['customer']['address']; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        </fieldset> 

                                        <br><br>
                                    </form>
                                <?php } ?>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-body">
                                <!-- /.box-header -->
                                <?php if (!empty($job_posts['providers'])) { ?>
                                    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >        
                                        <fieldset>
                                            <div class="setting col-sm-10">
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Provider Name</h4></label>
                                                        <input  type="text"  class="form-control" required="" value="<?php echo $job_posts['providers'][0]['name']; ?>"  name="name" id="name" readonly>
                                                    </div>
                                                </div> 
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Email</h4></label>
                                                        <input  type="email"  class="form-control" required="" value="<?php echo $job_posts['providers'][0]['email']; ?>"  name="email" id="email" readonly>
                                                    </div>
                                                </div>
                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Mobile</h4></label>
                                                        <input  type="mobile"  class="form-control" required="" value="<?php echo $job_posts['providers'][0]['country_code'] . '-' . $job_posts['providers'][0]['mobile']; ?>"  name="mobile" id="mobile" readonly>
                                                    </div>
                                                </div>

                                                <div class="setting col-sm-12">
                                                    <div>
                                                        <label><h4>Address</h4></label>
                                                        <textarea rows="5"  class="form-control" name="address" id="address" readonly><?php echo $job_posts['providers'][0]['address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <hr style="color:grey">
                                            <div class="setting col-sm-12">
                                                <div>
                                                    <label><h4>Quotation Price</h4></label>
                                                    <input  type="mobile"  class="form-control" required="" value="<?php echo $job_posts['providers'][0]['quotation']." OMR"; ?>"  name="mobile" id="mobile" readonly>
                                                </div>
                                            </div>

                                            <div class="setting col-sm-12">
                                                <div>
                                                    <label><h4>Quotation description</h4></label>
                                                    <textarea rows="5"  class="form-control" name="address" id="address" readonly><?php echo $job_posts['providers'][0]['quotation_description']; ?></textarea>
                                                </div>
                                            </div>
                                                
                                            </div>
                                            
                                            <div class="setting col-sm-2">
                                                <div class="setting col-sm-12">
                                                    <div style="margin: auto; margin-top: 40px;  text-align: center;"><img class="thumbnail" src="<?php
                                                        if (!empty($job_posts['providers'][0]['profile_image'])) {
                                                            echo base_url('uploads/profile_images/') . $job_posts['providers'][0]['profile_image'];
                                                        } else {
                                                            echo base_url('uploads/profile_images/default.png');
                                                        }
                                                        ?> " height="125" ></div>
                                                </div>
                                            </div>
                                            
                                        </fieldset> 

                                        <br><br>
                                        
                                    </form>
                                <?php } else { ?>
                                    <center><h3>No Provider on this job posts !</h3></center>
                                <?php } ?>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>






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
