@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
      <div class="row mt-5">
          <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                          <h3 class="mb-0">Tipe Kamar</h3>
                      </div>
                    </div>
                    <br><br>
                    <form method="post" action="/penghuni-backend/{{$penghunis->id}}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nama</label>
                          <input class="form-control" type="text" name="nama_penghuni" id="example-text-input" value="{{old('nama',$penghunis->nama_penghuni)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">No Telp</label>
                          <input class="form-control" type="number" name="no_telp" id="example-text-input" value="{{old('nama_penghuni',$penghunis->no_telp)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                          <input type="date" class="form-control" name="tgl_masuk"  value="{{old('nama_penghuni',$penghunis->tgl_masuk)}}">
                        </div>
                    
                        <div class="form-group">
                          <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                          <input type="date" class="form-control" name="tgl_keluar" value="{{old('nama_penghuni',$penghunis->tgl_keluar)}}">
                        </div>
                  
                      {{-- <div class="mb-2">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir')}}">
                        @error('tgl_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div> --}}
                  
                      <button class="btn btn-icon btn-primary" type="submit">
                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                          <span class="btn-inner--text">Update</span>
                      </button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
      @endsection