<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<?php if($this->session->flashdata('servent_filters')){
    $filters = $this->session->flashdata('servent_filters');
    //pre($filters); die;
}?>
<style type="text/css">
    .glyphicon-lg
    {
        font-size:4em
    }
    .info-block
    {
        xborder-right:5px solid #E6E6E6;
        margin-bottom:25px
    }
    .info-block .square-box
    {
        width:144px;
        height:123px;
        margin-right:22px;
        text-align:center!important;
        background-color:#676767;
        padding:0px 0
    }
    .info-block.block-info
    {
        border-color:#20819e;
        background-color: #ececec;
    }
    .info-block.block-info .square-box
    {
        background-color:#fff;color:#FFF;
        overflow: hidden;
        margin:5px;
        margin-right: 20px;
    }
    .info-block h4{
        margin: 0 0 15px 0;
    }
    .info-block p{
        margin: 0 0 15px 0;
    }
    .info-block h5{
        margin: 0 0 3px 0;
    }
    .info-block h6{
        margin: 0 0 0px 0;
    }
    .servent-info{
        margin-top: 15px;
    }
    .form-horizontal .form-group{
        margin-right: 0px;
        margin-left: 0px;
    }
    .well{
        background-color: #009bd6;
        color: #fff;
    }
    .well h3{
        color: #fff;
    }
    .servent-content{
        margin:5px;
    }
    .maidviewcv{
        width: 44px;
        position: absolute;
        top: 0;
        right: 15px;
    }
    .maidviewcv a{
        display: inline-block;
        width: 44px;
        height: 132px;
        background-color: #009bd6;
        background-image: url('https://muscathome.com/web_assets/images/viewcv_listing.jpg');
        background-position: center center;
        background-repeat: no-repeat;
    }
    .search-btn{
        width: 100%;
    }
