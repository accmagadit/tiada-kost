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
                    <form method="post" action="/tipekamar-backend">
                      @csrf
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="example-text-input">
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Fasilitas</label>
                        <textarea class="form-control" name="fasilitas" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                  
                      <div class="form-group">
                        <label for="example-number-input" class="form-control-label">Harga</label>
                        <input class="form-control" type="number" name="harga" value="23" id="example-number-input">
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
                          <span class="btn-inner--text">Submit</span>
                      </button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
      @endsection