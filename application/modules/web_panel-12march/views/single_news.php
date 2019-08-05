<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<style type="text/css">
  h1{
    margin-top: 45px;
  }
  .news-text{
    height: 55px;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .news-text-small{
    height: 42px;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: -10px;
  }
  .news-description-small{
    margin:5px 8px;
    float: left;
    width: 65%;
    height: 83px;
  }
  .small-news-pic{
    float: left;
    width: 30%;
    overflow: hidden;
  }
  .news-description-small h3{
    margin-top: -10px;
  }
</style>
<div id="section" style="min-height: 530px;">
   <div class="container-fluid">
   	   <div class="single_category wow fadeInDown animated" style="visibility: visible;">
   	   	<h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span><strong class="title_text">Latest Property News</strong></h2>
   	   	<div class="container">
   	   	   <div class="row">
            <div class="col-sm-8">
              <h1>Buying an old house</h1>
              <div>
               <div class="news-img">
                <strong>Being able to spot an “old house” – a property which presents badly, but has the potential to be great – is a fine art. It can be learned, though.</strong>
                <img src="<?php echo base_url('web_assets/images/news/newspic3.JPG')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                 <p>Old homes are often overlooked because they look like hard work.</p>
                 <p>But many can be transformed into beautiful, profitable swans, with just “a little imagination and paint”. It’s about seeing past what a property looks like, to what it could look like.</p>
                 <p>The trick is to go for homes that are actually visually appealing, but they have ugly parts to them.</p>
                 <p>Muscat Home recommends buyers look for a property with “surface” problems only; which can be quickly and simply rejuvenated, without great expense.</p>
                 <p>Getting pest and building inspections done will flag up any major issues – like big plumbing or structural problems – which you really want to avoid as they can be costly. Keep it simple and go for a property that can be updated without too much work, Muscat Home can help you find such property and can even help you in renovating. Let us know which area you are interested in and will do the rest.</p>
               </div>
               </div>

               <div>
               <div class="news-img">
                <img src="<?php echo base_url('web_assets/images/news/newspic1.jpg')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                 <p>Here’s how you can spot a good ugly duckling: The structure of the building are good. The cupboards are in good condition and the benchtop can be transformed with a benchtop kit and new door handles. The door and all the wood work can also be transformed with minimal cost. Some unnecessary wall and barrier can also be taken out.</p>
                 <p>In many cases, a property’s “ugliness” is down to bad paint, and horrible decoration.</p>
                 <p>Either the paint color is out-of-date or was just the wrong choice in the beginning. Muscat Home can hook you up with interior decorator to advice you on how the house can look like with minimal investment.</p>
                 <p>Old-fashioned gardens can also date a property, but with a few tweaks, they can be “changed up fast” too. Muscat home gardener and land-scape designer will help you to achieve the goal.</p>
               </div>
               </div>

               <div>
               <div class="news-img">
                <img src="<?php echo base_url('web_assets/images/news/newspic2.JPG')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                 <p>On the interior, keep it simple. Especially if you have an old bathroom, a new set can do magic to the house.</p>
                 <p>Also, with great products like benchtop transformation kits available, home owners can re-rejuvenate their kitchen for as little as OMR1000. Let us know and sure will be there to help.</p>
               </div>
               </div>
            </div>
            <div class="col-sm-4" style="margin-top: 45px;">
              <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>Ugly Duckling</h3>
                    <div class="news-text-small">
                    <p>Here’s how you can spot a good ugly duckling</p>
                    </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive">
                    </a>
                </div>
                <div class="news-description-small">
                    <h3>On the interior</h3>
                    <div class="news-text-small">
                    <p>keep it simple. Especially if you have an old bathroom, a new set can do magic to the house.</p>
                   </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>On the interior</h3>
                    <div class="news-text-small">
                    <p>keep it simple. Especially if you have an old bathroom, a new set can do magic to the house.</p>
                   </div>
                </div>
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




