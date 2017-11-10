<?php

namespace app\admin\controller;

use think\Controller;
use think\Exception;
use app\common\lib\Iauth;

class Login extends Base
{
    public function _initialize() {
    }
    public function index()
    {
        $isLogin = $this->isLogin();
        if($isLogin) {
            return $this->redirect('index/index');
        }else {
            // 如果后台用户已经登录了， 那么我们需要跳到后台页面
            return $this->fetch();
        }
    }
    /**
     *
     *清空session
     */
    public function  logout(){

        session(null, config('admin.session_user_scope'));
        $this->redirect('login/');
    }
    public function check()
    {
        #获取所有POST 请求
        if (request()->isPost()) {
            $data = input("post.");
            #获取`验证码的值
            if (!captcha_check($data['code'])) {
                return json(['code' => 500, 'message' => '验证码不正确']);

            } else {
                # $date['password'] =sha1( $data['password']);
                $date['user_name'] = $data['username'];
                try {
                    $user = \model("Adminuser")->chaxun($date);
                    //Iauth::setPassword($data['password']) 密码验证类。
                    if (!$user['status'] == config('code.status_normal')) {
                        return json("用户不存在");

                    }
                    if (!$user['password'] == Iauth::setPassword($data['password'])) {

                        return json("密码错误");

                    }


                    $updata = [
                        'lasst_login_time' => time(),
                        'last_login_ip' => request()->ip(),
                    ];
                    $da['id'] = $user['id'];
                    $sta = \model("Adminuser")->upda($updata, $da);
                    #  return json(['data'=>$data,'code'=>200 ,'message'=>'操作完成']);
                } catch (Exception $e) {
                    $this->error($e->getMessage());
                }
                session('adminuser', $user, config('admin.session_user_scope'));
                $this->success('登陆成功', 'index/index', '', '0');
            }

        } else {


            return json(['code' => 400, 'mesage' => '你的请求类型错误']);

        }


    }

}