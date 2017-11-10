<?php
namespace app\admin\controller;

use Qiniu\Auth;
use app\common\lib\Upload;

/**
 * 后台图片上传相关逻辑
 * Class Image
 * @package app\admin\controller
 */
class Image extends Base
{
    /**
     * 图片上传
     */
    public function uploads() {

        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                 #   echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $data= $info->getSaveName();
                echo json_encode(['status' => 0, 'message' => $data]);
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
             #   echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    /**
     * 七牛图片上传
     *
     * http://otwueljs0.bkt.clouddn.com/2017/07/30d35201707310115086587.jpg
     * http://otwueljs0.bkt.clouddn.com/2017/07/30d35201707310115086587.jpg
     */
    public  function  upload(){
        $ms = Upload::image();
        echo json_encode(['status' => 0, 'message' => $ms]);



    }


}
