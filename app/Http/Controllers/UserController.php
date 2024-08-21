<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*','roles.name as role')->get();

        return view('user.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = Role::get();

        return view('user.create',compact('role'));
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

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation'
        ]);

        DB::beginTransaction();
        try{

            $password = bcrypt($request->password);

            $user = User::create([

                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'campus_id' => $request->campus,
                'department_id' => $request->department
            ]);

            $user->assignRole($request->role);

            DB::commit();

            return redirect()->route('user.index')->with('success',__('User Added Successfully'));

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
        if(auth()->user()->hasRole('super admin')) {

            $role = Role::get();
        } else {

            $role = Role::where('name', '!=', 'super admin')->where('name', '!=', 'admin')->get();
        }

        $user = User::where('id', $id)->first();

        return view('user.edit',compact('user', 'role'));
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

            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('id', $id)->first();

        if(!$user) {
            return redirect()->back()->with('danger', 'User Not Found');
        }

        if(isset($request->password) && isset($request->password_confirmation)) {
            $this->validate($request, [

                'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation'
            ]);

            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }

        DB::beginTransaction();
        try{

            User::where('id', $user->id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);

            $user->assignRole($request->role);

            DB::commit();

            return redirect()->route('user.index')->with('success',__('User Updated Successfully'));

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
    public function destroy(Request $request)
    {
        $this->validate($request, [

            'user_id' => 'required'
        ]);

        $user = User::where('id', $request->user_id)->first();

        if(!$user) {
            return redirect()->back()->with('danger', 'User Not Found');
        }

        DB::beginTransaction();
        try{

            User::where('id', $user->id)->delete();

            DB::commit();

            return redirect()->route('user.index')->with('success',__('User Deleted Successfully'));

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('Something went Wrong'));

        }
    }
}
