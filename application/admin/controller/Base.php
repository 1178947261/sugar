<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6 0006
 * Time: 10:22
 */

namespace app\admin\controller;

use think\Controller;

/*
 *
 *后台基础类库~
 */

class Base extends Controller{


    /**
     *
     */
    public function _initialize()
    {
        $is_login = $this->isLogin();
        if(!$this->isLogin()){

            return $this->redirect('login/');

        }

    #    parent::_initialize(); // TODO: Change the autogenerated stub
    }

    public  function  isLogin(){

            $user = session("adminuser",'',config('admin.session_user_scope'));
            if($user && $user->id){


                return true;
            }else{

                return false;
            }

    }

}