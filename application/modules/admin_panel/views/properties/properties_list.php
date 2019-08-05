<?php //pre($properties); die;   ?>
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
                            <div class="table-responsive">  
                            <table id="example2" class="table table-bordered table-hover container-fluid">
                                <thead>
                                    <tr class="hello">
                                        <th>#</th>
                                        <th>Porperty ID</th>
                                        <th>Posted By</th>
                                        <th>Phone</th>
                                        <th>Email</th>
<!--                                        <th>Type</th>-->
                                        <th >Latitude</th>
                                        <th >Longitude</th>
<!--                                        <th>Lat/Long</th>
                                        <th>Longitude</th>-->
                                        <th>Price</th>
<!--                                        <th>Property Type</th>-->
<!--                                        <th>Property Size</th>-->
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
                                    //pre($users);die;

                                    $i = $page;
                                    if (!empty($properties)) {
                                        foreach ($properties as $list) {
                                           // pre($list);
                                            $i++;
                                            $image = base_url('uploads/profile_images/default_profile.png');

                                            //echo $list->id;
                                            ?>
                                            <tr class="record even gradeA">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $list['property_code']; ?></td>
                                                <td><?php
                                                    if ($list['agent_details']['user_type'] == 0 OR $list['agent_details']['user_type'] == 1) {
                                                        echo $list['agent_details']['name']." (User)";
                                                    } if ($list['agent_details']['user_type'] == 2) {
                                                        echo $list['agent_details']['name']." (Agent)"; 
                                                    }
                                                    ?></td>
                                                <td><?php if(!empty($list['agent_details']['mobile'])){ echo $list['agent_details']['mobile']; } ?></td>
                                                <td><?php if(!empty($list['agent_details']['email'])){ echo $list['agent_details']['email']; } ?></td>
<!--                                                <td><?php
//                                                    if ($list['type'] == 0) {
//                                                        echo("Buy");
//                                                    } else {
//                                                        echo("rent");
//                                                    }
                                                    ?></td>-->
                                                <td><?php echo $list['latitude']; ?></td>
                                                <td><?php echo $list['longitude']; ?></td>
        <!--                                        <td><?php //echo $list['latitude'] . '/' . $list['longitude'];  ?></td>
                                                    <td><?php //echo $list['longitude'];   ?></td>-->
                                                <td><?php echo $list['price']; ?></td>
<!--                                                <td><?php //echo $list['property_type_name']; ?></td>-->
<!--                                                <td><?php //echo $list['property_size']; ?></td>-->
        <!--                                            <td><?php //echo $list['property_name'];   ?></td>-->
        <!--                                            <td style="width:100%;"><?php //echo $list['addresss'];   ?></td>-->
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
                                                <td><div class="sold_status"  id="<?php echo $list['id']; ?>"><a class="btn <?php echo $btntype; ?> btn-xs"><?php echo $btntext; ?></a></div></td>
                                                <?php
                                                if ($list['status'] == 1) {
                                                    $btn_type = "btn-success";
                                                    $btn_text = "Approved";
                                                } else {
                                                    $btn_type = "btn-danger";
                                                    $btn_text = "Pending";
                                                }
                                                ?>
                                                <?php
                                                $show_pop_up =0;
                                                if($list['agent_details']['user_type']==0){
                                                    if($btn_text=="Pending"){
                                                        $show_pop_up =1;
                                                    }else{
                                                        $show_pop_up =2;
                                                    }
                                                    
                                                }

                                                 if ($this->session->userdata['backend_user']['user_type'] == 2) { ?>
                                                    <td>
                                                        <div>
                                                            <a class="btn <?php echo $btn_type; ?> btn-xs"><?php echo $btn_text; ?></a>
                                                        </div>
                                                    </td>
                                                <?php } else { ?> 
                                                    <td>
                                                        <div  <?php if($show_pop_up==1){ ?> data-fun="1" onclick="prop_status_call_popup(<?php echo $list['id']; ?>)" <?php } else if($show_pop_up==2){ ?> data-fun="2" onclick="prop_status_change(<?php echo $list['id']; ?>)" <?php } ?> class="prop_status_call_popup" data-id="<?php echo $list['id']; ?>" id="<?php echo "status_" . $list['id']; ?>">
                                                            <a class="btn <?php echo $btn_type; ?> btn-xs"><?php echo $btn_text; ?></a>
                                                        </div>
                                                    </td>
                                                <?php } ?>

                                                <td style="display:block; width:100%;">
                                                    <a class="btn btn-success userid" data-bind="<?php echo $list['id']; ?>" data-toggle="modal" data-target="#usermodal"><i class="fa fa-eye"></i></a>
                                                     <?php if($this->session->userdata['backend_user']['user_type'] == 2) { ?>
                                                    <a href="<?php echo site_url('admin_panel/Properties/create?kjh=' . base64_encode($list['id'])); ?>" class="btn btn-primary" data-bind="<?php echo $list['id']; ?>"><i class="fa fa-edit "></i></a> 
                                                     <?php } 
                                                     $delete_page = $this->uri->segment(4);
                                                     ?>
                                                    <a href="<?php echo base_url('index.php/admin_panel/Properties/delete?tyhg=').base64_encode($list['id'])."&sfsd=".$delete_page; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a> 
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                            <center>
                                <div id="text-center" >
                                    <!-- Show pagination links -->
                                    <?php
                                    foreach ($links as $link) {
                                        echo $link;
                                    }
                                    ?>
                                </div>
                            </center>
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
        $('#example2_paginate').hide();
    });

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

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select a Agent for this properties</h4>
      </div>
      <div class="modal-body">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">
                        <!-- /.box-header -->
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data" >  
                            <input type="hidden" id="new_id" value="">
                            <fieldset>
                                <div class="setting col-md-12">
                                    <label><h4>Agent List</h4></label>
                                    <select id="asigned_agent_id"  class="setting col-md-6 form-control" name="agent_id" required>
                                        <option value=""> Select Agent </option>
                                        <?php if(isset($agents) && !empty($agents)){
                                            foreach ($agents as $agent) { 
                                                echo '<option value="'.$agent['id'].'" >'.$agent['name'].'</option>';
                                            }
                                        }
                                            ?>
                                    </select>
                                </div>  
                            </fieldset> 
                            <br>
                            <div class="setting col-md-6">
                                <button id="submit12" type="button" class="btn btn-primary prop_status" style="width:200px;" >Submit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

    function prop_status_call_popup(id){
        $('#new_id').val(id);
        $('#myModal').modal();                      // initialized with defaults
        $('#myModal').modal({ keyboard: false });   // initialized with no keyboard
        $('#myModal').modal('show');
    }
    
    $(document).ready(function () {
        $(".prop_status").click(function () {
        //function prop_status_change(){
            if (confirm("Are you sure ?") == true) { 
                var id =$('#new_id').val();
                var agent_id = $("#asigned_agent_id").val();  //('#asigned_agent_id').is('selected').val();                
                //var id = $(this).attr("data-id");                
                //alert(agent_id); 
                var eid = btoa(id);
                $.ajax({
                    url: "<?php echo base_url('index.php/admin_panel/') ?>Properties/change_status_ajax",
                    method: 'GET',
                    data: {
                        id: eid,
                        asigned_agent_id: agent_id
                    },
                    success: function (response) {  //alert(response); 
                        //alert("#status_" + id);
                        $("#status_" + id).empty();
                        $("#status_" + id).html(response);

                        var chng = "prop_status_change("+id+")";
                        $("#status_" + id).attr('onclick',chng);
                    }
                });
                $('#myModal').modal('hide');
            }
        });
    });


    function prop_status_change(id){ //alert('working');
     //var fun =   $(this).attr("data-fun");   
//alert(fun);
        if (confirm("Are you sure ?") == true) { 
            var id = id;//$(this).attr("data-id"); alert(id);
            //var idd = $(this).attr("id"); alert(idd);
            var eid = btoa(id);
            $.ajax({
                url: "<?php echo base_url('index.php/admin_panel/') ?>Properties/change_status_ajax",
                method: 'GET',
                data: {
                    id: eid
                },
                success: function (response) {  
                    $("#status_" + id).empty();
                    $("#status_" + id).html(response);

                    var chng = "prop_status_call_popup("+id+")";
                    $("#status_" + id).attr('onclick',chng);
                }
            });
        }
    }



    $(document).ready(function () {
        $(".sold_status").click(function () {
            if (confirm("Are you sure ?") == true) {
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
            }
        });
    });
</script>
</html>