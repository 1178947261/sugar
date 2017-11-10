<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/4 0004
 * Time: 10:53
 *
 * 自定义模块路由
 */

namespace app\admin\controller;
use think\Route;

class routes
{
    public function __construct()
    {

        return Route::rule('admins/', 'admin/login/index');

    }
}