@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="col">
                        <div class="row align-items-center">
                                <h3 class="mb-0">Kamar</h3>
                            </div>
                            @if(auth()->user()->penghuni_id == 1)
                            <div class="col text-right">
                                <a href="/kamar-backend/create" class="btn btn-sm btn-primary">Tambah</a>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if (session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                    {{session('pesan')}}
                    </div>
                    @endif
                    @if (session()->has('pesanHapus'))
                    <div class="alert alert-danger" role="alert">
                    {{session('pesanHapus')}}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No Kamar</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Penghuni</th>
                                    <th scope="col"></th>
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
                                    @if(auth()->user()->penghuni_id==1)
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
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{$kamars->links('pagination::bootstrap-5')}}
    
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush