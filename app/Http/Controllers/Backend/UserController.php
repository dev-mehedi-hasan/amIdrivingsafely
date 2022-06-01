<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\User;
use Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('backend.pages.user-management.user-list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('backend.pages.user-management.add-new',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
        ]);

        $lastuser = User::latest()->first();
        if($lastuser == null){
            User::truncate();
        }
        if($request->has('photo') && $request->photo != null){
            request()->validate([
                'photo' => 'mimes:jpg,jpeg,png|max:10240'
            ]);

            if($lastuser != null){
                $prefix = "RPU". '-' . ($lastuser->id + 1);
            }
            else{
                $prefix = "RPU". '-' . 1;
            }
            $extension = $request->photo->extension();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        if($request->has('phone') && $request->phone != null){
            request()->validate([
                'phone' => 'regex:/(01)[0-9]{9}/|max:11|unique:users,phone'
            ]);
            $user->phone = $request->phone;
        }
        if($request->has('photo') && $request->photo != null){
            $fileName = $prefix.'.'.$extension;
            $resize = Image::make($request->photo->getRealPath());
            $resize->resize(125, 125, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/img/backend/avatar/'.$fileName));
            $user->photo = 'assets/img/backend/avatar/'.$fileName;
        }

        $user->assignRole([$request->role]);
        
        if($user->save()){
            return redirect()->back()->with('user-create-success', 'User has been created successfully and the default password is 123456');
        }
        else{
            return redirect()->back()->with('user-create-failed', 'Something went wrong');
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
        $user = user::findOrFail($id);
        $roles = Role::latest()->get();
        return view('backend.pages.user-management.user-edit',compact('user', 'roles'));
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
        $user = User::findOrFail($id);
        request()->validate([
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id
        ]);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->has('phone') && $request->phone != null){
            request()->validate([
                'phone' => 'regex:/(01)[0-9]{9}/|max:11|unique:users,phone,'.$user->id
            ]);
            $user->phone = $request->phone;
        }

        if($request->has('photo') && $request->photo != null){
            request()->validate([
                'photo' => 'mimes:jpg,jpeg,png|max:10240'
            ]);

            $prefix = "RPU". '-' . ($user->id);
            $extension = $request->photo->extension();
            $fileName = $prefix.'.'.$extension;
            $resize = Image::make($request->photo->getRealPath());
            $resize->resize(125, 125, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('assets/img/backend/avatar/'.$fileName));
            $user->photo = 'assets/img/backend/avatar/'.$fileName;
        }
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole([$request->role]);
        if($user->save()){
            return redirect()->back()->with('user-update-success', 'User information has been updated successfully');
        }
        else{
            return redirect()->back()->with('user-update-failed', 'Something went wrong');
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
        $user = User::findOrFail($id);
        if($user->delete()){
            return redirect()->back()->with('user-delete-success', 'User has been deleted successfully');
        }
        else{
            return redirect()->back()->with('user-delete-failed', 'Something went wrong');
        }
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::id());
        return view('backend.pages.user-management.profile', compact('user'));
    }

}
