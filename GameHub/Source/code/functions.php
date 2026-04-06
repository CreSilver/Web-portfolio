<?php
function randFromLastAndMaxNum($last_num, int $max) : int{
    $num = $last_num ?? 0;
    if($max>1){
        do{
            $new_num = rand(1, $max);
        }while($num == $new_num);
    }else{return 1;}
    return $new_num;
};




?>