<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        
        $jumlahBaris = 5;
        if(strlen($katakunci)){
            //$katakunci = $request->katakunci;
            $data = admin::where('name','like',"%$katakunci%")
            ->orWhere('email','like',"%$katakunci%")
            ->orWhere('phone_number','like',"%$katakunci%")
            ->paginate($jumlahBaris);
        }else{
            $data = admin::orderby('name','desc')->paginate($jumlahBaris);
        }
        
        return view('admin.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        Session::flash('password',$request->password);
        Session::flash('phone_number',$request->phone_number);

        $this->validate($request,[
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:'.admin::class,
            'password' => 'required',
            'phone_number' => 'required', 'numeric',
            'roles' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,


        ];
        $input = $request->all();
        $user = User::create($input);
        admin::create($input);
        //User::create($data);

        
        $user->assignRole($request->input('roles'));
        //event(new Registered($data));

        return redirect()->to('admin')->with('success','berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = admin::where('email',$id)->first();
        // $user = User::find($id);
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $data->roles->pluck('name','name')->all();
        //$user = admin::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.edit',compact('user','roles','userRole'))->with('data',$user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required', 'string', 'max:255',
            //'email' => 'required', 'string', 'email', 'max:255', 'unique:'.admin::class,
            'password' => 'required',
            'phone_number' => 'required', 'numeric',
            'roles' => 'required'
        ]);
        // $data = [
        //     'name' => $request->name,
        //     //'email' => $request->email,
        //     'password' => $request->password,
        //     'phone_number' => $request->phone_number,
        //     'roles' => $request->roles,

        // ];

        $input = $request->all();
        
        //$user = admin::where('email',$id)->update($data);
        $user = admin::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->to('admin')->with('success','berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        admin::where('email',$id)->delete();
        return redirect()->to('admin')->with('success','berhasil delete data');
    }
}
