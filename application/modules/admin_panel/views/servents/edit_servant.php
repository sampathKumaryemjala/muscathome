<!DOCTYPE html>
<?php //pre($this->session->userdata['login_type']); die;
 ?>
<html>
<head>
<title>Edit Page</title>
</head>
   <?php
$this->load->view('segments/header');
$this->load->view('segments/sidebar');
?>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="z-index: 1">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
        Edit Servants         
         </h1>
         <!--            <div style="display-inline">
            <button class="btn btn-sucess btn-sm" style="float:right" href=#" onclick="return  my_method()" style="float: right;">Download record</a>
            </button>
            </div>-->
         <!--<div class="breadcrumb">
            <button class="btn-primary btn update"><i class="fa fa-plus"> New item</i> </button>  </div>-->
      </section>
      <!-- Main content -->
      <section class="content">
      <div class="row">
      <div class="col-xs-12" style="">
      <div class="box box-primary ">
      <!-- /.box-header -->
      <div class="box-body ">
      <h4  type="hidden" style="margin-top:0px" ><?php //echo $button
 ?> Servants </h4>
<input type="hidden" value="<?php echo $id ?>">
      <form action="<?php echo base_url('index.php/admin_panel/Servents/update_servant?id='.$id); ?>" method="post" name="my_form"  enctype="multipart/form-data">
<?php $id="";?> 


      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Name<?php echo form_error('name') ?></label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Email <?php echo form_error('email') ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email;?>" />
      </div>
      </div>
      </div>
      <div class="row">

      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Age <?php echo form_error('age') ?></label>
      <input type="number" class="form-control" name="age" id="age" placeholder="age" value="<?php echo $age;?>" />
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Mobile <?php echo form_error('mobile') ?></label>
      <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile;?>" />
      </div>
      </div>

     
      </div>
      <div class="row">
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Marital Status <?php echo form_error('marital status') ?></label><br><br>
      &nbsp;&nbsp; <input type="radio" class="" name="marital_status" id="marital_status"  value="1" />    &nbsp;&nbsp;Married    &nbsp;&nbsp;    &nbsp;&nbsp;
      <input type="radio" class="" name="marital_status" id="marital_status"  value="0" checked/>    &nbsp;&nbsp;Single
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Gender <?php echo form_error('gender') ?></label><br><br>
      &nbsp;&nbsp;<input  type="radio" name="gender" value="1" checked>   &nbsp;&nbsp;  Male    &nbsp;&nbsp;   &nbsp;&nbsp;
      <input type="radio" name="gender" value="0">     &nbsp;&nbsp;  Female<br>
      </div>
      </div>
      </div>
      <div class="row">
       <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Religion <?php echo form_error('religion') ?></label>
      <?php $selectedReligion = $this->input->post('religion'); ?>
          <!-- <select class="form-control " id="religion" name="religion" >
               <option value="">Select Religion</option>
               <option <?=($selectedReligion=="Buddhism"?"selected":"")?> value="Buddhism">Buddhism</option>
               <option <?=($selectedReligion=="Christian"?"selected":"")?> value="Christian">Christian</option>
               <option <?=($selectedReligion=="Islam"?"selected":"")?> value="Islam">Islam</option>
               <option <?=($selectedReligion=="Hindu"?"selected":"")?> value="Hindu">Hindu</option>
               <option <?=($selectedReligion=="Other"?"selected":"")?> value="Other">Other</option>
          </select> -->

          <?php 
          $religions = [
               "nothing" => "Select Religion" , 
               "Buddhism" => "Buddhism" ,
               "Christian" => "Christian" ,
               "Islam" => "Islam" ,
               "Hindu" => "Hindu" ,
               "Other" => "Other" ,
          ]
          ?>
          <?=show_combo($religions ,"form-control " , "religion" , "religion" , "", $selectedReligion)?>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Highest Education <?php echo form_error('highest_degree') ?></label>
      <input type="text" class="form-control" name="highest_degree" id="highest_degree" placeholder="qualification" value="<?php echo $highest_degree;?>" />
      </div>
      </div>
     
      </div>
      <div class="row">
       <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Current Organisation <?php echo form_error('current_org') ?></label>
      <input type="text" class="form-control" name="current_org" id="current_org" placeholder="current_org" value="<?php echo $current_org;?>" />
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="int">Select Country <?php echo form_error('country_code') ?></label>
      <!---  <input type="text" class="form-control" name="main_stream_id" id="main_stream_id" placeholder="Main Stream Id" value="<?php echo $main_stream_id; ?>" />-->
      <select selected="selected" class="form-control " id="country_code" name="country_code" />
      <option value="0|'NA'|'NA'">Select Country</option>
      
      <?php

        
