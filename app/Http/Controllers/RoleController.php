<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Role::get();

        return view('role.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = Module::get();

        return view('role.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required'
        ]);

        DB::beginTransaction();
        try{

            $role = Role::create([

                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            if(isset($request->permission))
            {
                $permissions = $request->permission;
            }else{
                $permissions = [];
            }

            $aleardy_permisssions = DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

            if (!is_null($permissions)) {
                foreach ($permissions as $key => $value) {
                    $p = Permission::where('id', $value)->first();
                    if (!$role->hasPermissionTo($p)) {
                        $role->givePermissionTo($p);
                    }
                }
            }

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Saved Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();

        $module = Module::get();

        return view('role.edit',compact('role','module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required'
        ]);

        DB::beginTransaction();
        try{

            if(isset($request->permission))
            {
                $permissions = $request->permission;
            }else{
                $permissions = [];
            }

            $role = Role::find($id);

            Role::find($role->id)->update(['name' => $request->name]);

            $aleardy_permisssions = DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

            if (!is_null($permissions)) {
                foreach ($permissions as $key => $value) {
                    $p = Permission::where('id', $value)->first();
                    if (!$role->hasPermissionTo($p)) {
                        $role->givePermissionTo($p);
                    }
                }
            }

            DB::commit();

            return redirect()->back()->with('success',__('Your Data Updated Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
