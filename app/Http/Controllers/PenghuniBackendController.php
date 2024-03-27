<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;

class PenghuniBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghunis = Penghuni::latest()->paginate(5);
        return view('backend.penghuni.index',['penghunis'=>$penghunis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.penghuni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_penghuni'=>'required',
            'no_telp'=>'required',
            'tgl_masuk'=>'required',
            'tgl_keluar'=>'required',
        ]);
        Penghuni::create($validateData);
        return redirect('/penghuni-backend')->with('pesan','Data Berhasil disimpan');
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
        return view('backend.penghuni.edit',['penghunis'=>Penghuni::find($id)]);
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
        $validateData = $request->validate([
            'nama_penghuni'=>'required',
            'no_telp'=>'required',
            'tgl_masuk'=>'required',
            'tgl_keluar'=>'required',
        ]);
        Penghuni::where('id',$id)->update($validateData);
        return redirect('/penghuni-backend')->with('pesan','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penghuni::destroy($id);
        return redirect('/penghuni-backend')->with('pesanHapus','Data Berhasil dihapus');
    }
}
