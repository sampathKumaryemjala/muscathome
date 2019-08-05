<footer class="footer-v2">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-widget widget-about">
                        <div class="widget-top">
                            <h3 class="widget-title">About Site</h3>
                        </div>
                        <div class="widget-body">
                            <p>Muscat Home is the leading platform for connecting individuals looking for a home to buy, rent or household services with top-quality, pre-screened independent service professionals. </p>
                           <!-- <p class="read"><a href="about-us.html">Read more <i class="fa fa-caret-right"></i></a></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-widget widget-contact">
                        <div class="widget-top">
                            <h3 class="widget-title">Contact Us</h3>
                        </div>
                        <div class="widget-body">
                            <ul class="list-unstyled">
<!--                                <li><i class="fa fa-location-arrow"></i>  H-35 1st Floor, Sector 63, Noida,201301</li>-->
                                <li><i class="fa fa-phone"></i> +968-95303373</li>
                                <li><i class="fa fa-phone"></i> +968-95031616</li>
                                <li><i class="fa fa-envelope-o"></i> <a style="text-decoration:none;" href="mailto:info@muscathome.com" title="Mail us" target="_top">info@muscathome.com</a></li>
                            </ul>
                            <!--<p class="read"><a href="contact-us.html">Contact us <i class="fa fa-caret-right"></i></a></p>-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer-widget widget-newsletter">
                        <div class="widget-top">
                            <h3 class="widget-title">Newsletter Subscribe</h3>
                        </div>
                        <div class="widget-body">
                            <form id="subscriber_form" action="" method="post" onkeypress="return event.keyCode != 13;">
                                <div class="table-list">
                                    <div class="form-group table-cell">
                                        <span id="subscriber_error"></span>
                                        <div class="input-email input-icon"  style="border-radius: 4px; border:1px solid #009bd6;">
                                            <input class="form-control" type="text" id="subscribe_email" placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <button type="button" id="subscribe_submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
<!--                            <p>Houzez is a premium WordPress theme for real estate agents.<br>Don’t forget to follow us on:</p>
                            <ul class="social">
                                <li>
                                    <a href="#" class="btn-facebook"><i class="fa fa-facebook-square"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-twitter"><i class="fa fa-twitter-square"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-google-plus"><i class="fa fa-google-plus-square"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-linkedin"><i class="fa fa-linkedin-square"></i></a>
                                </li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="footer-col">
                        <p>MuscatHome - All rights reserved</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="footer-col">
                        <div class="navi">
                            <ul id="footer-menu" class="">
                                <li><a href="<?php echo base_url('index.php/web_panel/Home/about'); ?>" title="About us">About us</a></li>
<!--                                <li><a href="<?php //echo base_url('index.php/web_panel/Home/privacy');  ?>">Privacy</a></li>-->
                                <li><a href="<?php echo base_url('index.php/web_panel/Home/terms'); ?>" title="Terms and Conditions">Terms and Conditions</a></li>
                                <li><a href="<?php echo base_url('index.php/web_panel/Contact'); ?>" title="Contact us">Contact</a></li>
                                <li><a href="<?php echo base_url('index.php/web_panel/Home/faq'); ?>" title="faq">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="footer-col foot-social">
                        <p>
                            Follow us
                            <a target="_blank" class="btn-facebook" href="https://www.facebook.com/Muscat-Home-121305488570040/" title="facebook"><i class="fa fa-facebook-square"></i></a>

<!--                            <a target="_blank" class="btn-twitter" href="https://twitter.com/favethemes"><i class="fa fa-twitter-square"></i></a>-->

                            <a target="_blank" class="btn-linkedin" href="https://www.linkedin.com/company/muscat-home/" title="linkedin"><i class="fa fa-linkedin-square"></i></a>

<!--                            <a target="_blank" class="btn-google-plus" href="http://google.com/"><i class="fa fa-google-plus-square"></i></a>-->

                            <a target="_blank" class="btn-instagram" href="https://www.instagram.com/muscat_home/" title="instagram"><i class="fa fa-instagram"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    .success-popup  {
        transition: .3s ease all;
        font-family: 'Roboto', sans-serif;
    }

