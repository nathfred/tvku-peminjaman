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
                    <h3>Barang Logistik</h3>
                    <p class="text-subtitle text-muted">Edit Barang</p>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('logistik-save-item',['id' => $item->id]) }}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Barang</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name" class="form-control" name="name" value="{{ $item->name }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Kategori Barang</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="category" id="category" value="Video" {{ ($item->category == 'Video') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="category">
                                                        Video
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="category" id="category" value="Audio" {{ ($item->category == 'Audio') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="category">
                                                        Audio
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="category" id="category" value="Lighting" {{ ($item->category == 'Lighting') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="category">
                                                        Lighting
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="category" id="category" value="Additional" {{ ($item->category == 'Additional') ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="category">
                                                        Lain-lain
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
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

    </div>

@include('logistik.alerts')

@endsection