<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Laporan;
use App\Models\UangBulanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $kamars = Kamar::latest()->paginate(3);
        $penghunis = Penghuni::latest()->paginate(3);
        $laporans = Laporan::latest()->paginate(3);
        $uangbulanans = UangBulanan::latest()->paginate(3);
        return view('dashboard',['kamars'=>$kamars,'penghunis'=>$penghunis,'laporans'=>$laporans,'uangbulanans'=>$uangbulanans]);
    }
}
