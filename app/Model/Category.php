<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 获取分类列表
     */
   public static function getcates(){
        $cates = self::OrderBy("sort","Desc")->OrderBy("id","Desc")->get();
//        $cates = (new self())->makecates($cates);
        $cates = self::makecates($cates);
        return $cates;
    }

    /**
     * 组织分类数据
     */
    private static function makecates($data,$pid=0,$level=0){
        $arr = [];
        foreach ($data as $item){
            if($item->pid==$pid){
                $item->level = $level;
                $arr[]=$item;
                $arr_tmp = self::makecates($data,$item->id,$level+1);
                $arr = array_merge($arr,$arr_tmp);
            }
        }
        return $arr;
    }

    /**
     * 取指定分类所有的子分类
     * @param $id
     */
    public static function getChildsIds($id){
        $ids[] =$id;
        $data = self::all();
        $childs =  self::makecates($data,$id);
        foreach ($childs as $item){
            $ids[] =$item->id;
        }
        return $ids;
    }

}