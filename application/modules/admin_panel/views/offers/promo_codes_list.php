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
            <h1>Promocodes List </h1>
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
                                        <th>Code</th>
                                        <th>Start date</th>                                                                               
                                        <th>End date</th> 
                                        <th>Discount</th> 
                                        <th>No. of uses</th> 
                                        <th>Description</th> 
<!--                                        <th>Create date</th> -->
                                        <th>Status</th> 
                                        <th>Action</th> 
<!--                                    <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>

                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if(!empty($promo)){
                                    foreach ($promo as $list) {
                                        if ($list['end_date'] < date('Y-m-d')) {
                                            $status = 'Expired';
                                            $status_color = 'btn-danger';
                                        }
                                        if ($list['end_date'] > date('Y-m-d')) {
                                            $status = 'Active';
                                            $status_color = 'btn-success';
                                        }
                                        $i++;
                                        ?>

                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo ucfirst($list['code']); ?></td>
                                            <td><?php echo $list['start_date']; ?></td>
                                            <td><?php echo $list['end_date']; ?></td> 
                                            <td><?php echo $list['discount']; ?></td>
                                            <td><?php echo $list['no_of_uses']; ?></td>
                                            <td><?php echo $list['description']; ?></td> 
<!--                                            <td><?php //echo $list['create_date']; ?></td> -->
                                            <td><a href="" class="btn btn-round  btn-xs <?php echo $status_color; ?>"><?php echo $status; ?></a></td>
                                            <td style="width:10%">
                                                <a href="<?php echo site_url('admin_panel/Offers/create_promo_code?kjh=' . $list['id']); ?>" class="btn btn-primary userid" data-bind="<?php echo $list['id']; ?>"><i class="fa fa-edit "></i></a> 
                                                <a href="promo_codes_delete?tyhg=<?php echo base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
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
                //"scrollX": true
                        // serverSide: true,
                        //ajax: '/data-source'
            });
        });
    </script>
    <!-- ./wrapper -->
</div>
</body>
</html>