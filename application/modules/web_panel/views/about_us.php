<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>

<div id="section" style="min-height: 530px;">

    <div class="container">
        <div class="page-title breadcrumb-top">
            <?php if( isset($this->session->userdata['lang']) && $this->session->userdata['lang']==1){?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                        <img src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" class="img-responsive">
                     </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="arbic">
                        <h3>عن مسقط هوم </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">تعتبر مسقط هوم المنصة الرائدة للتواصل بين الأشخاص الراغبين في شراء أو تأجير منزل أو الحصول على خدمات منزلية من خلال خدمة مهنية متخصصة عالية الجودة وعلى يد أفراد مستقلين يتمتعون بالخبرة والكفاءة. نقدم العديد من الخدمات التي تلبي احتياجات آلاف العملاء كل أسبوع مثل خدمات النظافة وحتى السباكة. تعتبر مسقط هوم أسهل وسيلة للحصول على الخدمات المطلوبة بأسلوب مناسب والعثور على العقار المطلوب للشراء والإيجار حيث يمكن إتمام عملية الحجز والدفع من خلال بوابة دفع آلي مأمونة ومضمونة من مسقط هوم خلال 60 ثانية فقط</p>
                    </div>
                    <div class="arbic">
                        <h3>عن الشركة</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">تأسست مسقط هوم في عام 2017م كأحد الحلول العملية لمشكلة موجودة منذ فترة طويلة من الزمن وهي مشكلة العثور على أشخاص متخصصين يقدمون خدمات فاعلة للراغبين في شراء أو استئجار منزل. شركة مسقط هوم مملوكة من عائلة البرواني التي تعتب من أجل الحصول على خدمة مضمومة ذات سعر في المتناول مع الضمان لتجديد منزل الأسرة ولذلك قررت الأسرة أن تحل هذه المشكلة بنفسها وأسست مسقط هوم بهدف ملء الفراغ الموجود في السوق وتوفير طريقة سهلة وسلسلة يستفيد منها الأشخاص الذين يعانون من كثرة مشاغلهم وعدم توفر الوقت الكافي للبحث عن الخدمات المنزلية المطلوبة أو شراء منزل أو أرض. </p>
                    </div>
                    <div class="arbic">
                        <h3>كلمة شكر</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">شكرا لكن من ساهم في تحويل مسقط هوم من فكرة إلى واقع ملموس على الأرض</p>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">شكرا لكم من انضم إلى فريق العمل واستثمر في مسقط هوم ولولا هذا الدعم ما كنا استطعنا تغيير طريقة تقديم الخدمات العقارية في مسقط وإنشاء كيان يركز على تلبية احتياجات العملاء أولا.</p>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">شكرا لكم على ثقتكم الغالية فينا</p>
                    </div>
                </div>
            </div>
            
            <?php } else { ?>
            
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                        <img src="<?php echo base_url('web_assets/images/imgpsh_fullsize.png'); ?>" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h2 style="padding: 20px 10px; color: #009bd6;">ABOUT MUSCAT HOME</h2>
                    <p style="text-align: justify; padding: 10px;">Muscat Home is the leading platform for connecting individuals looking for a home to buy, rent or household services with top-quality, pre-screened independent service professionals. From home cleaning to plumbing, Muscat Home instantly matches thousands of customers every week with top-rated professionals in houses around Muscat. With a seamless 60-second booking process, secure payment, and backed by the Muscat Home Guarantee, Muscat Home is the easiest, most convenient way to book home services and find your lovely home either to buy or rent.</p>

                    <h2 style="padding: 20px 10px; color: #009bd6;">OUR STORY</h2>
                    <p style="text-align: justify; padding: 10px;">Muscat Home, was founded in 2017 as a practical solution to an age-old problem: finding top-rated, effective professionals for common household services let alone an easy solution to find a home to rent or buy. Muscat Home is owned by the Barwani’s family, tired of finding a reliable service let alone affordable with warranty to refurbish their mother’s home they decided to solve the problem by themselves and Muscat Home was born. They developed Muscat Home Platform to fill that void, with the goal of building the easiest, most convenient way for busy people everywhere to book household services and make their first home or land purchase.</p>

                    <h2 style="padding: 20px 10px; color: #009bd6;">THANK YOU</h2>
                    <p style="text-align: justify; padding: 10px;">Thank you to the many people who helped Muscat Home gets started.<br> 
                    Thank you to the many people who've subsequently joined the team and invested in Muscat Home. It's because of your help that we're well on our way to changing the way services and real estate are conducted in Muscat by placing our customer first. </p>

                    <p style="text-align: justify; padding: 10px;">Thank you for trusting us.</p>
                </div>
            </div>
            
            
            <?php } ?>
        </div>

    </div>
</div>

<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->




