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
                          <h3 class="mb-0">Tipe Pembayaran</h3>
                      </div>
                    </div>
                    <br><br>
                    <form method="post" action="/tipepembayaran-backend/{{$tipepembayarans->id}}">
                        @method('put')
                        @csrf
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Bulan</label>
                        <input class="form-control" type="text" name="jumlah_bulan" id="example-text-input" value="{{old('jumlah_bulan',$tipepembayarans->jumlah_bulan)}}">
                      </div>
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