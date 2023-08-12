<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = produk::orderby('kode','asc')->paginate(5);
        return view('produk.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('kode',$request->kode);
        Session::flash('nama',$request->nama);
        Session::flash('keterangan',$request->keterangan);
        Session::flash('harga',$request->harga);

        $request->validate([
            'kode' => 'required', 'string', 'max:255', 'unique:'.produk::class,
            'nama' => 'required', 'string', 'max:255', 
            'keterangan' => 'required', 'string',
            'harga' => 'required', 'numeric'
        ]);
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga

        ];
        produk::create($data);
        //event(new Registered($data));
        return redirect()->to('produk')->with('success','berhasil tambah data');
        
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
        $data = produk::where('kode',$id)->first();
        return view('produk.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'kode' => 'required', 'string', 'max:255', 'unique:'.produk::class,
            'nama' => 'required', 'string', 'max:255', 
            'keterangan' => 'required', 'string',
            'harga' => 'required', 'numeric'
        ]);
        $data = [
            // 'kode' => $request->kode,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga

        ];
        produk::where('kode', $id)->update($data);
        //event(new Registered($data));
        return redirect()->to('produk')->with('success','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produk::where('kode',$id)->delete();
        return redirect()->to('produk')->with('success','berhasil delete data');
    }
}
