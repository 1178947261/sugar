<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 17/7/27
 * Time: 下午5:57
 */

namespace app\common\model;

use think\Model;

class Base extends Model
{

    protected $autoWriteTimestamp = true;

    /**
     * 新增
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        if (!is_array($data)) {
            exception('传递数据不合法');
        }
        #限制存入的数据的参数 过滤非数据库字段的数据
        $this->allowField(true)->save($data);

        return $this->id;
    }

    public function chaxun($data)
    {

        if (!is_array($data)) {

            exception('你传递的参数不合法');

        }
        $user = $this->get($data);
        return $user;

    }

    public function upda($updata, $data)
    {

        if (!is_array($data)) {

            exception('你传递的参数不合法');


        }
        $user = $this->where($data)->update($updata);
        return $user;

    }

    public function dede($dedata)
    {

        if (!is_array($dedata)) {

            exception('你传递的参数不合法');


        }


    }

}