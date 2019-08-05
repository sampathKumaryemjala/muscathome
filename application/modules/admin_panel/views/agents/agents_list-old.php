<?php //echo '<pre>'; print_r($providers); die;?>
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
            <h1>Agents List</h1>
            <div style="display-inline">
                <!-- <button class="btn btn-sucess btn-sm" style="float:right" href=<?php //echo base_url('index.php/admin_panel/Advertisement/excel'); ?>" onclick="return  my_method()" style="float: right;">Download record</a>
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
                                      <th>Category</th>
                                      <th>Sub Category</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                        <th>Mobile</th>	
                                        <th>Reg. Date</th> 
                                        <th> Profile image</th>
                                        
<!--                                        <th>Adress</th> 
                                       <th>Image</th>-->
<!--                                        <th>Status</th>-->
<!--                                        <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    foreach ($providers as $list) {
                                        $i++;   
                                        $image = base_url('uploads/profile_images/default_profile.png');
                                        if(!empty($list['profile_image'])){
                                            $image = base_url('uploads/profile_images/').$list['profile_image'];
                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $list['cat_name']; ?></td>
                                            <td><?php echo $list['sub_cat_name']; ?></td>
                                            <td><?php echo $list['name']; ?></td>
                                           <td><?php echo $list['email']; ?></td> 
                                           <td><?php echo $list['country_code'].'&nbsp&nbsp'.$list['mobile']; ?></td>
                                           <td><?php echo date('d/m/Y',strtotime($list['create_date'])); ?></td>
                                 <td><img src="<?php echo base_url().'uploads/agent_documents/'.$list['profile_image']; ?>" width="100px" height="100px"></td>

            <?php /*<td><?php echo $list['address']; ?></td> 
                                            <td><img width="70px" height="70px" src="<?php echo $image; ?>"></td> */ ?>
                                                               
                                        </tr>
                                    <?php } ?>
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
            "scrollX": true
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