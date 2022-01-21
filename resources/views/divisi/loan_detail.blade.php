@extends('layouts.divisi.app')

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

        <form class="form form-horizontal" method="POST" action="{{ route('divisi-save-loan', ['id' => $loan->id]) }}">
            @csrf
            @method('POST')

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
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Program</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="program" class="form-control" name="program" value="{{ $loan->program }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Lokasi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="location" class="form-control" name="location" value="{{ $loan->location }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Dibuat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="created" class="form-control" name="created" value="{{ $loan->created }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="book_date" class="form-control" name="book_date" value="{{ $loan->book_date }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jam Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="time" id="book_time" class="form-control" name="book_time" value="{{ $loan->book_time }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Produksi" {{ ($loan->division == 'Produksi') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="division">Produksi</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="News" {{ ($loan->division == 'News') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="division">News</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Studio" {{ ($loan->division == 'Studio') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="division">Studio</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Lain-lain" {{ ($loan->division == 'Lain-lain') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="division">Lain-lain</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Produser</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_name" class="form-control" name="req_name" value="{{ $loan->req_name }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Produser</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_phone" class="form-control" name="req_phone" value="{{ $loan->req_phone }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_name" class="form-control" name="crew_name" value="{{ $loan->crew_name }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_phone" class="form-control" name="crew_phone" value="{{ $loan->crew_phone }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Divisi Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_division" class="form-control" name="crew_division" value="{{ $loan->crew_division }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Approver</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="app_name" class="form-control" name="app_name" value="{{ $loan->app_name }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Approver</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="app_phone" class="form-control" name="app_phone" value="{{ $loan->app_phone }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status Approval</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                @if ($loan->app_signed == 1)
                                                    <input type="text" id="app_signed" class="form-control" name="app_signed" value="DISETUJUI" readonly>
                                                @elseif ($loan->app_signed === NULL)
                                                    <input type="text" id="app_signed" class="form-control" name="app_signed" value="BELUM DIRESPON" readonly>
                                                @else
                                                    <input type="text" id="app_signed" class="form-control" name="app_signed" value="DITOLAK" readonly>
                                                @endif
                                            </div>
                                            @if ($loan->app_signed == 1)
                                                <div class="col-md-4">
                                                    <label>Status Pengembalian</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    @if ($loan->return == 1)
                                                        <input type="text" id="return" class="form-control" name="return" value="SUDAH DIKEMBALIKAN" readonly>
                                                    @else
                                                        <input type="text" id="return" class="form-control" name="return" value="BELUM DIKEMBALIKAN" readonly>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->loan_quantity }}">
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->loan_quantity }}">
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

            <!-- Lighting & Additional & Buttons-->
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->loan_quantity }}">
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->loan_quantity }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="col-sm-12 mt-3 d-flex justify-content-end">
                                                <a href="{{ route('divisi-show-loans') }}" class="btn btn-secondary me-1 mb-1">Cancel</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1" {{ ($loan->app_signed === TRUE || $loan->app_signed == 1) ? 'disabled' : '' }}>Confirm</button>
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
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <div class="col-sm-12 mt-3 d-flex justify-content-end">
                <a href="{{ route('divisi-show-loans') }}" class="btn btn-secondary me-1 mb-1">Cancel</a>
                <button type="submit" class="btn btn-primary me-1 mb-1" value="submit">Confirm</button>
            </div> --}}
        </form>

    </div>

@include('divisi.alerts')

@endsection