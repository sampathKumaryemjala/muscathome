<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel"> </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li><a href="<?php echo base_url(); ?>index.php/admin_panel/Admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
           
            
            <li class="treeview">
                <a href="<?php //echo base_url(''); ?>">
                    <i class="fa fa-building-o" aria-hidden="true"></i> <span>Properties</span> <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <?php if($this->session->userdata['backend_user']['user_type'] == 2) {?>
                    <li>
                        <a href="<?php echo base_url('index.php/admin_panel/Properties/create'); ?>"><i class="fa fa-circle-o"></i> Add Properties</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo base_url('index.php/admin_panel/Properties/pro_list') ?>" ><i class="fa fa-circle-o"></i> View Properties</a>
                    </li>
                </ul>
            </li>
            <?php if($this->session->userdata['backend_user']['user_type'] != 2) {?>
            <li class="treeview">
                <a href="<?php //echo base_url('');  ?>">
                    <i class="fa fa-users"></i><span>Property Agents</span> <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('index.php/admin_panel/Agents') ?>" ><i class="fa fa-circle-o"></i>View agents list</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Agents/add_agent') ?>" ><i class="fa fa-circle-o"></i>Add agent</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="<?php //echo base_url('');  ?>">
                    <i class="fa fa-rss" aria-hidden="true"></i><span>Property Offers</span> <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('index.php/admin_panel/Offers/create_offer') ?>" ><i class="fa fa-circle-o"></i>Add New offer</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Offers/offers_list') ?>" ><i class="fa fa-circle-o"></i>List Offers</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Offers/offer_properties') ?>" ><i class="fa fa-circle-o"></i>Assign Offer to Properties</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php //echo base_url('');  ?>">
                   <i class="fa fa-list-ul" aria-hidden="true"></i> <span>Service Categories</span> <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('index.php/admin_panel/Category/list_category') ?>" ><i class="fa fa-circle-o"></i>View Category</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Category/list_subcategory') ?>" ><i class="fa fa-circle-o"></i>View Sub category</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Category/add_subcategory') ?>" ><i class="fa fa-circle-o"></i>Add Sub category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Users/service_providers') ?>">
                   <i class="fa fa-users"></i> <span>Service Providers</span> <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Servents/index') ?>">
                   <i class="fa fa-users"></i> <span>Servants</span> <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Servents/view_requests') ?>">
                   <i class="fa fa-sign-in"></i> <span>Assign servant</span> <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Job_post') ?>">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Posted Jobs</span> <span class="pull-right-container"></span>
                </a>
            </li>  
<!--           <li class="treeview">
                <a href="<?php //echo base_url('index.php/admin_panel/Job_post/job_requests') ?>">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Job Requests</span> <span class="pull-right-container"></span>
                </a>
            </li>  -->
             
            <li class="treeview">
                <a href="<?php //echo base_url('');  ?>">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i><span>Promo Code</span> <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('index.php/admin_panel/Offers/promo_codes_list') ?>" ><i class="fa fa-circle-o"></i>View PromoCode list</a></li>
                    <li><a href="<?php echo base_url('index.php/admin_panel/Offers/create_promo_code') ?>" ><i class="fa fa-circle-o"></i>Add Promo Code</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Users'); ?>">
                    <i class="fa fa-users"></i> <span>Users</span> <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/admin_panel/Contact'); ?>">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Contact Queries</span> <span class="pull-right-container"></span>
                </a>
            </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
