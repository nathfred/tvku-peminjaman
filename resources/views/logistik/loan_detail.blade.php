@extends('layouts.logistik.app')

@section('content')
    <style>
        .card-title {
            margin-bottom: 0rem;
        }
    </style>

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <div class="row">
                        <div class="col">
                            <h3>Dokumen Peminjaman</h3>
                        </div>
                    </div>
                    <p class="text-subtitle text-muted">Data & Detail Peminjaman</p>
                </div>
            </div>
        </div>

        <!-- Keterangan & Review -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Keterangan Peminjaman</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Program</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="program" class="form-control" name="program" value="{{ $loan->program }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Lokasi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="location" class="form-control" name="location" value="{{ $loan->location }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Dibuat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="created" class="form-control" name="created" value="{{ $loan->created }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="book_date" class="form-control" name="book_date" value="{{ $loan->book_date }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jam Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="book_time" class="form-control" name="book_time" value="{{ $loan->book_time }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="division" class="form-control" name="division" value="{{ $loan->division }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Review</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Produser</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_name" class="form-control" name="req_name" value="{{ $loan->req_name }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Produser</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_phone" class="form-control" name="req_phone" value="{{ $loan->req_phone }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_name" class="form-control" name="crew_name" value="{{ $loan->crew_name }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_phone" class="form-control" name="crew_phone" value="{{ $loan->crew_phone }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Divisi Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_division" class="form-control" name="crew_division" value="{{ $loan->crew_division }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form class="form form-horizontal" method="POST" action="{{ route('logistik-set-code', ['id' => $loan->id]) }}">
            @csrf
            @method('POST')

            <!-- Video & Audio -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Video</h4>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <h4 class="card-title">Jumlah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    {{-- <form id="form1" class="form form-horizontal"> --}}
                                        <div class="form-body">
                                            @foreach ($items as $item)
                                                @if ($item->category == 'Video')
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ $item->name }}</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Audio</h4>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <h4 class="card-title">Jumlah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    {{-- <form id="form2" class="form form-horizontal"> --}}
                                        <div class="form-body">
                                            @foreach ($items as $item)
                                                @if ($item->category == 'Audio')
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ $item->name }}</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Lighting & Additional -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lighting</h4>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <h4 class="card-title">Jumlah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    {{-- <form id="form3" class="form form-horizontal"> --}}
                                        <div class="form-body">
                                            @foreach ($items as $item)
                                                @if ($item->category == 'Lighting')
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ $item->name }}</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lain-lain</h4>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <h4 class="card-title">Jumlah</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    {{-- <form id="form4" class="form form-horizontal"> --}}
                                        <div class="form-body">
                                            @foreach ($items as $item)
                                                @if ($item->category == 'Additional')
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>{{ $item->name }}</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Approval Logistik -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Approval Logistik</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="app_name" class="form-control" name="app_name" value="{{ $loan->app_name }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Telp.</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="app_phone" class="form-control" name="app_phone"  value="{{ $loan->app_phone }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Approval</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="app_signed" id="app_signed" value="1" {{ ($loan->app_signed === TRUE || $loan->app_signed == 1) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="app_signed">Approve</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="app_signed" id="app_signed" value="0" {{ ($loan->app_signed == 0 && !empty($loan->app_name)) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="app_signed">Decline</label>
                                                    </div>
                                                </div>
                                                @if ($loan->app_signed == 1)
                                                    <div class="col-md-4">
                                                        <label>Pengembalian</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="return" id="return" value="1" {{ ($loan->return === TRUE || $loan->return == 1) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="return">Sudah Dikembalikan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="return" id="return" value="0" {{ ($loan->return == 0 && !empty($loan->app_name)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="return">Belum Dikembalikan</label>
                                                        </div>
                                                    </div>
                                                    {{-- BUKTI PENGEMBALIAN (IMAGE FILE) --}}
                                                    {{-- <label for="return_attachment">Lampiran Pengembalian</label><br>
                                                    <img src="{{ url($loan->return_attachment) }}" alt="return_attachment" style="max-height: 200px; max-width: 200px;">
                                                    <input type="file" name="return_attachment" class="form-control"> --}}
                                                @endif
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    {{-- <a href="javascript:history.back()" class="btn btn-secondary me-1 mb-1">Cancel</a> --}}
                                                    <a href="{{ route('logistik-show-loans') }}" class="btn btn-secondary me-1 mb-1">Cancel</a>
                                                    <button type="submit" class="btn btn-primary me-1 mb-1" {{ ($loan->app_signed == 1 && $loan->return == 1) ? 'disabled' : '' }}>Confirm</button>
                                                </div>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger mt-4">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

    </div>

@include('logistik.alerts')

@endsection