<tr class="js_column js_product_item tr_{{$item->id}}" data-item="{!! htmlentities(json_encode($item)) !!}">
    <td class="check-column">
        <input class="icheck select" value="{!! $item->id !!}" type="checkbox" name="select[]" >
    </td>
    <td class="image column-image">
        <img src="{!! $item->image !!}" loading="lazy">
    </td>
    <td class="title column-title">
        <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{$item->id}}" style="color:#000;">
            {!! $item->title !!}
        </span>
    </td>
</tr>