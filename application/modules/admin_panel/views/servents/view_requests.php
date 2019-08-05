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
            <h1><?php echo $title ?></h1>
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
                                        <th>User name</th>
<!--                                        <th>Category</th>-->
                                        <th>Request type</th>
                                        <th>Date</th>                                                                               
                                        <th>View</th> 
<!--                                        <th>Adress</th> 
                                       <th>Image</th>-->
<!--                                        <th>Status</th>-->
<!--                                        <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i =1 ;
                                    if (!empty($requests)) {
                                        foreach ($requests as $list) {
                                            ?>
                                            <tr class="record even gradeA">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo ucfirst($list['user_profile']['name']); ?></td>
                                                <td><strong><?php echo ucfirst($list['service_sub_cat']); ?></strong></td> 
                                                <td><?php echo explode(" ", $list['create_date'])[0]; ?></td>
                                                <td style="text-align:center">
                                                    <a href="<?php echo site_url('admin_panel/Servents/assign_servent_to_user?tyhg='.base64_encode($list['user_profile']['id']).'&adfd='.base64_encode($list['service_sub_cat'])); ?>" class="btn btn-primary" > <i class="fa fa-eye"></i></a> 
                                                </td> 
                                                <?php /* onclick="return confirm('Are you sure you want to delete this Service provider?');"<td><?php echo $list['address']; ?></td> 
                                                  <td><img width="70px" height="70px" src="<?php echo $image; ?>"></td> */ ?>
                                            </tr>
                                        <?php $i++ ; }
                                    }
                                    ?>
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
    <script>
        function change_request_status(id, status) {
            jQuery.ajax({
                url: "<?php echo base_url('index.php/admin_panel/servents/ajax_update_servent_request_status'); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    if (data) {
                        $(".request_status_container" + id).empty();
                        $(".request_status_container" + id).html(data);
                    } else {
                        alert('Your request can not be procceded');
                    }
                }
            });
        }
        ;
    </script>
    <!-- ./wrapper -->
</body>
</html>