if (!empty($countries)) {
    foreach ($countries as $country) {
     
?>
      <option selected="selected" value="<?php echo $country->id; ?>|<?php echo $country->country_code; ?>|<?php echo $country->country_name; ?>" <?php //if($country->id == $main_stream_id) {echo "selected=selected";}
         ?>><?php echo $country->country_name ?></option>
      <?php
    }
}
?>
      </select>
      </div>
      </div>

      </div>
      <div class="row">
            <div class="col-md-6">
      <div class="form-group">
      <label for="int">Select City<?php echo form_error('city_id') ?></label>
      <select  class="form-control " id="city_id" name="city_id" />
      <option value="0|'NA'">Select City</option>
      <?php
if (!empty($city)) {
    foreach ($city as $rl) {
?>
      <option selected="selected" value="<?php echo $rl->id ?>|<?php echo $rl->name ?>" <?php //if($rl->id == $parent_id) {
        //  echo "selected=selected";}
        
?>><?php echo $rl->name; ?></option>
      <?php
    }
}
?>
      </select>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Category<?php echo form_error('Category') ?></label>
      <input type="text" class="form-control" name="Category" id="Category" placeholder="Category" value="Employment<?php 
 ?>"   readonly/>
      </div>
      </div>
      </div>
     
      
      <div class="row">
       <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Experience<?php echo form_error('experience') ?></label>
      <input type="text" class="form-control" name="experience" id="experience" placeholder="in Months" value="<?php echo $experience;
 ?>" />     
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="varchar">Subcategory<?php echo form_error('fk_service_sub_cat_id'); ?></label>
      <!--  <input type="text" class="form-control" name="Subcategory" id="Subcategory" placeholder="Subcategory" value="<?php //echo $qualification;
 ?>" />
         -->
      <select class="form-control " id="fk_service_sub_cat_id" name="fk_service_sub_cat_id" />
          <option value="0">Select Subcategory</option>
          <?php
               if (!empty($subcategory)) {
               foreach ($subcategory as $sub) {
               ?>
          <option selected="selected" value="<?php echo $sub->id ?>" <?php //if($rl->id == $parent_id) {
                    //  echo "selected=selected";}
                    
               ?>><?php echo $sub->name; ?>
          </option>
          <?php          }               }               ?>
      </select>
      </div>
      </div>
     
      </div>
      <div class="row">
          <div class="col-md-6">
               <div class="form-group">
                    <label for="varchar">Maid Salary <?php echo form_error('expected_salary') ?></label>
                    <input type="text" class="form-control" name="expected_salary" id="expected_salary" placeholder="salary" value="<?php echo $expected_salary;?>" />
               </div>
           </div>  

         <div class="col-md-6">
               <div class="form-group">
               <label for="varchar">Description</label>
               <textarea  class="form-control" name="about_servent" id="about_servent" placeholder="Description" value="<?php echo $about_servent; ?>"> <?php echo $about_servent; ?> </textarea>
           </div>
               
          </div>   
          <!-- FOR NATIONALITY -->
          <div class="col-md-6">
               <div class="form-group">
                    <label for="varchar">Nationality <?php echo form_error('nationality') ?></label>
                    <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" value="<?php echo $nationality;?>" />
               </div>
          </div>  
          <div class="col-md-6">
               <div class="form-group">
                    <label for="varchar">Agency Commission <?php echo form_error('commission') ?></label>
                    <input type="text" class="form-control" name="commission" id="commission" placeholder="commission" value="<?php echo $commission;?>"/>
               </div>
          </div>  

          </div> 
      <div class="row">
          <div class="col-md-6">
               <div class="form-group">
                    <label for="varchar">Upload Documents<?php //echo $error; ?> </label>
                    <input type="file"  class="form-control" name="cv_url" id="cv_url"   />
                    <img src="">
               </div>
          </div>
          <!-- <div class="col-md-6">
               <div class="form-group">
                    <label for="varchar">Upload Video</label>
                    <input type="file"  class="form-control" name="video_url" id="video_url"  />
               </div>
          </div> -->
          <div class="col-md-6">
          

               <div class="form-group">
                    <label for="varchar">Upload Image<?php //echo $error; ?> </label>
          
                    <input type="file"  class="form-control" name="image_url" id="image_url" />
               </div>
          </div>
      </div>
     
      <div class="row">
          
          
      </div>

       <input type="hidden"  class="form-control" name="country_id" value="<?php //echo $id;
 ?>" />
        <input type="hidden"  class="form-control" name="file_name" value="<?php
//echo  $file_name;
 ?>" /> 
      <input type="hidden"  class="form-control" name="id" value="<?php //echo $id;
 ?>" /> 
      <button type="submit" class="btn btn-primary">Update</button>         
      </form>
      </div>
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>
      <!-- /.col -->
      </section>                
      </div>
      <!-- /.row -->
      <div style=" width: 100%; " id="menu_pop_up"></div>
      <!-- /.content-wrapper -->
      <?php $this->load->view('segments/footer'); ?>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
         $(document).ready(function () {
             $('#example2').DataTable({
                 "scrollX": true
             });
         });
      </script>
      <!-- ./wrapper -->
   </div>

        
   </body>
</html>

