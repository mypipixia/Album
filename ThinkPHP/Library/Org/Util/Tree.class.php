<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/12 0012
 * Time: 下午 5:19
 */

namespace Org\Util;


class Tree
{
    static public $treelist = array();
    public static function creates($data,$pid=0){
        foreach ($data as $i=>$v){
            if ($v['pid'] == $pid){
                self::$treelist[] = $v;
                unset($data[$i]);
                self::creates($data,$v['id']);
            }
        }
        return self::$treelist;
    }
}