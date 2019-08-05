<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Properties extends MX_Controller {

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
        $this->load->model('Properties_model');
        $this->load->model('User_model');
        $this->load->helper('image_upload_helper');
        $this->load->helper('custom');
        $this->load->helper('push');
    }

    /*
     * Modified By      :Amit Kumar
     * Modified Date    :07-June,16
     */

    //public function index() {
        
    //}

    public function properties_filters() { 
        $obj                        = new properties_model;
        $filters['beds']            = ["min"=>1,"max"=>10];
        $filters['baths']           = ["min"=>1,"max"=>10];
        $filters['price']           = ["min"=>1,"max"=>500000]; 

        $filters['created'][]        = ["name"=>"Last 3 days","min"=>date('Y-m-d',strtotime("-3 days")),"max"=> date('Y-m-d')];
        $filters['created'][]        = ["name"=>"Last 7 days","min"=>date('Y-m-d',strtotime("-7 days")),"max"=>date('Y-m-d')];
        $filters['created'][]        = ["name"=>"Last 15 days","min"=>date('Y-m-d',strtotime("-15days")),"max"=>date('Y-m-d')];
        $filters['created'][]        = ["name"=>"Last 30 days","min"=>date('Y-m-d',strtotime("-30 days")),"max"=>date('Y-m-d')];
        
        $filters['square_ft'][]        = ["name"=>"0-300","min"=>0,"max"=>300];
        $filters['square_ft'][]        = ["name"=>"301-600","min"=>301,"max"=>600];
        $filters['square_ft'][]        = ["name"=>"601-900","min"=>601,"max"=>900];
        $filters['square_ft'][]        = ["name"=>"900+","min"=>901,"max"=>10000000];
        
        //$data['cities']         = $this->Properties_model->get_properties_cities();        
        //$data['states']         = $this->Properties_model->get_properties_states();        
        $filters['property_types'] = $this->Properties_model->get_property_types(); 

        $buy[] = array("name"=>"land","filters"=>[["id"=>1,"name"=>"residential","created"=>"2017-10-04 10:10:10"],["id"=>2,"name"=>"commercial","created"=>"2017-10-04 10:10:10"],["id"=>3,"name"=>"industrial","created"=>"2017-10-04 10:10:10"]]);   
        $buy[] = array("name"=>"home","filters"=>[["id"=>1,"name"=>"villa","created"=>"2017-10-04 10:10:10"],["id"=>2,"name"=>"town house","created"=>"2017-10-04 10:10:10"],["id"=>3,"name"=>"flat","created"=>"2017-10-04 10:10:10"]]);   
        $rent[] = array("name"=>"land","filters"=>[["id"=>1,"name"=>"commercial","created"=>"2017-10-04 10:10:10"],["id"=>2,"name"=>"industrial","created"=>"2017-10-04 10:10:10"]]);   
        $rent[] = array("name"=>"home","filters"=>[["id"=>1,"name"=>"villa","created"=>"2017-10-04 10:10:10"],["id"=>2,"name"=>"town house","created"=>"2017-10-04 10:10:10"],["id"=>3,"name"=>"flat","created"=>"2017-10-04 10:10:10"]]);   
        $rent[] = array("name"=>"office","filters"=>[]);   
        $property_types = ["buy"=>$buy,"rent"=>$rent];   
        //$filters['property_types_new'] = $property_types; 
        return_data(true,"Filters screen", $filters);
        //create_log_file();
    }

    public function properties() { 
        $filters    = check_inputs();        
        $obj        = new properties_model;
        $status     = false;
        $message    = "No property found";
        //$properties = $obj->get_properties(array("id"=>$document['id']));
        $properties = $obj->get_properties($filters);
        if ($properties) {
           if(isset($filters['individual'])){
                return_data(true, "property found successfully", $properties[0]);
            }
            $sell = $rent = [];
            foreach($properties as $property) {
                if($property['type'] == 0) {
                    $sell[] = $property;
                } else {
                    $rent[] = $property;
                }
            }
            $final['sell'] = $sell;
            $final['rent'] = $rent;
            $properties    = $final;
            $status         = true;
            $message        = "property found successfully";
        }
        return_data($status, $message, $properties);
        //create_log_file();
    }

    public function offers_properties() {  //only_with_offers
        $document   = check_inputs();        
        $obj = new properties_model;
        $status = false;
        $message = "No property found";
        $document['only_with_offers'] = 1;
        $properties = $obj->get_properties($document);
        if ($properties) {
            $sell = $rent = [];
            foreach($properties as $property) {
                if($property['type'] == 0) {
                    $sell[] = $property;
                } else {
                    $rent[] = $property;
                }
            }
            $final['sell'] = $sell;
            $final['rent'] = $rent;
            $properties    = $final;
            
            $status         = true;
            $message        = "property found successfully";
        }
        return_data($status, $message, $properties);
        //create_log_file();
    }

    public function similar_properties() {  //only_similars, city, property_type_id
        $document   = check_inputs();        
        $obj = new properties_model;
        $status = false;
        $message = "No property found";
        $document['only_similars'] = 1;
        if(!isset($document['city'])){
            $message        = "Please provide city to fetch similar properties! key is 'city' ";
            return_data($status, $message, []);
        }
        if(!isset($document['property_type_id'])){
            $message        = "Please provide property type to fetch similar properties! key is 'property_type_id' ";
            return_data($status, $message, []);
        }
        $properties = $obj->get_properties($document);
        if ($properties) {
            $status         = true;
            $message        = "property found successfully";
        }
        return_data($status, $message, $properties);
        //create_log_file();
    }


    public function fav_properties() { //forget password and resend otp
        $document   = check_inputs();        
        $obj        = new properties_model;
        $status     = false;
        $message    = "No favorite property found";
        $document['only_fav'] = 1; 
        //$properties = $obj->get_fav_properties($document);
        $properties = $obj->get_properties($document);
        if ($properties) {
           $sell = $rent = [];
           foreach($properties as $property) {
               $property['is_fav'] = 1;
               if($property['type'] == 0) {
                   $sell[] = $property;
               } else {
                   $rent[] = $property;
               }
           }
           $final['sell'] = $sell;
           $final['rent'] = $rent;
           $properties    = $final;
            $status         = true;
            $message        = "property displyed successfully";
        }
        return_data($status, $message, $properties);
        //create_log_file();
    }

   
    
    public function fav_to_property() { //fav a property
        $document   = check_inputs();    

        $log = "Time: " . date('Y-m-d, H') . PHP_EOL;
        $log = $log . "url: " . site_url("Properties/fav_to_property") . PHP_EOL;
        $log = $log . "Request " . json_encode($document) . PHP_EOL;
        //$log = $log . "Responce " . json_encode(array("Result" => array())) . PHP_EOL . PHP_EOL;
        file_put_contents('logs/fav_to_property.txt', $log, FILE_APPEND);
        


        $obj        = new Properties_model;
        $status     = false;
        $message    = "Please try again";
        $action     = $document['action'];
        unset($document['action']);
        if($action ==0){ // do fav
            $sender = $obj->get_user_details(array("id"=>$document['fk_user_id']));
            $title = $description = $sender['name']." is favorite our property";
            $done       = $obj->fav_to_property($document);
        }else{ // do unfav
            $done       = $obj->unfav_to_property($document);
        } 
        if($done && $action ==0 ){
            $property_n_user            = $obj->property_posted_by(["property_id"=>$document['fk_property_id']]); 
            if($property_n_user && $property_n_user['user_type']==0){
                $notification               = array("fk_user_id"=>$property_n_user['postded_by'],"notification_type"=>3,"title"=>$title,"fk_property_id"=>$document['fk_property_id'],"sender_id"=>$document['fk_user_id'],"description"=>$description,"created"=>time());
                $this->db->insert('notifications',$notification);

                $push_data['push_type']     = 3;
                $push_data['fk_property_id']= $document['fk_property_id'];
                $push_data['sender_id']     = $document['fk_user_id'];
                $push_data['title']         = $title;
                $push_data['message']       = $title;
               // $push_data['data']          = $property_n_user;
            
                
                generatePush($property_n_user['user']['device_type'],$property_n_user['user']['device_token'],$push_data);
            }
        }       
        if ($done) {
            $status         = true;
            $message        = "Done successfully";
        }
        return_data($status, $message, array());
    }
    
    
    public function add_property() {            //post a job by customer        
        $document = check_inputs();
        //pre($document); die;
        $log = "Time: " . date('Y-m-d, H') . PHP_EOL;
        $log = $log . "url: " . base_url("add_property") . PHP_EOL;
        $log = $log . "Request " . json_encode($document) . PHP_EOL;
        $log = $log . "Request " . json_encode($_FILES) . PHP_EOL;
        $log = $log . "Responce " . json_encode(array("Result" => array())) . PHP_EOL . PHP_EOL;
        file_put_contents('logs/add_property.txt', $log, FILE_APPEND);
        if (isset($_FILES) and !empty($_FILES)) { //pre($_FILES);
            $path = getcwd() . "/uploads/properties/images/";
            $document['property_images'] = upload_multiple_images_for_app($_FILES['property_images'], $path);
        }        
        $status         = false;
        $obj            = new Properties_model;
        $message        = "Try again";
        //pre($document); die;
        $created        = $obj->add_property($document);
        if ($created) {
            $status     = true;
            $message    = "Success";
        }
        return_data($status, $message, $created);
        //create_log_file();
    }
   

   public function delete_property() {            //post a job by customer
        
        $document   = check_inputs();
        $status     = false;
        $obj        = new Properties_model;
        $message    = "Try again";
        $created    = $obj->delete_property($document);
        if ($created) {
            $status = true;
            $message = "Success";
        }
        return_data($status, $message, $created);
        //create_log_file();
    }
    
}
