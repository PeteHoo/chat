<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/9
 * Time: 13:21
 */

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function test()
    {
        $array=[1,2,3,4,5];
//        array_splice($array,0,1);
        reset($array);
  $array2=new \SplFixedArray(5);
  $array2[0]='cat';
  $array2[3]='dog';
        return json_encode($array2);
    }

   public function mergeTwoLists($l1, $l2) {


    }


}