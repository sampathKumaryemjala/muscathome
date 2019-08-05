<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notification_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function notifications($filter) {
        $final = [];
        if (isset($filter['fk_user_id'])) {
            $this->db->where('fk_user_id', $filter['fk_user_id']);
        }
        $this->db->order_by('id','desc');
        $notifications = $this->db->get('notifications')->result_array();
        //echo $this->db->last_query();
        if ($notifications) {
            foreach ($notifications as $notification) {
                if ($notification['fk_job_post_id'] != 0) {
                    $job_post = $this->db->get_where('re_job_posts', ['id' => $notification['fk_job_post_id']])->row_array();
                    $sub_cat = $this->db->get_where('re_service_sub_category', ['id' => $job_post['fk_service_sub_cat_id']])->row_array();
                    if (empty($sub_cat['icon']) || !isset($sub_cat['icon'])) {
                        $sub_cat['icon'] = "blank_goldstar.png";  // for default image
                    }
                    $notification['icon'] = base_url('uploads/services/notification/') . $sub_cat['icon'];
                } else {
                    $notification['icon'] = base_url('uploads/services/notification/') . "maintenance.png";
                }
                $final[] = $notification;
            }
        }
        return $final;
    }

}
