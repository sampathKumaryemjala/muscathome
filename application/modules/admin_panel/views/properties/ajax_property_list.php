<style type="text/css">
  .carousel-inner.vertical {
  height: 100%; /*Note: set specific height here if not, there will be some issues with IE browser*/
}
.carousel-inner.vertical > .item {
  -webkit-transition: .6s ease-in-out top;
  -o-transition: .6s ease-in-out top;
  transition: .6s ease-in-out top;
}

@media all and (transform-3d),
(-webkit-transform-3d) {
  .carousel-inner.vertical > .item {
    -webkit-transition: -webkit-transform .6s ease-in-out;
    -o-transition: -o-transform .6s ease-in-out;
    transition: transform .6s ease-in-out;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000;
    perspective: 1000;
  }
  .carousel-inner.vertical > .item.next,
  .carousel-inner.vertical > .item.active.right {
    -webkit-transform: translate3d(0, 33.33%, 0);
    transform: translate3d(0, 33.33%, 0);
    top: 0;
  }
  .carousel-inner.vertical > .item.prev,
  .carousel-inner.vertical > .item.active.left {
    -webkit-transform: translate3d(0, -33.33%, 0);
    transform: translate3d(0, -33.33%, 0);
    top: 0;
  }
  .carousel-inner.vertical > .item.next.left,
  .carousel-inner.vertical > .item.prev.right,
  .carousel-inner.vertical > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    top: 0;
  }
}

.carousel-inner.vertical > .active {
  top: 0;
}
.carousel-inner.vertical > .next,
.carousel-inner.vertical > .prev {
  top: 0;
  height: 100%;
  width: auto;
}
.carousel-inner.vertical > .next {
  left: 0;
  top: 33.33%;
  right:0;
}
.carousel-inner.vertical > .prev {
  left: 0;
  top: -33.33%;
  right:0;
}
.carousel-inner.vertical > .next.left,
.carousel-inner.vertical > .prev.right {
  top: 0;
}
.carousel-inner.vertical > .active.left {
  left: 0;
  top: -33.33%;
  right:0;
}
.carousel-inner.vertical > .active.right {
  left: 0;
  top: 33.33%;
  right:0;
}

#carousel-pager .carousel-control.left {
    bottom: initial;
    width: 65%;
}
#carousel-pager .carousel-control.right {
    top: initial;
    width: 140%;
}
  .fa1{
    font-size: 20px;
    top: 1%;
    left: 53%;
    position: absolute;
  }
  .fa2{
    font-size: 20px;
    top: 34%;
    left: 53%;
    position: absolute;
  }
  .fa3{
    font-size: 20px;
    top: 67%;
    left: 53%;
    position: absolute;
  }
   
</style>
<?php //pre($users['images'][0]['image']);  die;?>
<div class="modal fade" id="usermodall" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Property Details</h4>
            </div>
            <!--My div-->
            
            <div class="modal-body">
                <div class="col-sm-8">
                <form class="form-horizontal">
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
<!--                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Property Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value="<?php //echo $users['property_name']?>" name="name" readonly>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Beds</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="beds" value="<?php echo $users['beds']?>" name="beds" readonly>
                        </div>
                        <label class="control-label col-sm-2" for="baths">Baths</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="baths" value="<?php echo $users['baths']?>" name="baths" readonly>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="price">Price</label>
                        <div class="col-sm-8"> 
                        <input type="mobile" class="form-control" id="price" value="<?php echo  $users['price']?> OMR" name="price" readonly>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="type">Buy or rent</label>
                        <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="type" value="<?php if($users['type']=='0'){echo 'Buy';}else{echo 'Rent';}?>" name="type" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="property_size">Property Size</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="property_size" value="<?php echo $users['property_size']." SqM";?>" name="property_size" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Address</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="addresss" value="<?php echo  $users['addresss']?>" name="address" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd">Location</label>
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" id="addresss" value="<?php echo  $users['location']?>" name="address" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">City</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="city" value="<?php echo $users['city']?>" name="city" readonly>
                        </div>
                        <label class="control-label col-sm-2" for="baths">State</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="state" value="<?php echo $users['state']?>" name="state" readonly>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd" >Description</label>
                        <div class="col-sm-8"> 
                            <textarea class="form-control" rows="4" id="description" name="description" readonly><?php echo $users['description'];?></textarea>
                            
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="control-label col-sm-4" for="pwd" ></label>
                        <div class="col-sm-8"> 
                            <center><a href="<?php //echo site_url('admin_panel/Properties/change_status?tyhg='.base64_encode($users['id'])) ;?>" class="btn <?php if($users['status']==0){ echo 'btn-danger';} if($users['status']==1){ echo 'btn-success';}?> btn-md"><?php if($users['status']==0){ echo 'Pending';} if($users['status']==1){ echo 'Approved';}?></a></center>
                        </div>
                    </div>-->
                    
                    
                     
                    
<!--<div class="form-group"> 
           <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-default">Submit</button>
           </div>
       </div>-->
                </form>
                </div>
                <div class="col-sm-4">
                  <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="3000">
                <!-- Carousel items -->
                <div class="carousel-inner vertical" style="max-height: 500px;">
                      <?php if(isset($users['images']) && !empty($users['images'])){  
                          //foreach($users['images'] as $img){
                          for($i=0; $i<count($users['images']); $i++){
                              $active = ""; if($i%3==0){ $active = "active"; }
                          ?>
                            <div class="<?php echo $active; ?> item ">
                                <img src="<?php echo base_url('uploads/properties/images/').$users['images'][$i]['image'] ?>" class="img-responsive" data-target="#carousel-main" data-slide-to="<?php echo $i; ?>" height="160px" width="160px">
                            </div>
                     <?php } } ?>
                      
<!--                    <div class="active item ">
                        <img src="http://placehold.it/600/f44336/000000&text=First+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="0" height="160px" width="160px">
                        <a href="#"> <i class="fa fa-trash fa1" aria-hidden="true" style="width:100%"></i></a>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/600/e91e63/000000&text=Second+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="1" height="160px" width="160px">
                       <a href="#">  <i class="fa fa-trash fa2" aria-hidden="true" style="width:100%"></i></a>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/600/9c27b0/000000&text=Third+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="2" height="160px" width="160px">
                       <a href="#">  <i class="fa fa-trash fa3" aria-hidden="true" style="width:100%"></i></a>
                    </div>-->
                </div>
                
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                    
                    
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>
        </div>
    </div>
</div>    
<script type="text/javascript">
  $('.carousel .vertical .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=1;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');

    }
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>