</style>
<!-- Modal Newletter Success Popup -->
<div class="modal fade success-popup" id="subscriber_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Thank You !</h4>
            </div>
            <div class="modal-body text-center">
                <img src="<?php echo base_url('web_assets/images/checkAds.png'); ?>" title="">
                <p class="lead">Email successfully registered. Thank you, We will get back to you soon!</p>
                <a href="index.php" class="rd_more btn btn-default" title="Home">Go to Home</a>
            </div>

        </div>
    </div>
</div>


<!-- Modal Contact Success Popup -->
<div class="modal fade success-popup" id="user_contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Success !</h4>
            </div>
            <div class="modal-body text-center">
                <img src="<?php echo base_url('web_assets/images/checkAds.png'); ?>" title="">
                <p class="lead">Thank you, We will get back to you soon!</p>
                <a href="index.php" class="rd_more btn btn-default" title="Home">Go to Home</a>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //alert('asdf');
        $("#reg_user_email").attr('autocomplete', 'off');
        $("#reg_user_password").attr('autocomplete', 'off');

    });
</script>

<script>
    $(document).ready(function () {
        //alert('gh');


        $('.alphabets').keypress(function (e) {
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            } else {
                e.preventDefault();
                return false;
            }
        });

        $('#reg_user_name').keypress(function (e) {
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            } else {
                e.preventDefault();
                return false;
            }
        });

        $('#reg_agent_name').keypress(function (e) {
            var regex = new RegExp(/^[a-zA-Z\s]+$/);
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            } else {
                e.preventDefault();
                return false;
            }
        });
        $("#mobile").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#reg_agent_mobile").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#reg_user_phone").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_user_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#contact_user_phone1").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
        $("#contact_user_phone2").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
        $("#contact_user_phone3").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
        $("#property_size").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#price").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        $("#job_budget").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
        $("#opt").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#deposit").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
        $("#loan_amount").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        $("#property_price").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        $("#final_price").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        $(".number").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

    });


</script>
<script>
    $('.sel_user').click(function () {
        //alert('jkkghj');
        var value = $(this).val();
        //alert(value);
        if (value == 1) {
            $('#social_login_section').hide();
        }
        if (value == 0) {
            $('#social_login_section').show();
        }

    });
    $(document).ready(function () {
        $('#form_agent').hide();
        $('.user_sel_for_reg').click(function () {
            //alert('jkkghj');
            var value = $(this).val();
            //alert(value);

            if (value == 0) {
                $('#form_user').show();
                $('#form_agent').hide();
                
            }
            if (value == 1) {
                $('#form_agent').show();
                $('#form_user').hide();
                
            }
            if (value == 2) {
                $('#form_agent').show();
                $('#form_user').hide();
            }

        });
    });

</script>

<script type="text/javascript">

    var CaptchaCallback = function () {
        var captchas = document.getElementsByClassName("g-recaptcha");
        for (var i = 0; i < captchas.length; i++) {
            grecaptcha.render(captchas[i], {'sitekey': '6LdQET4UAAAAAB7nM1Zuepi2OeJPJ7nk5HsOajpy'});
        }
    };
