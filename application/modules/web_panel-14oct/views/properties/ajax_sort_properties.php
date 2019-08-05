<div class="property-listing list-view">
    <div class="row" style="margin-bottom:30px;">

        <?php
        $i = '415';
        if (!empty($properties)) {
            foreach ($properties as $property) {
                if ($property['status'] == 1) {
                    $i++;
                    ?>
                    <div id="ID-<?php echo $i; ?>" class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">

                                                                                                <!--                                                   <span class="label-featured label label-success">Featured</span>-->

                                        <div class="label-wrap label-right hide-on-list">
                                            <span class="label-status label-status-8 label label-default"><?php
                                                if ($property['type'] == 0) {
                                                    echo "For Buy";
                                                } else {
                                                    echo "For Rent";
                                                }
                                                ?></span>                    </div>

                                        <div class="price hide-on-list"><span class="item-price"><?php
                                                if ($property['type'] == 0) {
                                                    echo "OMR " . number_format_short($property['price']);
                                                } else {
                                                    echo "OMR " . number_format_short($property['price']) . "mo";
                                                }
                                                ?></span></div>
                                        <a class="hover-effect property-img-thumb " href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>">
                                            <img width="385" height="184" src="<?php
                                            if (!empty($property['images'])) {
                                                echo base_url('uploads/properties/images/') . $property['images']['0']['image'];
                                            } else {
                                                echo base_url('uploads/properties/images/default.jpg');
                                            }
                                            ?>" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" /></a>
                                        <ul class="actions">

                                            <li>
                                                <span class="add_fav" data-placement="top" data-toggle="tooltip"  data-original-title="<?php if ($property['is_fav'] == 0) {
                                                echo "Add Favorite";
                                            } else {
                                                echo "Remove Favorite";
                                            } ?>">
                                                    <i style="color:greenyellow; padding: 8px;" data-id="<?php echo $property['id']; ?>" is_fav="<?php echo $property['is_fav']; ?>" class="fa <?php if ($property['is_fav'] == 0) { ?> fa-heart-o <?php } else { ?> fa-heart <?php } ?> addfav"></i>
                                                </span>
                                            </li>

                                            <!--
                                                                                                        <li>
                                                                                                            <span data-toggle="tooltip" data-placement="top" title="(7) Photos">
                                                                                                                <i class="fa fa-camera"></i>
                                                                                                            </span>
                                                                                                        </li>
                                            
                                                                                                        <li>
                                                                                                            <span id="compare-link-416" class="compare-property" data-propid="416" data-toggle="tooltip" data-placement="top" title="Compare">
                                                                                                                <i class="fa fa-plus"></i>
                                                                                                            </span>
                                                                                                        </li>-->
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">

                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid">
                                            <span class="label-status label-status-8 label label-default"><?php
                                            if ($property['type'] == 0) {
                                                echo "For Buy";
                                            } else {
                                                echo "For Rent";
                                            }
                                            ?></span>                    </div>
                                        <h2 class="property-title"><a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>"><?php echo $property['location'] ?></a></h2>
                                        <address class="property-address"><?php echo $property['city']; ?></address>
                                        <small style="color:#999" class="property-address"><?php echo $property['property_type']; ?></small> 
                                    </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?>
                                            <span>Sq M: <?php echo $property['property_size'] ?></span></p>                    
                                        <p><?php echo $property['state'] ?></p>
                                    </div>


                                    <div class="info-row date hide-on-grid">

            <?php if (isset($property['agent_detail']['name'])) { ?>
                                            <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="<?php echo base_url('index.php/web_panel/Agents?xcvc=') . base64_encode($property['fk_agent_id']); ?>"><?php echo $property['agent_detail']['name'] . "  "; ?></a> </p>

            <?php } ?>
                                        <p style="margin-left:10px;"><i class="fa fa-phone"></i><?php echo $property['property_contact_no'] ?></p>
                                        <p><i class="fa fa-calendar"></i><?php echo $property['agent_detail']['posted_date'] ?></p>
                                    </div>

                                </div>
                                <div class="body-right table-cell hidden-gird-cell">

                                    <div class="info-row price"><span class="item-price"><?php
            if ($property['type'] == 0) {
                echo "OMR " . number_format_short($property['price']);
            } else {
                echo "OMR " . number_format_short($property['price']) . "/mo";
            }
            ?></span></div>

                                    <div class="info-row phone text-right">
                                        <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary">Details</a>
                                    </div>
                                </div>

                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><?php if($property['property_type_id'] != 1 && $property['property_type_id'] != 4 && $property['property_type_id'] != 10){ ?><span>Beds: <?php echo $property['beds'] ?></span><span>Baths: <?php echo $property['baths'] ?></span><?php } ?><span>Sq M: <?php echo $property['property_size'] ?></span></p><p><?php echo $property['state'] ?></p>

                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone">
                                            <a href="<?php echo base_url(); ?>index.php/web_panel/Properties/property_details?prjkl=<?php echo base64_encode($property['id']); ?>" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
        <?php }
    }
} else {
    echo "<h3>Couldn't find anything matching your search criteria!</h3>";
}
?>
    </div>
</div>