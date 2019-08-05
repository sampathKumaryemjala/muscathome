<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Muscat Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
 
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>change Password</b>
    <a href="<?php echo base_url(""); ?>index.php/admin_panel/Admin/dashboard" >
                                <span class="hidden-xs"> <b>Dashboard</b> </span>
                            </a> 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">change your Password</p>
       
    
    <?php if($this->session->flashdata('error_message')){ ?>
    <p class="login-box-msg bg-danger">
       <?php echo $this->session->flashdata('error_message'); ?>
    </p>  
        <?php 
    } ?>
    
    <form action="ad_updatePassword" method="post" autocomplete="off">
     
      <div class="form-group has-feedback">
        <input class="form-control" id='password' placeholder="Old Password" name="oldpassword" required  type="password" value="<?=set_value('oldpassword')?>">
        <?php echo form_error('oldpassword', '<p class="error">', '</p>')?>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" id='password' placeholder="New Password" name="newpassword"  required  type="password" value="<?=set_value('newpassword')?>">
        <?php echo form_error('newpassword', '<p class="error">', '</p>')?>
    </div>
      <div class="form-group has-feedback">
        <input class="form-control" id='password' placeholder="Confirm Password" name="confirmpassword" required type="password" value="<?=set_value('confirmpassword')?>">
        <?php echo form_error('confirmpassword', '<p class="error">', '</p>')?>
      </div>
     
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name='pass_update' value='update' class="btn btn-primary btn-block btn-flat">UPDATE</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
