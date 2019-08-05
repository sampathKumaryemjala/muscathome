<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>

<div id="section" style="min-height: 530px;">

    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb"><li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="<?php echo base_url('index.php/web_panel/Home')?>"><span itemprop="title">Home</span></a></li><li class="active">Privacy</li></ol><div class="page-title-left">
                        <h1 class="title-head"><?php //echo $agent['name']; ?></h1>
                    </div>


                </div>
            </div>
        </div>
        
    </div>
</div>

<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->

