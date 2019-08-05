<?php //pre($users); die;  ?>
<!DOCTYPE html>
<html>
    <?php
    $this->load->view('segments/header');
    $this->load->view('segments/sidebar');
    ?>
    <style>
        .no-hover:hover{
            cursor:default;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="z-index: 1">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Properties List</h1>
            <div class="breadcrumb">
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
                                    <tr class="hello" style="width:300px;">
                                        <th>#</th>
                                        <th >Posted By</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Lat/Long</th>
<!--                                        <th>Longitude</th>-->
                                        <th>Price</th>
                                        <th>Beds</th>
<!--                                        <th>Property Type</th>-->
                                        <th>Property Size</th>
<!--                                        <th>Property name</th>-->
<!--                                        <th><center>Address</center></th>-->
                                        <th>Posted Date</th>
                                        <th>Sold Status</th>
                                        <th>Status</th>
                                        <th><center>Actions</center></th>
                                </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if (!empty($users)) {
                                        foreach ($users as $list) {
                                            $i++;
                                            $image = base_url('uploads/profile_images/default_profile.png');
                                            if (!empty($list['profile_image'])) {
                                                $image = base_url('uploads/profile_images/') . $list['profile_image'];
                                            }
                                            ?>
                                            <tr class="record even gradeA">
                                                <td><?php echo $i; ?></td>
                                                <td><?php
                                                    if ($list['user_type'] = 0) {
                                                        echo "User";
                                                    } if ($list['user_type'] = 2) {
                                                        echo "Agent";
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if ($list['type'] == 0) {
                                                        echo("Buy");
                                                    } else {
                                                        echo("rent");
                                                    }
                                                    ?></td>
                                                <td><?php echo $list['location']; ?></td>
                                                <td><?php echo $list['latitude'] . '/' . $list['longitude']; ?></td>
        <!--                                            <td><?php //echo $list['longitude'];  ?></td>-->
                                                <td><?php echo $list['price']; ?></td>
                                                <td><?php echo $list['beds']; ?></td>
        <!--                                            <td><?php //echo $list['property_type'];  ?></td>-->
                                                <td><?php echo $list['property_size']; ?></td>
        <!--                                            <td><?php //echo $list['property_name'];  ?></td>-->
        <!--                                            <td style="width:100%;"><?php //echo $list['addresss'];  ?></td>-->
                                                <td><?php echo date('d/m/Y', strtotime($list['create_date'])); ?></td>

                                                <?php
                                                if ($list['is_sold'] == 1) {
                                                    $btntype = "btn-success";
                                                    $btntext = "Sold";
                                                } else {
                                                    $btntype = "btn-warning";
                                                    $btntext = "UnSold";
                                                }
                                                ?>
                                                <td><div class="sold_status" onclick="return confirm('Are you sure you want to change the property sold status ?');" id="<?php echo $list['id']; ?>"><a class="btn <?php echo $btntype; ?> btn-xs"><?php echo $btntext; ?></a></div></td>
                                                <?php
                                                if ($list['status'] == 1) {
                                                    $btn_type = "btn-success";
                                                    $btn_text = "Approved";
                                                } else {
                                                    $btn_type = "btn-danger";
                                                    $btn_text = "Pending";
                                                }
                                                ?>
                                                <?php if ($this->session->userdata['backend_user']['user_type'] == 2) { ?>
                                                <td><div><a class="btn <?php echo $btn_type; ?> btn-xs"><?php echo $btn_text; ?></a></div></td>
                                                <?php } else { ?>
                                                <td><div class="prop_status" onclick="return confirm('Are you sure you want to change the property status ?');" data-id="<?php echo $list['id']; ?>" id="<?php echo "status_".$list['id']; ?>"><a class="btn <?php echo $btn_type; ?> btn-xs"><?php echo $btn_text; ?></a></div></td>
                                                <?php } ?>

                                                <td style="display:inline-block;width:200px; text-align: center;">
                                                    <a class="btn btn-success userid" data-bind="<?php echo $list['id']; ?>" data-toggle="modal" data-target="#usermodal"><i class="fa fa-eye"></i></a>
                                                    <?php if($this->session->userdata['backend_user']['user_type'] == 2) {?>
                                                    <a href="<?php echo site_url('admin_panel/Properties/create?kjh=' . $list['id']); ?>" class="btn btn-primary" data-bind="<?php echo $list['id']; ?>"><i class="fa fa-edit "></i></a> 
                                                    <?php } ?>
                                                    <a href="delete?tyhg=<?php echo base64_encode($list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
                                                </td></tr>
    <?php }
} ?>
                            </table>
                            </tbody>
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

    <div id="getmodal">
    </div>
</body>
<style>
    .tble-width{
        width:200px !important;
        height:20px !important;
        overflow:hidden !important;
    }
</style>
<script>
    $(document).ready(function () {
        $(document).on('click', '.userid', function () {
            var id = $(this).attr('data-bind');
            //alert(id); exit;

            $.ajax({
                url: "<?php echo base_url('index.php/admin_panel/') ?>Properties/ajax_property_list",
                method: 'POST',
                data: {
                    id: id
                },
                success: function (response) {  //alert(response);                  
                    $("#getmodal").html(response);
                    $("#usermodall").modal("toggle");
                }

            });
        });
    });
</script>




<script>
    $(document).ready(function () {
        $(".prop_status").click(function () {
            var id = $(this).attr("data-id");
            var eid = btoa(id);
            $.ajax({
                url: "<?php echo base_url('index.php/admin_panel/') ?>Properties/change_status_ajax",
                method: 'GET',
                data: {
                    id: eid
                },
                success: function (response) {  //alert(response); 
                    $("#status_" + id).empty();
                    $("#status_" + id).html(response);
                }

            });
        });
    });

    $(document).ready(function () {
        $(".sold_status").click(function () {
            var id = $(this).attr("id");
            var eid = btoa(id);
            $.ajax({
                url: "<?php echo base_url('index.php/admin_panel/') ?>Properties/change_sold_status_ajax",
                method: 'GET',
                data: {
                    id: eid
                },
                success: function (response) { //alert(response); 
                    $("#" + id).empty();
                    $("#" + id).html(response);
                }

            });
        });
    });
</script>

</html>