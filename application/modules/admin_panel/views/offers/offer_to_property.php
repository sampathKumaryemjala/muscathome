<!DOCTYPE html>
<html>
    <?php
    $this->load->view('segments/header');
    $this->load->view('segments/sidebar');
    ?>
    <style>
        #example2_filter{
            text-align: right !important;

        }

    </style>
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
<!--                <div class="col-sm-12">
                    <div class="form-group">
                        <select id="offers" class="form-control">
                            <option value="0" disabled selected>Select Offer</option>
                            <?php //foreach ($offers as $offer) { ?>
                                <option value="<?php //echo $offer['id'] ?>"><?php //echo ucfirst($offer['title']) ?></option>
                            <?php //} ?>
                        </select>
                    </div>
                </div>-->
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="hello">

                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Properties Location</th>
                                        <th>City</th> 
                                        <th>Area (SqM)</th>
                                        <th>Price</th>
                                        <th>Posted Date</th> 
                                        <th>Offer Name</th> 

<!--                                    <th style="text-align:center; width: 15%">Action</th>-->
                                    </tr>

                                </thead>
                                <tbody class="menu_change">
                                    <?php
                                    $i = 0;
                                    if(!empty($properties)){
                                    foreach ($properties as $list) {
                                        $i++;
                                        ?>

                                        <tr class="record even gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td style="width:5%"><img src="<?php
                                                if (!empty($list['images'])) {
                                                    echo base_url('uploads/properties/images/') . $list['images'][0]['image'];
                                                } else {
                                                    echo base_url('uploads/properties/images/default.jpg');
                                                }
                                                ?>" class="thumbnails" height="72" width="72"></td>
                                            <td><?php echo ucfirst($list['location']); ?></td>
                                            <td><?php echo $list['city']; ?></td>
                                            <td><?php echo $list['property_size']; ?></td> 
                                            <td><?php echo "OMR " . $list['price']; ?></td> 
                                            <?php
                                            $datetime = explode(' ', $list['create_date']);
                                            $date = $datetime[0];
                                            ?>
                                            <td><?php echo $date; ?></td>
    <!--                                            <td><form>
                                                    <input type="checkbox" id="<?php //echo $list['id'];  ?>" class="add_offer" name="add_offer[]" <?php
                                            //if (empty($list['have_offer'])) { echo "checked";
//                                                        foreach ($offer_properties as $property) {
//                                                            if ($property['fk_property_id'] == $list['id']) {
//                                                                echo "checked";
//                                                            }
//                                                        }
                                            //}
                                            //?>>
                                                </form>
                                            </td>-->
                                            <td>
                                                <select data-id="<?php echo $list['id'];?>" id="offers" class="form-control offer_id">
                                                    <option value="0">No Offer</option>
                                                    <?php foreach ($offers as $offer) { 
                                                        if ($offer['end_date'] > date('Y-m-d')) {
                                                        ?>
                                                        <option <?php if ($list['have_offer'] == $offer['id']) {
                                                    echo "Selected";
                                                } ?> value="<?php echo $offer['id'] ?>"><?php echo ucfirst($offer['title']) ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </td>

                                        </tr>
                                    <?php } }?>
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

        $(document).ready(function () {
            $('.offer_id').on('change', function () {
                var offer_id = this.value;
                var property_id = $(this).attr('data-id');
                $.ajax({
                    url: "<?php echo base_url('index.php/admin_panel/Offers/add_offer_to_property_ajax'); ?>",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        fk_offer_id: offer_id,
                        fk_property_id: property_id
                    },
                    success: function (data) {
                        alert(data.message);
                       
                    }
                });
            });
        });

    </script>
    <!-- ./wrapper -->

</body>
</html>