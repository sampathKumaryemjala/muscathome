<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>
<style type="text/css">
  .news-text{
    height: 55px;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .news-text-small{
    height: 58px;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: -10px;
  }
  .news-description-small{
    margin:5px 8px;
    float: left;
    width: 65%;
    height: 116px;
  }
  h1{
    margin-left: 15px;
  }
  .small-news-pic{
    float: left;
    width: 30%;
    overflow: hidden;
    height: 100px;
  }
</style>
<div id="section" style="min-height: 530px;">
   <div class="container-fluid">
   	   <div class="single_category wow fadeInDown animated" style="visibility: visible;">
     	   	<h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span><strong class="title_text">Latest Property News</strong></h2>
     	   	<div class="container">
            <div class="row">
              <h1>Buying an old house</h1>
     	   	    <div class="col-sm-6">
                <div class="large-news-pic">
                  <img src="<?php echo base_url('web_assets/images/news/newspic3.JPG')?>" class="img-responsive">
                </div>
                <div class="news-description">
                    <h1>Being able to spot an “old house”</h1>
                    <div class="news-text">
                    <p>a property which presents badly, but has the potential to be great – is a fine art. It can be learned, though.<span>...</span></p>
                    </div>
                    <a href="<?php echo base_url('index.php/web_panel/Home/news_details'); ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/newspic1.jpg')?>" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>Ugly Duckling</h3>
                    <div class="news-text-small">
                    <p>Here’s how you can spot a good ugly duckling</p>
                    </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/newspic2.JPG')?>" class="img-responsive">
                    </a>
                </div>
                <div class="news-description-small">
                    <h3>On the interior</h3>
                    <div class="news-text-small">
                    <p>keep it simple. Especially if you have an old bathroom, a new set can do magic to the house.</p>
                   </div>
                </div>
              </div>
            </div> 
            <hr>  
          <!--second-news-->
            <div class="row">
              <h1>How much deposit do I need to buy my first home?</h1>
              <div class="col-sm-6">
                <div class="large-news-pic">
                  <img src="<?php echo base_url('web_assets/images/news/new3.png')?>" class="img-responsive">
                </div>
                <div class="news-description">
                    <h1>How much deposit do you need before approaching a bank?</h1>
                    <div class="news-text">
                    <p>Often the culmination of years of squirrelling away every spare Rial you earn, reaching that target amount is no small achievement, particularly with house prices soaring in Muscat.<span>...</span></p>
                    </div>
                     <a href="<?php echo base_url('index.php/web_panel/Home/news_details2'); ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new2.png')?>" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>approaching a bank?</h3>
                    <div class="news-text-small">
                    <p>A 20% deposit is must when buying a home, per Oman Central Bank </p>
                    </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new4.png')?>" class="img-responsive">
                    </a>
                </div>
                <div class="news-description-small">
                    <h3>bigger deposit?</h3>
                    <div class="news-text-small">
                    <p>Of course, in today’s rapidly changing markets, waiting a few extra months to save additional money</p>
                   </div>
                </div>
                <!-- <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive"></a>
                </div> -->
                <!-- <div class="news-description-small">
                    <h3>Ranjeet</h3>
                    <div class="news-text-small">
                    <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                  </div>
                </div> -->
              </div>
            </div>  
            <hr> 
          <!--third-news-->
            <div class="row">
              <h1>How to make the best offer on a property</h1>
              <div class="col-sm-6">
                <div class="large-news-pic">
                  <img src="<?php echo base_url('web_assets/images/news/new5.png')?>" class="img-responsive">
                </div>
                <div class="news-description">
                    <h1>Put yourself in the seller’s shoes.</h1>
                    <div class="news-text">
                    <p>As a homebuyer, if your purchase method is not ‘under the hammer’, chances are you will be dealing with negotiation in some shape or form. Everything in this world is up for negotiation.<span>...</span></p>
                    </div>
                     <a href="<?php echo base_url('index.php/web_panel/Home/news_details3'); ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new6.png')?>" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>Ask the right questions</h3>
                    <div class="news-text-small">
                    <p>Good questions include “Is there a particular settlement date that the seller would prefer?”,?”, or “Can you </p>
                    </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new7.png')?>" class="img-responsive">
                    </a>
                </div>
                 <div class="news-description-small">
                    <h3>Being prepared</h3>
                    <div class="news-text-small">
                    <p>Facing delayed obtaining a loan from the bank could also be an obstacle, </p>
                    </div>
                </div>
                <!-- <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive"></a>
                </div> -->
                <!-- <div class="news-description-small">
                    <h3>Ranjeet</h3>
                    <div class="news-text-small">
                    <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                  </div>
                </div> -->
            </div>
            </div> 
            <hr>
            <!--fourth-news-->
            <div class="row">
              <h1>Is it better to Rent or Buy a home in Muscat?</h1>
              <div class="col-sm-6">
                <div class="large-news-pic">
                  <img src="<?php echo base_url('web_assets/images/news/new8.png')?>" class="img-responsive">
                </div>
                <div class="news-description">
                    <h1>Five Questions You Need to Ask Yourself Before Buying a Home</h1>
                    <div class="news-text">
                    <p>The choice between buying a home and renting one in Muscat is among the biggest financial decisions that you will face in your life. But the costs of buying are more varied and complicated than for renting, making it hard to tell which is a better deal. To help you answer this question, our table takes the most important costs associated with buying a house and computes the equivalent monthly rent.<span>...</span></p>
                    </div>
                     <a href="<?php echo base_url('index.php/web_panel/Home/news_details4'); ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new9.png')?>" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>Ugly Duckling</h3>
                    <div class="news-text-small">
                    <p>Here’s how you can spot a good ugly duckling </p>
                    </div>
                </div>
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new10.png')?>" class="img-responsive">
                    </a>
                </div>
                 <div class="news-description-small">
                    <h3>On the interior</h3>
                    <div class="news-text-small">
                    <p>keep it simple. Especially if you have an old bathroom, a new set can do magic to the house.</p>
                    </div>
                </div>
                <!-- <div class="small-news-pic">
                  <a href="#"><img src="https://www.vccircle.com/wp-content/uploads/2017/10/realestate-crane-13853_1280.jpg" class="img-responsive"></a>
                </div> -->
                <!-- <div class="news-description-small">
                    <h3>Ranjeet</h3>
                    <div class="news-text-small">
                    <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                  </div>
                </div> -->
            </div>
            </div> 
            <hr>
            </div>  
   </div>
</div>
<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




