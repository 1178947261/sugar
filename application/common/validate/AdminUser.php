<?php
/**
 * Created by PhpStorm.
 * User: sugar
 * Date: 17-11-2
 * Time: 下午1:49
 * 规则·验证
 */
namespace  app\common\validate;
use think\Validate;
class AdminUser extends Validate {
    #管理员admin~~的规则
    #规则数组
    protected $rule = [
        'username' => 'require|max:20',
        'password' => 'require|max:20',
    ];
}