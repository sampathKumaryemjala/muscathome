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
              <h1>How to make the best offer on a property</h1>
              <div>
               <div class="news-img">
                <strong>Put yourself in the seller’s shoes.</strong>
                <img src="<?php echo base_url('web_assets/images/news/new5.png')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                 <p>As a homebuyer, if your purchase method is not ‘under the hammer’, chances are you will be dealing with negotiation in some shape or form. Everything in this world is up for negotiation.</p>
                 <p>Whether that’s negotiating with the vendor via the agent, negotiating against other competing buyers or submitting a ‘one and only’ offer, it’s important to think carefully about how to make your offer stand out for all the right reasons. </p>
                 <p>Without a good understanding of the seller’s situation it can be very difficult to frame your offer in the right way.</p>
                 <p>For example, if a seller has already secured their next home, ensuring that your offer presents a settlement date that makes their purchase stress-free can make a world of difference.</p>
                 <p>Nobody likes renegotiating their settlement date for their next move; having to bunk up with family or friends if it’s avoidable; or worst of all, facing expensive bridging finance.</p>
                 <p>There may also be other things you could suggest that may help your offer appeal to the seller, such as allowing them to rent the property back from you for a short period while they property search if they are looking to move to another property, or if they newhouse is still under-construction. If the house is rented you can offer them the rent until the rental agreement with the current tenant expired.</p>
                 <p>Finding out more about the seller’s next move is not always as easy as it seems and good agents will generally guard their seller’s privacy.</p>
                 <p>So rather than cornering an agent for this type of information, adopt a supportive approach with the seller in mind. </p>
               </div>
               </div>

               <div>
               <div class="news-img">
                <img src="<?php echo base_url('web_assets/images/news/new6.png')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                <strong>Ask the right questions.</strong> 
                <p>Good questions include “Is there a particular settlement date that the seller would prefer?”, or “Can you suggest any conditions or terms I could offer that would strengthen my offer?”. </p>
                <p>An important factor to consider is risk, and more importantly, the risk that your offer represents to the seller, particularly when they are faced with competing offers. If your offer is subject to a set of conditions, for example, the seller will take them into account and they will likely weaken your offer.</p>
                <p>Of course, all seller are different, however a vendor who’s experienced a previous sale ‘fall over’ due to finance not being obtained is likely to be nervy about a finance clause.</p>
                <p>Likewise, if their property is old and they are faced with two offers, they will favour the offer which is not subject to a building inspection.</p>
               </div>
               </div>

               <div>
               <div class="news-img">
                <img src="<?php echo base_url('web_assets/images/news/new7.png')?>" class="img-responsive">
                 <p>By: Muscat Home</p>
               </div>
               <div class="single-news-details">
                 <p>Being prepared, having pre-approval in place and finding a building inspector to do the inspection in a shorter time frame can make all the difference.</p>
                 <p>Facing delayed obtaining a loan from the bank could also be an obstacle, you should also ask the seller if he is willing to wait for loan approval, one way is to pay a deposit which can be up to 5% of the property to secure the home.</p>
               </div>
               </div>
            </div>
            <div class="col-sm-4" style="margin-top: 45px;">
              <div class="row">
                <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new6.png')?>" class="img-responsive"></a>
                </div>
                <div class="news-description-small">
                    <h3>Ask the right questions</h3>
                    <div class="news-text-small">
                    <p>Good questions include “Is there a particular settlement date that the seller would prefer?”,?”, or “Can you suggest any conditions or terms I could offer that would strengthen my offer?”. </p>
                    </div>
                </div>
               </div>
               <div class="row"> 
                 <div class="small-news-pic">
                  <a href="#"><img src="<?php echo base_url('web_assets/images/news/new7.png')?>" class="img-responsive">
                    </a>
                </div>
                <div class="news-description-small">
                    <h3>Being prepared</h3>
                    <div class="news-text-small">
                    <p>Facing delayed obtaining a loan from the bank could also be an obstacle, you should also ask the seller if he is willing to wait for loan approval, one way is to pay a deposit which can be up to 5% of the property to secure the home.</p>
                   </div>
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




