<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/12
 * Time: 15:16
 */

function getMax($max,$result)
{
    $temp = $max[0];
    $tempIndex = 0;
    for ($i = 1; $i < count($max); $i++) {
        if ($temp < $max[$i]) {
            $temp = $max[$i];
            $tempIndex = $i;
        }
    }
    $result=$temp+$result;
    $max[$tempIndex]=0;
    if ($tempIndex > 1) {
        $max[$tempIndex - 1]=0;
    }
    if ($tempIndex + 1 <= count($max)) {
     $max[$tempIndex + 1]=0;
    }
    if(count(array_filter($max))>0){
       return getMax($max,$result);
    }else{
        return $result;
    }
}
echo getMax([4,1,1,9,1,2],0);