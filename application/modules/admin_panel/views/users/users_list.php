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
            <h1>User List </h1>
            <!--<div style="display-inline">
                <button class="btn btn-sucess btn-sm" style="float:right" href=<?php echo base_url('index.php/admin_panel/Advertisement/excel'); ?>" onclick="return  my_method()" style="float: right;">Download record</a>
                </button>
            </div>-->
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
                                        <th>Name</th>
                                        <th>Email</th>                                                                               
                                        <th>Phone</th> 
                                        <th>Regsitration date</th> 
                                        <th>Change Status</th> 
                                        <th>Action</th> 
<!--                                        <th>Adress</th> 
                                       <th>Image</th>-->
<!--                                        <th>Status</th>-->
<!--                                        <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    foreach ($users as $list) {
                                        $status = 'Block';
                                        $status_color = 'btn-danger';
                                        if ($list['status'] == 1) {
                                            $status= 'Active';
                                             $status_color = 'btn-success';
                                        }
                                        $i++;
                                        $image = base_url('uploads/profile_images/default_profile.png');
                                        if (!empty($list['profile_image'])) {
                                            $image = base_url('uploads/profile_images/') . $list['profile_image'];
                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo ucfirst($list['name']); ?></td>
                                            <td><?php echo $list['email']; ?></td>
                                            <td><?php echo $list['mobile']; ?></td> 
                                            <td><?php echo date('Y-M-d',strtotime(explode(' ',$list['create_date'])[0])); ?></td> 
                                            <td><a href="<?php echo site_url('admin_panel/Users/change_user_status?tyhg=' . base64_encode($list['id'])); ?>" class="btn btn-round  btn-xs <?php echo $status_color; ?>"><?php echo $status;   ?></a></td>      
                                            <td style="text-align:center">
<!--                                                <a href="<?php //echo site_url('admin_panel/Agents/add_agent?kjh='.$list['id']) ;?>" class="btn btn-primary userid" data-bind="<?php //echo $list['id']; ?>"><i class="fa fa-edit "></i></a> -->
                                                <a href="Users/user_delete?tyhg=<?php echo base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');"> <i class="fa fa-trash"></i></a> 
                                            </td> 
    <?php /* <td><?php echo $list['address']; ?></td> 
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
                //"scrollX": true
            });
        });
    </script>
    <!-- ./wrapper -->
</div>
</body>
</html>