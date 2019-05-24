<?php
/**
 * Created by PhpStorm.
 * User: YiFeng
 * Date: 2019/4/19
 * Time: 16:00
 */

namespace App\Libs;


class Spiderbot
{
    protected static $instance =null;
    private function __construct()
    {
        $this->savespider();
    }
    //统一入口
    public static function getInstance(){
        if(self::$instance instanceof self){
            return self::$instance;
        }
        return new self();
    }
    //入库
    private function savespider(){
        $spider = $this->checkspider();
        if(in_array($spider,['Baiduspider','Googlebot','Sogou','360Spider'])){
//           $spiderModel = new \App\Spiderbot();
//            $spiderModel->spidername =$spider;
//            $spiderModel->save();
            \App\Model\Spiderbot::updateOrCreate(
                ['spidername' => $spider],
                ['updated_at'=>time()]
            );
        }
    }

    //判断蜘蛛
    private function checkspider(){
        $httpuser = $_SERVER['HTTP_USER_AGENT'];
        if(stripos($httpuser,'Baiduspider')){
            return "Baiduspider";
        }
        if(stripos($httpuser,'Googlebot')){
            return "Googlebot";
        }
        if(stripos($httpuser,'Sogou')){
            return "Sogou";
        }
        if(stripos($httpuser,'360Spider')){
            return "360Spider";
        }
//        if(stripos($httpuser,'Safari')){
//            return "Baiduspider";
//        }
    }

}