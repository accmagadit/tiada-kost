<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UangBulanan;
use App\Models\Penghuni;
use App\Models\TipePembayaran;
use Carbon\Carbon;

class UangBulananBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uangBulanans = UangBulanan::latest()->paginate(5);
        return view('backend.transaksi.index', ['uangbulanans' => $uangBulanans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penghunis = Penghuni::all();
        $tipePembayarans = TipePembayaran::all();
        return view('backend.transaksi.create', ['penghunis' => $penghunis, 'tipePembayarans' => $tipePembayarans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // Validasi inputan jika diperlukan
        $validatedData = $request->validate([
            'penghuni_id' => 'required',
            'id_tipe_pembayaran' => 'required',
            'tanggal_transaksi' => 'required',
            'deskripsi' => 'required'
        ]);
    
        // Cari penghuni berdasarkan ID
        $penghuni = Penghuni::find($validatedData['penghuni_id']);
    
        if ($penghuni) {
            // Cari tipe pembayaran berdasarkan ID
            $tipePembayaran = TipePembayaran::find($validatedData['id_tipe_pembayaran']);
    
            if ($tipePembayaran) {
                // Hitung tanggal baru dengan menambahkan bulan
                $tanggalKeluarBaru = Carbon::parse($penghuni->tgl_keluar)->addMonths($tipePembayaran->jumlah_bulan);
                
                // Update tgl_keluar di tabel penghuni
                $penghuni->tgl_keluar = $tanggalKeluarBaru;
                $penghuni->save();
    
                // Buat record Transaksi baru
                UangBulanan::create([
                    'penghuni_id' => $penghuni->id,
                    'id_tipe_pembayaran' => $tipePembayaran->id,
                    'tanggal_transaksi' => $validatedData['tanggal_transaksi'],
                    'deskripsi' => $validatedData['deskripsi'],
                ]);
    
                return redirect('/uangbulanan-backend')->with('pesan', 'Transaksi berhasil disimpan dan tanggal keluar penghuni diperbarui.');
            }
    
            return redirect('/uangbulanan-backend')->with('pesan', 'Tipe Pembayaran tidak ditemukan.');
        }
    
        return redirect('/uangbulanan-backend')->with('pesan', 'Penghuni tidak ditemukan.');
    }
    



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
        return view('backend.transaksi.edit',[
            'uangbulanans'=>UangBulanan::find($id),
            'penghunis'=>Penghuni::all(),
            'tipePembayarans'=>TipePembayaran::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validateData=$request->validate([
            'penghuni_id' => 'required',
            'id_tipe_pembayaran' => 'required',
            'tanggal_transaksi' => 'required',
            'deskripsi' => 'required'
        ]);

        UangBulanan::where('id',$id)->update($validateData);
        return redirect('/uangbulanan-backend')->with('pesan','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UangBulanan::destroy($id);
        return redirect('/uangbulanan-backend')->with('pesanHapus','Data berhasil di hapus');
    }


}
