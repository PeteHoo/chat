<?php
interface logger
{
    public function executr($message);
}

class dingLog implements logger
{
    public function executr($message)
    {
        echo "this is ding ding log".$message;
    }
}

class fileLog implements logger
{
    public function executr($message)
    {

        echo "this is file log".$message;
    }
}

class  user
{
    protected $log;

    public function __construct(logger $logger)
    {
        $this->log  =  $logger;
    }
    public function show(){
        $this->log->executr('error');
    }
}

class SimpleContainer
{
    protected static $container = [];
    static public function  bind($name,Callable $resolver){
        static::$container[$name] = $resolver;
    }
    public  static function make($name)
    {

        if(isset(static::$container[$name])){
            $resolver =  static ::$container[$name];
            return $resolver();
        }

        throw new Exception("没有绑定");
    }
}

//绑定
SimpleContainer::bind(logger::class,function(){
    return  new fileLog();
});
$a = new user(SimpleContainer::make(logger::class));
$a -> show();
//$a =  new user(SimpleContainer::make('file'));
//$a->show();

// $log1 =  new user(new fileLog());
//$log1->show();
//$log2 =  new user(new dingLog());
//$log2->show();