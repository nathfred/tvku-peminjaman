@extends('layouts.super.app')

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
                            <h3>Profil User</h3>
                        </div>
                    </div>
                    <p class="text-subtitle text-muted">Profil Diri & Data User</p>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profil User</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('super-edit-user', ['id' => $user->id]) }}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>ID</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="id" class="form-control"
                                                    name="id" value="{{ $user->id }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="name" class="form-control"
                                                    name="name" value="{{ $user->name }}" >
                                            </div>
                                            <div class="col-md-4">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="role" class="form-control"
                                                    name="role" value="{{ $user->role }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="email" class="form-control"
                                                    name="email" value="{{ $user->email }}" >
                                            </div>
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Confirm</button>
                                                <a href="{{ route('super-edit-user-password', ['id' => $user->id]) }}" class="btn btn-info me-1 mb-1">Edit Password</a>
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
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    @if ($user->gender == "male")
                                        <img src="{{ asset('images/faces/male') }}.png">
                                    @elseif ($user->gender == "female")
                                        <img src="{{ asset('images/faces/female') }}.png">
                                    @else
                                        <img src="{{ asset('images/faces/male') }}.png">
                                    @endif
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ $user->name }}</h5>
                                    <!--<h6 class="text-muted mb-0">{{ $user->email }}</h6>-->
                                    <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">{{ $user->email }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pegawai</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if ($employee === NULL)
                                @else
                                    <form class="form form-horizontal" method="POST" action="{{ route('super-edit-employee', ['id' => $employee->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>NPP</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    @if ($already_employee == "TRUE")
                                                        <input type="text" id="npp" class="form-control" name="npp" value="{{ $employee->npp }}" >
                                                    @elseif ($already_employee == "FALSE")
                                                        <input type="text" id="npp" class="form-control" name="npp" required>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Jabatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="position" id="position" value="Manager" required {{ ($employee->position == "Manager") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="position">Manager</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="position" id="position" value="Kepala" {{ ($employee->position == "Kepala") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="position">Kepala</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="position" id="position" value="Staff" {{ ($employee->position == "Staff") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="position">Staff</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Divisi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="IT" required {{ ($employee->division == "IT") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">IT</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Keuangan" {{ ($employee->division == "Keuangan") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Keuangan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Produksi" {{ ($employee->division == "Produksi") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Produksi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Teknikal Support" {{ ($employee->division == "Teknikal Support") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Teknik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Marketing" {{ ($employee->division == "Marketing") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Marketing</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Human Resources" {{ ($employee->division == "Human Resources") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Human Resources</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="News" {{ ($employee->division == "News") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">News</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="division" id="division" value="Umum" {{ ($employee->division == "Umum") ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="division">Umum</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tahun Bergabung</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    @if ($already_employee == "TRUE")
                                                        <input type="text" id="joined" class="form-control" name="joined" value="{{ $employee->joined }}" >
                                                    @elseif ($already_employee == "FALSE")
                                                        <input type="text" id="joined" class="form-control" name="joined" required>
                                                    @endif
                                                </div>
                                                <input type="hidden" name="id" value="{{ $employee->id }}">
                                                <div class="col-sm-12 d-flex justify-content-end">
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
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

    </div>

@include('super.alerts')

@endsection