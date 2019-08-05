<?php if(!empty($agents)) { ?>
<?php  //pre($agents); die;?> 
<div class="houzez-module module-title text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <h2>Agents</h2>
                        <h3 class="sub-heading">Your constant support in finding the right home</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="agents-module" class="houzez-module agents-module">
            <div class="container">
                <div class="agents-blocks-main">
                    <div class="row no-margin">
                        <?php foreach ($agents as $agent){?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="agents-block">
                                <figure class="auther-thumb">
                                    <img src="<?php if(!empty($agent['profile_image'])){ echo base_url('uploads/profile_images/').$agent['profile_image']; } else { echo base_url('uploads/profile_images/default.png');} ?>" alt="thumb" width="150" height="150" class="img-circle">
                                </figure>
                                <!-- <div class="web-logo text-center">
                                    <img src="<?php // echo base_url()."web_assets/images/"; ?><?php //echo $agent['profile_image']?>houzez-logo-grey.png" alt="logo">
                                </div> -->
                                <div class="block-body">
                                    <p class="auther-info">
                                        <span class="text-primary" style="font-size: 20px; line-height: 2; text-transform: capitalize;"><?php echo $agent['name']?></span>
                                        <span><?php echo $agent['agent_position']?>, <?php echo $agent['company_name']?></span>
                                    </p>

                                    <p class="description"><?php echo $agent['about_agent']?></p>
                                    <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=').base64_encode($agent['id']); ?>" class="view">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

<?php } ?>