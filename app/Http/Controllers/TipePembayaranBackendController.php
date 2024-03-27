<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipePembayaran;

class TipePembayaranBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipepembayarans = TipePembayaran::latest()->paginate(5);
        return view('backend.tipepembayaran.index',['tipepembayarans'=>$tipepembayarans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tipepembayaran.create');
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
            'jumlah_bulan' => 'required|unique:tipe_pembayarans']);

        TipePembayaran::create($validateData);
        return redirect('/tipepembayaran-backend')->with('pesan','Data Berhasil disimpan');
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
        return view('backend.tipepembayaran.edit',['tipepembayarans'=>Tipepembayaran::find($id)]);
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
            'jumlah_bulan'=>'required'
        ]);

        TipePembayaran::where('id',$id)->update($validateData);
        return redirect('/tipepembayaran-backend')->with('pesan','Data Berhasil diupdate');
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
