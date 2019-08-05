<?php
//pre($provider); die();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pageTitle; ?></title>
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
                    <h1><?php //echo $title; ?> 
                     Servant Profile   
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                               <div class="container">
        <div class="col-sm-8">

            <div data-spy="scroll" class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        
                        <li class="active">
                            <a href="#tab_default_3" data-toggle="tab">
                                Personal Details</a>
                        </li>
                        <li>
                            <a href="#tab_default_2" data-toggle="tab">
                                Education& Career</a>
                        </li>
                        <li >
                            <a href="#tab_default_1" data-toggle="tab">
                                About </a>
                        </li>
                        
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane " id="tab_default_1">
                        <p> About </p>
                            
                            <div class="panel panel-default"> <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <p>  <?php echo $servent_detail['about_servent']; ?> </p>
                                  
                                </div>   
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="commission">Agency Commission:</label>
                                    <p> <?php echo $servent_detail['commission']; ?></p>
                                </div>   
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="salary">Maid Salary:</label>
                                    <p> <?php echo $servent_detail['expected_salary']; ?></p>
                                </div> 
                            </div>
                          

                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="marital_status">Image:</label>
                                    <div style="width: 100px; height: 80px;">
                                        <img src="<?php
                                        if (!empty($servent_detail['image_url'])) {
                                            echo base_url('uploads/profile_images/').$servent_detail['image_url'];
                                        } else {
                                            echo base_url('uploads/profile_images/default.png');
                                        }
                                        ?>" style="width: 100%; height: 100%;">
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="marital_status">Marital status:</label>
                                    <p> <?php if ($servent_detail['marital_status'] == 0) {
                                                    echo "Single";
                                                } else {
                                                    echo "Married";
                                                } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="organisation">Current Organisation:</label>
                                    <p> <?php echo $servent_detail['current_org']; ?></p>
                                </div>
                            </div>
                          
                           
                    </div> 
                </div>

                        </div>
                        <div class="tab-pane" id="tab_default_2">
                            <p>
                                Education& Career
                            </p>
                                                        <div class="panel panel-default"> <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Highest Education:</label>
                                        <p> <?php echo $servent_detail['highest_degree']; ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Experience</label>
                                        <p> <?php echo $servent_detail['experience'] . " months"; ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email"> Curriculum Vitae (CV)</label>
                                        <p><a href="<?php  echo base_url('uploads/').$servent_detail['cv_url']; ?>" download> Download Now</a></p>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="tab-pane active" id="tab_default_3">
                            <p>
                                Personal Details
                            </p>
                            

                            <div class="panel panel-default"> <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Name:</label>
                                        <p> <?php echo $servent_detail['name']; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <p> <?php echo $servent_detail['nationality']; ?></p>
                                     </div>
                                    <div class="form-group">
                                        <label for="email">Gender:</label>
                                        <p> <?php if ($servent_detail['gender'] == 1) {
                                                echo "Male";
                                            } else {
                                                echo "Female";
                                            } ?>
                                        </p>
                                    </div>
<!--                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <p> <?php //echo $servent_detail['email']; ?></p>
                                    </div>-->
                                   
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">City:</label>
                                        <p> <?php echo $servent_detail['city']; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Age:</label>
                                        <p> <?php echo $servent_detail['age']; ?></p>
                                    </div>
<!--                                    <div class="form-group">
                                        <label for="email">Phone:</label>
                                        <p> <?php //echo $servent_detail['mobile']; ?></p>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="email">Sevice Category:</label>
                                        <p> <?php echo $servent_detail['cat_name']; ?></p>
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div> </div>
                    </div>
                </div>
            </div>

        </div>
<!--     <div class="col-sm-4" style="display:none;">
            <div class="panel panel-default">
                <div class="menu_title">
                    Quick Look
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" name="servent_requset_form">
                                <div class="form-group">
                                    <label for="email">Name:</label>
                                    <p> <?php echo $servent_detail['name']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Age:</label>
                                    <p> <?php echo $servent_detail['age']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Gender:</label>
                                    <p> <?php if ($servent_detail['gender'] == 1) {
    echo "Male";
} else {
    echo "Female";
} ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <p> <?php //echo $servent_detail['email']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone:</label>
                                    <p> <?php //echo $servent_detail['mobile']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Sevice Category:</label>
                                    <p> <?php echo $servent_detail['sub_cat_name']; ?></p>
                                </div>
                                <input type="hidden" name="fk_servent_id" value="<?php echo $servent_detail['id']; ?>">
                                <?php if($this->session->flashdata('without_login')==null){ ?>
                                <button type="submit" class="btn btn-danger btn-block">Send a Request</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  --> 
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
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            //startDate: '-3d',
            endDate: '-1d',
            autoclose: true
        });
        $('#date_to').datepicker({
            format: 'yyyy-mm-dd',
            //startDate: '-3d',
            //endDate: '-2d',
            autoclose: true
        });
    });

</script>
		


    </body>
</html>
