<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeKamar;

class TipeKamarBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipekamars = TipeKamar::latest()->paginate(5);
        return view('backend.tipeKamar.index',['tipekamars'=>$tipekamars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tipeKamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama' => 'required|unique:tipe_kamars',
            'fasilitas' => 'required',
            'harga' => 'required',
        ]);

        TipeKamar::create($validateData);
        return redirect('/tipekamar-backend')->with('pesan','Data Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.tipekamar.edit',['tipekamars'=>TipeKamar::find($id)]);
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
        $validateData=$request->validate([
            'nama'=>'required',
            'fasilitas' => 'required',
            'harga' => 'required',
        ]);

        TipeKamar::where('id',$id)->update($validateData);
        return redirect('/tipekamar-backend')->with('pesan','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipeKamar::destroy($id);
        return redirect('/tipekamar-backend')->with('pesanHapus','Data Berhasil dihapus');
    }
}
