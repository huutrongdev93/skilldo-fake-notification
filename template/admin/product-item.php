<tr class="js_column js_product_item tr_<?php echo $item->id;?>" data-item="<?php echo htmlentities(json_encode($item));?>">
    <td class="check-column">
        <input class="icheck select" value="<?php echo $item->id;?>" type="checkbox" name="select[]" >
    </td>
    <td class="image column-image">
        <img src="<?php echo $item->image;?>" loading="lazy">
    </td>
    <td class="title column-title">
        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php echo $item->id;?>" style="color:#000;">
            <?php echo $item->title;?>
        </span>
    </td>
</tr>