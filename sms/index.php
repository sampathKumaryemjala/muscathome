

<?php
ini_set("soap.wsdl_cache", "0");
ini_set("soap.wsdl_cache_enabled", "0");


header('Content-Type: text/plain');
    if (!class_exists('SoapClient'))
{

        die ("You haven't installed the PHP-Soap module.");

}


$userID="travelpointweb";
$Password="Travelpoint@123";
$Message="hi test by suman";
$Language=1; 
$Recipients=99293348;



ini_set('max_execution_time',300 ); 
        try {
            $options = array(
                'soap_version'=>SOAP_1_2,
                'exceptions'=>true,
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE
            );
            $client = new SoapClient('http://ismartsms.net/iBulkSMS/webservice/IBulkSMS.asmx?WSDL', $options);
            $results = $client->PushMessage(
                    array(
		'UserID' => 'travelpointweb',
		'Password' => 'Travelpoint@123',
		//	'Message' => '.',
	  	'Message' => 'This is suman. Testing CRM',
		'Language' =>0,
		'ScheddateTime' => date('Y-m-d'),
		'Recipients' => array('string' => '96899802203','string' => '96899802203'),
		'RecipientType' => 1
                       )
                    );
        } catch (Exception $e) {
            echo "<h2>Exception Error!</h2>"; 
            echo $e->getMessage();
        }


 
?>