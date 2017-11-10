<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6 0006
 * Time: 11:39
 */
namespace app\admin\controller;

class  News extends Base
{


    public function add() {





        if(request()->isPost()) {
            $data = input('post.');

           return $data;


//            $data = input('post.');
//
//            //入库操作
//            try {
//                $id = model('News')->add($data);
//            }catch (\Exception $e) {
//                return $this->result('', 0, '新增失败');
//            }
//
//            if($id) {
//                return $this->result(['jump_url' => url('news/index')], 1, 'OK');
//            } else {
//                return $this->result('', 0, '新增失败');
//            }
        }else {
            return $this->fetch('', [
                'cats' => config('cat.lists')
            ]);
        }
    }

    }