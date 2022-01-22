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

        <form class="form form-horizontal" method="POST" action="{{ route('divisi-store-loan') }}">
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
                                                <input type="text" id="program" class="form-control" name="program" value="{{ old('program') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Lokasi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="location" class="form-control" name="location" value="{{ old('location') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Dibuat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="created" class="form-control" name="created" value="{{ $today }}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" id="book_date" class="form-control" name="book_date" value="{{ old('book_date') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jam Booking</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="time" id="book_time" class="form-control" name="book_time" value="{{ old('book_time') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Produksi" @if(old('division')=='Produksi') checked @endif>
                                                    <label class="form-check-label" for="division">Produksi</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="News" @if(old('division')=='News') checked @endif>
                                                    <label class="form-check-label" for="division">News</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Studio" @if(old('division')=='Studio') checked @endif>
                                                    <label class="form-check-label" for="division">Studio</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="division" id="division" value="Lain-lain" @if(old('division')=='Lain-lain') checked @endif>
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
                                                <label>Nama Produser / Ass.</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_name" class="form-control" name="req_name" value="{{ old('req_name') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Produser / Ass.</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="req_phone" class="form-control" name="req_phone" value="{{ old('req_phone') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_name" class="form-control" name="crew_name" value="{{ old('crew_name') }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Telp. Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_phone" class="form-control" name="crew_phone" value="{{ old('crew_phone') }}">
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <label>Divisi Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="crew_division" class="form-control" name="crew_division" placeholder="Campers / Audio / Lighting" value="{{ old('crew_division') }}">
                                            </div> --}}
                                            <div class="col-md-4">
                                                <label>Divisi Crew</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="crew_division" id="crew_division" value="Campers" @if(old('crew_division')=='Campers') checked @endif>
                                                    <label class="form-check-label" for="crew_division">Campers</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="crew_division" id="crew_division" value="Audio" @if(old('crew_division')=='Audio') checked @endif>
                                                    <label class="form-check-label" for="crew_division">Audio</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="crew_division" id="crew_division" value="Lighting" @if(old('crew_division')=='Lighting') checked @endif>
                                                    <label class="form-check-label" for="crew_division">Lighting</label>
                                                </div>
                                            </div>
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ old($item->id) }}">
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ old($item->id) }}">
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ old($item->id) }}">
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
                                                            <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ old($item->id) }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="col-sm-12 mt-3 d-flex justify-content-end">
                                                <a href="{{ route('divisi-show-loans') }}" class="btn btn-secondary me-1 mb-1">Cancel</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Confirm</button>
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