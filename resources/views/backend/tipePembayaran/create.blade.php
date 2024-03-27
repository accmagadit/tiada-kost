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
                        <form method="post" action="{{ route('tipepembayaran-backend.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="jumlah_bulan" class="form-control-label">Jumlah Bulan</label>
                                <input class="form-control" type="text" name="jumlah_bulan" id="jumlah_bulan">
                                <input type="hidden" name="penghuni_id" id="penghuni_id">
                                <ul id="suggestions" class="list-group"></ul>
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

@section('scripts')
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#nama_penghuni').on('input', function() {
                var searchTerm = $(this).val();

                if (searchTerm.length >= 2) {
                    $.ajax({
                        url: '{{ route('search.penghuni') }}',
                        method: 'GET',
                        data: {
                            searchTerm: searchTerm
                        },
                        success: function(response) {
                            var suggestions = $('#suggestions');
                            suggestions.empty();

                            $.each(response, function(index, penghuni) {
                                suggestions.append('<li class="list-group-item" data-penghuni-id="' + penghuni.id + '">' + penghuni.nama_penghuni + '</li>');
                            });
                        }
                    });
                }
            });

            $(document).on('click', '#suggestions li', function() {
                var selectedPenghuniId = $(this).data('penghuni-id');
                var selectedPenghuniNama = $(this).text();

                $('#nama_penghuni').val(selectedPenghuniNama);
                $('#penghuni_id').val(selectedPenghuniId);
                $('#suggestions').empty();
            });
        });
    </script>
@endsection
