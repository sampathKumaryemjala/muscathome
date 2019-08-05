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
            <h1>Users List</h1>
<!--            <div style="display-inline">
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Posted date</th>

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
//                                        $image = base_url('uploads/profile_images/default_profile.png');
//                                        if (!empty($list['profile_image'])) {
//                                            $image = base_url('uploads/profile_images/') . $list['profile_image'];
//                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $list['name']; ?></td>
                                            <td><?php echo $list['phone']; ?></td>
                                            <td><?php echo $list['email']; ?></td>
                                            <td><?php echo $list['subject']; ?></td>
                                            <td><?php echo $list['message']; ?></td>
                                            
                                            <?php $datetime = explode(' ', $list['create_date']);
                                            $date = $datetime[0];?>
                                            <td><?php echo $date; ?></td>



                                            <?php /* <td><?php echo $list['address']; ?></td> 
                                              <td><img width="70px" height="70px" src="<?php echo $image; ?>"></td> */ ?>

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
<style>
    .tble-width{
        width:200px !important;
        height:20px !important;
        overflow:hidden !important;
    }
</style>
</html>