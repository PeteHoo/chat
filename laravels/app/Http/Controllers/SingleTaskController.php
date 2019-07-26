<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/15
 * Time: 8:44
 */

namespace App\Http\Controllers;

require_once('TestController.php');
/**  单例模式
 * Class SingleTaskController
 * @package App\Http\Controllers
 */
class SingleTaskController extends Controller
{   private $name=null;
    private static $instance=null;
    private function __construct($name='PE')
    {
        $this->name=$name;
    }
    public static function Instance(){
        if(self::$instance==null){
           self::$instance=new self();
        }
        return self::$instance;

    }
    //要将clone私有化
    private function __clone(){

    }
}