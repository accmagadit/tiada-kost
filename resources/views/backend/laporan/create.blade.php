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
                          <h3 class="mb-0">Buat Laporan</h3>
                      </div>
                    </div>
                    <br><br>
                    <form method="post" action="/laporan-backend">
                      @csrf
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Judul</label>
                        <input class="form-control" type="text" name="judul_laporan" id="example-text-input">
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <input class="form-control" type="text" name="deskripsi_laporan" id="example-text-input">
                      </div>
                  
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