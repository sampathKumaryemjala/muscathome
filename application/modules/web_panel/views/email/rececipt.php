<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="apple-touch-icon" href="http://mfs0.bp.cdnsw.com/fs/Root/small/7r5cn-logo_apple.jpg">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!------ Include the above in your HEAD tag ---------->
<?php
//$name = "Harish kumar";
//$mobile = "+968 535646";
//$email = "hk@gmail.com";
//$address = "mayur vihar delhi";
//$service = array('name'=>"service 1", "amount"=>"1000");
//$tax_percent = "5";
//$sub_total = "1000";
//$total = "1000";
//$date = date('Y-M-d');
//$txn_id = "434345564";
?>
<style>
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #2986d6;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }
    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
        color:#fff;
    }
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    .receipt-main td {
        padding: 9px 20px !important;
    }
    .receipt-main th {
        padding: 13px 20px !important;
    }
    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }
    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }	
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }

    #container {
        background-color: #dcdcdc;
    }


</style>



<div class="container">
    <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">

                            <img class="img-responsive" alt="Muscat Home" src="<?php echo 'https://muscathome.com/web_assets/images/imgpsh_fullsize.png'; ?>" style="width: 71px; border-radius: 43px;">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5>Muscat Home</h5>
                            <p>+968-99689101 <i class="fa fa-phone"></i></p>
                            <p>info@muscathome.com <i class="fa fa-envelope-o"></i></p>
                            <p>Muscat, OMAN <i class="fa fa-location-arrow"></i></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <h5><?php if (isset($name)) {
    echo $name;
} ?></h5>
                            <p><b>Mobile :</b> <?php if (isset($mobile)) {
    echo $mobile;
} ?></p>
                            <p><b>Email :</b> <?php if (isset($email)) {
    echo $email;
} ?></p>
                            <p><b>Address :</b> <?php if (isset($address)) {
    echo ucfirst($address);
} ?></p>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Receipt</h1>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="text-right" >
                    <h5>Transaction ID : <Strong><?php echo $txn_id; ?></Strong></h5>
                </div>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount(OMR)</th>
                        </tr>
                    </thead>
                    <tbody>
<?php if (!empty($service)) { ?>
                            <tr>
                                <td class="col-md-9"><?php echo ucfirst($service['name']); ?></td>
                                <td class="col-md-3"><i class="fa fa-inr"></i><?php echo $service['amount']; ?>/-</td>
                            </tr>
<?php } ?>
                        <tr>
                            <td class="text-right">
                                <p>
                                    <strong>Sub Total: </strong>
                                </p>
    <!--                            <p>
                                    <strong>Tax: </strong>
                                </p>-->

                            </td>
                            <td>
                                <p>
                                    <strong><i class="fa fa-inr"></i> <?php echo $sub_total ?>/-</strong>
                                </p>
    <!--                            <p>
                                    <strong><i class="fa fa-inr"></i> 500/-</strong>
                                </p>-->

                            </td>
                        </tr>
                        <tr>

                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo $total ?>/-</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b>Date :</b> <?php echo $date; ?></p>
                            <h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
                        </div>
                    </div>
                    <!--					<div class="col-xs-4 col-sm-4 col-md-4">
                                                                    <div class="receipt-left">
                                                                            <h1>Signature</h1>
                                                                    </div>
                                                            </div>-->
                </div>
            </div>

        </div>    
    </div>
</div>

<script>


</script>