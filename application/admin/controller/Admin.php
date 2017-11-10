<?php
/**
 * Created by PhpStorm.
 * User: sugar
 * Date: 17-11-2
 * Time: 上午11:19
 */

namespace app\admin\controller;

use app\common\lib\Iauth;
use think\Controller;

class  Admin extends Base
{

    public function add()
    {

        if (request()->isPost()) {
            $arr = input("post.");
            # var_dump($arr);
            #验证~参数的合法性
            $validate = validate('AdminUser');
            if (!$validate->check($arr)) {
                $this->error($validate->getError());
            }
        //password_pre_halt 全局配置 路径extra/app sha1 加密
            $data['password'] = Iauth::setPassword($arr['password']);
            $data['user_name'] = $arr['username'];
            $data['status'] = 1;
            $status = "";
            try {
                $status = \model("Adminuser")->add($data);
            } catch (\Exception $e) {
                echo $e->getMessage();

            }
            if ($status) {
                $this->success('id=' . $status . '的用户新增成功');
            } else {
                $this->error('error');
            }


        } else {

            return $this->fetch();

        }


    }


}