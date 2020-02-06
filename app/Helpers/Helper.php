<?php

    function menuMultiLevel($data, $parent, $str = '', $id = 0){
        if($parent == 0 ){
            echo '<option value="" >Parent path</option>';
        }
        foreach($data as $item){
            if($item->parent_id == $parent){
                $selectd = $id === $item->id ? 'selected' : '';
                echo '<option value="'.$item->id.'" '.$selectd.'>'.$str.$item->name.'</option>';
                menuMultiLevel($data, $item->id,$str.'--', $id);
            }
        }
    }

    function numIndex($page = 1, $index){

        return $page == 1 ? $index + 1 : ($page * 10) + ($index + 1) ;
    }

?>
