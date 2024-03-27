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
                                <h3 class="mb-0">Kamar</h3>
                            </div>
                        </div>
                        <br><br>
                        <form method="post" action="/kamar-backend" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tgl_transaksi" class="form-label">No Kamar</label>
                                <input type="text" class="form-control" name="no_kamar">
                            </div>

                            <div class="form-group">
                                <label for="tipe_kamar" class="form-control-label">Tipe Kamar</label>
                                <select class="form-control" name="tipe_kamar_id" id="tipe_kamar_id">
                                    @foreach ($tipekamars as $tipekamar)
                                        <option value="{{ $tipekamar->id }}">{{ $tipekamar->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="gambar" class="form-label">Foto</label>
                                <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{ old('gambar') }}">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <button class="btn btn-icon btn-primary" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">Submit</span>
                            </button>
                            
                            @push('js')
                                <script>
                                    const input = document.getElementById('gambar');
                                    const preview = document.getElementById('file-preview');
                            
                                    input.addEventListener("change", function () {
                                        const file = input.files[0];
                                        const reader = new FileReader();
                            
                                        reader.onload = function (event) {
                                            preview.src = event.target.result;
                                        };
                            
                                        reader.readAsDataURL(file);
                                    });
                                </script>
                            @endpush
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection