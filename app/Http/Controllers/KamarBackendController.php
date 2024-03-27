<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\TipeKamar;
use Illuminate\Support\Str;

class KamarBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::latest()->paginate(5);
        return view('backend.kamar.index',['kamars'=>$kamars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penghunis = Penghuni::all();
        $tipeKamars = TipeKamar::all();
        return view('backend.kamar.create',['penghunis'=>$penghunis,'tipekamars'=>$tipeKamars]);
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
            'no_kamar' => 'required',
            'tipe_kamar_id' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg',
        ]);

        if($request->hasFile('gambar')){
            $namaFile = 'img_'.time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move('images',$namaFile);
        }
        else{
            $namaFile='';
        }
        $validateData['gambar']=$namaFile;
        Kamar::create($validateData);
        return redirect('/kamar-backend')->with('pesan','Data Berhasil Disimpan');
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
        $kamars = Kamar::find($id);
        $penghunis = Penghuni::all();
        $tipeKamars = TipeKamar::all();
        return view('backend.kamar.edit',['kamars'=>$kamars,'penghunis'=>$penghunis,'tipekamars'=>$tipeKamars]);
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
        'no_kamar' => 'required',
        'tipe_kamar_id' => 'required',
        'gambar' => 'nullable|image|mimes:png,jpg',
        'penghuni_id' => 'required'
    ]);
    
    if ($request->hasFile('gambar')) {
        $imagePath = public_path('/images/' . $request->image_old);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $namaFile = 'img_' . time() . '_' . $request->gambar->getClientOriginalName();
        $request->gambar->move('images', $namaFile);
    } else {
        $namaFile = $request->image_old;
    }
    
    $validateData['gambar'] = $namaFile;
    
    // Periksa nilai penghuni_id
    if ($validateData['penghuni_id'] != 6) {
        $validateData['status'] = 1;
    } else {
        $validateData['status'] = 0;
    }
    
    Kamar::where('id', $id)->update($validateData);
    return redirect('/kamar-backend')->with('pesan', 'Data berhasil diedit');
    
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = kamar::find($id);
        if ($cari->file_upload != '') {
            $image_url = public_path() . '/images/' . $cari->file_upload;
            unlink($image_url);
        }

        Kamar::destroy($id);
        return redirect('/kamar-backend')->with('pesanHapus', 'Data berhasil dihapus');
    }
}
