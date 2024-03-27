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
                    <form method="post" action="/uangbulanan-backend/{{$uangbulanans->id}}">
                        @method('put')
                        @csrf
                        
                        <div class="form-group">
                          <label for="penghuni_id" class="form-control-label">Penghuni</label>
                          <select class="form-control" name="penghuni_id" id="penghuni_id">
                              @foreach ($penghunis as $penghuni)
                                  <option value="{{$penghuni->id}}" selected>{{ $penghuni->nama_penghuni}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="tipe_pembayaran_id" class="form-control-label">Tipe Pembayaran</label>
                          <select class="form-control" name="id_tipe_pembayaran" id="tipe_pembayaran_id">
                              @foreach ($tipePembayarans as $tipePembayaran)
                                  <option  value="{{$tipePembayaran->id}}" selected>{{ $tipePembayaran->jumlah_bulan }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                          <input type="date" class="form-control" name="tanggal_transaksi"  value="{{old('tanggal_transaksi',$uangbulanans->tanggal_transaksi)}}">
                      </div>

                      <div class="form-group">
                          <label for="deskripsi" class="form-control-label">Deskripsi</label>
                          <input class="form-control" type="text" name="deskripsi" value="{{old('deskripsi',$uangbulanans->deskripsi)}}">
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