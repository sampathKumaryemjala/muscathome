<?php //echo '<pre>'; print_r($job_requests); die;?>
<!DOCTYPE html>
<html>
<?php
$this->load->view('segments/header');
$this->load->view('segments/sidebar');
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="z-index: 1">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Job Post List</h1>
            <div style="display-inline">
              <!--   <button class="btn btn-sucess btn-sm" style="float:right" href=<?php //echo base_url('index.php/admin_panel/Advertisement/excel'); ?>" onclick="return  my_method()" style="float: right;">Download record</a>
                </button> -->
            </div>
            <div class="breadcrumb">
 <!--<button class="btn-primary btn update"><i class="fa fa-plus"> New item</i> </button>  </div>-->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr class="hello">
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Title</th>
<!--                                        <th>Description</th>-->
                                        <th>Budget</th>
                                        <th>Final Price</th>
<!--                                        <th>Budget</th>
                                        <th>Workforce</th>-->
                                        <th>Address</th>
                                        <!-- <th>Job Date</th> -->
                                        <th>Posted On</th>
                                        <th>Work Status</th>
                                        <th>Status</th>
                                        <th><center>View</center></th>
                                        <th><center>Actions</center></th>
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if(!empty($job_post)){
                                    foreach ($job_post as $list) {
                                        //pre($list['request']['quotation']); die;
                                        $i++;   
                                        $image = base_url('uploads/profile_images/default_profile.png');
                                        if(!empty($list['profile_image'])){
                                            $image = base_url('uploads/profile_images/').$list['profile_image'];
                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><a href="<?php echo base_url('index.php/admin_panel/Users/user_detail?id=').$list['fk_user_id']; ?>"><?php echo $list['username']; ?></a></td>
                                            <td><?php echo $list['cate_name']; ?></td>
                                            <td><?php echo $list['sub_cat_name']; ?></td>
                                            <td><?php echo $list['title']; ?></td>
<!--                                            <td style="width: 3%; word-wrap: suppress;"><?php //echo $list['description']; ?></td>-->
                                            <td><?php if(isset($list['request'])){ echo $list['request']['quotation']; } ?></td>
                                            <td><?php if(isset($list['request'])){ echo $list['request']['final_price']; } ?></td>
                                            <td><?php if(isset($list['address'])) {echo $list['address'];}?></td>
                                            <!-- <td><?php //echo $list['dated']; ?></td> -->
                                            <td><?php echo $list['create_date'];?></td>
                                            <td><span class="btn btn-round <?php if($list['status']==0){ echo 'btn-warning';} if($list['status']==1){ echo 'btn-info';} if($list['status']==2){ echo 'btn-success';} if($list['status']==3){ echo 'btn-danger';} if($list['status']==5){ echo 'btn-primary';}?> btn-xs"><?php 
                                            if($list['status']==0){
                                                echo 'Pending';
                                            }
                                            if($list['status']==1){
                                                echo 'Accepted';
                                            }
                                            if($list['status']==2){
                                                echo 'Completed';
                                            }
                                            if($list['status']==3){
                                                echo 'Removed';
                                            }if($list['status']==5){
                                                echo 'Started';
                                            }?></span>
                                           </td>  
                                           <td><a href="Job_post/job_approval?ghjg=<?php echo base64_encode($list['id']);?>"><span class="btn btn-round <?php if($list['is_approved']==0){ echo 'btn-danger';} if($list['is_approved']==1){ echo 'btn-success';} ?> btn-xs"><?php 
                                            if($list['is_approved']==0){
                                                echo 'Pending';
                                            }
                                            if($list['is_approved']==1){
                                                echo 'Approved';
                                            }
                                            ?></span></a>
                                           </td> 
                                           <td>
                                                <center>
                                                    <a class="btn btn-success userid" href="<?php echo base_url('index.php/admin_panel/Job_post/job_details?id=').$list['id']; ?>" ><i class="fa fa-eye"></i></a>
                                                </center>
                                            </td>
                                            <td><center><a href="<?php base_url('index.php/admin_panel/Job_post/delete_job_post/').$list['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Job Post?');"> <i class="fa fa-trash"></i></a> </center></td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
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
              // "scrollX": true
              // serverSide: true,
              // ajax: '/data-source'
           });
       });
    </script>

    <!-- ./wrapper -->
</div>
</body>
<style>
.tble-width{
	width:200px !important;
	height:20px !important;
	overflow:hidden !important;
}
</style>
</html>