<?php
/**
 * 基础控制器
 *
 * 基础控制器
 * @author      moqian<zxj198468@gmail.com>
 * @date  	     2018/07/1
 * @version    1.0
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * 返回自定义标准json格式
     *
     * @param $lang
     * @param $res
     * @return array
     */
    protected function resultJson($lang,$res)
    {
        return ['status'=>$res,'msg'=>strstr($lang,'cfg') ? trans($lang) : $lang];
    }
}
