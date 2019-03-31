<?php
/**
 * 角色管理
 *
 * @author      moqian<zxj198468@gmail.com>
 * @date  	     2018/07/1
 * @version    1.0
 */
namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\Role;
use App\Service\DataService;
use App\Http\Requests\StoreRequest;
use App\Models\Log;
class RoleController extends BaseController
{
    /**
     * 角色列表
     */
    public function index(){
        return view('roles.list',['list'=>Role::get()->toArray()]);
    }
    /**
     * 角色编辑
     */
    public function edit($id=0)
    {
        $permission = Permission::get()->toArray();
        $delId = explode(',',config('admin')['permission_table_cannot_manage_ids']);
        foreach ($permission as $k => $v){
            if(in_array($v['id'],$delId))unset($permission[$k]);
        }
        $info = $id?Role::find($id):[];
        return view('roles.edit', ['id'=>$id,'info'=>$info,'permission'=>$permission]);
    }
    /**
     * 角色增加保存
     */
    public function store(StoreRequest $request){
        $model = new Role();
        $role = DataService::handleDate($model,$request->all(),'roles-add_or_update');
        if($role['status']==1)Log::addLogs(trans('cfg.roles.handle_role').trans('cfg.common.success'),'/roles/story');
        else Log::addLogs(trans('cfg.roles.handle_role').trans('cfg.common.fail'),'/roles/destroy');
        return $role;
    }
    /**
     * 角色删除
     */
    public function destroy($id)
    {
        if (is_config_id($id, "admin.role_table_cannot_manage_ids", false))return $this->resultJson('cfg.roles.notdel', 0);
        $model = new Role();
        $role = DataService::handleDate($model,['id'=>$id],'roles-delete');
        if($role['status']==1)Log::addLogs(trans('cfg.roles.del_role').trans('cfg.common.success'),'/roles/destroy/'.$id);
        else Log::addLogs(trans('cfg.roles.del_role').trans('cfg.menus.fail'),'/roles/destroy/'.$id);
        return $role;
    }
}
