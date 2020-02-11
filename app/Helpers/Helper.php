<?php

function menuMultiLevel($data, $parent, $str = '', $id = 0)
{
    if($parent == 0 ){
        echo '<option value="" >'.trans('admin.btn.pathParent').'</option>';
    }
    foreach($data as $item){
        if($item->parent_id == $parent){
            $selectd = $id === $item->id ? 'selected' : '';
            echo '<option value="'.$item->id.'" '.$selectd.'>'.$str.$item->name.'</option>';
            menuMultiLevel($data, $item->id,$str.'--', $id);
        }
    }
}

function numIndex($page = 1, $index)
{
    return $page == 1 ? $index + 1 : (($page - 1) * \Config::get('settings.perPage')) + ($index + 1) ;
}

function checkedOption($key, $product)
{
    if($product && $product->has('option')->first() && array_key_exists($key, $product->option->options))
        return 'checked';
}

function selectedInput($op1, $op2)
{
    if($op1 == $op2)

        return 'selected';
    if($op2 == null)

    return '';
}

?>