</style>
<div id="section" style="min-height: 530px; margin-top: 60px;">
    <div class="container">
        <div class="row">
            <h2>All <?php echo ucfirst($servents_cat_name); ?></h2>
            <div class="col-sm-4">
                <!-- filter -->
                <div class="well">
                    <h3 align="center">Search Filter</h3>
                    <form class="form-horizontal" method="post" name="servent_filter_form" id="servent_filter_form">
                        <div class="row">	
                            <div class="form-group col-sm-6">
                                <label for="city" class="control-label">City</label>
                                <select class="form-control" name="city" id="city">
                                    <option value="">Any</option>
                                    <?php foreach($cities as $city){ ?>
                                    <option <?php if(isset($filters) && $filters['city'] == $city){ echo "selected"; }?> value="<?php echo $city; ?>"><?php echo $city; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="religion" class="control-label">Religion</label>
                                <select class="form-control" name="religion" id="religion">
                                    <option value="">Any</option>
                                    <option <?php if(isset($filters) && $filters['religion'] == "buddhism"){ echo "selected"; }?> value="buddhism">Buddhism</option>
                                    <option <?php if(isset($filters) && $filters['religion'] == "christian"){ echo "selected"; }?> value="christian">Christian</option>
                                    <option <?php if(isset($filters) && $filters['religion'] == "islam"){ echo "selected"; }?> value="islam">Islam</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="gender" class="control-label">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Any</option>
                                    <option <?php if(isset($filters) && $filters['gender'] == 1){ echo "selected"; }?> value="1">Male</option>
                                    <option <?php if(isset($filters) && !empty($filters['gender']) && $filters['gender'] == 0){ echo "selected"; }?> value="0">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="age" class="control-label">Age</label>
                                <select class="form-control" name="age" id="age">
                                    <option value="">Any</option>
                                    <option <?php if(isset($filters) && $filters['age'] == "18-25"){ echo "selected"; }?> value="18-25">18-25</option>
                                    <option <?php if(isset($filters) && $filters['age'] == "26-35"){ echo "selected"; }?> value="26-35">26-35</option>
                                    <option <?php if(isset($filters) && $filters['age'] == "36-45"){ echo "selected"; }?> value="36-45">36-45</option>
                                    <option <?php if(isset($filters) && $filters['age'] == "46-80"){ echo "selected"; }?> value="46-80">46+</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="marital_status" class="control-label">Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">Any</option>
                                    <option <?php if(isset($filters) && !empty($filters['marital_status']) && $filters['marital_status'] == 0){ echo "selected"; }?> value="0">Single</option>
                                    <option <?php if(isset($filters) && $filters['marital_status'] == 1){ echo "selected"; }?> value="1">Married</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="experience" class="control-label">Experience</label>
                                <select class="form-control" name="experience" id="experience">
                                    <option value="">Any</option>
                                    <option <?php if(isset($filters) && $filters['experience'] == "0-12"){ echo "selected"; }?> value="0-12">0 - 1 year</option>
                                    <option <?php if(isset($filters) && $filters['experience'] == "13-60"){ echo "selected"; }?> value="13-60">2 - 5 year</option>
                                    <option <?php if(isset($filters) && $filters['experience'] == "61-120"){ echo "selected"; }?> value="61-120">6 - 10 year</option>
                                    <option <?php if(isset($filters) && $filters['experience'] == "121-400"){ echo "selected"; }?> value="121-400">10+ year</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">	
                            <div class="form-group col-sm-12">
                                <label for="expected_salary" class="control-label">Salary Bracket</label>
                                <select class="form-control" name="expected_salary" id="expected_salary">
                                    <option value="">Any</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "1000-1400"){ echo "selected"; }?> value="1000-1400">1,000 - 1,400</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "1500-1900"){ echo "selected"; }?>value="1500-1900">1,500 - 1,900</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "2000-2400"){ echo "selected"; }?> value="2000-2400">2,000 - 2,400</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "2500-2900"){ echo "selected"; }?> value="2500-2900">2,500 - 2,900</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "3000-3400"){ echo "selected"; }?> value="3000-3400">3,000 - 3,400</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "3500-3900"){ echo "selected"; }?> value="3500-3900">3,500 - 3,900</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "4000-4400"){ echo "selected"; }?> value="4000-4400">4,000 - 4,400</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "4500-4900"){ echo "selected"; }?> value="4500-4900">4,500 - 4,900</option>
                                    <option  <?php if(isset($filters) && $filters['expected_salary'] == "5000-15000"){ echo "selected"; }?> value="5000-15000">5000+</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-info search-btn" id="search_servent" role="button">Search</button>
                    </form>
                </div>
                <!-- end of filter -->
            </div>
            <div class="col-sm-8">
                <div class="searchable-container">
                    <?php
                    if (!empty($servents_list)) {
                        foreach ($servents_list as $servent) {
                            ?>
                            <div class="items col-xs-12 col-sm-12 col-md-12 col-lg-12 clearfix">
                                <div class="info-block block-info clearfix">
                                    <div class="square-box pull-left">

                                        <img src="<?php
                                        if (!empty($servent['image_url'])) {
                                            echo base_url('uploads/profile_images/').$servent['image_url'];
                                        } else {
                                            echo base_url('uploads/profile_images/default.png');
                                        }
                                        ?>" style="width: 100%; height: 100%;">
                                    </div>
                                    <div class="servent-content">
<!--                                        <h4>Name: <?php echo $servent['name']; ?></h4>-->
                                        <h5><?php echo ucfirst($servent['name']); ?></h5>

                                        <p>Title: <?php echo ucfirst($servent['sub_cat_name']); ?></p>
                                        
<!--                                        <h6>Phone: <?php //echo $servent['mobile']; ?></h6>
                                        <h6>Email: <?php //echo $servent['email']; ?></h6>-->
                                        
                                        <a href="<?php echo site_url('web_panel/Servent_request/servent_details/?gdfgd=') . base64_encode($servent['id']) ?>" class="btn btn-info servent-info">More Info</a>
                                        <?php if(!empty($servent['servent_details']['cv_url'])) { ?>
                                        <!-- <div class="maidviewcv">
                                            <a href="<?php echo $servent['servent_details']['cv_url']; ?>"></a>
                                        </div> -->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<h3>No record found!</h3>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>   
</div>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->
<?php //if($this->session->flashdata('without_login')){  ?>
<!--<script>
    alert('Please login first');
</script>-->
<?php //}  ?>



