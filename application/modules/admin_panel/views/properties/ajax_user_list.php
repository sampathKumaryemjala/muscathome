
<?php //pre($users);  die;?>
<div class="modal fade" id="usermodall" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Details</h4>
            </div>
            <!--My div-->
            
            <div class="modal-body">
                <div class="col-sm-8">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Property Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value="<?php echo $users['property_name']?>" name="name" readonly>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Beds</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="beds" value="<?php echo $users['beds']?>" name="beds" readonly>
                        </div>
                    </div>
                   
                    <!--
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?php echo  $users['type']?>" id="email" readonly>
                        </div>
                    </div>
                    -->
                <div class="form-group">
                    <label class="control-label col-sm-4" for="pwd">Price</label>
                    <div class="col-sm-8"> 
                    <input type="mobile" class="form-control" id="price" value="<?php echo  $users['price']?>" name="price" readonly>
                    </div>
                </div>
                   
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Buy or rent</label>
                        <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="type" value="<?php if($users['type']=='0'){echo 'Buy';}else{echo 'Rent';}?>" name="type" readonly>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Property type</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="property_type" value="<?php   
                              //if($users['property_type']==1){
                                //  echo('office');}
                                  //else if ($users['property_type']==2){
                                    //  echo('Home');}
                               switch($users['property_type'])
                               {
                                   case"1":
                                       echo('Office');
                                       break;
                                  case "2":
                                       echo("Home");
                                      break;
                                   case "3":
                                       echo("Town house");
                                      break;
                                   case "4":
                                       echo("Land");
                                       break;
                                   case "9":
                                       echo("Residential");
                                       break;
                                   case "10":
                                       echo("Industrial");
                                       break;
                                   case "11":
                                       echo("Villa");
                                       break;
                                   case "12":
                                       echo("Commercial");
                                       break;
                                   case "13":
                                       echo("Flat");
                                       break;
                                   
                               }?>" name="property_type" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Property Size</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="property_size" value="<?php echo $users['property_size'];?>" name="property_size" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Description</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="description" value="<?php echo $users['description'];?>" name="description" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Sold</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="is_sold" value="<?php if($users['is_sold']==0){echo("No");}else{echo("Yes");};?>" name="is_sold" readonly>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Location</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="location" value="<?php echo  $users['location']?>" name="location" readonly>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Address</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="addresss" value="<?php echo  $users['addresss']?>" name="address" readonly>
                        </div>
                    </div>
                    
<!--<div class="form-group"> 
           <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-default">Submit</button>
           </div>
       </div>-->
                </form>
                </div>
                <div class="col-sm-4">
                    
                    <div>
                        <img src="<?php if(!empty($users['image'])){ echo base_url('uploads/properties/images/')?><?php echo  $users['image'];} else{ echo base_url('uploads/properties/images/default.jpg');} ?>" height="120px" width="120px">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>    