</script>
<script>
    $('#trigger_file').click(function () {
        $('#file_upload').trigger('click');
    })


    $('#subscribe_submit').click(function () {
        $('#subscriber_error').text('');
        var email = $('#subscribe_email').val();
        //alert(email); exit;
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Home/ajax_subscriber'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                email: email
            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    //alert('sdfd');
                    //$("#subscribe_email").load(location.href + " #subscribe_email");
                    $('#subscriber_modal').modal('show');
                    $('#subscribe_email').val('');


                } else {
                    $('#subscriber_error').text(data.message);
                    $('#subscriber_error').css({"font-size": "14px", "color": "red"});
                }
            }
        });
    })


    $("input[name='toggler']").change(function () {
        $('#login_user_error_validation').empty();
    });


    $('.login_users').click(function () {
        var name = $('#login_users_username').val();
        var password = $('#login_users_password').val();
        var toggler = $("input[name='toggler']:checked").val();
       
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/login'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                password: password,
                toggler: toggler
            },
            success: function (data) {                 

                console.log(data);                
                
                if (data.status == 1) {
                    window.location.href = "<?php echo site_url('web_panel/home'); ?>";

                }
                if (data.status == 2) {
                    window.location.href = "<?php echo site_url('web_panel/Profile/myProfile'); ?>";

                }
                else {
                    $('#login_user_error_validation').text(data.message);
                    $('#login_user_error_validation').css({"font-size": "14px", "color": "red"});
                }
            }
        });
    })
    $('#login_users_password').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            //alert('Enter pressed: Submitting the form....');
            $('.login_users').click();
        }
    });

    $('.users_password').keypress(function (e) {
        //alert('Enter pressed: Submitting the form....');
        if (e.which == 13) {//Enter key pressed

            $('.login_users').click();
        }
    });

    $('#checkbox_login').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.login_users').click();
        }
    });

    $('#reset_email').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.reset_button').click();
        }
    });

    $("#reset_password_form").on("submit", function () {
        return false;
    });


    $('#otp').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('#opt_button').click();
        }
    });
    $("#opt_form").on("submit", function () {
        return false;
    });


    $('.input-group-addon').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.login_users').click();
        }
    });




    $('.reset_button').click(function () {
        var email = $('#reset_email').val();
        jQuery.ajax({
            url: "<?php echo site_url('web_panel/reset_password'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                reset_email: email
            },
            success: function (data) {
                //console.log(data);
                if (data.status) {
                    $('#reset_error_validate').text(data.message);
                    $('#reset_error_validate').css({"font-size": "14px", "color": "green"});
                    $('#pop-reset-pass').modal('hide');
                    $('#opt_modal').modal('show');

                } else {
                    $('#reset_error_validate').text(data.message);
                    $('#reset_error_validate').css({"font-size": "14px", "color": "red"});
                }
            }
        });
    })

    $('#opt_button').click(function () {
        var otp = $('#otp').val();
        jQuery.ajax({
            url: "<?php echo site_url('web_panel/Reset_password/otp_verification'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                otp: otp
            },
            success: function (data) {
                //console.log(data);
                if (data.id) {
                    var userid = btoa(data.id);
                    var redirect_path = "<?php echo site_url('web_panel/Reset_password/reset_password?hjlfl='); ?>" + userid;
                    //alert(redirect_path); exit;
                    window.location.href = redirect_path;
                } else {
                    $('#otp_validate').text(data.message);
                    $('#otp_validate').css({"font-size": "14px", "color": "red"});
                }
            }
        });
    })




    $('.registration_form').click(function () {
        var name = $('#reg_user_name').val();
        var email = $('#reg_user_email').val();
        var phone = $('#reg_user_phone').val();
        var password = $('#reg_user_password').val();
        var checkbox = '';
        if ($("#reg_user_check").is(":checked")) {
            checkbox = 1;
        }
        var user_response = grecaptcha.getResponse();
        //alert(response); exit;
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/register/register_user/register_user'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                phone: phone,
                password: password,
                checkbox: checkbox,
                user_response: user_response

            },
            success: function (data) {
                console.log(data);
                if (data.status) {
                    //alert('asdfds');
                    $('#register_form input').val('');
                    $('#reg_user_error_validation').text(data.message);
                    $('#reg_user_error_validation').css({"font-size": "14px", "color": "green"});
                    window.location.href = "<?php echo base_url('index.php/web_panel/Home') ?>";

                } else {
                    $('#reg_user_error_validation').text(data.message);
                    $('#reg_user_error_validation').css({"font-size": "14px", "color": "red"});
                    $('#reg_user_error_validation').fadeOut(3000);
                }
            }
        });
    })

    $('#reg_user_check').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.registration_form').click();
        }
    });


    $('.register_agent').click(function () {
        //alert('sdf')
        var name = $('#reg_agent_name').val();
        var email = $('#reg_agent_email').val();
        var phone = $('#reg_agent_mobile').val();
        var password = $('#reg_agent_password').val();
        var category = $('#reg_agent_category').val();
        var subcategory = $('#reg_agent_sub_category').val();
        var upload_count = $("#file_upload").get(0).files.length;
        var agent_response = grecaptcha.getResponse();
        //alert(response);

        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/register/register_agent/register_agent'); ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                phone: phone,
                password: password,
                category: category,
                subcategory: subcategory,
                upload_count: upload_count,
                agent_response: agent_response
                        //file: file
            },

            success: function (data) {
                //alert(data);
                console.log(data);
                if (data.status) {
                    //alert(data.status);
                    $('#reg_agent_error_validation').text(data.message);
                    $('#reg_agent_error_validation').css({"font-size": "14px", "color": "green"});
                    $("#register_agent_form").submit();
                    $('#register_agent_form input').val('');
                    //window.location.href = "<?php echo base_url('index.php/web_panel/Home') ?>";
                } else {
                    $('#reg_agent_error_validation').text(data.message);
                    $('#reg_agent_error_validation').css({"font-size": "14px", "color": "red"});
                    $('#reg_user_error_validation').fadeOut(3000);
                }

            }



        });

    })
   
    
    $('.user_sel_for_reg').click(function () {
       var selected_option = $(this).val();
       $("#reg_agent_category_value").val(selected_option);
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Services/ajax_get_category'); ?>",
            method: 'POST',
            //dataType: 'json',
            data: {
                selected_option: selected_option
            },

            success: function (response) {
                //alert(response);                                                  
                $("#reg_agent_category").html(response);
                $("#reg_agent_sub_category").html("<option>Select sub category</option>");
            }
        });

    });

    $('#reg_agent_category').change(function () {
        var category = $('#reg_agent_category option:selected').val();
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Services/ajax_get_subcategory'); ?>",
            method: 'POST',
            //dataType: 'json',
            data: {
                category: category
                
            },

            success: function (response) {
                //alert(response);                                                  
                $("#reg_agent_sub_category").html(response);

            }
        });

    });

    $('#reg_agent_sub_category').keypress(function (e) {
        if (e.which == 13) {//Enter key pressed
            $('.register_agent').click();
        }
    });



    $('.lang_sel').click(function () {
        var lang = $(this).attr('val');
        jQuery.ajax({
            url: "<?php echo base_url('index.php/web_panel/Home/change_language'); ?>",
            method: 'POST',
            data: {
                lang: lang
            },

            success: function (data) {
                if (data) {
                    location.reload();
                }
            }
        });
    });






