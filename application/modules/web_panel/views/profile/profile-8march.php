<?php //pre($users); die;                        ?>
<?php $this->load->view('custome_link/custome_css', array()); ?>
<?php $this->load->view('include/header_inc', array()); ?>

<style>
    .add-margin{
        margin-right: 1.5% !important;}
</style>
<!--start section page body-->
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="pull-left" ><a href="<?php echo base_url('index.php/web_panel/home'); ?>"><!-- <i class="fa fa-home"></i> -->Home</a></li>
                        <li class="pull-left active">My Profile</li>

                        <!--                        <li class="pull-right"><h1 class="title-head">My Profile</h1></li>-->
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 list-grid-area">
                <div id="content-area">

                    <div class="col-md-3 col-sm-12 white-block" style="min-height: 450px; width: 24%; margin-right:1% ">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active1"><a href="<?php echo base_url('index.php/web_panel/Profile/myProfile'); ?>"> My Profile</a></li>
                            <?php if ($this->session->userdata['active_user_data']['login_type'] == 0) { ?>
                                <li class="active0"><a href="<?php echo base_url('index.php/web_panel/Profile/changePassword'); ?>"><span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span> &nbsp Change Password</a></li>
                            <?php } ?>
                            <?php if ($this->session->userdata['active_user_data']['user_type'] == 1) { ?>
                                <li><a href="<?php echo base_url('index.php/web_panel/Job_post/provider_jobs'); ?>"><span><i class="fa fa-suitcase" aria-hidden="true"></i></span> Jobs List</a></li>
                            <?php } if ($this->session->userdata['active_user_data']['user_type'] == 0) { ?>
                                <li><a href="<?php echo base_url('index.php/web_panel/Job_post/user_posts'); ?>">
                                        <span><i class="fa fa-suitcase" aria-hidden="true"></i></sapn>&nbsp My Posted Jobs</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url('index.php/web_panel/Properties/favorite_properties'); ?>"><span><i class="fa fa-heart" aria-hidden="true"></i></span>&nbsp My Favorite Properties</a></li>
                            <li><a href="<?php echo base_url('index.php/web_panel/Profile/add_property'); ?>"><span><i class="fa fa-building-o" aria-hidden="true"></i></span>&nbsp Add Property</a></li>
                            <li><a href="<?php echo base_url('index.php/web_panel/Profile/list_properties'); ?>"><span><i class="fa fa-building" aria-hidden="true"></i></i></span>&nbsp View Properties</a></li>
                            <li><a href="<?php echo base_url('index.php/web_panel/Login/logout'); ?>"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>&nbsp Logout</a></li>
                        </ul>
                    </div>
                   <?php if ($active_tab == 1) { ?>
                     <form class="form-horizontal" method="POST" id="profile_form">
                         <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                            <div class="col-md-9 col-sm-12 white-block">

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Name</label>
                                    <div class="col-sm-10"> 
                                        <input type="text" class="form-control alphabets" value="<?php echo $users['name'] ?>" id="name" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="<?php echo $users['email'] ?>" id="email" name="email" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="mobile">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $users['mobile'] ?>" id="mobile" name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                                <?php if($users['user_type']==1 or $users['user_type']==3){?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="mobile">Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php if(!empty($users['fk_service_cat_name'])){ echo $users['fk_service_cat_name']; } ?>" id="category" name="category" placeholder="Category" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="mobile">Sub Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php if(!empty($users['fk_service_sub_cat_name'])){ echo $users['fk_service_sub_cat_name']; } ?>" id="sub_category" name="sub_category" placeholder="Sub category" readonly>
                                    </div>
                                </div>
                                <?php if(!empty($users['document'])) { ?>
<!--                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="mobile">Document Uploaded</label>
                                    <div class="col-sm-10">
                                        <img width="470"  src="<?php echo base_url('uploads/agent_documents/').$users['document']?>" alt="Document" name="document" id="document" class="thumbanil">
                                    </div>
                                </div>-->
                                <?php } } if($users['user_type']==3){ ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="age">Age</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control number" value="<?php if(!empty($users['age']) && isset($users['age'])){ echo $users['age']; } ?>" id="category" name="age" placeholder="Age">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="gender">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="gender" id="gender">
                                            <option>Select Gender</option>
                                            <option value="1" <?php if(isset($users['gender']) && $users['gender']==1){ echo "selected"; } ?>>Male</option>
                                            <option value="0" <?php if(isset($users['gender']) && $users['gender']==0){ echo "selected"; } ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-2" for="experience">Experience</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control number" value="<?php if(!empty($users['experience']) && isset($users['experience'])){ echo $users['experience']; } ?>" id="category" name="experience" placeholder="Experience in months" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="nationality">Nationality</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control alphabets" value="<?php if(!empty($users['nationality']) && isset($users['nationality'])){ echo $users['nationality']; } ?>" id="sub_category" name="nationality" placeholder="Nationality" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="city">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control alphabets" value="<?php if(!empty($users['city']) && isset($users['city'])){ echo $users['city']; } ?>" id="sub_category" name="city" placeholder="City" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="upload_cv">Upload CV</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="upload_cv" name="upload_cv[]" accept="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="upload_video">Upload Video</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="upload_video" name="upload_video[]" accept="" >
                                    </div>
                                </div>


                                
                                <?php } if($users['user_type']==1 or $users['user_type']==0){ ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="address">Created On</label>
                                    <div class="col-sm-10">
                                        <?php
                                        $date1 = explode(' ', $users['create_date']);
                                        $date2 = date_create($date1[0]);
                                        $date = date_format($date2, "d-M-Y");
                                        ?>
                                        <input type="text" class="form-control" value="<?php echo $date; ?>" id="create_date" name="create_date" readonly>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <div class="form-group" style="margin-top: 30px;"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" id="save" value="save" name="save" class="btn btn-block btn-primary">Save Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 white-block">
                                <div class="thumbnail" style="height: 132px;">

                                    <img src="<?php
                                    if (!empty($users['profile_image'])) {
                                        $pos = strpos($users['profile_image'], "http");
                                        if ($pos === false) {
                                            echo base_url('uploads/profile_images/') . $users['profile_image'];
                                        } else {
                                            echo $users['profile_image'];
                                        }
                                    } else {
                                        echo base_url('uploads/profile_images/default.png');
                                    }
                                    ?>" class="img-rounded" alt="" style="width:100%; height: 121px;">
                                    <div class="change-profile" style="position: absolute; margin-top: -32px;">
                                        <!-- <a href=""></a> -->
                                        <button type="button" style="background-color: #fff; position: inherit; margin-left: 85px; margin-top: -5px;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><img src="<?php echo base_url('web_assets/images/camera.png'); ?>"></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <?php } if ($active_tab == 0) { ?>
                            <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">

                                <div class="form-group">
                                    <label class="control-label col-sm-2"></label>
                                    <div class="col-sm-9"> 
                                        <span id="profile_error_validation"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="o_password">Old Password</label>
                                    <div class="col-sm-9"> 
                                        <input style="margin-bottom: 8px;" type="password" class="form-control" id="o_password" name="o_password" placeholder="Enter your old password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="password">New Password</label>
                                    <div class="col-sm-9"> 
                                        <input style="margin-bottom: 8px;" type="password" class="form-control" id="password" name="password" placeholder="Enter your new password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="r_password">Retype Password</label>
                                    <div class="col-sm-9"> 
                                        <input style="margin-bottom: 8px;" type="password" class="form-control" id="r_password" name="r_password" placeholder="Confirm your new password">
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 30px;"> 
                                    <div class="col-sm-offset-2 col-sm-9">
                                        <button type="button" value="change" id="change" name="change" id="change" class="btn btn-block btn-primary">Change Password</button>
                                    </div>
                                </div>
                            </div>
               
                        <?php } if ($active_tab == 2) { ?> 
                    
                    
                            <?php if(isset($no_property_location)){  ?>
                                <script>alert("Please choose the valid location !")</script>
                            <?php  }  ?>
                            
                            <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                                <form id="property_form" name="property_form" method="post" enctype="multipart/form-data" > 
                                    <input type="hidden" name="id" value="<?php if(isset($properties)){ echo $properties['id']; } ?>" id="id">
                                    <div id="map" style="display:none"></div>
                                    <div class="form-group col-md-6">
                                        <label>Type</label>
                                        <select  class="form-control col-md-6" name="type" required>
                                            <option>Select</option>
                                            <option value="0" <?php
                                            if (isset($properties)) {
                                                if ($properties['type'] == 0) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>>Buy</option>
                                            <option value="1" <?php
                                            if (isset($properties)) { 
                                                if ($properties['type'] == 1) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>> Rent</option> 
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-6 ">
                                        <label>Property Type</label>
                                        <select name="property_type" class="form-control" required>
                                            <option>Select</option>
                                            <option value="1" <?php
                                            if (isset($properties)) {
                                                if ($properties['property_type'] == "Office") {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>>Office</option>
<!--                                            <option value="2" <?php
//                                            if (isset($properties)) {
//                                                if ($properties['property_type'] == "Home") {
//                                                    echo 'selected';
//                                                }
//                                            }
                                            ?>>Home</option>-->
<!--                                            <option value="3" <?php
//                                                    if (isset($properties)) {
//                                                        if ($properties['property_type'] == "Town House") {
//                                                            echo 'selected';
//                                                        }
//                                                    }
                                                    ?>>Town House</option>-->
                                            <option value="4" <?php
                                            if (isset($properties)) {
                                                if ($properties['property_type'] == "Land") {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>>Land</option>
<!--                                            <option value="9" <?php
//                                            if (isset($properties)) {
//                                                if ($properties['property_type'] == 'Residential') {
//                                                    echo 'selected';
//                                                }
//                                            }
                                            ?>>Residential</option>-->
                                            <option value="10" <?php
                                        if (isset($properties)) {
                                            if ($properties['property_type'] == "Industrial") {
                                                echo 'selected';
                                            }
                                        }
                                            ?>>Industrial</option>
                                            <option value="11" <?php
                                                if (isset($properties)) {
                                                    if ($properties['property_type'] == "Villa") {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>>Villa</option>
                                            <option value="12" <?php
                                    if (isset($properties)) {
                                        if ($properties['property_type'] == "Commercial") {
                                            echo 'selected';
                                        }
                                    }
                                    ?>>Commercial</option>
                                            <option value="13" <?php
                                               if (isset($properties)) {
                                                   if ($properties['property_type'] == "Flat") {
                                                       echo 'selected';
                                                   }
                                               }
                                               ?>>Flat</option>
                                        </select>	
                                    </div>
                                    
<!--                                    <div class="form-group col-md-6">
                                        <label>Property Name</label>
                                        <input  type="text" name="property_name"  class="form-control" value="<?php
//                                                if (isset($properties)) {
//                                                    echo $properties['property_name'];
//                                                }
                                                ?>" required>
                                    </div>-->
                                                                            
                                     <div class="form-group col-md-6">
                                        <label>Property Size (sq meter)</label>
                                            <input  type="text" name="property_size"  class="form-control"  maxlength="8"  id="property_size" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['property_size'];
                                                }
                                                ?>" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <input   type="text" id="addresss" name="addresss"  class="form-control" value="<?php
                                               if (isset($properties)) {
                                                   echo $properties['addresss'];
                                               }
                                               ?>" required>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Location </label>
                                        <input name="location" id="pac-input" class="form-control" type="text" placeholder="Enter a location" value="<?php
                                               if (isset($properties)) {
                                                   echo $properties['location'];
                                               }
                                               ?>" required>

                                    </div>                                       

                                    <div class="form-group col-md-6">
                                        <label>Beds</label>
                                        <input  type="text" name="beds"id="beds" class="form-control number" maxlength="2" value="<?php if(isset($properties)){ echo $properties['baths'];}?>" value="<?php
                                            if (isset($properties)) {
                                                echo $properties['beds'];
                                            }
                                               ?>"  >
                                    </div>                                        

                                    <div class="form-group col-md-6">

                                        <label>Bathrooms</label>
                                        <input  type="text" name="baths"  class="form-control number" maxlength="2" value="<?php if(isset($properties)){ echo $properties['baths'];}?>" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['baths'];
                                                }
                                                ?>"  >

                                    </div>
                                    
                                    
                                    <div class="form-group col-md-6 ">

                                        <label>Price (OMR)</label>
                                        <input  type="text" id="price" name="price" maxlength="7" id="price"  class="form-control" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['price'];
                                                }
                                                ?>" required>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Country Code</label>
                                            <select class="form-control" name="country_code">
                                                <?php foreach($country_code as $code){ ?>
                                                <option <?php if(isset($properties)){ if($properties['country_code']==$code['country_code']) { echo 'selected'; } }  ?> value="<?php echo "+".$code['country_code'] ?>"><?php echo $code['country_name']." (+".$code['country_code'].")" ?></option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label>Mobile Number</label>
                                        <input  type="text" name="contact_number" maxlength="16" id="mobile" class="form-control" value="<?php
                                                if (isset($properties)) {
                                                    echo $properties['contact_number'];
                                                }
                                                ?>" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">

                                        <label>Property Description</label>
                                        
                                        <textarea name="description" rows="5" class="form-control"  maxlength="1000" required><?php
                                        if (isset($properties)) {
                                            echo $properties['description'];
                                        }
                                                ?></textarea>
                                        <small style="color:red; font-size: 12px;">*max 1000 character</small>
                                    </div>
                                    
                                    <div class="form-group col-md-12">

                                        <label></label>
                                        
                                        <input type="file" name="property_images[]" value="" multiple>
                                        
                                    </div> 
                                    
                                    <div class="col-sm-12 col-xs-12" style="margin:20px 0">
                                           <label>
                                                <input type="checkbox" id="reg_user_check" required >
                                                I agree with your <a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" target="_blank" >Terms & Conditions</a>.
                                            </label>
                                    </div>

                                    <div class="form-group col-md-6"><button id="submit12" type="submit" class="btn btn-primary" style="width:200px;" ><?php
                                                                if (isset($properties)) {
                                                                    echo "Update";
                                                                } else {
                                                                    ?>Submit<?php } ?></button>
                                    </div>

                                </form>
                            </div>
<?php } if ($active_tab == 3) { ?> 

                            <div class="col-md-9 col-sm-12 white-block" style="min-height: 450px">
                                <h3 style="border-bottom:solid thin #ccc; padding-bottom:15px;">My Properties</h3>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div id="content-area">

                    <!--start featured property items-->
                    <div class="property-listing list-view">
                        <div class="row">

                            <?php
                            $i = '415';
                            //pre($properties); die;
                            if(!empty($properties)){
                            foreach ($properties as $property) {
                                $i++;
                                
                                ?>
                                <div style="margin-bottom: -27px;" id="ID-<?php echo $i; ?>" class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                                    <div class="property-item table-list">
                                        <div class="table-cell">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap label-right hide-on-list">
                                                        <span class="label-status label-status-8 label label-default"><?php
                                                            if ($property['type'] == 0) {
                                                                echo "For Buy";
                                                            } else {
                                                                echo "For Rent";
                                                            }
                                                            ?></span> 
                                                    </div>

                                                    <div class="price hide-on-list"><span class="item-price"><?php
                                                            if ($property['type'] == 0) {
                                                                echo "OMR " . number_format_short($property['price']);
                                                            } else {
                                                                echo "OMR " . number_format_short($property['price']) . "/mo";
                                                            }
                                                            ?></span></div>
                                                    <a class="hover-effect property-img-thumb " href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']).'&hhg='.base64_encode($this->session->userdata['active_user_data']['id']); ?>">
                                                        <img width="385" height="184" src="<?php if(!empty($property['images'])){ echo base_url('uploads/properties/images/').$property['images'][0]['image'];} else{ echo base_url('uploads/properties/images/default.jpg'); } ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""  sizes="(max-width: 385px) 100vw, 385px" /></a>
                                                        <div class="label-wrap hide-on-grid">
                                                        <span class="label-status label-status-8 label label-default" style="text-align: left;"><?php
                                                            if ($property['type'] == 0) {
                                                                echo "For Buy";
                                                            } else {
                                                                echo "For Rent";
                                                            }
                                                               ?></span> 
                                                    </div>
                                                    <ul class="actions">

                                                        <li>

                                                            <span style="color:greenyellow;" class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="<?php if($property['is_fav']==0){ echo "Add Favorite"; } else { echo "Remove Favorite";} ?>"><i data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                        </div>
                                       
                                        <div class="item-body table-cell">
                                             <?php $color = "#f36e2d";
                                            if ($property['status'] == 1) {$color = "#73bd61";} ?>
                                            <style>
                                                .property_status{
                                                    width: 30%;
                                                    border-radius:4px;
                                                    color: #fff;
                                                    font-size: 13px;
                                                    font-weight:400;
                                                    text-align: center;
                                                    margin-bottom: 6px;
                                                }
                                             </style>
                                            <div class="body-left table-cell">
                                                <div class="info-row">
                                                 <h2 class="property-title"><a href="<?php echo base_url('index.php/web_panel/Properties/property_details?prjkl=').base64_encode($property['id']).'&hhg='.base64_encode($this->session->userdata['active_user_data']['id']); ?>"><?php echo ucfirst($property['location']) ?></a></h2>
                                                 <h6 class="property_status" style="background-color:<?php echo $color; ?>"><?php if ($property['status'] == 0) {
                                                            echo "Pending";
                                                        } else {
                                                            echo "Active";
                                                        } ?></h6>
                                                    <address class="property-address"><?php echo $property['city']; ?></address>                </div>
                                                <div class="info-row amenities hide-on-grid" style="height: 57px;">
                                                    <p><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span>
                                                        <span>Size: <?php echo $property['property_size']?> Sq M</span></p>                    
                                                    <p><?php echo $property['state'] ?></p>
                                                </div>
                                                
                                                <div class="info-row date hide-on-grid">
                                                    <?php if(isset($property['agent_detail']['name'])){?>
                                                    <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name']."  "; ?></a> </p>
                                                    <?php } ?>
                                                    <p><i class="fa fa-calendar"></i><?php echo $property['agent_detail']['posted_date'] ?></p>
                                                </div>

                                            </div>
                                            <div class="body-right table-cell hidden-gird-cell">
                                                <div class="info-row price"><span class="item-price"><?php
                                                        if ($property['type'] == 0) {
                                                            echo "OMR " . number_format_short($property['price']);
                                                        } else {
                                                            echo "OMR " . number_format_short($property['price']) . "/mo";
                                                        }
                                                        ?></span>
                                                </div>

                                                <div class="info-row phone text-right">
                                                    <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']).'&hhg='.base64_encode($this->session->userdata['active_user_data']['id']); ?>" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                </div>
                                                
                                           </div>
                                           
                          <div class="table-list full-width hide-on-list">
                                                <div class="cell">
                                                    <div class="info-row amenities">
                                                        <p><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><span>Sq M: <?php echo $property['property_size'] ?></span></p><p><?php echo $property['state'] ?></p>

                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="phone">
                                                        <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']).'&hhg='.base64_encode($this->session->userdata['active_user_data']['id']); ?>" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                <div class="" style="float: right;">
                        <a href="<?php echo site_url('web_panel/Profile/add_property');?>?kjh=<?php echo $property['id'] ?>"  class="btn" style="background-color: #e2e2e2; border:double 5px #fff; margin-top: 8px; margin-right: 0px; padding: 7px 15px;"><span><i class="fa fa-pencil-square" aria-hidden="true"></i></span> Edit</a>
                        <a href="<?php echo site_url('web_panel/Profile/list_properties');?>?jghj=<?php echo $property['id'] ?>" class="btn" style="background-color: #e2e2e2; border:double 5px #fff; margin-top: 8px; padding: 7px 15px; "><span><i data-id="<?php echo $property['id'] ?>" class="fa  fa-trash" aria-hidden="true"></i></span> Delete</a>
                    </div>
                             <br>
                            <hr>
                                 
<?php } }  else { ?>
                                <h4 style="font-weight:400">No Property Added !</h4>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <!--end featured property items-->
                    <?php
                    if (count($properties) > 10) {
                        $pages = round(count($properties) / 10);
                        ?>

                        <!--start Pagination-->
                        <!--                        <div class="pagination-main ">
                                                    <ul class="pagination">
                                                        <li class="disabled">
                                                            <a aria-label="Previous">
                                                                <span aria-hidden="true">
                                                                    <i class="fa fa-angle-left"></i>
                                                                </span></a>
                                                        </li>
                                                        <li class="active"><a data-houzepagi="1" href="#">1 <span class="sr-only"></span></a></li>
                        <?php for ($i = 1; $i < $pages; $i++) {
                            ?>
                                                                            <li><a data-houzepagi="2" href="">2</a></li>
                        <?php }  ?> 
                                                        <li><a data-houzepagi="2" rel="Next" href="#"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                                                    </ul>
                                                </div>            start Pagination-->

                    <?php }  ?>
                </div>
            </div>

        
                                <!-- /.row -->
                                <div style=" width: 100%; " id="menu_pop_up"></div>  



                            </div>
<?php } ?>
    
    
    
   


                    </form>



                </div>
            </div>

        </div>
    </div>
</section>
<div id="getmodal"> </div>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
                                                                                $(document).ready(function () {
                                                                                    $('#example2').DataTable({
                                                                                        "scrollX": true
                                                                                                // serverSide: true,
                                                                                                //ajax: '/data-source'
                                                                                    });
                                                                                });
</script>



<style>
    .tble-width{
        width:200px !important;
        height:20px !important;
        overflow:hidden !important;
    }
</style>

<!--end section page body-->
<div class="container">
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 60%; margin:auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CHANGE PROFILE PICTURE</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <center>
                            <img id="blah" alt="your image" src="<?php
                                 if (!empty($users['profile_image'])) {
                                     $pos = strpos($users['profile_image'], "http");
                                     if ($pos === false) {
                                         echo base_url('uploads/profile_images/') . $users['profile_image'];
                                     } else {
                                         echo $users['profile_image'];
                                     }
                                 } else {
                                     echo base_url('uploads/profile_images/default.png');
                                 }
?>" class="img-rounded" alt="" style="width:43%; margin:0px auto;">
                            <br>
                            <br>
                            <br>
                            <input type="file" onchange="readURL(this);" name="choseprofilepic" style="margin-left: 60px; font-size: 12px;">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <input style="background-color: #00aeef;" type="submit" name="image_submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="Submit">
                        <button style="margin-right: 49px; line-height: 1;" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!--Start in header end #section-body-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<?php echo $this->load->view('custome_link/custome_js'); ?>





<!--start footer section-->

<script>
    $('#change').click(function () {
        //alert('sadf'); exit;
        var o_password = $('#o_password').val();
        var password = $('#password').val();
        var r_password = $('#r_password').val();
        var change = $('#change').val();
        //alert(o_password); alert(password); alert(n_password); exit;
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Profile/changePassword') ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                o_password: o_password,
                password: password,
                r_password: r_password,
                change: change

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    $('#profile_form input');
                    $('#profile_error_validation').text(data.message);
                    $('#profile_error_validation').css({"font-size": "14px", "color": "green"});


                } else {
                    $('#profile_error_validation').text(data.message);
                    $('#profile_error_validation').css({"font-size": "14px", "color": "red"});

                }
            }
        });
    });


</script>
<script>
    var xyz = "<?php echo $active_tab; ?>";
//alert(xyz);
    $('.active' + xyz).addClass('active');
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindowContent.children['place-icon'].src = place.icon;
            infowindowContent.children['place-name'].textContent = place.name;
            infowindowContent.children['place-address'].textContent = address;
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function () {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
                .addEventListener('click', function () {
                    console.log('Checkbox clicked! New state=' + this.checked);
                    autocomplete.setOptions({strictBounds: this.checked});
                });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q&libraries=places&callback=initMap"
async defer></script>

<script>
            $("#txtarea").hide();

            $("#slct").change(function () {
                var val = $("#slct").val();
                if (val == "1") {
                    $("#txtarea").show();
                } else {
                    $("#txtarea").hide();
                }
            });
</script>
        
<script>
        $('#property_delete'). click( function () {
            var id = $(this).attr('data-id');
            alert(id); exit;
            jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Properties/ajax_delete_properties'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                     alert('Property deleted');
                    window.location.href = 'list_properties';
                } else {
                    alert('Property not deleted');
                }
            }
        });
            
        });
        
        
</script>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<script>
$("#property_form").submit(function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});

$(".number").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
</script>
