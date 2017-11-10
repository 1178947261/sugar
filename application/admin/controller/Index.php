<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Base
{
    public function index()
    {
      #  halt(session("adminuser",'',config('admin.session_user_scope')));
        return $this->fetch();
    }

    public  function  welcome(){



        return "~~~~(>_<)~~~~admin～～";
      #  return $this->fetch("");
    }

}