</script> 

<script>
    $(".addfav").click(function () {
        var login_id = "<?php echo $this->session->userdata('active_user_id') ?>";
        if (login_id) {
            var property_id = $(this).data('id');
            //alert(property_id);
            $.ajax({
                url: "<?php echo base_url('index.php/web_panel/Properties/fav_to_property_ajax'); ?>",
                method: 'POST',
                data: {
                    is_fav: $(this).attr('is_fav'),
                    fk_user_id: login_id,
                    fk_property_id: property_id
                },
                success: function (data) {
                    location.reload();
                }
            });

            $(this).toggleClass('fa-heart-o fa-heart');
            //alert(login_id);

        } else {
            $('#pop-login').modal('show');
        }

    });
</script>
<script>
//
//    $(".register_agent").click(function(){
//        var $fileUpload = $("#file_upload");
//        if (parseInt($fileUpload.get(0).files.length)>5){
//         alert("You can upload a maximum of 5 files");
//         return false;
//        }
//    });    

</script>


<!--<script>
    $(document).ready(function () {
        $('.register_agent').click(function () {
            var name = $("#reg_agent_name").val();
            var email = $("#reg_agent_email").val();
            var mobile = $("#reg_agent_mobile").val();
            var passord = $("#reg_agent_password").val();
            var cat = $("#reg_agent_category").val();
            var subCat = $("#reg_agent_sub_category").val();
            if (name == "") { //alert('df');
                $("#reg_agent_name").focus();
                $("#reg_agent_name").css("border", "1px solid red")
                
            }else if(email == ""){
                 $("#reg_agent_email").focus();
                 $("#reg_agent_email").css("border", "1px solid red");
                 
            } 
            else if(mobile == ""){
                 $("#reg_agent_mobile").focus();
                 $("#reg_agent_mobile").css("border", "1px solid red");
            } else if(passord == ""){
                 $("#reg_agent_password").focus();
                 $("#reg_agent_password").css("border", "1px solid red");
            } 
            else{
                $("#register_agent_form").submit();
            }
            //alert('submit');
            //$("#register_agent_form").submit();

        });
    });
</script>

<script>
    $("#reg_agent_category").change(function () {
        var category = $("#reg_agent_category").val();
        if (category <= "1") { alert('category');
                $("#reg_agent_name").focus();
                $("#reg_agent_name").css("border", "1px solid red")
                
            }
        
    });
</script>-->

<style>
    .login-select{   
        margin-bottom: 0; 
        border-top: none !important;
    }
    .siginup-policy-txt{
        font-size: 13px;
        margin-top: 15px;
    }
    #pop-login{z-index: 999999999;}
    .scrolltop-btn{
        border: none;
        border-radius: 50%!important;
    }

</style>