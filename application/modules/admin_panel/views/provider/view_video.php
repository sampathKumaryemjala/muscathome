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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
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
               <h1><?php //echo $title; ?>Employment Video</h1>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box box-body">
                        <!-- /.box-header -->
                        <center>
                         
                           <video width="400" controls>
                              <source src="<?php echo base_url('uploads/videos/').$provider[0]['details'][2]['video_url']; ?>" >
                           </video>
                        </center>
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