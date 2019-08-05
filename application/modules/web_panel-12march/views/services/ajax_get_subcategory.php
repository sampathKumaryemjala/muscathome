<?php //pre($subcategories); die ?>
<?php if($subcategories){foreach ($subcategories as $subcategory) { ?>
    <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
    <?php if(empty($subcategory['id'])){  ?>
        <option>Select Sub category</option>
<?php }}}else{?>
        <option value="0">Select Sub category</option>
<?php } ?>

    

