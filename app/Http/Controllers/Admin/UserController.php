<?php

namespace Agrinesia\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Agrinesia\Http\Controllers\Controller;
use Agrinesia\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class UserController extends Controller
{
    public function userIndex()
    {
        $users = User::orderBy('name','asc')
                        ->get();
        $roles = Role::pluck('name','name')->all();
        
        return view('back.pages.users',compact('users','roles'));
    }

    public function userProfile() 
    {
        $user = Auth::user();
        $locations = Auth::user()->warehouses;
        return view('apps.pages.profile',compact('user','locations'));
    }

    public function userStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'division_id' => 'required',
        ]);

        $input = $request->all();
        $locations = $request->warehouse_name;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        foreach($locations as $index=>$location)
        {
            $warehouses = UserWarehouse::create([
                'user_id' => $user->id,
                'warehouse_name' => $location,
            ]);
        }
        $log = 'User '.($user->name).' Berhasil disimpan';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Berhasil disimpan',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    public function userShow($id)
    {
        $user = User::find($id);
        $locations = User::find($id)->warehouses;
        return view('apps.show.users',compact('user','locations'))->renderSections()['content'];
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $ukers = Division::pluck('name','id')->toArray();
        $userLocations = UserWarehouse::where('user_id',$id)->get();
        
        return view('apps.edit.users',compact('user','roles','userRole','ukers','userLocations'))->renderSections()['content'];
    }

    public function userUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'division_id' => 'required',
            'warehouse_name' => 'required',
        ]);

        $input = $request->all(); 
        $locations = $request->warehouse_name;
        foreach($locations as $index=>$location)
        {
            $userLoc = UserWarehouse::updateOrCreate([
                'user_id' => $id,
                'warehouse_name' => $location,
            ],[
                'warehouse_name' => $location,
            ]);
            
        }
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        
        DB::table('model_has_roles')->where('model_id',$id)->delete();        
        $user->assignRole($request->input('roles'));
        
        $log = 'User '.($user->name).' Berhasil diubah';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = Auth::user();
        $user->update($input);

        $log = 'Password User '.($user->name).' Berhasil diubah';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Password User '.($user->name).' Berhasil diubah',
            'alert-type' => 'success'
        );
        return back()
            ->with($notification);
    }

    public function userSuspend($id)
    {
        $input = ['status_id' => '82e9ec8c-5a82-4009-ba2f-ab620eeaa71a'];
        $user = User::find($id);
        $user->update($input);
        
        $log = 'User '.($user->name).' Suspended';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Suspended',
            'alert-type' => 'success'
        );
        return redirect()->route('user.index')
                        ->with($notification);
    }

    public function userDestroy($id)
    {
        $user = User::find($id);
        
        $log = 'User '.($user->name).' Dihapus';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'User '.($user->name).' Dihapus',
            'alert-type' => 'success'
        );
        $user->delete();
        return redirect()->route('user.index')
                        ->with($notification);
    }

    public function roleIndex(Request $request)
    {
        $permission = Permission::get();
        $roles = Role::orderBy('id','ASC')->get();
        return view('apps.pages.roles',compact('roles','permission'));
    } 

    public function roleCreate()
    {
        return view('apps.input.roles');
    }

    public function roleStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        $log = 'Hak Akses '.($role->name).' berhasil disimpan';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Hak Akses '.($role->name).' berhasil disimpan',
            'alert-type' => 'success'
        ); 

        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function roleShow($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('apps.show.roles',compact('role','rolePermissions'))->renderSections()['content'];
    }

    public function roleEdit($id)
    {
        $data = Role::find($id);
        $permission = Permission::get();
        $roles = Role::join('role_has_permissions','role_has_permissions.role_id','=','roles.id')
                       ->where('roles.id',$id)
                       ->get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            /*->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')*/
            ->get();
        
        return view('apps.edit.roles',compact('data','rolePermissions','roles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));
        $log = 'Hak Akses '.($role->name).' berhasil diubah';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Hak Akses '.($role->name).' berhasil diubah',
            'alert-type' => 'success'
        ); 

        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function roleDestroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        $log = 'Hak Akses '.($role->name).' berhasil disimpan';
         \LogActivity::addToLog($log);
        $notification = array (
            'message' => 'Hak Akses '.($role->name).' berhasil disimpan',
            'alert-type' => 'success'
        ); 
        return redirect()->route('role.index')
                        ->with($notification);
    }

    public function logIndex()
    {
        $logs = \LogActivity::logActivityLists();
        return view('back.pages.logActivity',compact('logs'));
    }
}
