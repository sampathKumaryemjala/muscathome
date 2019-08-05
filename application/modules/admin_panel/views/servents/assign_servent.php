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
                                        <th>Servant Name</th>
                                        <th>Date</th>                                                                               
                                        <th>Action</th> 
                                        <th>Delete</th> 
<!--                                        <th>Adress</th> 
                                       <th>Image</th>-->
<!--                                        <th>Status</th>-->
<!--                                        <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if (!empty($requests)) {
                                        foreach ($requests as $list) {
                                            if ($list['status'] == 0) {
                                                $status = 'Pending';
                                                $status_color = 'btn-warning';
                                            }
                                            if ($list['status'] == 1) {
                                                $status = 'Active';
                                                $status_color = 'btn-success';
                                            }
                                            if ($list['status'] == 2) {
                                                $status = 'Rejected';
                                                $status_color = 'btn-danger';
                                            }
                                            $i++;
                                            ?>
                                            <tr class="record even gradeA">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo ucfirst($list['user_profile']['name']); ?></td>
                                                <td><strong><?php echo ucfirst($list['service_sub_cat']); ?></strong></td> 
                                                <td><?php echo ucfirst($list['servent_profile']['name']); ?></td>
                                                <td><?php echo explode(" ", $list['create_date'])[0]; ?></td>
                                                <td><div class="request_status_container<?php echo $list['id']; ?>"><a onclick="change_request_status(<?php echo $list['id']; ?>,<?php echo $list['status']; ?>)" href="javascript:void()" class="btn btn-round btn-xs <?php echo $status_color; ?> request_status"><?php echo $status; ?></a></div></td>      
                                                <td style="text-align:center">
        <!--                                                <a href="<?php //echo site_url('admin_panel/Agents/add_agent?kjh='.$list['id']) ; ?>" class="btn btn-primary userid" data-bind="<?php //echo $list['id'];  ?>"><i class="fa fa-edit "></i></a> -->
                                                    <a href="<?php echo site_url('admin_panel/Servents/servent_delete?tyhg=') . base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Service provider?');"> <i class="fa fa-trash"></i></a> 
                                                </td> 
                                                <?php /* <td><?php echo $list['address']; ?></td> 
                                                  <td><img width="70px" height="70px" src="<?php echo $image; ?>"></td> */ ?>

                                            </tr>
                                        <?php }
                                    } ?>
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
    function change_request_status(id,status){
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
    };
    </script>
    <!-- ./wrapper -->
</body>
</html>