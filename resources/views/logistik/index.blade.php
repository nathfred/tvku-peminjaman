@extends('layouts.director.app')

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldPaper"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Peminjaman</h6>
                                        <h6 class="font-extrabold mb-0">{{ $total_loans }} Peminjaman</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Sudah Direspon</h6>
                                        <h6 class="font-extrabold mb-0">{{ $responded_loans }} Peminjaman</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldDanger"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Belum Direspon</h6>
                                        <h6 class="font-extrabold mb-0">{{ $unresponded_loans }} Peminjaman</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldPaper-Plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Dibuat Hari Ini</h6>
                                        <h6 class="font-extrabold mb-0">{{ $today_loans }} Peminjaman</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="font-weight-bold text-uppercase">Tabel Daftar Peminjaman (Belum Direspon)</p>
                            </div>
                            <div class="card-body mt-0 pt-0">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Program</th>
                                            <th>Lokasi</th>
                                            <th>Tgl. Dibuat</th>
                                            <th>Tgl. Booking</th>
                                            <th>Jam Booking</th>
                                            <th>Divisi</th>
                                            <th>Peminjam</th>
                                            <th>Approval</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($unresponded_loan->isNotEmpty())
                                            @foreach ($unresponded_loan as $loan)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <td class="text-center">{{ $i }}</td>
                                                    <td>{{ $loan->program }}</td>
                                                    <td>{{ $loan->location }}</td>
                                                    <td>{{ $loan->created }}</td>
                                                    <td>{{ $loan->book_date }}</td>
                                                    <td>{{ $loan->book_time }}</td>
                                                    <td>{{ $loan->division }}</td>
                                                    <td>{{ $loan->req_name }}</td>
                                                    <!-- Approval -->
                                                    @if ($loan->app_signed === NULL || $loan->app_signed == '')
                                                        <td>-</td>
                                                    @elseif ($loan->app_signed == '0' || $loan->app_signed == 0)
                                                        <td><p class="btn-danger text-center text-white mt-0 mb-0">DITOLAK</p></td>
                                                    @elseif ($loan->app_signed == '1' || $loan->app_signed == 1)
                                                        <td><p class="btn-success text-center mt-0 mb-0">DITERIMA</p></td>
                                                    @endif
                                                    <!-- Aksi -->
                                                    <td>
                                                        <a href="{{ route('logistik-detail-loan', ['id' => $loan->id]) }}" class="btn btn-info"><i class="bi bi-arrow-left-square"></i></a>
                                                        <a href="{{ route('show-pdf', ['id' => $loan->id]) }}" target="_blank" class="btn btn-success"><i class="bi bi-printer-fill"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td align='center' colspan='10'>Tidak Ada Peminjaman</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                    <img src="{{ asset('images/faces/female') }}.png">
                                @endif
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ $user->name }}</h5>
                                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">{{ $user->email }}</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/logout" style="width:50px">Log Out</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Peminjaman Terbaru</h4>
                    </div>
                    <div class="card-content pb-4">
                        @if ($recent_loans->isNotEmpty())
                            @foreach ($recent_loans as $loan)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="{{ asset('img/document') }}.png">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{ $loan->program }}</h5>
                                        <h6 class="text-muted mb-0">{{ $loan->book_date }} | {{ $loan->book_time }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="px-4">
                            <a href="{{ route('logistik-show-loans') }}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection