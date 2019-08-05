<?php //pre($users); die;?>
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
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Subcategory name</th>
                                        <th>Category name</th>
                                        <th>Create date</th>
                                        <th><center>Actions</center></th>
                                    </tr>
                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if(!empty($subcategories)){
                                    foreach ($subcategories as $list) {
                                        $i++;
//                                        $image = base_url('uploads/profile_images/default_profile.png');
//                                        if (!empty($list['profile_image'])) {
//                                            $image = base_url('uploads/profile_images/') . $list['profile_image'];
//                                        }
                                        ?>
                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td style="width:6%; text-align: center"><img src="<?php if(!empty($list['icon'])){ echo base_url('uploads/services/icons/')?><?php echo  $list['icon'];} else{ echo base_url('uploads/services/icons/icon.png');} ?>" height="60px" width="60px" style="border-radius:50%"></td>
                                            <td><?php echo $list['subcatname']; ?></td>
                                            <td><?php echo $list['catname']; ?></td>
                                            <?php $datetime = explode(' ', $list['date']);
                                            $date = $datetime[0];
                                            ?>
                                            <td><?php echo $date; ?></td>
                                            <td>
                                                <center>
                                                    <a href="<?php echo site_url('admin_panel/Category/edit_subcat?kjh='.base64_encode($list['id'])) ;?>" class="btn btn-primary"><i class="fa fa-edit"></i></a> 
                                                    <a href="delete_subcat?tyhg=<?php echo base64_encode($list['id']);  ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
                                                </center>
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
                      // serverSide: true,
                      //ajax: '/data-source'
                   });
               });
           </script>
           <script>
            // $(document).ready(function () { 
            //     $('#example2').DataTable({ 
            //         //"processing": true, 
            //         //"serverSide": true, 
            //         //"draws":"20", 
            //         "deferRender": true, 
            //         ajax: { 
            //             "url" : "http://localhost/real_estate/index.php/admin_panel/Properties/get_properties_ajax", 
            //             "dataType" : "json", 
            //             data : function(d){ 
            //                 //alert(d.name); 
            //             } 
            //         }, 
            //         "columns" :[ 
            //         { data : "id" }, 
            //         { data : "name"}, 
            //         { data : "email"}, 
            //         { data : "mobile"}, 
            //         { data : "password"}, 
            //         { data : "user_type"}, 
            //         { data : "create_date"} ] 
            //     }); 
            // });
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
                url: "<?php echo base_url('index.php/admin_panel/') ?>Users/ajax_get_user",
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
</html>