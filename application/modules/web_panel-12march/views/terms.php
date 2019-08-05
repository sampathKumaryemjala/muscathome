<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<?php echo $this->load->view('custome_link/custome_css', array()); ?>
<!--start header section header v1-->
<?php echo $this->load->view('include/header_inc', array()); ?>

<div id="section" style="min-height: 530px;">

    <div class="container">
        <div class="page-title breadcrumb-top">
            <!-- <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h1 style="padding: 20px 10px;">OUR STORY</h1>
                    <p style="text-align: justify; padding: 10px;">Muscat Home, was founded in 2017 as a practical solution to an age-old problem: finding top-rated, effective professionals for common household services let alone an easy solution to find a home to rent or buy. Muscat Home is owned by the Barwani’s family, tired of finding a reliable service let alone affordable with warranty to refurbish their mother’s home they decided to solve the problem by themselves and Muscat Home was born. They developed Muscat Home Platform to fill that void, with the goal of building the easiest, most convenient way for busy people everywhere to book household services and make their first home or land purchase.</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div>
                        <img src="http://ec2-34-207-7-22.compute-1.amazonaws.com/real_estate/web_assets/images/building.png" class="img-responsive">
                    </div>
                </div>
            </div> -->
            <div class="row">
                <?php if( isset($this->session->userdata['lang']) && $this->session->userdata['lang']==1){?>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="arbic">
                        <h3>شروط الاستخدام / اتفاقية المستخدم </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">تعتبر هذه الاتفاقية عقدا قانونيا بينك (أنت أو " المستخدم) وبين مسقط هوم ، شركة مسجلة تحت اسم خيام البراري للتجارة. تحكم هذه الاتفاقية استخدامك لخدماتنا وتعتبر منصة الكترونية لتسهيل التواصل بين المستخدمين من خلال موقعنا على الانترنت www.MuscatHome.com أو كما يتم تعديله أو نقله و/أو إعادة توجيهه من وقت إلى آخر (الموقع) والتطبيقات الالكترونية التي نوفرها (التطبيقات). يتم الإشارة إلى خدماتنا، المنصة والموقع الالكتروني والتطبيقات معاً باسم " منصة مسقط هوم". </p>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">الإشارة إلى خدماتنا، المنصة والموقع الالكتروني والتطبيقات معاً باسم " منصة مسقط هوم".</p>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">عند الدخول، استخدام أو التسجيل مع منصة مسقط هوم أو أي جزء منها فإنك تقر وتوافق بشكل صريح على الالتزام بالشروط والأحكام الواردة في هذه الاتفاقية وأي تعديلات تطرأ عليها مستقبلا أو أي إضافات تتم عليها ونقوم بالإعلان عنها من وقت إلى آخر. نأمل قراءة الاتفاقية بعناية وفي حالة عدم موافقتك على الالتزام بهذه الاتفاقية، يجب عليك فورا التوقف عن استخدام المنصة. موافقة مسقط هوم مشروطة بشكل صريح بقبولك لهذه الاتفاقية بالكامل. في حالة تم اعتبار هذه الاتفاقية عرض من جانبنا فإن القبول ينحصر فقط في هذه الاتفاقية.</p>
                    </div>
                    <div class="arbic">
                        <h3>العمولة</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">ستقوم مسقط هوم بتحصيل عمولة 3% وسيدفع البائعون عمولة الصفقة وهذا يعني أن المشتري لن يدفع أي عمولة للوكيل. نتيجة لذلك فإن البائع سيوفر الوقت والمال الذي كان يحصل عليه الوكلاء وهو في الغالب في حدود 5-6% وسيوفر المشتري المال الذي كان سيدفعه إلى وكيل المشتري ويوفر وقته أيضا. </p>
                    </div>
                    <div class="arbic">
                        <h3>3% البائعون يوفرون المال مع عمولتنا القليلة التي تبلغ </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">في عمليات الوساطة التقليدية، تكون العمولة في المعتاد 5% على عوائد بيع العقارات أو القيمة الإيجارية كما يحصل الوكيل على عمولة من الجانبين على إتمام الصفقة. أما في مسقط هوم، لا يدفع المشتري أي عمولة للوكيل
                        </p>
                    </div>
                    <div class="arbic">
                        <h3>3% في مسقط هوم الرسوم هي فقط </h3>
                        <ul style="list-style: none;">
                            <li style="width: 50%; float: right;"><p class="droid-arabic-kufi">الوساطة التقليدية </p>
                                <p style="font-size: 35px; font-weight: bolder;">5%</p>
                            </li>
                            <li style="width: 50%; float: right;"><p class="droid-arabic-kufi">مسقط هوم </p>
                                <p style="font-size: 35px; font-weight: bolder;">3%</p>
                            </li>

                        </ul>
                    </div>
                    <br><br><br><br>
                    <div class="arbic">

                        <h3>شروط الاستخدام</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">أهلا بك إلى موقع مسقط هوم ويتم الإشارة إلى الموقع والتطبيقات (المعرفة أدناه (المواقع) مع الخدمات المقدمة عن طريق المواقع (معا، الموقع، الخدمات) بـ " الخدمة" المملوكة والتي يتم تشغيلها من جانب خيام البراري للتجارة، أحد شكات الوساطة العقارية التي تعتمد على استخدام التقنية الحديثة. تعتبر شروط الاستخدام هذه، التي تشمل سياسة الخصوصية في مسقط هوم هي " الاتفاقية " ما بينك ومسقط هوم بشأن الخدمات وتوفر معلومات هامة لك بما في ذلك المعلومات بشأن التزاماتك تجاه المحتوى وحدود المسؤولية التي تتحملها. عند الدخول إلى الموقع وتحميل واستخدام أي جزء من الخدمات فإنك تقر بأنك تقبل شروط الاتفاقية وفي حالة عدم قبولك نأمل عدم استخدام هذه الخدمات. 
                            <br><br>
                            قبل أن نوضح لك الصور والأسعار للمنازل التي يتم بيعها أو نوضح لك التعليقات على الوحدات المعروضة من وكلاء مسقط هوم وعلى خدماتنا، يحتاج مقدمي المعلومات لدينا إلى إقرار منك بأن مسقط هوم هي وكيلك العقاري ومقدم الخدمة لك. 
                            <br><br>
                            ليس عليك أي التزام بالعمل مع وكيل مسقط هوم لشراء أو بيع منزل أو استخدام واحدة من الخدمات التي نقدمها. يمكنك أن تختار العمل معنا أو لا 
                        </p>

                        <ul>
                            <li><p class="droid-arabic-kufi">أنت تدخل في علاقة وسيط – مستهلك بشكل قانوني مع مسقط هوم كما هو منصوص عليه في القوانين العمانية المطبقة. ليس عليك أي التزام بالعمل مع مسقط هوم حيث بإمكانك إنهاء الحساب مع مسقط هوم في أي وقت. الغرض من المعلومات المتوفرة والتي يمكنك أن تحصل عليها من موقع مسقط هوم هو الاستخدام الشخصي وليس الاستخدام التجاري. </p>
                            </li>
                            <li><p class="droid-arabic-kufi">ليس لديك أي نية في الغش في أي مصلحة في الشراء أو البيع أو إيجار أي عقار على موقع مسقط هوم.</p> </li>
                            <li><p class="droid-arabic-kufi">لن تقوم بعمل نسخ، إعادة توزيع أو إعادة نقل أي من المعلومات المقدمة التي لها علاقة برغبتك في شراء أو بيع عقار.</p> </li>
                            <li><p class="droid-arabic-kufi">تقر بأن خدمة الإدراج المتعدد الفردية والتي توفر معلومات الإدراج هي التي تملك المعلومات وتقر بأنها مالكة حقوق الطبع الخاصة بهذه المعلومات في كل الأوقات.</p></li>
                            <li><p class="droid-arabic-kufi">مسقط هوم تصرح بشكل صريح للموظفين والأعضاء أو ممثليهم المعتمدة بالدخول إلى موقع مسقط هوم وتطبيقاتها لغرض التحقق من الالتزام بالقواعد ومراقبة عرض المشاركات على موقع مسقط هوم.</p> </li>
                        </ul>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right">-1</h3><h3 style="float: right;"> من بإمكانه استخدام خدمات مسقط هوم؟</h3>
                        <br>
                        <p class="droid-arabic-kufi" style=" padding: 10px;"> يجب أن تكون (أ)مقيما في سلطنة عمان أو لديك اهتمام بالاستثمار فيها (ب) أكبر من 13 سنة.
                        </p>

                        <h3 style="float: right;" class="text-right"> -2</h3><h3>امتلاك حقوق الملكية الفكرية والرخصة</h3>
                        <br>
                        <h4>أ-حق النشر </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">كافة محتويات الخدمات (بما في ذلك رمز المصدر والمعلومات والصور والمحتوى الآخر) بما في ذلك اختيار المواد وترتيبها ملكية خاصة لمسقط هوم أو لمسقط هوم رخصة استخدامها على المواقع. يضم موقعنا خرائط جوجل، رجاء مراجعة سياسة الخصوصية الخاصة بها والإشعارات وشروط الاستخدام. تم تعديل أجزاء من هذه الصفحة بناء على العمل الذي قمنا به وشاركناه مع جوجل وتم استخدامه وفقاً للشروط الواردة في اتفاقية رخصة 
                        </p>

                        <h4>ب) العلامات التجارية</h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">مسقط هوم، شعارات مسقط هوم والعلامات التجارية الأخرى لمسقط هوم وعلامات الخدمة الرسوم الجرافيكية واللوجوهات المستخدمة فيها يتعلق بمسقط هوم هي علامات تجارية مسجلة لمسقط هوم في سلطنة عمان. علامات أبل وشعار ذا أبل والأي باد والأي فود والأي بودهي علامات تجارية مسجلة في الولايات المتحدة باسم هذه الشركات ومسجلة في دول أخرى. أما أبل ستور فهي علامة تجارية لشركة أبل وأندرويد هي العلامة التجارية لجوجل. يخضع استخدام العلامة التجارية لتصاريح جوجل. أما العلامات التجارية واللوجوهات الأخرى المستخدمة في مسقط هوم فربما تكون علامات تجارية للمالكين المعنيين بها. 
                        </p>

                        <h4>(ج)المعلومات </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">المعلومات الموجودة على المواقع هي ملك للشخص الذي يقدم المعلومات وهؤلاء الأفراد حصلوا على الرخص المطلوبة من مسقط هوم لعرض البيانات والمعلومات على الموقع. بعضهم يطلب منا عرض معلومات رخصة معينة بشأن معلوماتها.  
                        </p>

                        <h4>(د) الملكية الفكرية الأخرى </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">كما تملك مسقط هوم الأسرار التجارية والمعرفة التقنية التي تساهم في عملية الخدمات.   
                        </p>

                        <h4>(د) الملكية الفكرية الأخرى </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">عدا ما هو مفعل ومطلوب على حسب التعليمات المسجلة، لا يحق لك تعديل أو إعادة إنتاج أو توزيع أو محاولة تحقيق مكاسب من استخدامك أو إساءة استخدامك للخدمات أو أي من المكونات الواردة. لا يحق لك استدام أي من المعلومات الكبيرة أو أي نصوص مخفية باستخدام اسم مسقط هوم أو علامتها التجارية بدون الحصول على تصريح بذلك الأمر تحديدا. يحق لك التنازلين رخصتك بالدخول واستخدام المواقع ومن حقنا أن نقوم بحظرك أو منعك من الدخول إلى المواقع وفق تقديرنا المطلق ودون الحاجة إلى أن يكون هناك سابق إنذار. في حالة مخالفتك لشروط الاستخدام، سيتم سحب تصريحك بالدخول واستخدام المواقع الأخرى.   
                        </p>

                        <h4>(و) الاحتفاظ بالحقوق </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">عدا ما كانت هناك رخصة محددة له كما هو مبين أعلاه فإن مسقط هوم تحتفظ لنفسها بالحق في كامل حقوق الملكية الفكرية في المواقع. لا تمنحك هذه الاتفاقية أي حقوق أو رخص فيما يتعلق بأي علامات تجارية أو شعارات.    
                        </p>

                        <h4>(ز)تجميع المعلومات </h4>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">مسقط هوم غير مسؤولة عن أي أخطاء في عرض المعلومات أو تأخير في عرض هذه المعلومات. كافة المعلومات الموجودة على الموقع منقولة إلى مسقط هوم من جهات أخرى أو أشخاص آخرين أو تم الحصول عليها عن طريق المصادر الحكومية المتاحة. ربما لا تكون مسقط هوم متأكدة من دقة المعلومات من خلال إرسال التغذية المرتدة ولكن لا يمكن تصحيح دقة هذه المعلومات من جانب مسقط هوم والجهة أو الشخص الذي قدم هذه المعلومات هو الذي يُسائل عنها. على سبيل المثال، يمكن تغيير أي معلومات إدراج غير صحيحة عن طريق وكيل الإدراج الطرف الثالث بموجب الشروط المتبعة لدينا.     
                        </p>

                        <h3 style="float: right;" class="text-right"> -3 </h3><h3> التسجيل </h3>
                        <br>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">يجب عليك التسجيل للحصول على حساب مسقط هوم لمشاهدة كامل الإدراج وهو أمر مطلوب من رخصنا كما يجب عليك أيضا التسجيل قبل المشاركة في أي منتديات أو تقديم محتوى. عند التسجيل في حساب مسقط هوم فإنك توافق على شروط الاستخدام هذه وعلى شروط الاستخدام الخاصة بنا. كذلك فأنت المسؤول عن كافة الأنشطة التي لها علاقة بالخدمات التي تحدث باستخدام حسابك ورقمك السري. أنت كذلك المسؤول عن دقة المعلومات الخاصة بك والتي تضعها على صفحتك في مسقط هوم. كما توافق كذلك على المحافظة على سرية رقم السري وعدم استخدام حسابات الآخرين ولا السماح للآخرين باستخدام حسابك. تحتفظ مسقط هوم لنفسها بالحق في إنهاء الحسابات وفق تقديرها المطلق.     
                        </p>

                        <h3 style="float: right;" class="text-right"> -4 </h3><h3> ما تقدمه والقواعد العامة <br><br> أ-المواد التي تقدمها </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">ربما تقدم تغذية مرتدة أو أفكار أو مراجعات أو تعليقات أو صور أو أي محتويات أخرى لمسقط هوم والمواقع (الأشياء المقدمة). يجب أن تكون كل ما تقدمه متماشيا مع القواعد المطبقة من جانب مجتمع مسقط هوم والمبينة أدناه. أنت تقر بأنك تملك أو تتحكم في كافة الحقوق المتعلقة بما تقدمه وأن تقديمك ليس فيه مخالفة لشروط الاستخدام هذه بما في ذلك القواعد المجتمعية أو حقوق أي طرف ثالث. كذلك فأنت المسؤول وحدك عما تقدمه ومسقط هوم ليس عليها أي التزام بمراقبة وتعديل أو تغيير أو مسح أي شيء تقدمه وليس عليها أي التزام بحفظ أي شيء تقدمه.      
                        </p>

                        <h3>ب) قواعد مجتمع مسقط هوم</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;"><strong>أن تكون محترما:</strong> نرحب بالحوار ولكننا لن نتهاون في حالة استخدام لغة غير مهذبة في الحوار أو في الحالة الهجوم على شخص معين وعليه نأمل منك تجنب الموضوعات الخلافية مثل الحديث في السياسة أو العرق أو الدين أو الجنس. نحتفظ لنفسنا بالحق في تعديل أو حذف أي محتوى عليه خلاف.
                            <br><br> 
                            <strong>عدم الإغواء:</strong> نرحب بوكلاء العقار والمهن الأخرى هنا ولكن ليس هذا هو المكان الذي تقوم فيه بتسويق خدماتك. يمكنك أن تذكر وساطتك ولكن يجب عدم ذكر أي معلومات متعلقة بأرقام ووسائل الاتصال أو عنونان المواقع الالكترونية.  

                            <br><br> 
                            <strong>عدم السماح بالبريد غير المرغوب فيه:</strong> رجاء لا تقم بوضع إعلانات أو بريد الكتروني أو خطابات مسلسلة غير مرغوب فيها. 

                            <br><br> 
                            <strong>عدم وضع تعليقات عدائية أو غير قانونية:</strong> سيتم حذف أي محتوى يحتوي على قذف او تشهير أو لغة بذيئة أو دعارة.       


                            <br><br> 
                            <strong>عدم نشر أي معلومات شخصية أو معلومات خاصة بالتواصل مع أشخاص آخرين.</strong> يشمل ذلك الاتصالات من إدارة المجتمع والمسهلين.       


                            <br><br> 
                            <strong>التدخل:</strong> نحتفظ لنفسنا بالحق في مراقبة وحذف أو احتجاز أي محتوى وذلك وفق تقديرنا المطلق.       
                        </p>
                    </div>
                    <div class="arbic">
                        <h3>ج) الرخصة </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">أنت تمنح مسقط هوم حق مستمر وغير مقيد في استخدام أو إعادة نشر أو تعديل أو توزيع أو عرض ما تقدمه على المواقع. من حق مسقط هوم، ولكن ليس عليها أي التزام بأن تقوم بذكر اسمك مع المواد التي تقدمها. كذلك فإنك تعطي لمسقط هوم الحق غير المقيد بمدة معينة لاستخدام وتوزيع ونشر وحذف والاحتفاظ بـ وإضافة ومعالجة وتحليل واستخدام أي معلومات تقدمها بشكل مباشر إلى مسقط هوم – بأي وسيلة معلومة حاليا أو ستكون معلومة مستقبلاً- بدون الحصول على موافقة أخرى أو إشعار آخر وبدون الحاجة إلى تعويضك أو تعويض أي أطراف ثالثة عن ذلك. </p>
                    </div>
                    <div class="arbic">
                        <h3>(د)إخلاء مسؤولية</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">لا تتحمل مسقط هوم أي مسؤولية أو التزام عن أي مواد تقدمها أنت أو أي طرف ذلك. ليس هناك أي التزام على مسقط هوم أن تقوم بمراقبة أو السيطرة على المواد التي يتم تقديمها عبر الخدمات وعليه لا تتحمل أي مسؤولية عن هذه المواد وأي استخدام أو اعتماد على هذه المواد التي يتم نشرها عن طريق الخدمات أو الحصول عليها من جانبك عن طريق الخدمات فهي مسؤوليتك الخاصة. وعليه وإذا كان لديك فكرة أو معلومة تريد أن تحافظ على سريتها، أو لا تريد من الآخرين استخدامها أو تخضع لأي حقوق أطراف ثلاثة ويمكن أن يحدث تعدي عليها عندما تقوم بمشاركتها، لا تقم بنشرها على أي منتدى أو في أي مكان آخر على مواقعنا. لا تتحمل مسقط هوم أي مسؤولية عن أي إساءة في استخدام تلك المواد أو أي استغلال لأي شيء قمت بنشره على مسقط هوم. <br><br>
                            إن موافقتك على أن منتدى مسقط هوم هو منتدى اتصالات يوفر طريقة للخدمات الاحترافية التي سيتم حجزها وأن كافة الخدمات المهنية يتم تقديمها من أطراف ثالثة وأن مسقط هوم لا تتحمل أي مسؤولية عن أي خدمات مهنية أو أي تصرفات أو تجاهل القيام بأي أمر مطلوب من جانب أي أطراف ثالثة.<br><br>
                            أنت تقر وتوافق على أن تدفع وديعة مسقط هوم ورسوم الدعم التي سيتم تطبيقها على كل تعيين في الخدمات المهنية المطلوبة عن طريق منتدى مسقط هوم. <br><br>
                            أنت تقر وتوافق على السياسات والرسوم المطبقة من مسقط هوم في حالة الإلغاء.<br><br>
                            أنت توافق على تعويض مسقط هوم عن أي مطالبات بسبب استخدامك أو إساءة استخدامك أو عدم قدرتك على استخدام منتدى مسقط هوم والبضائع و/أو الخدمات المهنية وكذلك التعويض عن أي مخالفة للاتفاقية أو للقوانين السارية أو حقوق أي أطراف ثالثة و/أو المحتوى أو المعلومات المقدمة منك حسابك إلى منتدى مسقط هوم.  
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -6 </h3><h3> يمكن لمسقط هوم أن تتواصل معك </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">لغرض الاستجابة لك وتزويدك بالمعلومات والإشعارات المطلوبة بشأن حسابك أو الخدمات (مثل المعلومات المتعلقة بالمنازل التي ربما يكون لديك اهتمام بها) فإنك توافق على أن من حق مسقط هوم أن تتواصل معك عن طريق معلومات الاتصال الموجودة في حسابك أو لدى تطبيقات مسقط هوم بما في ذلك رقم هوية المستخدم على النظام والبريد الالكتروني ورقم الهاتف النقال والهاتف الأرضي أو العنوان البريدي المتوفر (إن وُجد). نأمل مراجعة إعدادات الحساب الخاص بك أو تلك الموجودة على هاتفك النقال للتحكم في نوعية الرسائل التي يمكن أن تصلك من مسقط هوم. <br>
                            لا تتحمل مسقط هوم أي مسؤولية عن أي تقصير من جانبك في عدم ضمان دقة المعلومات الخاصة بالاتصال أو التواصل معك بما في ذلك وعلى سبيل المثال لا الحصر عدم قدرتك على استلام المعلومات المهمة بشأن الخدمات. من خلال الخدمات، يمكنك تقدم طلبات لعمل جولة في المنازل أو التواصل مع وكلاء العقار أو المساعدة في بيع أو شراء منزل أو تقديم أي طلبات أخرى. من خلال تقديم هذه الطلبات فإنك تصرح لمسقط هوم بمشاركة معلوماتك الشخصية بما في ذلك وعلى سبيل المثال لا الحصر تاريخ البحث عن منزل والأشياء المفضلة في البحث والبحث الذي قمت بحفظه لدى وكيل مسقط هوم أو أي من العاملين لديها أو أي وكيل شريك كما هو مبين أدناه. عندما تقدم مثل هذا الطلب إلى مسقط هوم فإنك تقدم دعوة صريحة لمسقط هوم أو أي جهة أخرى مناسبة أو أي شخص بالتواصل معك. تم تعيين وكيل شريك أو يعمل مع شركة وساطة أخرى ولكنه دخل في شراكة معنا لتوفير خدمة عالية الجودة لقطاع كبير من عملاء مسقط هوم. سنشير إليك في مناقشتنا على أنك وكيل شريك. 

                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -7 </h3><h3> مواقع الطرف الثالث </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">ربما يشمل موقع مسقط هوم روابط لمواقع أطراف ثالث (مواقع الأطراف الثالثة) في الخدمات ويشمل ذلك روابط إلى مواقع الطرف الثالث. يجب عليك مراجعة أي شروط مطبقة أو سياسة خصوصية خاصة باستخدام مواقع الطرف الثالث أو مشاركة أي معلومات معها لأنه ربما تعطي طرف ثالث موافقة على استخدام معلومات بطرق ربما لا تكون مسقط هوم مسؤولة عنها ولا تصادق على أي خصائص أو محتويات أو مواد إعلانية أو منتجات أو مواد أخرى متاحة من مواقع طرف ثالث.  
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -8 </h3><h3> تطبيقات مسقط هوم </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">توفر مسقط هوم خدماتها عن طريق تطبيقات مبنية باستخدام منتدى مسقط هوم (تطبيقات مسقط هوم). تشمل الأمثلة على مسقط هوم على سبيل المثال لا الحصر، تطبيقات الهاتف الذكي (مسقط هوم للأندرويد)، مسقط هوم للأي باد أو مسقط هوم للأي فون) ومسقط هوم " شير" وهي الخاصية التي تسمح بمشاركة نشاطاتك على المواقع مع أصدقائك باستخدام وسائل التواصل الاجتماعي. تقر هناك بأنك مسؤول عن كافة الرسوم والتصاريح المطلوبة للدخول على مسقط هوم عن طريق وسيلة الدخول على هاتفك النقال.   
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -9 </h3><h3> الإنهاء </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">من حقك وقف تفعيل حسابك في أي وقت وبعد أن تقوم بوقف تفعيل الحساب لن تستطيع الدخول على الخدمات. في حالة الرغبة في وقف تنشيط الحساب، نأمل زيارة إعدادات الحساب أو الاتصال بخدمة العملاء. من حق مسقط هوم إنهاء هذه الاتفاقية أو حسابك في أي وقت سواء عن طريق إعطاء إنذار أو بدون الحاجة إلى إنذار.    
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -10 </h3><h3> التعويض </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">أنت توافق على تجنيب مسقط هوم أي دعاوى أو خسائر أو تكاليف (بما في ذلك وعلى سبيل المثال لا الحصر أتعاب المحاماة المعقولة) متعلقة بمطالبات أو دعاوى من أطراف ثالثة أو أي تحقيقات يكون سببها (أ) عدم التزامك بالاتفاقية، بما في ذلك وعلى سبيل المثال لا الحصر، تقديمك لمحتوى فيه تعدي على حقوق طرف ثالث أو فيه تعدي على القوانين المعمول بها (ب) أي مواد تقدمها أو معلومات تقدمها للخدمات و/أو (ج) أي نشاط تشارك فيه على مواقع مسقط هوم أو باستخدام خدمات مسقط هوم.     
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -11 </h3><h3> إخلاء مسؤولية </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">توفر مسقط هوم الخدمات كما هي وبالحالة التي هي عليها وكما هو متاح وعليه فإن مسقط هوم ليس لديها أي سيطرة أو رقابة على دقة المحتوى. لا نتحمل ولا نقدم أي ضمانات إلى أقصى حد يسمح به القانون. لا تقدم مسقط هوم ومورديها أي ضمانات صريحة أو ضمنية بما في ذلك وعلى سبيل المثال لا الحصر أي ضمانات خاصة بالصلاحية من الناحية التجارية أو الصلاحية للاستخدام لغرض معين أو الملكية أو دقة المعلومات أو عدم وجود تعدي. في حالة عدم رضاك عن أو تكبدك لضرر بسبب مسقط هوم أو أي شيء مرتبط بها بإمكانك وقف تنشيط الحساب الخاص بك وإنهاء الاتفاقية وفقا للمادة 9 (الإنهاء) وسيكون هذا الإنهاء هو العلاج الوحيد والشامل. لا تتحمل مسقط هوم أي مسؤولية لا تقدم أي إقرارات أو ضمانات عن تسليم أي رسائل (مثل نشر إجابات أو نقل أي معلومات لأي مستخدم آخر) عن طريق مسقط هوم إلى أي شخص ولا تجاه أي مواد أو خدمة أو تقنية موصوفة أو مستخدمة على المواقع وتكون خاضعة لحقوق الملكية الفكرية المملوكة من أطراف ثالثة حاصلين على رخص لهذه المواد والخدمات والتقنيات. <br>
                            لا تتحمل مسقط هوم أي التزام تجاه التحقق من شخصية الأشخاص الذين يشتركون في خدماتها ولا تتحمل أي التزام بمراقبة استخدام الخدمات من مستخدمين آخرين للمجتمع ولهذا فإن مسقط هوم تتحلل من أي مسؤولية تجاه سرقة الهوية أو تجاه أي إساءة استخدام للهوية والمعلومات الخاصة بالآخرين. لا تضمن مسقط هوم أن الخدمات المقدمة ستعمل بدون انقطاع أو بدون أخطاء في التشغيل حيث ربما تتعرض الخدمات إلى التوقف بسبب إجراء الصيانة أو عمليات التحديث أو قصور في النظام أو الشبكة. <br>
                            تتحلل مسقط هوم من أي التزام تجاه التعويض عن أي خسائر تحدث بسبب التوقف عن أو العيوب في التشغيل وعلاوة على ذلك فإن مسقط هوم تتحلل من أي التزام بسبب عدم عمل أو عدم القدرة على الدخول أو ظروف الاستخدام السيئة للمواقع بسبب عدم توفير المعدات المناسبة أو حدوث إزعاج يكون سببه شركات تقديم خدمات الانترنت أو بسبب زيادة الضغط على الشبكة الداخلية أو لأي سبب من الأسباب. هناك بعض الدول التي لا تسمح بالتحلل من الشروط الضمنية في العقود مع العملاء وعليه فإن المحتويات الخاصة بهذا الجزء لا تنطبق عليكم.      
                        </p>
                    </div>
                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -12 </h3><h3> محدودية المسؤولية </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">لن تكون مسقط هوم أو أي من مورديها مسؤولا عن أي تعويضات بما في ذلك أو سبيل المثال لا الحصر التعويضات غير المباشرة أو الناجمة عن شيء معين أو الخاصة أو العرضية أو العقابية أو الناجمة عن أو التي تعتمد على أو تنشأ من هذه الشروط أو استخدامك أو استخدامك للخدمات حتى لو كان قد تم نُصح الطرف بإمكانية حدوث هذه الأضرار.  تعتبر مسألة استبعاد الأضرار بموجب هذه الفقرة مستقلة عن الوسائل العلاجية الحصرية المحددة أدناه وتبقى سارية في حالة عدم قدرة هذا العلاج على تحقيق الهدف الأساسي منه أو ثبت أنه غير نافذ. تنطبق هذه القيود والاستثناءات بغض النظر عما إذا كانت هذه الأضرار ناجمة من (أ) خرق العقد (ب) خرق الضمان (ج) الإهمال أو (د) أي سبب آخر للحد التي تعتبر فيه هذه الاستثناءات والقيود محظورة بموجب القوانين المطبقة. في حالة عدم موافقتك على أي جزء من شروط الاستخدام هذه أو كان لديك أي نزاع مع أو مطالبة ضد مسقط هوم أو أي من مورديها فيما يتعلق بهذه الشروط أو الاستخدام أو الخدمات فإن علاجك الوحيد والحصري هو التوقف عن استخدام الخدمات.       
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -13 </h3><h3> حل الخلافات </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">تختص المحاكم العمانية بتسوية أي مطالبة أو خلاف ينشأ من أو له علاقة باستخدام المواقع والبضائع أو الخدمات المقدمة من مسقط هوم أو أي أفعال أو عدم القيام بأي شيء يجعل مسقط هوم في موضع المسائلة بما في ذلك أي نزاع أو مطالبة تنشأ من أو لها علاقة بهذه الاتفاقية أو موضوعها أو صياغتها (بما في ذلك النزاعات او المطالبات التعاقدية)        
                        </p>
                    </div>

                    <div class="arbic">
                        <h3 style="float: right;" class="text-right"> -14 </h3><h3> الشروط القانونية الإضافية  <br><br>(أ)الانفصال </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">في حالة وجدت أي محكمة في أي جهة قضائية مختصة بأن أي من أحكام هذه الاتفاقية غير قانوني أو باطل أو غير واجب النفاذ، سيتم تعديل هذا البند بحيث يعطي نفس الأثر – إلى أقصى حد ممكن- بما يحقق الغرض المطلوب منه.         
                        </p>

                        <h3>ب- الإشعارات </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">يمكنك مراسلتنا عبر البريد الالكتروني          
                        </p>

                        <h3>(ج) كامل الاتفاقية </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">توافق على أن الاتفاقية تشكل كامل ما تم الاتفاق عليه ببنك وبين مسقط هوم بشأن الخدمات وبهذا فإنها تلغي كافة الاتفاقات والمفاهمات السابقة، سواء الكتابية أو الشفوية أو سواء التي تعتبر سارية بسبب العرف أو الممارسة أو وجود سابقة لها فيما يخص موضوع الاتفاقية. كذلك فإنك ربما تكون خاضعا لشروط وأحكام إضافية ربما تكون منطبقة عليك عند استخدام أو شراء خدمات مسقط هوم أخرى.          
                        </p>

                        <h3>(د) التعديلات على الاتفاقية </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">نحتفظ لنفسنا بالحق في تعديل ، عمل ملحق أو استبدال أي من شروط الاتفاقية على أن يسري ذلك التعديل أو الاستبدال أو الملحق من تاريخ نشرها على موقع مسقط هوم www.MusctHome.com أو من تاريخ إبلاغك بأي شكل آخر. على سبيل المثال يمكننا إرسال إشعار على الخدمات عندما نقوم بتعديل الاتفاقية أو سياسة الخصوصية بحيث تدخل وتراجع التغييرات قبل استمرارك في استخدام الخدمات. في حالة عدم موافقتك على التغييرات على هذه الاتفاقية، يمكنك إلغاءها في أي وقت وفق المادة 9 (الإنهاء)            
                        </p>

                        <h3>(هـ) عدم التنازل</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">لا يعتبر عدم تواصلنا معك بشأن حدوث خرق للاتفاقية من جانبك أو من جانب الآخرين بمثابة تنازل عن حقنا في اتخاذ ما يلزم تجاه هذا الخرق أو أي خرق آخر يحدث لاحقا أو أي خروق أخرى.             
                        </p>

                        <h3>(و)عدم وجود إجراءات طارئة</h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">في كل الأحوال لا يحق لك أن تطلب اتخاذ إجراءات فورية أو عقابية أو أن تقيد عمل الخدمات.              
                        </p>

                        <h3>(ز)التنازل والتفويض </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">لا يحق لك التنازل عن أو نقل أي من الحقوق أو الالتزامات المفروضة بموجب الاتفاقية. أي تنازل أو نقل من هذا النوع سيكون باطلاً. من حق مسقط هوم التنازل عن أو تفويض أو نقل حقوقها والتزاماتها بموجب الاتفاقية سواء كليا أو جزئيا دون الحاجة إلى إرسال إشعار. كذلك من حقنا أن نحل محل – من جانب واحد، عند إشعارك – مسقط هوم أمام أي طرف ثالث يتولى حقوقنا أو التزاماتنا بموجب الاتفاقية.              
                        </p>

                        <h3>ح- اختبار ألفا وبيتا </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">يمكن أن تحتوي الخدمات على اختبارات الفا أو بيتا أو أي وسائل تقييم أخرى أو استخدام منتجات وخدمات ومزايا وخصائص وكافة المكونات (سواء كانت في شكلها النهائي أو نموذج الكتروني) يمكن أن يستخدم في عمل " اختبار". عدا للحد المقدم خلاف ذلك في اتفاقية أخرى بينك وبين مسقط هوم، فإن مشاركتك في أي اختبار واستخدام أي محتوى أو معلومات أو مواد أخرى لها علاقة بمثل هذا الاختبار ستكون خاضعة لهذه الاتفاقية.               
                        </p>

                        <h3>(ط)الحقوق والالتزامات الأخرى المحتملة </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">في حالة كنت من المقيمين خارج السلطنة فلربما يكون لديك حقوق أو عليك التزامات بموجب القوانين المحلية بخلاف ما هو مذكور هنا.               
                        </p>

                        <h3>(ي)الشكاوى بشأن المحتوى المنشور على موقع مسقط هوم على الانترنت </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">بالنسبة لشكاوى حقوق النشر، يمكنك إبلاغنا عن طريق البريد الالكتروني.               
                        </p>

                        <h3>(ك)الأمور الدولية والقانون الذي يحكم </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">مسقط هوم تعمل من مسقط ومسجلة هنا ونحن لا نقدم أي إقرار بأن الخدمات مناسبة أو متاحة للاستخدام في أي موقع معين. يعتبر أولئك الذين يختارون الدخول إلى مسقط هوم للقيام بهذا الأمر بمبادرة منهم مسؤولون عن الالتزام بالقوانين المحلية، إن وُجد وللحد الذي تسمح به القوانين المحلية. تخضع الخدمات بما في ذلك البرمجيات من مسقط هوم وشروط الاستخدام للقوانين المعمول بها في سلطنة عمان. لا يحق تحميل أي خدمات، بما في ذلك البرمجيات من مسقط هوم ولا يحق تصديرها أ وإعادة تصديرها طالما أن في ذلك مخالفة لأي قوانين أو لوائح أو أنظمة سارية.                
                        </p>

                        <h3>(ل) الشكاوى بشأن التعدي على حقوق الملكية </h3>
                        <p class="droid-arabic-kufi" style=" padding: 10px;">في حالة كنت من الذين يحملون ويعتقدون أن العمل قد تم استخدامه على المواقع بطريقة تشكل تعدي على حقوق الملكية الفكرية، نأمل التواصل مع وكيل حقوق النشر وتزويده بالمعلومات التالية                 
                        </p>
                    </div>
                    <div class="arbic">
                        <ul>
                            <li><p class="droid-arabic-kufi"> اسمك وعنوانك ورقم الهاتف والبريد الالكتروني بحيث يمكننا التواصل معك. </p> </li>
                            <li><p class="droid-arabic-kufi"> تحديد المواد المتعلقة بحقوق النشر التي تعتقد أنه حدث تعدي عليها.</p>
                            </li>
                            <li><p class="droid-arabic-kufi"> تحديد المواد الموجودة على الموقع والتي ترى أن فيها تعدي بما في ذلك مكانها ووصفها </p> </li>
                        </ul>
                        <h3>(مثل URL)</h3>
                        <ul>
                            <li><p class="droid-arabic-kufi"> بيان، مقدم تحت عقوبة الحلف الكاذب، بأنك مالك حقوق النشر أو مصرح لك بالتصرف نيابة عن صاحب حقوق النشر وأن المعلومات المقدمة من جانبك دقيقة. </p> </li>
                            <li><p class="droid-arabic-kufi"> بيان بأن لديك اعتقاد بنسبة حسنة بأن الاستخدام المتنازع عليه غير مصرح به من جانب مالك حقوق النشر، وكيله أو القانون. </p>
                            </li>
                            <li><p class="droid-arabic-kufi"> توقيع الكتروني أو حضوري على الشكوى</p> </li>
                            <li><p class="droid-arabic-kufi"> إرسال إشعارات التعدي لنا عن طريق البريد الالكتروني</p> </li>
                        </ul>
                    </div>
                </div>
                <?php } else { ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="Terms">
                        <h3>Terms of Use / User Agreement</h3>
                        <p>This Agreement constitutes a legal agreement between you ("you" or "User") and Muscat Home registered under Wilderness Camp Trading. This Agreement governs your use of our services and platform that facilitates communications between Users offered through our website located at www.MuscatHome.com, as it may be modified, relocated and/or redirected from time to time (the "Site"), and the mobile applications offered by us (the "Apps"). Our services, platform, Site and Apps are collectively referred to as the "Muscat Home Platform".</p>
                        <p>By accessing, using or registering with the Muscat Home Platform or any portions thereof, you hereby expressly acknowledge and agree to be bound by the terms and conditions of this Agreement, and any future amendments and additions to this Agreement as we may publish from time to time. Please read this Agreement carefully. If you do not agree to accept and be bound by this Agreement, you must immediately stop using the Platform. Muscat Home's acceptance is expressly conditioned upon your assent to this Agreement in its entirety. If this Agreement is considered to be an offer by us, acceptance is expressly limited to this Agreement.</p>

                        <h5>Commission</h5>
                        <p>
                            Muscat Home will charge 3% commission, the sellers will pay the commission for the deal, buyer will never pay any agent commissions. As a result seller will save money given the current listing agent is around 5 – 6 % and buyer will also save money from the buyer agent and will also save time.
                        </p>
                    </div>
                    <div class="Terms">
                        <center>
                            <h3>Sellers save money with our low 3% commission.</h3>
                            <p>At a traditional brokerage, the commission is typically 5% of the home selling or renting price, the agent also get a commission typically on both sides of the deal.  In Muscat Home buyer never pay agent commission.</p>
                            <h3>At Muscat Home the fee is just 3%.</h3>
                            <ul style="list-style: none;">
                                <li style="width: 50%; float: left;">
                                    <h4>Traditional Brokerage</h4>
                                    <div class="circle"><h2>5%</h2></div>
                                    <p>Total Commission paid by seller</p>
                                </li>
                                <li style="width: 50%; float: left;">
                                    <h4>Muscat Home</h4>
                                    <div class="circle"><h2>3%</h2></div>
                                    <p>Total commission paid by Muscat Home seller</p>
                                </li>
                            </ul>
                        </center>
                        <h5>Terms of Use</h5>
                        <p>Welcome to MuscatHome.com. This website and the Muscat Home Applications (as defined below)(the "Sites"), together with the services provided through the Sites (collectively the Sites and services are the "Services") are owned and operated by Wilderness Camps, a technology-powered real estate brokerage. These Terms of Use which include the Muscat Home Privacy Policy, serve as the "Agreement" between you and Muscat Home regarding the Services, and provide important information to you, including information about your obligations about content and our limitation of liability to you. By accessing, downloading, or using any portion of the Services, you signify that you accept the terms of the Agreement. If you do not accept, then please do not use the Services.</p>
                        <p>Before we can show you pictures and prices of sold homes, or show you comments on active listings from Muscat Home Agents and Services, our data providers require you to acknowledge that you're considering Muscat Home as your real estate agent and service provider.</p>
                        <p>You have no obligation to work with a Muscat Home Agent to buy or sell a home or use one of our provided services. You can choose to work with us or not. </p>

                        <ul>
                            <li><p>You are entering into a lawful consumer-broker relationship with Muscat Home as defined by applicable Omani law. You have no obligation to work with Muscat Home and you can terminate your account with Muscat Home any time. Any information you obtain from the Muscat Home website is intended for your personal, non-commercial use.</p></li>
                            <li><p>You have a no intention to deceive any interest in the purchase, sale, or lease of real estate on the Muscat Home website.
                                </p>
                            </li>
                            <li><p>You will not copy, redistribute, or retransmit any of the information provided except in connection with your consideration of the purchase or sale of an individual property.</p></li>
                            <li><p>You acknowledge that the individual multiple listing service, which supplies the listing data, owns such data and you acknowledge the validity of the copyright to such data.</p></li>
                            <li><p>Muscat Home also explicitly authorizes employees, members, or their duly authorized representatives to access Muscat Home website and application for the purposes of verifying compliance with rules and monitoring the display of Participants' listings on Muscat Home's site.</p></li>
                        </ul>

                        <h5>1. Who Can Use the Muscat Home Services</h5>
                        <p>You must be: a) a resident of Oman or having an interest in investing in Oman (b) over the age of 13.</p>
                        <h5>2. Intellectual Property Ownership and License</h5>
                        <h6>A. Copyright</h6>
                        <p>All materials (including source code, data, images, and other content) contained in the Services, including the selection and arrangement of the materials, are owned by Muscat Home or are licensed by Muscat Home for use on the Sites. Our site features Google Maps, please review their privacy policy, legal notices and terms of use. Portions of this page are modifications based on work created and shared by Google and used according to terms described in the Creative Commons 3.0 Attribution License.</p>

                        <h6>B. Trademarks</h6>
                        <p>Muscat Home, the Muscat Home logos and other Muscat Home trademarks, service marks, graphics, and logos used in connection with Muscat Home are trademarks or registered trademarks of Muscat Home in Oman. Apple, the Apple logo, iPad, iPhone, and iPod touch are trademarks of Apple Inc., registered in the U.S. and other countries. App Store is a service mark of Apple Inc. Android is a trademark of Google Inc. Use of this trademark is subject to Google Permissions. Other trademarks and logos used in connection with Muscat Home may be the trademarks of their respective owners.</p>

                        <h6>C. Data </h6>
                        <p>The Data on our Sites is the property of the individual providing the data. These individuals have granted Muscat Home the necessary licenses to display the Data on the Sites. Some require us to display certain licensing information about their Data.</p>

                        <h6>D. Other Intellectual Property </h6>
                        <p>Muscat Home also owns trade secrets and know-how that contribute to the functionality of the Services.</p>

                        <h6>E. Restrictions </h6>
                        <p>Except as enabled and directed on the Services, you may not modify, decompile, reproduce, redistribute, attempt to commercially gain from your use, or misuse of the Services or any of their components. You may not use any meta-tags or other hidden text using the Muscat Home name or trademarks without our specific permission. We may revoke your permission to access and use the Sites, and we may block or prevent you from accessing the Sites, in our discretion without notice. If you violate the Terms of Use, your permission to access and use the Sites is automatically revoked.</p>

                        <h6>F. Reservation of Rights </h6>
                        <p>Except for the limited license granted above, Muscat Home reserves all of its intellectual property rights in the Sites. This Agreement does not grant you any right or license with respect to any trademarks and logos.</p>

                        <h6>I. Information Aggregation </h6>
                        <p>Muscat Home is not responsible for any errors in displayed information or delays in displaying information. All information on the Sites is either transmitted to Muscat Home from other entities or persons or was obtained through publicly available government sources. Issues of data accuracy may be brought to the attention of Muscat Home by sending feedback but it is likely that such information accuracy cannot be corrected by Muscat Home and the entity or person that generated the information must be appealed to. For example: incorrect listing information can only be changed by the third party listing agent under our terms.</p>

                        <h5>3. Registration</h5>
                        <p>You must register for a Muscat Home account to see complete home listings. This is required by our licenses. You also must register before you can participate in forums or submit content. By registering for a Muscat Home account you are agreeing to these Terms of Use as well as the Terms of Use. You are responsible for all activities related to the Services that occur through your account and password. It is your responsibility to keep your Muscat Home profile information accurate. You agree to keep your password confidential, not use others' accounts, nor permit others to use your account. Muscat Home reserves the right to terminate accounts in its sole discretion.</p>

                        <h5>4. Your Submissions and Community Guidelines</h5>
                        <h6>A. Material You Submit </h6>
                        <p>You may submit feedback, ideas, reviews, comments, photos, or other content to Muscat Home and the Sites ("Submissions"). All Submissions must comply with the Muscat Home Community Guidelines below. You represent that you own or control all of the rights to your Submissions and that the Submissions do not violate these Terms of Use, including our Community Guidelines, or the rights of any third party. You are solely responsible for your Submissions. Muscat Home may, but is not obligated to, monitor and edit or remove Submissions, and has no obligation to store Submissions.</p>

                        <h6>B. Muscat Home Community Guidelines</h6>
                        <ul>
                            <li>• Be respectful. We welcome debate, but we will not tolerate disrespectful language or personal attacks. Please avoid controversial topics such as politics, race, religion, and sexuality. We reserve the right to edit or remove any controversial content.</li>
                            <li>• No solicitation. Real estate agents and other professionals are welcome here, but not to promote your services. You can include your brokerage, but no contact information or website addresses.</li>
                            <li>• No spamming. Please do not post advertising, junk mail, spam, scams or chain letters.</li>
                            <li>• No illegal or offensive posts. Any content that contains illegal, inflammatory, libelous, obscene or pornographic material will be removed.</li>
                            <li>• No public posting of private information or other people's unpublished contact information. This also includes communications from community administrators and moderators.</li>
                            <li>• Moderation. We reserve the right to monitor content and delete or retain content in our sole discretion.</li>

                            <h6>C. License </h6>
                            <p>You grant Muscat Home a perpetual, unlimited right to use, reproduce, modify, distribute, and display your Submissions on the Sites. Muscat Home may, but is not obligated to, post the name you associate with the Submission. Additionally, you grant Muscat Home a perpetual unlimited license to use, distribute, publish, remove, retain, add, process, analyze, use and commercialize, in any way now known or in the future discovered, any information you provide, directly or indirectly to Muscat Home, without any further consent, notice and/or compensation to you or to any third parties.</p>

                            <h6>D. Disclaimer</h6>
                            <p> Muscat Home takes no responsibility and assumes no liability for any Submissions posted by you or any third party. We may not monitor or control the Submissions posted via the Services and, we cannot take responsibility for such Submissions. Any use or reliance on any Submissions or materials posted via the Services or obtained by you through the Services is at your own risk. Therefore, if you have an idea or information that you would like to keep confidential or don't want others to use, or that is subject to third party rights that may be infringed by your sharing it, do not post it to any forum, or elsewhere on the Sites. MUSCAT HOME IS NOT RESPONSIBLE FOR ANOTHER'S MISUSE OR MISAPPROPRIATION OF ANYTHING YOU POST ON MUSCAT HOME.</p>

                            <p> Your agreement that the Muscat Home Platform is solely a communications platform providing a method for Professional Services to be booked, that all Professional Services are performed by third parties, and that Muscat Home has no liability for any Professional Services or any acts or omissions of third parties.</p>

                            <p> Your acknowledgment of and agreement to pay Muscat Home's Trust and Support Fee that will be applied to each appointment of a Professional Service requested through the Muscat Home Platform.</p>

                            <p> Your acknowledgment of and agreement to Muscat Home's cancellation policies and cancellation fees.</p>

                            <p> Your agreement to indemnify Muscat Home from claims due to your use, misuse or inability to use the Muscat Home Platform, the Merchandise and/or Professional Services, your violation of this Agreement, applicable laws or third party rights, and/or content or information submitted from your account to the Muscat Home Platform.</p>

                            <h5>6. How Muscat Home May Communicate with You</h5>
                            <p>For purposes of responding to you and providing you with information and notices about your account or the Services (such as information about homes you might be interested in), you agree that Muscat Home may communicate with you through the contact information associated with your Muscat Home account or Muscat Home Applications, including your device ID, email, mobile number, telephone, or the postal address you provided (if any). Please review your Account Settings or settings on your mobile device to control what kind of messages you receive from Muscat Home. Muscat Home has no liability rising from your failure to maintain accurate contact or other information, including, but not limited to, your failure to receive critical information about the Services. Through the Services, you can make requests for home tours, real estate agent contact, help selling or buying a home or other requests. By making those requests, you authorize Muscat Home to share your personal information including your home search history, favorites and saved searches, with a real estate professional (a Muscat Home Agent or staff member, or a Partner Agent, as defined below). When you make such a request to Muscat Home you are extending an express invitation for Muscat Home, or another appropriate entity or person, to contact you. A Partner Agent is employed by or works with another brokerage, but has teamed up with us to provide Muscat Home-quality service to a wider range of customers. We'll refer you to a Partner Agent in our discretion.</p>

                            <h5>7. Third Party Sites</h5>
                            <p>Muscat Home may include links to third party websites ("Third Party Sites") in its Services, including links to Third Party Sites. You should review any applicable terms or privacy policy of a Third Party Site before using it or sharing any information with it, because you may give the third-party permission to use your information in ways we would not. Muscat Home is not responsible for and does not endorse any features, content, advertising, products or other materials on or available from Third Party Sites.</p>

                            <h5>8. Muscat Home Applications</h5>

                            <p>Muscat Home offers services through applications built using Muscat Home's platform ("Muscat Home Applications"). Examples of Muscat Home Applications include, without limitation, its smart phone applications (Muscat Home for Android, Muscat Home for iPad, or Muscat Home for iPhone), and Muscat Home "Share" buttons, which allow you to share your activities on the Sites with your friends using social media or email. You acknowledge you are responsible for all charges and necessary permissions related to accessing Muscat Home through your mobile access provider.</p>

                            <h5>9. Termination</h5>
                            <p>You may deactivate your account at any time. After you deactivate your account, you will no longer have access to the Services. If you'd like to deactivate your account, please visit your Account Settings or contact Customer Service. Muscat Home may terminate this Agreement or your account at any time, with or without notice.</p>

                            <h5>10. Indemnification</h5>
                            <p>You agree to indemnify Muscat Home and hold Muscat Home harmless for all damages, losses and costs (including, but not limited to, reasonable attorneys' fees and costs) related to all third party claims, charges, and investigations, caused by (a) your failure to comply with this Agreement, including, without limitation, your submission of content that violates third party rights or applicable laws, (b) any Submissions or information you provide to the Services, and/or (c) any activity in which you engage on the Muscat Home Sites or using the Muscat Home Services.</p>

                            <h5>11. Disclaimers</h5>
                            <p>MUSCAT HOME PROVIDES THE SERVICES ON AN "AS IS" AND "AS AVAILABLE" BASIS. Muscat HOME DOES NOT CONTROL OR VET USER GENERATED CONTENT FOR ACCURACY. WE DO NOT PROVIDE ANY EXPRESS WARRANTIES OR REPRESENTATIONS. TO THE FULLEST EXTENT PERMISSIBLE UNDER APPLICABLE LAW, MUSCAT HOME AND ITS SUPPLIERS DISCLAIM ANY AND ALL IMPLIED WARRANTIES AND REPRESENTATIONS, INCLUDING, WITHOUT LIMITATION, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, ACCURACY OF DATA, AND NONINFRINGEMENT. IF YOU ARE DISSATISFIED OR HARMED BY MUSCAT HOME OR ANYTHING RELATED TO MUSCAT HOME, YOU MAY DEACTIVATE YOUR MUSCAT HOME ACCOUNT AND TERMINATE THIS AGREEMENT IN ACCORDANCE WITH SECTION 9 ("TERMINATION") AND SUCH TERMINATION SHALL BE YOUR SOLE AND EXCLUSIVE REMEDY. MUSCAT HOME IS NOT RESPONSIBLE, AND MAKES NO REPRESENTATIONS OR WARRANTIES FOR THE DELIVERY OF ANY MESSAGES (SUCH AS POSTING OF ANSWERS OR TRANSMISSION OF ANY OTHER USER GENERATED CONTENT) SENT THROUGH MUSCAT HOME TO ANYONE. ANY MATERIAL, SERVICE, OR TECHNOLOGY DESCRIBED OR USED ON THE SITES MAY BE SUBJECT TO INTELLECTUAL PROPERTY RIGHTS OWNED BY THIRD PARTIES WHO HAVE LICENSED SUCH MATERIAL, SERVICE, OR TECHNOLOGY TO US. MUSCAT HOME DOES NOT HAVE ANY OBLIGATION TO VERIFY THE IDENTITY OF THE PERSONS SUBSCRIBING TO ITS SERVICES, NOR DOES IT HAVE ANY OBLIGATION TO MONITOR THE USE OF ITS SERVICES BY OTHER USERS OF THE COMMUNITY; THEREFORE, MUSCAT HOME DISCLAIMS ALL LIABILITY FOR IDENTITY THEFT OR ANY OTHER MISUSE OF YOUR IDENTITY OR INFORMATION BY OTHERS. MUSCAT HOME DOES NOT GUARANTEE THAT THE SERVICES IT PROVIDES WILL FUNCTION WITHOUT INTERRUPTION OR ERRORS IN FUNCTIONING. THE OPERATION OF THE SERVICES MAY BE INTERRUPTED DUE TO MAINTENANCE, UPDATES, OR SYSTEM OR NETWORK FAILURES. MUSCAT HOME DISCLAIMS ALL LIABILITY FOR DAMAGES CAUSED BY ANY SUCH INTERRUPTION OR ERRORS IN FUNCTIONING. FURTHERMORE, MUSCAT HOME DISCLAIMS ALL LIABILITY FOR ANY MALFUNCTIONING, IMPOSSIBILITY OF ACCESS, OR POOR USE CONDITIONS OF THE SITES DUE TO INAPPROPRIATE EQUIPMENT, DISTURBANCES RELATED TO INTERNET SERVICE PROVIDERS, TO THE SATURATION OF THE INTERNET NETWORK, AND FOR ANY OTHER REASON. SOME JURISDICTIONS DO NOT ALLOW THE DISCLAIMER OF IMPLIED TERMS IN CONTRACTS WITH CONSUMERS AND AS A RESULT THE CONTENTS OF THIS SECTION MAY NOT APPLY TO YOU.</p>

                            <h5>12. Limitation of Liability</h5>
                            <p>IN NO EVENT WILL MUSCAT HOME OR ANY SUPPLIER BE LIABLE FOR ANY DAMAGES, INCLUDING WITHOUT LIMITATION ANY INDIRECT, CONSEQUENTIAL, SPECIAL, INCIDENTAL, OR PUNITIVE DAMAGES ARISING OUT OF, BASED ON, OR RESULTING FROM THESE TERMS OF USE OR YOUR USE OF THE SERVICES, EVEN IF SUCH PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE EXCLUSION OF DAMAGES UNDER THIS PARAGRAPH IS INDEPENDENT OF YOUR EXCLUSIVE REMEDY SET FORTH BELOW AND SURVIVES IN THE EVENT SUCH REMEDY FAILS OF ITS ESSENTIAL PURPOSE OR IS OTHERWISE DEEMED UNENFORCEABLE. THESE LIMITATIONS AND EXCLUSIONS APPLY WITHOUT REGARD TO WHETHER THE DAMAGES ARISE FROM (A) BREACH OF CONTRACT, (B) BREACH OF WARRANTY, (C) NEGLIGENCE, OR (D) ANY OTHER CAUSE OF ACTION, TO THE EXTENT SUCH EXCLUSION AND LIMITATIONS ARE NOT PROHIBITED BY APPLICABLE LAW. IF YOU DO NOT AGREE WITH ANY PART OF THESE TERMS OF USE, OR YOU HAVE ANY DISPUTE OR CLAIM AGAINST MUSCAT HOME OR ITS SUPPLIERS WITH RESPECT TO THESE TERMS OF USE OR THE SERVICES, THEN YOUR SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE USING THE SERVICES.</p>

                            <h5>13. Dispute Resolution</h5>
                            <p>Any claim or controversy arising out of or relating to the use of the Sites, to the goods or services provided by Muscat Home, or to any acts or omissions for which you may contend Muscat Home is liable, including any dispute or claim arising out of or in connection with this agreement or its subject matter or formation (including non-contractual disputes or claims), shall be finally, and exclusively, settled by the courts of the Sultanate of Oman.</p>

                            <h5>14. Additional Legal Terms</h5>
                            <h6>A. Severability </h6>
                            <p>If any provision of this Agreement is found by a court of competent jurisdiction to be illegal, void, or unenforceable, the unenforceable provision will be modified so as to render it enforceable and effective to the maximum extent possible in order to effect the intention of the provision.</p>

                            <h6>B. Notices </h6>
                            <p>You may contact us via mail.</p>

                            <h6>C. Entire Agreement</h6>
                            <p>You agree that this Agreement constitutes the entire, complete and exclusive agreement between you and Muscat Home regarding the Services and supersedes all prior agreements and understandings, whether written or oral, or whether established by custom, practice, policy or precedent, with respect to the subject matter of this Agreement. You also may be subject to additional terms and conditions that may apply when you use or purchase certain other Muscat Home services.</p>

                            <h6>D. Amendments to This Agreement </h6>
                            <p>We reserve the right to modify, supplement, or replace the terms of this Agreement, effective prospectively upon posting at www.MuscatHome.com or notifying you otherwise. For example, we may present a notification on the Services when we have materially amended this Agreement or the Privacy Policy so that you may access and review the changes prior to your continued use of the Services. If you do not want to agree to changes to this Agreement, you can terminate this Agreement at any time per Section 9 (Termination).</p>

                            <h6>E. No Waiver </h6>
                            <p>Our failure to act with respect to a breach of this Agreement by you or others does not waive our right to act with respect to that breach or subsequent similar or other breaches.</p>

                            <h6>F. No Injunctive Relief </h6>
                            <p>In no event shall you seek or be entitled to rescission, injunctive or other equitable relief, or to enjoin or restrain the operation of the Services.</p>

                            <h6>G. Assignment and Delegation</h6>
                            <p>You may not assign or delegate any rights or obligations under the Agreement. Any purported assignment and delegation shall be ineffective. We may freely assign or delegate all rights and obligations under the Agreement, fully or partially without notice to you. We may also substitute, by way of unilateral novation, effective upon notice to you, Muscat Home for any third party that assumes our rights and obligations under this Agreement.</p>

                            <h6>H. Alpha and Beta Testing</h6>
                            <p>The Services include any alpha or beta testing or other evaluation or use of products and services, features, functionality, and all components thereof (whether in final or prerelease form) that we may conduct ("Testing"). Except to the extent otherwise provided in another agreement between you and Muscat Home, your participation in any Testing and use of any content, information, or other materials in connection with such Testing shall be subject to this Agreement.</p>

                            <h6>I. Potential Other Rights and Obligations</h6>
                            <p>You may have rights or obligations under local law other than those enumerated here if you are located outside Oman.</p>

                            <h6>J. Complaints Regarding Content Posted on the Muscat Home Website</h6>
                            <p>For non-copyright complaints, you may notify us by email.</p>

                            <h6>K. International Matters and Governing Law</h6>
                            <p>Muscat Home is controlled and operated in Muscat, Oman. We make no representation that the Services are appropriate or available for use in any particular location. Those who choose to access Muscat Home do so on their own initiative and are responsible for compliance with local laws, if and to the extent local laws are applicable. The Services, including software from Muscat Home, and these Terms of Use, aregoverned by the law of the Sultanate of Oman. No Services, including software from Muscat Home, may be downloaded or otherwise exported or re-exported in violation of any applicable law, rule or regulation.</p>

                            <h6>L. Complaint Regarding Copyright Infringement </h6>
                            <p>If you are a copyright holder and believe your work has been used on the Sites in a way that constitutes copyright infringement, please contact our Copyright Agent with the following information:</p>

                            <ul>
                                <li>Your name, address, phone number, and email address, so that we can reach you;
                                </li>
                                <li>Identification of the copyrighted work(s) you believe to be infringed;</li>
                                <li>Identification of the material on the Sites you believe is infringing, including a location description (e.g., a URL);</li>
                                <li>A statement, made under penalty of perjury, that you are the copyright owner or are authorized to act on the copyright owner's behalf, and that the information you provided is accurate;</li>
                                <li>A statement that you have a good-faith belief the disputed use is not authorized by the copyright owner, its agent, or the law;</li>
                                <li>A physical or electronic signature; and</li>
                                <li>Send your infringement notices to us by email.</li>
                            </ul>
                        </ul>
                    </div>


                    <!-- <div>
                         <img src="http://ec2-34-207-7-22.compute-1.amazonaws.com/real_estate/web_assets/images/building.png" class="img-responsive">
                     </div>-->
                </div>
                <?php } ?>
                
               
            </div>
        </div>

    </div>
</div>

<?php echo $this->load->view('custome_link/custome_js'); ?>
<!--start footer section-->
<?php echo $this->load->view('include/footer_inc', array()); ?>
<!--end footer section-->







