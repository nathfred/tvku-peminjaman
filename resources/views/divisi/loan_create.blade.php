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

        <form class="form form-horizontal" method="POST" action="{{ route('divisi-create-loan') }}">
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
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Program</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="program" class="form-control" name="program">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Lokasi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="location" class="form-control" name="location">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tanggal Dibuat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" id="created" class="form-control" name="created">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tanggal Booking</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" id="book_date" class="form-control" name="book_date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Jam Booking</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="time" id="book_time" class="form-control" name="book_time">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Produksi">
                                                        <label class="form-check-label" for="division">Produksi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="News">
                                                        <label class="form-check-label" for="division">News</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Studio">
                                                        <label class="form-check-label" for="division">Studio</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Lain-lain">
                                                        <label class="form-check-label" for="division">Lain-lain</label>
                                                    </div>
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
                                                    <input type="text" id="req_name" class="form-control" name="req_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Telp. Produser</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="req_phone" class="form-control" name="req_phone">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Nama Crew</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="crew_name" class="form-control" name="crew_name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Telp. Crew</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="crew_phone" class="form-control" name="crew_phone">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Divisi Crew</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="crew_division" class="form-control" name="crew_division">
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

            <!-- Video & Audio -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Video</h4>
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}">
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
                                <h4 class="card-title">Audio</h4>
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}">
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
                                <h4 class="card-title">Lighting</h4>
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}">
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
                                <h4 class="card-title">Lain-lain</h4>
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="col-sm-12 mt-3 d-flex justify-content-end">
                                                {{-- <a href="javascript:history.back()" class="btn btn-secondary me-1 mb-1">Cancel</a> --}}
                                                <a href="{{ route('divisi-show-loans') }}" class="btn btn-secondary me-1 mb-1">Cancel</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Confirm</button>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
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