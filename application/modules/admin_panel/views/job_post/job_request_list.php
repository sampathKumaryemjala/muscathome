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
            <h1>Job Request List</h1>
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
                                        <th>Job Post id</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Requester Name</th>
                                        <th>Mobile</th>
                                        <th>Quotation Desc.</th>
                                        <!-- <th>Job Date</th> -->
                                        <th>Request Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if(!empty($job_requests)){
                                    foreach ($job_requests as $list) {
                                        $i++;   
                                        $image = base_url('uploads/profile_images/default_profile.png');
                                        if(!empty($list['profile_image'])){
                                            $image = base_url('uploads/profile_images/').$list['profile_image'];
                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $list['fk_job_post_id']; ?></td>
                                            <td><?php echo $list['service_cat_name']; ?></td>
											<td><?php echo $list['service_sub_cat_name']; ?></td>
                                            <td><?php echo $list['name']; ?></td>
                                            <td><?php echo $list['mobile']; ?></td>
											
											<td><?php echo $list['quotation_description']; ?></td>
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
                                        </tr>
                                    <?php }} ?>
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