<?php

function selectMultiLevel($data, $parent, $str = '', $id = 0)
{
    if($parent == 0 ){
        echo '<option value="" >'.trans('admin.btn.pathParent').'</option>';
    }
    foreach($data as $item){
        if($item->parent_id == $parent){
            $selectd = $id === $item->id ? 'selected' : '';
            echo '<option value="'.$item->id.'" '.$selectd.'>'.$str.$item->name.'</option>';
            selectMultiLevel($data, $item->id,$str.'--', $id);
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

function showOptionTag($product){
    if(isset($product->option)){
        $options = $product->option->options;
        foreach ($options as $opt => $v) {
            if($opt == 'discount'){
                echo '<span class="sale">-'.\Config::get('settings.discountPercent').'%</span>';
            }else{
                echo '<span class="'.$opt.'">'.strtoupper($opt).'</span>';
            }
        }
    }
}

function discount($product)
{
    echo '$ '.$product->price.'&nbsp;';
    if(isset($product->option)) {
        if(isset($product->option->options['sale']))
        {
            $discount = \Config::get('settings.discountPercent');
            echo '<del class="product-old-price">$ '.($product->price - ($product->price  * $discount / 100)).'</del>';
        }
    }
}

function getSubTotalCart()
{
    if(session()->get('cart') == null)

        return 0;
    $total = 0;
    foreach(session()->get('cart') as $key => $val){
        $total += $val['price'] * $val['qty'];
    }

    return $total;
}

function checkeBrand($id_item){
    if(isset($_GET['q']['category_ids'])){
        foreach ($_GET['q']['category_ids'] as $id){
            if($id == $id_item)
                echo 'checked';
        }
    }
}

?>
