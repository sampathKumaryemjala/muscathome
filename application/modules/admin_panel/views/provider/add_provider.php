<?php
//pre($ads); die();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin|Food Court</title>
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
                    <h1>Add advertisement</h1>
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
                                <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >        
                                    <?php if (isset($ads)) { ?>
                                        <input type="hidden" value="<?php echo $ads['id'] ?>" name="id" id="id" >
<?php } ?>
                                    <fieldset>
                                        <div class="setting col-md-12">
                                            <div>
                                                <label><h4> Title </h4></label>
                                                <input  type="text"  class="form-control" required="" value="<?php
                                                if (isset($ads)) {
                                                    echo $ads['name'];
                                                }
                                                ?>"  name="title">
                                            </div>
                                        </div>                                        
                                    </fieldset> 
									
			<!-- adding  my advertisement:ravi		-->
							 <fieldset>
                                        <div class="setting col-md-12">
                                            <div>
                                                <label><h4> Description </h4></label>
                                                <input  type="text"  class="form-control" required="" value="<?php
                                                if (isset($ads)) {
                                                    echo $ads['name'];
                                                }
                                                ?>"  name="description">
                                            </div>
                                        </div>                                        
                                    </fieldset> 
                                   
									
									
                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Date from</h4></label>
                                                <input id="datepicker" name="date_from" type="text"  class="form-control" required="" value="<?php
                                                       if (isset($ads)) {
                                                           echo $ads['mobile'];
                                                       }
                                                       ?>"  >
                                            </div>
                                        </div>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Date to </h4></label>
                                                <input name="date_to" type="text"  class="form-control" required="" value="<?php
                                                       if (isset($ads)) {
                                                           echo $ads['password'];
                                                       }
                                                       ?>"  >
                                            </div>
                                        </div>
                                    </fieldset> 

                                    <fieldset>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Image upload </h4></label>
                                                <input type="file" name="ad_image">
                                            </div>
											
											
                                        </div>
                                        <div class="setting col-md-6">
                                            <div>
                                                <label><h4>Status </h4></label>
                                                <select name="status" class="form-control" required="">
                                                    <option selected value="1"> Active </option>
                                                    <option value="0"> Inactive </option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset> 
                                    
									
									 <fieldset>
                                        <div class="setting col-md-12">
                                            <div>
                                                <label><h4> Link_url </h4></label>
                                                <input  type="text"  class="form-control" required="" value="<?php
                                                if (isset($ads)) {
                                                    echo $ads['name'];
                                                }
                                                ?>"  name="link_url">
                                            </div>
                                        </div>                                        
                                    </fieldset> 
                            
									<br><br>
									
									
                                    <div class="submit col-md-6"><button id="submit12" type="submit" class="btn btn-primary" style="margin-left: 60%; width:200px;" ><?php
                                            if (isset($ads)) {
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
