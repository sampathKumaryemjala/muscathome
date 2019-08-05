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
            <h1><?php echo $pageTitle ?></h1>
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Position</th>
                                        <th>Email</th>                                                                               
                                        <th>Mobile</th> 
                                        <th>Office</th> 
                                        <th>Created-date</th> 
                                        <th>Status</th> 
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
                                    if(!empty($users)){
                                    foreach ($users as $list) {
                                        $i++;
                                        //pre($list);die;
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td style="width:6%; text-align: center"><img src="<?php if(!empty($list['profile_image'])){ echo base_url('uploads/profile_images/')?><?php echo  $list['profile_image'];} else{ echo base_url('uploads/profile_images/default.png');} ?>" height="60px" width="60px" style="border-radius:50%"></td>
                                            <td><?php echo ucfirst($list['name']); ?></td>
                                            <th><?php echo $list['company_name']; ?></th>
                                            <th><?php echo $list['agent_position']; ?></th>
                                            <td><?php echo $list['email']; ?></td>
                                            <td><?php echo $list['mobile']; ?></td> 
                                            <td><?php echo $list['office_number']; ?></td> 
                                            <td><?php echo date('Y-M-d',strtotime(explode(' ',$list['create_date'])[0])); ?></td> 
                                            <td><a href="<?php echo site_url('admin_panel/Agents/change_agent_status?tyhg=' . base64_encode($list['id'])); ?>" class="btn btn-round <?php if ($list['status'] == 1) {
                                                    echo 'btn-success';
                                                } if ($list['status'] == 0) {
                                                    echo 'btn-danger';
                                                } ?> btn-xs"><?php
                                                    if ($list['status'] == 1) {
                                                        echo 'Active';
                                                    }
                                                    if ($list['status'] == 0) {
                                                        echo 'Inactive';
                                                    }
                                                    
                                                    ?></a>
                                            </td>      
                                            <td style="width:10%">
                                                <a href="<?php echo site_url('admin_panel/Agents/add_agent?kjh='.$list['id']) ;?>" class="btn btn-primary userid" data-bind="<?php echo $list['id']; ?>"><i class="fa fa-edit "></i></a> 
                                                <a href="Agents/agent_delete?tyhg=<?php echo base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
                                            </td>                                      
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
                                                        //"scrollX": true
                                                    });
                                                });
    </script>
    <!-- ./wrapper -->
</div>
</body>
</html>