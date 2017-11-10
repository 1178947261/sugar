<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/3 0003
 * Time: 15:12
 */

/**
 *
 * AUTH 相关
 * 权限类~~密码
 */

namespace app\common\lib;
class  Iauth
{

    /**
     * @param $data
     *密码加密~
     */
    public static function setPassword($data)
    {


        return sha1($data . config('app.password_pre_halt'));

    }


}