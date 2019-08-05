<?php

//phpinfo(); die;
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->helper('common_helper');
        $this->load->helper('custom_helper');
        $this->load->helper('social_login_helper');
        $this->load->model('Properties_model');
        $this->load->model('Notifications_model');
        $this->load->model('User_model');
        $this->load->model('Services_model');
        $this->load->model('Job_post_model');
        $this->load->helper('cookie');
        $this->load->helper('image_upload_helper');
        $this->load->helper('number_to_short_number');
        $this->load->helper("file");
        if ($this->router->fetch_method() != "index") { //pre($this->session->userdata);
            if (empty($this->session->userdata['active_user_data'])) { //die('w');
                redirect('web_panel/Home');
            }
        }
    }

    function upload_file($key) {
        $filename = $_FILES[$key]['name'];
        //$target = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/real_estate_ec2_server/uploads/profile_images/" . $_FILES[$key]['name'];
        $target = getcwd() . '/uploads/profile_images/' . $_FILES[$key]['name'];
        move_uploaded_file($_FILES[$key]['tmp_name'], $target);

        return $filename;
    }

    function check_mobile($douments) { //pre($douments); die;
        $this->db->group_start();
        $this->db->Where('mobile', $douments['mobile']);
        if (isset($douments['category']) && $douments['category'] != "Servent") {
            $this->db->Where('user_type', 1);
        }
        if (isset($douments['category']) && $douments['category'] == "Servent") {
            $this->db->Where('user_type', 3);
        }
        if (!isset($douments['category'])) { 
            $this->db->Where_in('user_type', array(0, 2));
        }
        $this->db->where_not_in('id', $this->session->userdata['active_user_data']['id']);
        $this->db->group_end();
        $result = $this->db->get('re_users')->row_array();
        //echo $this->db->last_query();
        //pre($result);die;
        return $result;
    }

    public function myProfile() {
        $user_profile = array();
        $statuss = 0;
        $filter['id'] = $this->session->userdata['active_user_data']['id'];
        $user_profile['users'] = $this->User_model->get_user($filter);
        //pre($user_profile['users']); die;
        $user_profile['active_tab'] = $statuss;
        $user_profile['country_list'] = $this->get_country_code_list();
        if ($this->input->post('save')) {
            //pre($_FILES['user_cv']['error'][0]); die;
            $inputs = $this->input->post();
            $inputs['modify_date'] = date('Y-m-d H:i:s');
            $user = $this->check_mobile($inputs);
            //pre($inputs);die;
            unset($inputs['create_date'], $inputs['save'], $inputs['category'], $inputs['sub_category']);
            $id = $this->session->userdata['active_user_data']['id'];
            if (empty($user)) {
                $this->db->where('id', $id);
                $this->db->update('users', array('name' => $inputs['name'], 'email' => $inputs['email'], 'mobile' => $inputs['mobile']));
                if ($user_profile['users']['user_type'] == 3) {
                    $this->db->where('fk_user_id', $id);
                    $result = $this->db->get('servent_details')->row_array();

                    $servent_data = array(
                        "age" => $this->input->post('age'),
                        "gender" => $this->input->post('gender'),
                        "experience" => $this->input->post('experience'),
                        "nationality" => $this->input->post('nationality'),
                        "country" => $this->input->post('country'),
                        "city" => $this->input->post('city'),
                        "highest_degree" => $this->input->post('highest_degree'),
                        "occupation" => $this->input->post('occupation'),
                        "current_org" => $this->input->post('current_org'),
                        "about_servent" => $this->input->post('about_servent')
                    );
                    
                    if ($this->input->post('user_video_cv')) {
                        $servent_data['video_url'] = $this->input->post('user_video_cv');
                    }

                    if (isset($_FILES['user_cv']) && $_FILES['user_cv']['error'][0] == 0) {
                        $cv_files = $_FILES['user_cv'];
                        $cv_path = getcwd() . '/uploads/profile_images/servent_cv/';
                        $upload_cv = upload_multiple_images_for_website($cv_files, $cv_path);
                    }
                    if (!empty($upload_cv)) {
                        $servent_data['cv_url'] = base_url('uploads/profile_images/servent_cv/') . $upload_cv[0];
                    }
                    if (isset($_FILES['user_video_cv']) && $_FILES['user_video_cv']['error'][0] == 0) {
                        $video_cv_files = $_FILES['user_video_cv'];
                        $video_cv_path = getcwd() . '/uploads/profile_images/servent_video_cv/';
                        $upload_video_cv = upload_multiple_images_for_website($video_cv_files, $video_cv_path);
                    }
                    if (!empty($upload_video_cv)) {
                        $servent_data['video_url'] = base_url('uploads/profile_images/servent_video_cv/') . $upload_video_cv[0];
                    }
                    //pre($servent_data); die;
                    if ($result) {
                        $this->db->where('fk_user_id', $id);
                        $this->db->update('servent_details', $servent_data);
                    } else {
                        $servent_data['fk_user_id'] = $id;
                        $this->db->insert('servent_details', $servent_data);
                        $this->db->where('id', $id);
                        $this->db->update('users', array("is_profile_complete" => 1));
                    }
                }
            } else {
                $this->session->set_flashdata('mobile_exist', 'This is mobile number already exits');
                redirect('web_panel/Profile/myProfile');
            }

            redirect('web_panel/Profile/myProfile');
        }


        if ($this->input->post('image_submit')) {
            $inputs = $this->input->post();
            $result = $this->upload_file('choseprofilepic');
            $id = $this->session->userdata['active_user_data']['id'];
            $this->db->where('id', $id);
            $this->db->update('users', array('profile_image' => $result));
//echo $this->db->last_query(); die;
            redirect('web_panel/Profile/myProfile');
        }
        //pre($user_profile); die;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $user_profile['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $user_profile);
    }

    public function changePassword() {
        $user_profile = array();
        $statuss = 1;
//pre($this->uri->segment(3));die;
        $user_profile['active_tab'] = $statuss;
        if ($this->input->post('change')) {

            if ($this->input->post('o_password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter old password'));
                die;
            }
            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter your new password'));
                die;
            }
            if ($this->input->post('r_password') == '') {
                echo json_encode(array('status' => false, 'message' => 'Please enter confirm password'));
                die;
            }
            if ($this->input->post('password') != $this->input->post('r_password')) {
                echo json_encode(array('status' => false, 'message' => 'Your confirm password does not matched'));
                die;
            }

            $this->db->Where('id', $this->session->userdata['active_user_data']['id']);
            $result = $this->db->get('users')->row_array();

            if ($result['password'] == md5($this->input->post('o_password'))) {

                $this->db->where('id', $this->session->userdata['active_user_data']['id']);
                $this->db->update('users', array('password' => md5($this->input->post('password'))));

                echo json_encode(array('status' => true, 'message' => 'Password changed succesfully !'));
                die;
            } else {
                echo json_encode(array('status' => false, 'message' => 'Your old password does not matched'));
                die;
            }

            redirect('web_panel/Profile/myProfile');
        }
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $user_profile['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $user_profile);
    }

    public function add_property() {


        $user_profile = array();
        $statuss = 2;
        $user_profile['active_tab'] = $statuss;
        $user_profile['country_code'] = $this->get_country_code_list();
        if ($this->input->post()) {
            //pre($this->input->post());  pre($_FILES); die;
            $inputs = $this->input->post();
            $inputs['fk_agent_id'] = $this->session->userdata['active_user_data']['id'];
            $inputs['property_contact_no'] = $this->input->post('country_code') . ' ' . $this->input->post('contact_number');
            unset($inputs['country_code'], $inputs['contact_number']);

            if ($this->input->post('location')) {
                //pre($this->input->post('location'));die;
                $location = $this->input->post('location');
                $journalName = str_replace(' ', '+', $location);
                $get_location = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $journalName . "&key=AIzaSyBc6vLk5tpSQhM7SKnYWbTVP6ksijsE95Q";
                //pre($get_location); die;
                $lat_long = file_get_contents($get_location, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
                //$lat_long = file_get_contents($get_location);
                $add = json_decode($lat_long);
                //pre($add->results);die;
                if (!empty($add->results)) {
                    $count = count($add->results[0]->address_components);
                    $inputs['location'] = explode(',', $this->input->post('location'))[0];

                    for ($i = 0; $i < $count; $i++) {
                        if ($add->results[0]->address_components[$i]->types[0] == 'country') {

                            $inputs['country'] = $add->results[0]->address_components[$i]->long_name;
                        }
                        if ($add->results[0]->address_components[$i]->types[0] == 'administrative_area_level_1') {
                            $inputs['state'] = $add->results[0]->address_components[$i]->long_name;
                        }
                        if ($add->results[0]->address_components[$i]->types[0] == 'locality') {
                            $inputs['city'] = $add->results[0]->address_components[$i]->short_name;
                        }
                        if ($add->results[0]->address_components[$i]->types[0] == 'administrative_area_level_2') {
                            $inputs['city'] = $add->results[0]->address_components[$i]->short_name;
                        }
                    }
                    $inputs['latitude'] = $add->results[0]->geometry->location->lat;
                    $inputs['longitude'] = $add->results[0]->geometry->location->lng;
                } else {
                    $msg['message'] = "Please choose the valid location !";
                    $this->session->set_flashdata('no_property_location', $msg);
                    redirect("web_panel/Profile/add_property");
                }
                //$inputs['status'] = 0;


                $key = $_FILES['property_images'];
                $path = getcwd() . '/uploads/properties/images/';
                //pre($path); die;
                if ($_FILES['property_images']['error'][0] == 0) {
                    $file_uploaded = upload_multiple_images_for_website($key, $path);
                }
                //pre($inputs); die;
                $this->Properties_model->property_create($inputs);
                if ($file_uploaded) {
                    if (!empty($inputs['id'])) {
                        $this->db->where('fk_property_id', $inputs['id']);
                        $this->db->delete('property_images');
                        foreach ($file_uploaded as $image['image']) {
                            $image['fk_property_id'] = $inputs['id'];
                            $this->db->insert('property_images', $image);
                        }
                    } else {
                        $this->Properties_model->insert_property_images(['id' => $this->db->insert_id(), 'images' => $file_uploaded]);

                        $this->db->where('id', $inputs['fk_agent_id']);
                        $user_detail = $this->db->get('users')->row_array();
                        $subject = "Thankyou for submitting a property with Muscat Home";
                        $email_data['msg'] = "Dear User"
                                . "<br><br>"
                                . "Thank you for submitting a property with Muscat Home and agreeing with our terms and condition, your request is pending admin approval. We will notify you once your job is approved."
                                . "<br>"
                                . "Ø´ÙƒØ±Ø§ Ø¹Ù„Ù‰ Ø¹Ø±Ø¶ Ø¹Ù‚Ø§Ø± Ù…Ø¹ Ù…Ø³Ù‚Ø· Ù‡ÙˆÙ… ÙˆØ§Ù„Ù…ÙˆØ§Ù�Ù‚Ø© Ø¹Ù„Ù‰ Ø§Ù„Ø´Ø±ÙˆØ· ÙˆØ§Ù„Ø£Ø­ÙƒØ§Ù… ÙˆÙ†Ø­Ù† Ù�ÙŠ Ø§Ù†ØªØ¸Ø§Ø± Ø§Ù„Ø­ØµÙˆÙ„ Ø¹Ù„Ù‰ Ø§Ù„Ù…ÙˆØ§Ù�Ù‚Ø© Ø§Ù„Ø¥Ø¯Ø§Ø±ÙŠØ© Ø¹Ù„Ù‰ Ø§Ù„Ø·Ù„Ø¨ ÙˆØ³Ù†Ø¨Ù„ØºÙƒ Ø¨Ù…Ø¬Ø±Ø¯ Ø§Ù„Ø­ØµÙˆÙ„ Ø¹Ù„Ù‰ Ø§Ù„Ù…ÙˆØ§Ù�Ù‚Ø§Øª Ø§Ù„Ù…Ø·Ù„ÙˆØ¨Ø©"
                                . "<br><br>"
                                . "Thank You,<br>"
                                . "Muscat Home<br>";
                        /* Mail for Property approval */
                        $this->email->from(REALESTATE_EMAIL, 'Muscat Home');
                        $this->email->to($user_detail['email']);
                        //$this->email->cc('city@another-example.com');
                        $this->email->subject($subject);
                        $this->email->message($this->load->view('email/common', $email_data, True));
                        $this->email->set_mailtype("html");
                        $this->email->send();
                    }
                }
            }

            redirect('web_panel/Profile/list_properties');
        }
        if ($this->input->get('kjh')) {
            $filter['fk_agent_id'] = $this->session->userdata['active_user_data']['id'];
            $filter['id'] = $this->input->get('kjh');
            $properties = $this->Properties_model->get_properties($filter);
            $user_profile['properties'] = $properties[0];

            $user_profile['properties']['country_code'] = explode(' ', $user_profile['properties']['property_contact_no'])[0];

            $contact = explode(' ', $user_profile['properties']['property_contact_no']);

            if (!empty($contact[1])) {
                $user_profile['properties']['contact_number'] = $contact[1];
            } else {
                $user_profile['properties']['contact_number'] = '';
            }
            //pre($user_profile['properties']); die;
        }
        if ($this->session->flashdata('no_property_location')) {
            $user_profile['no_property_location'] = $this->session->flashdata('no_property_location');
            //pre($user_profile['no_property_location']); die;
        }
        //pre($user_profile['no_property_location']); die;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $user_profile['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $user_profile);
    }

    function get_country_code_list() {
        //$this->db->select('country_name, country_code');
        $this->db->order_by('country_name', 'asc');
        $country_code = $this->db->get('re_countries')->result_array();
        return $country_code;
    }

    function ajax_city_list() {
        //$this->db->select('country_name, country_code');
        $country_id = "";
        $selected_city = $this->input->post('selected_city');
        if ($this->input->post('country_name')) {
            $this->db->where('country_name', $this->input->post('country_name'));
            $country = $this->db->get('countries')->row_array();
            $country_id = $country['id'];
        }
        $this->db->order_by('name', 'asc');
        $this->db->where('country_id', $this->input->post('country'));
        $this->db->or_where('country_id', $country_id);
        $cities = $this->db->get('cities')->result_array();
        //pre($city);die;
        echo '<option>Select City</option>';
        foreach ($cities as $city) {
            $selected = "";
            if ($selected_city == $city['name']) {
                $selected = "selected";
            }
            echo '<option ' . $selected . '  value="' . $city['name'] . '">' . $city['name'] . '</option>';
        }
    }

    public function list_properties() {

        $user_profile = array();
        $statuss = 3;
        $user_profile['active_tab'] = $statuss;
        if ($this->input->get('jghj')) {
            $id = $this->input->get('jghj');
            $this->db->where('id', $id);
            $this->db->delete('properties');
            redirect($this->uri->uri_string());
        }

        $this->db->order_by('id', 'desc');
        $filter['fk_agent_id'] = $this->session->userdata['active_user_data']['id'];

        $user_profile['properties'] = $this->Properties_model->get_properties($filter);
        //$this->db->where('fk_agent_id', $this->session->userdata['active_user_data']['id']);
        //$user_profile['properties'] = $this->db->get('properties')->result_array();
        //pre($user_profile);die;
        $filter_data['fk_user_id'] = $this->session->userdata('active_user_data')['id'];
        $user_profile['unread_count'] = $this->Notifications_model->count_notification($filter_data);
        $this->load->view('profile/profile', $user_profile);
    }

    public function service_provider() {

        if (isset($_GET['ghfg'])) {

            $id = $filter['id'] = base64_decode($_GET['ghfg']);
            $data['provider'] = $this->User_model->get_user($filter);
            $data['provider']['avg_rating'] = 0;
            //$this->db->select('ratings.*,users.*,ratings as user_ratins, avg(ratings) as avg_ratings');
            $this->db->join('users', 'users.id = ratings.from_id');
            $this->db->order_by('ratings.id', 'desc');
            $this->db->where('to_id', $id);
            $ratings = $this->db->get('ratings')->result_array();
            $data['reviews'] = $ratings;
            foreach ($ratings as $rating) {
                $avgratings[] = $rating['ratings'];
            }
            if (isset($avgratings)) {
                $array_count = count($avgratings);
                $array_sum = array_sum($avgratings);
                $data['provider']['avg_rating'] = $array_sum / $array_count;
            }
            //pre($data); die;
            
            $this->load->view('profile/service_provider_profile', $data);
        } else {
            redirect('web_panel/home');
        }
    }

    public function ajax_delete_cv() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->get('servent_details')->row_array();
        if (!empty($result['cv_url'])) {
            $filename = basename($result['cv_url']);
            $path = getcwd() . "/uploads/profile_images/servent_cv/" . $filename;
            unlink($path);
        }
        $this->db->where('id', $id);
        $update = $this->db->update('servent_details', array('cv_url' => ""));
        echo $update;
    }

    public function ajax_delete_video_cv() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $result = $this->db->get('servent_details')->row_array();
        if (!empty($result['video_url'])) {
            $filename = basename($result['video_url']);
            $path = getcwd() . "/uploads/profile_images/servent_video_cv/" . $filename;
            unlink($path);
        }
        //pre($result); die;
        $this->db->where('id', $id);
        $update = $this->db->update('servent_details', array('video_url' => ""));
        echo $update;
    }

}
