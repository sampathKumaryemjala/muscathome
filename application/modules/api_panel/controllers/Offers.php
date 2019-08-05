<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends MX_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Offer_model');
        $this->load->helper('custom');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    //public function index() {
        
    //}

    

    public function index() { 
        $document   = check_inputs();        
        $obj        = new Offer_model;
        $status     = false;
        $message    = "No Offer found";
        $offers     = $obj->get_offers($document);
        if ($offers) {
            $status         = true;
            $message        = "offers found successfully";
        }
        return_data($status, $message, $offers);
        //create_log_file();
    }

    public function get_promocode() { 
        $document   = check_inputs();        
        $obj        = new Offer_model;
        $status     = false;
        $message    = "Not found";
        $code     = $obj->get_promo_codes($document);

        if($code){
                $code = $code['0'];
                if(strtotime($code['start_date']) > strtotime(date('Y-m-d'))){
                    $message = "Wait for offer till ".$code['start_date'];
                    return_data($status, $message, array());
                }
                if(strtotime($code['end_date']) < strtotime(date('Y-m-d'))){
                    $message = "Offer has been expired";
                    return_data($status, $message, array());
                }

                $alredy_used = $this->Offer_model->get_used_promo_code(array("fk_user_id"=>$document['user_id'],"code"=>$document['promo_code']));
                if($alredy_used && ($alredy_used['no_of_used'] = $code['no_of_uses'])){
                    $message = "Limit expire to use this code";
                    return_data($status, $message, array());
                }else{
                    //$document['no_of_used'] = $alredy_used['no_of_used'] + 1;
                }

        }else{
            $message = "Wrong promo code entered";
            return_data($status, $message, array());
        }


        // if ($code) {
        //     $code = $code[0];
        //     $alredy_used     = $obj->get_used_promo_code(["fk_user_id"=>$document['user_id'],"fk_code_id"=>$code['id']]);
        //     if($alredy_used && ($alredy_used[0]['no_of_used'] == $code['no_of_uses'])){
        //         $message = "Limit expire to use this code";
        //         return_data($status, $message, array());
        //     }
        //     $status         = true;
        //     $message        = "Offer avalaible successfully";
        // }
        return_data($status, $message, $code);
        //create_log_file();
    }

    
}
