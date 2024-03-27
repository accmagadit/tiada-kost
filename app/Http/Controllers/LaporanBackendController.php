<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Penghuni;

class LaporanBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::latest()->paginate(5);
        return view('backend.laporan.index',['laporans'=>$laporans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penghunis = Penghuni::all();
        return view('backend.laporan.create', ['penghunis' => $penghunis]);
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
            'judul_laporan' => 'required',
            'deskripsi_laporan' => 'required'
        ]);

        $validateData['penghuni_id'] = auth()->user()->penghuni_id;
        $validateData['status'] = 'belum selesai';

        Laporan::create($validateData);
        return redirect('/laporan-backend')->with('pesan', 'Data Berhasil disimpan');
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
        $laporans = laporan::find($id);
        return view('backend.laporan.edit',['laporans'=>$laporans]);
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
        $laporan = Laporan::find($id);
        $laporan->judul_laporan = $request->judul_laporan;
        $laporan->deskripsi_laporan = $request->deskripsi_laporan;

        if ($request->has('status')) {
            $laporan->status = 'selesai';
        } else {
            $laporan->status = 'belum selesai';
        }        

        $laporan->save();

        return redirect('/laporan-backend')->with('pesan', 'Data berhasil diupdate');
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
