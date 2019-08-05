<?php //pre($payment_details); die;?>
<div id="paymentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payment Detail</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" action="" method="post">
                    <input type="hidden" id="fk_customer_id" value="<?php echo $payment_details['fk_customer_id'];?>">
                    <input type="hidden" id="fk_provider_id" value="<?php echo $payment_details['fk_provider_id'];?>">
                    <input type="hidden" id="fk_job_post_id" value="<?php echo $payment_details['fk_job_post_id'];?>">
                    <input type="hidden" id="job_request_id" value="<?php echo $payment_details['id'];?>">
                    <div class="form-group" style="margin: 20px 0; width: 100%; font-size:14px; ">
                        <label class="control-label col-sm-2" for="email"><strong>Pay By:</strong></label>
                        <div class="col-sm-3 padding-pay-top">
                            <input type="radio" name="choosepaymentmode"  id="choosepaymentmode" disabled>
                            <span class="selectpayment">By Card</span>
                        </div>
                        <div class="col-sm-4 padding-pay-top">
                            <input type="radio" name="choosepaymentmode"  id="choosepaymentmode" disabled>
                            <span class="selectpayment">Net Banking</span>
                        </div>
                        <div class="col-sm-3 padding-pay-top">
                            <input type="radio" name="choosepaymentmode"  id="choosepaymentmode" checked>
                            <span class="selectpayment">CoD</span>
                        </div>
                    </div>
                    <div style="border:thin solid #ccc; border-radius:4px; padding-top:20px;">
                        <div class="form-group " style="margin: auto;">
                            <label class="control-label col-sm-2" for="email"></label>
                            <div class="col-sm-10 padding-pay-top ">
                                <span id="payment_message"></span>
                            </div>
                        </div>
                        <div class="form-group " style="margin: auto;">
                            <label class="control-label col-sm-2" for="amount"><strong>Amount:</strong></label>
                            <div class="col-sm-10 padding-pay-top ">
                                <?php if(!empty($payment_details['final_price'])){ ?>
                                   <input type="text" class="col-sm-10 form-control" value="<?php echo $payment_details['final_price'] ?>" name="amount"  id="amount" readonly> 
                                <?php } else { ?>
                                <input type="text" class="col-sm-10 form-control" value="<?php echo $payment_details['quotation'] ?>" name="amount"  id="amount" readonly>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <?php if (!empty($promocode_detail)) { ?>
                            <div class="form-group " style="margin: auto;">
                                <label class="control-label col-sm-2" for="discount"><strong>Discount:</strong></label>
                                <div class="col-sm-10 padding-pay-top ">
                                    <input type="text" class="col-sm-10 form-control" value="<?php echo $promocode_detail['discount'] ?>%" name="discount"  id="discount" readonly>
                                </div>
                            </div>
                        <?php } ?> 
                        <div class="form-group " style="margin: auto;">
                            <label class="control-label col-sm-2" for="total"><strong>Total:</strong></label>
                            <div class="col-sm-10 padding-pay-top ">

                                <?php
                                if(!empty($payment_details['final_price'])){
                                    $final_price = $payment_details['final_price'];
                                }else{
                                    $final_price = $payment_details['quotation'];
                                }
                                if (!empty($promocode_detail)) {
                                    $discounted = $promocode_detail['discount'] * $final_price / 100;
                                    $discounted_price = $final_price - $discounted;
                                } else {
                                    $discounted_price = $final_price;
                                }
                                ?>
                                <input type="text" class="col-sm-10 form-control" style="background-color: beige; color:#000; font-weight:600" value="OMR <?php echo $discounted_price; ?>" name="total" data-price="<?php echo $discounted_price; ?>"  id="total" readonly>
                            </div>
                        </div>


<!--                        <div class="form-group " style="margin: auto;">
                            <label class="control-label col-sm-2" for="email"><strong>Tip:</strong></label>
                            <div class="col-sm-10 padding-pay-top" >
                                <input id="tip" type="text" class="col-sm-10 form-control" style="background:#fff"placeholder="tip amount" name="tip">
                            </div>
                        </div>-->
                        <div class="form-group"> 
                            <div class="col-sm-12" style="text-align:center; margin-top: 20px;">
                                <button id="pay_now"  type="button" class="btn btn-primary">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
<style>
    .selectpayment{
        padding-left: 15px;
    }
    .padding-pay-top{ padding-top: 3px;}
    .payemnt-div-center{
        text-align:center; margin: auto;
    }
</style>
<script>
    $("#tip").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
            return false;
        }
    });


    $("#tip").keyup(function (event) {
        //if (this.value.length >= this.getAttribute('minlength')) {
        var tip = 0;
        if ($("#tip").val()) {
            tip = parseInt($("#tip").val());
        }
        //alert(tip); 
        var amount = parseInt($("#total").attr('data-price'));
        //alert(amount); exit;

        var total = amount + tip;
        //alert(total); exit;
        var total_price = "OR " + total;
        $("#total").val(total_price);

        // }
    });
      

    
$('#pay_now').click(function () {
   // alert('jhj');exit;
        var amount = $("#amount").val();
        var total = $("#total").val();
        var tip = $("#tip").val();
        var fk_customer_id = $("#fk_customer_id").val();
        var fk_provider_id = $("#fk_provider_id").val();
        var fk_job_post_id = $("#fk_job_post_id").val();
        var job_request_id = $("#job_request_id").val();
        //alert(total);alert(fk_customer_id);alert(fk_provider_id);alert(fk_job_post_id);alert(job_request_id);exit;
        $.ajax({
            url: "<?php echo base_url('index.php/web_panel/Job_post/payment') ?>",
            method: 'POST',
            dataType: 'json',
            data: {
                amount: amount,
                total_amount: total,
                tip: tip,
                fk_customer_id: fk_customer_id,
                fk_provider_id: fk_provider_id,
                fk_job_post_id: fk_job_post_id,
                fk_job_request_id: job_request_id       
                },
            success: function (data) {
                if (data.status) {
                    //alert('asdfds');
                    $('#payment_message').text(data.message);
                    $('#payment_message').css({"font-size": "14px", "color": "green"});
                    //window.location.href = "<?php echo base_url('index.php/web_panel/Home') ?>";
                    $('#paymentModal').modal('hide');
                    location.reload();
                } else {
                    $('#payment_message').text(data.message);
                    $('#payment_message').css({"font-size": "14px", "color": "red"});
                    location.reload();
                }
            }
        });
        $('#pay_now').attr('disabled', 'disabled');
        return true;

    });



</script>