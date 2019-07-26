<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/12
 * Time: 11:23
 */



/** 前面相加等于后面一项 递归
 * @param $n
 * @return int
 */
function getN($n)
{
    if ($n <= 2) {
        return 1;
    } else {
        $s = getN($n - 1) + getN($n - 2);
        return $s;
    }
}

/**前面相加等于后面一项 临时变量存储
 * @param $n
 * @return int
 */
function getN2($n)
{
    if ($n <= 2) {
        return 1;
    }
    $a = 1;
    $s = 1;
    for ($i = 0; $i < $n - 2; $i++) {
        $temp = $s;
        $s = $a + $s;
        $a = $temp;
    }
    return $s;
}

/**前面相加等于后面一项 一个数组存储
 * @param $n
 * @return mixed
 */
function getN3($n)
{
    $arr = [];
    $arr[0] = 0;
    $arr[1] = 1;
    $arr[2] = 1;
    for ($i = 3; $i <= $n; $i++) {
        $arr[$i] = $arr[$i - 1] + $arr[$i - 2];
    }
    return $arr[$n];
}

/**
 * 给一个字符串 “qweqwasdqwed”
 * 求最大不重复字符串的长度
 * f($s) => int $n;
 */
function getLengthUn($string)
{
    $strArray = str_split($string, 1);
    $arr = array();
    $arrLength = array();
    $length = count($strArray);
    $arr[0] = $strArray[0];
    $arrLength[0] = 1;
    $tempMaxLength = 0;
    for ($i = 1; $i < $length; $i++) {
        if (!in_array($strArray[$i], $arr)) {
            $arrLength[$i] = $arrLength[$i - 1] + 1;
            if ($arrLength[$i] >= $tempMaxLength) {
                $tempMaxLength = $arrLength[$i];
            }
            $arr[] = $strArray[$i];
        } else {
            $arr = array();
            $arr[] = $strArray[$i];
            $arrLength[$i] = 1;
        }
    }
    return $tempMaxLength;
}


/**获取不相邻相加的最大值
 * @param $nums
 * @return mixed|string
 */
function getMax($nums)
{
    $arr = array();
    $length = count($nums);
    if ($length == 0) {
        return 0;
    }
    $arr[0] = 0;
    $arr[0] = $nums[0];
    if ($length >= 2) {
        $arr[1] = max($nums[0], $nums[1]);
        for ($i = 2; $i < $length; $i++) {
            $arr[$i] = max($nums[$i] + $arr[$i - 2], $arr[$i - 1]);
        }
    }

    return $arr[$i - 1];
}

function getT($m,$n){
  if($m==0&&$n==0){
      return 0;
  }else if($m==0||$n==0){
      return 1;
  }
  return getT($m,$n-1)+getT($m-1,$n);
}

/**
 * @param $m
 * @param $n
 * @return int
 * 只能向下或者向右移动方块题目的有多少种路径（递归）
 */

function getAllLine($m,$n){
 if($m==1||$n==1){
     return 1;
 }
    return getAllLine($m-1,$n)+getAllLine($m,$n-1);
}


/**能向下或者向右移动方块题目的有多少种路径（动态规划）
 * @param $m
 * @param $n
 * @return int
 */
function getAllLine2($m,$n){
    $array=array();
    if($m==0||$n==0){
        return 0;
    }
    for($i=0;$i<$m;$i++){
        for($j=0;$j<$n;$j++){
            if($i==0){
                $array[0][$j]=1;
            }
            if($j==0){
                $array[$i][0]=1;
            }
            if($i!=0&&$j!=0){
                $array[$i][$j]=$array[$i-1][$j]+$array[$i][$j-1];
            }
        }
    }
    return $array[$m-1][$n-1];
}
echo getAllLine2(23,23);

/**走格子那条路径的值最小
 * @param $nums
 * @return mixed
 */
function getMin($nums){
    $x=count($nums);
    $y=count($nums[0]);
    $arr=array();
    $arr[0][0]=$nums[0][0];
    for($i=0;$i<$x;$i++){
        for($j=0;$j<$y;$j++){
            if($j==0&&$i>0){
                $arr[$i][0]=$nums[$i][0]+$arr[$i-1][0];
            }
            if($i==0&&$j>0){
                $arr[0][$j]=$nums[0][$j]+$arr[0][$j-1];
            }else if($i!=0&&$j!=0){
                $arr[$i][$j]=min($nums[$i][$j]+$arr[$i-1][$j],$nums[$i][$j]+$arr[$i][$j-1]);
            }
        }
    }
    return $arr[$x-1][$y-1];
}

function getLineHaveObstacle($nums){
   $arr=array();
   $x=count($nums);
   $y=count($nums[0]);
   $arr[0][0]=$nums[0][0];
    for($i=0;$i<$x;$i++){
        for($j=0;$j<$y;$j++){
            if($i==0){
                if($nums[0][$j]==0){
                    $arr[0][$j]=1;
                }else{
                    $arr[0][$j]=0;
                }
            }
            if($j==0){
                if($nums[$i][0]==0){
                    $arr[$i][0]=1;
                }else{
                    $arr[$i][0]=0;
                }

            }else if($i>0&&$j>0){
                if($nums[$i][$j]==0){
                    $arr[$i][$j]=$arr[$i-1][$j]+$arr[$i][$j-1];
                }
                else{
                    $arr[$i][$j]=0;
                }
            }
        }
    }
    return $arr[$x-1][$y-1];
}


echo getN(6);
echo '</br>';
echo getN3(6);
echo '</br>';
echo getMax([1, 4, 7, 5, 9, 6, 8]);
echo '<br>';
echo getLengthUn('qweqwasdqwedsalhgf');
echo '<br>';
echo date('y/m/d h:i:s');
echo '<br>';
echo getAllLine2(23,12);
echo '<br>';
echo date('y/m/d h:i:s');
echo '<br>';
echo date('y/m/d h:i:s');
echo '<br>';
echo getMin([
    [3,4,1,2,1],
    [1,2,3,3,3],
    [5,4,1,3,2]
]);
echo '<br>';
echo getLineHaveObstacle([
    [0,0,0,0],
    [0,1,0,0],
    [0,0,1,0],
    [0,0,0,0]
]);