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
            <h1>Offers List </h1>
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
                                        <th>Offer Name</th>
                                        <th>Offer Type</th> 
                                        <th width="40%">Description</th>
                                        <th>Discount</th> 
                                        <th>Start date</th> 
                                        <th>End date</th> 
                                        <th>
                                            <form id="form" method="post">
                                                <select class="form-control " name="offer_status" id="offer_status">
                                                    <option value="" >Status</option>
                                                    <option <?php
                                                    if (isset($offer_status) && $offer_status == 1) {
                                                        echo "Selected";
                                                    }
                                                    ?> value="1">Active</option>
                                                    <option <?php
                                                    if (isset($offer_status) && $offer_status == 2) {
                                                        echo "Selected";
                                                    }
                                                    ?> value="2">Expired</option>
                                                </select>
                                            </form>
                                        </th>
                                        <th>Action</th> 

<!--                                    <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>


                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0; //pre($offers); die;
                                    if(!empty($offers)) {
                                    foreach ($offers as $list) { 
                                        if ($list['end_date'] <= date('Y-m-d')) {
                                            $status = 'Expired';
                                            $status_color = 'btn-danger';
                                        }
                                        if ($list['end_date'] >= date('Y-m-d')) {
                                            $status = 'Active';
                                            $status_color = 'btn-success';
                                        }
                                        $i++;
                                        ?>

                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo ucfirst($list['title']); ?></td>
                                            <td><?php echo $list['offer_type']; ?></td>
                                            <td><?php echo $list['description']; ?></td>
                                            <td><?php echo $list['discount']; ?></td> 
                                            <td><?php echo $list['start_date']; ?></td>
                                            <td><?php echo $list['end_date']; ?></td>

        <!--                                             <td><?php //echo $list['create_date'];   ?></td> -->

                                            <td><center><a href="" class="btn btn-round  btn-xs <?php echo $status_color; ?>"><?php echo $status; ?></a></center>


                                            </td>     

                                            <td style="width:10%">
                                                <a href="<?php echo site_url('admin_panel/Offers/create_offer?kjh=' . $list['id']); ?>" class="btn btn-primary userid" data-bind="<?php echo $list['id']; ?>"><i class="fa fa-edit "></i></a> 
                                                <a href="offers_delete?tyhg=<?php echo base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
                                            </td> 
    <!--                                          <td><img width="70px" height="70px" src="<?php echo $image; ?>"></td>-->

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
                                                        // serverSide: true,
                                                        //ajax: '/data-source'
                                                    });
                                                });
    </script>
    <script>
        $('#offer_status').change(function () {
            $("#form").submit();
//            var status = $(this).val();
//            $.ajax({
//                url: "<?php echo base_url('index.php/admin_panel/Offers/offers_list'); ?>",
//                method: 'POST',
//                
//                data: {
//                    offer_status: status
//                },
//                success: function (data) {
//                    //alert(data);
//                    $(document).html(data);
//                    //location.reload();
//                }
//            });

        });
    </script>
    <!-- ./wrapper -->
</div>
</body>
</html>