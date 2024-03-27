@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Kamar</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/kamar-backend" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No Kamar</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Penghuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kamars as $kamar)    
                                <tr>
                                    <th scope="row">
                                        {{$kamar->no_kamar}}
                                    </th>
                                    <td>
                                        {{$kamar->tipeKamar->nama}}
                                    </td>
                                    <td>
                                        @if($kamar->status=='0')
                                            Kosong
                                        
                                        @else
                                            Berisi
                                        @endif
                                    </td>
                                    <td>
                                        {{$kamar->penghuni->nama_penghuni}}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/kamar-backend/{{$kamar->id}}/edit">
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                    <form action="kamar-backend/{{$kamar->id}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                                    </form> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Laporan</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/laporan-backend" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Penghuni</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)    
                                <tr>
                                    <th scope="row">
                                        {{$laporan->judul_laporan}}
                                    </th>
                                    <td>
                                        {{$laporan->deskripsi_laporan}}
                                    </td>
                                    <td>
                                        {{$laporan->penghuni->nama_penghuni}}
                                    </td>
                                    <td>
                                        {{$laporan->status}}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/laporan-backend/{{$laporan->id}}/edit">
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                    <form action="laporan-backend/{{$laporan->id}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                                    </form> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$laporans->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Penghuni</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/penghuni-backend" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penghunis as $penghuni)    
                                <tr>
                                    <th scope="row">
                                        {{$penghuni->nama_penghuni}}
                                    </th>
                                    <td>
                                        {{$penghuni->no_telp}}
                                    </td>
                                    <td>
                                        {{$penghuni->tgl_masuk}}
                                    </td>
                                    <td>
                                        {{$penghuni->tgl_keluar}}
                                    </td>
                                    @if(auth()->user()->penghuni_id == 1)
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-center dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/penghuni-backend/{{$penghuni->id}}/edit">
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                                    <form action="penghuni-backend/{{$penghuni->id}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                                    </form> 
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if(auth()->user()->penghuni_id==1)
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Laporan</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/uangbulanan-backend" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Penghuni</th>
                                    <th scope="col">Tipe Pembayaran</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @foreach ($uangbulanans as $uangbulanan)    
                                    <tr>
                                        <th scope="row">
                                            {{$uangbulanan->penghuni->nama_penghuni}}
                                        </th>
                                        <th scope="row">
                                            {{$uangbulanan->tipePembayaran->jumlah_bulan}}
                                        </th>
                                        <th scope="row">
                                            {{$uangbulanan->deskripsi}}
                                        </th>
                                        <th scope="row">
                                            {{$uangbulanan->tanggal_transaksi}}
                                        </th>    
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-center dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="/uangbulanan-backend/{{$uangbulanan->id}}/edit">
                                                        <button type="button" class="btn btn-success">Edit</button>
                                                    </a>
                                                        <form action="uangbulanan-backend/{{$uangbulanan->id}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin akan menghapus data?')">Hapus</button>
                                                        </form> 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush