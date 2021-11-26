@extends('layouts.logistik.app')

@section('content')
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

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Video</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form id="form1" class="form form-horizontal">
                                    <div class="form-body">
                                        @foreach ($items as $item)
                                            @if ($item->category == 'Video')
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>{{ $item->name }}</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="{{ $item->code }}" class="form-control" name="{{ $item->code }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </form>
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
                                <form id="form2" class="form form-horizontal">
                                    <div class="form-body">
                                        @foreach ($items as $item)
                                            @if ($item->category == 'Audio')
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>{{ $item->name }}</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="{{ $item->code }}" class="form-control" name="{{ $item->code }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lighting</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form id="form3" class="form form-horizontal">
                                    <div class="form-body">
                                        @foreach ($items as $item)
                                            @if ($item->category == 'Lighting')
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>{{ $item->name }}</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="{{ $item->code }}" class="form-control" name="{{ $item->code }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </form>
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
                                <form id="form4" class="form form-horizontal">
                                    <div class="form-body">
                                        @foreach ($items as $item)
                                            @if ($item->category == 'Additional')
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>{{ $item->name }}</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="{{ $item->code }}" class="form-control" name="{{ $item->code }}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <input type="button" value="Click Me!" onclick="submitForms()" />

    </div>

<script>
    // MULTIPLE FORMS SUBMIT
    submitForms = function(){
        document.getElementById("form1").submit();
        document.getElementById("form2").submit();
        document.getElementById("form3").submit();
        document.getElementById("form4").submit();
    }
</script>    

@include('logistik.alerts')

@endsection