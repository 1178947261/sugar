<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9 0009
 * Time: 11:46
 */

namespace  app\common\validate;
use think\Validate;
class News extends Validate {
    #管理员admin~~的规则
    #规则数组
    protected $rule = [
        'name'  =>  'require|max:25|token',
        'image_url'=>'image',
    ];
}
