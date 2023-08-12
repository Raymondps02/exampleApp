<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

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
            $data = admin::where('name','like',"%katakunci%")
            ->orWhere('email','like',"%katakunci%")
            ->orWhere('phone_number','like',"%katakunci%")
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
        return view('admin.create');
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

        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:'.admin::class,
            'password' => 'required',
            'phone_number' => 'required', 'numeric'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number

        ];
        admin::create($data);
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
        $data = admin::where('email',$id)->first();
        return view('admin.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            //'email' => 'required', 'string', 'email', 'max:255', 'unique:'.admin::class,
            'password' => 'required',
            'phone_number' => 'required', 'numeric'
        ]);
        $data = [
            'name' => $request->name,
            //'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number

        ];
        admin::where('email',$id)->update($data);
        //event(new Registered($data));
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
