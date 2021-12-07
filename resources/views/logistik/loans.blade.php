@extends('layouts.logistik.app')

@section('content')
    <style>
        thead input {
            width: 100%;
        }

        a.disabled {
            pointer-events: none;
            cursor: default;
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
                    <h3>Logistik</h3>
                    <p class="text-subtitle text-muted">Daftar Peminjaman</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Tabel Daftar Peminjaman
                </div>
                <div class="card-body">
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
                                <th>Pengembalian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @if ($loans->isNotEmpty())
                                @foreach ($loans as $loan)
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
                                        <!-- Pembuat Pengajuan -->
                                        @if ($loan->req_signed)
                                            <td>{{ $loan->req_name }} (Kepala)</td>
                                        @elseif ($loan->crew_signed)
                                            <td>{{ $loan->crew_name }} (Crew)</td>
                                        @endif
                                        <!-- Approval -->
                                        @if ($loan->app_signed === NULL || $loan->app_signed == '')
                                            <td class="text-center">-</td>
                                        @elseif ($loan->app_signed == '0' || $loan->app_signed == 0)
                                            <td><p class="btn-danger text-center text-white mt-0 mb-0">DITOLAK</p></td>
                                        @elseif ($loan->app_signed == '1' || $loan->app_signed == 1)
                                            <td><p class="btn-success text-center mt-0 mb-0">DITERIMA</p></td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif
                                        <!-- Return -->
                                        @if ($loan->return === NULL || $loan->return == '')
                                        <td class="text-center">-</td>
                                        @elseif (($loan->return == '0' || $loan->return == 0) && $loan->app_signed == 1)
                                            <td><p class="btn-warning text-center text-white mt-0 mb-0">BELUM</p></td>
                                        @elseif ($loan->return == '1' || $loan->return == 1)
                                            <td><p class="btn-success text-center mt-0 mb-0">SUDAH</p></td>
                                        @else
                                            <td class="text-center">-</td>
                                        @endif
                                        <!-- Aksi -->
                                        <td>
                                            <!-- Return -->
                                            {{-- @if ($loan->return == 1)
                                                <a href="#" class="btn btn-primary"><i class="bi bi-check-square"></i></a>
                                            @else
                                                <a href="#" class="btn btn-warning"><i class="bi bi-slash-square"></i></a>
                                            @endif --}}
                                            <a href="{{ route('logistik-detail-loan', ['id' => $loan->id]) }}" class="btn btn-info"><i class="bi bi-arrow-left-square"></i></a>
                                            <a href="{{ route('show-pdf', ['id' => $loan->id]) }}" target="_blank" class="btn btn-success"><i class="bi bi-printer-fill"></i></a>
                                            <button class="btn btn-danger" onclick="delete_confirm('{{ $loan->id }}')"><i class="bi bi-x-square"></i></button>
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

        </section>
    </div>

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    {{-- <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script> --}}

    {{-- Datatables --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    {{-- Datatables --}}
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#table1 thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#table1 thead');
        
            var table = $('#table1').DataTable({
                responsive: true,
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();
        
                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');
        
                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('keyup change', function (e) {
                                    e.stopPropagation();
        
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();
        
                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
        
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });
    </script>

    <script>
        function delete_confirm(loan_id) {
            var loan_id = loan_id;
            var url = '{{ route("logistik-delete-loan", ":slug") }}';
            url = url.replace(':slug', loan_id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Aksi ini tidak dapat diulangi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus peminjaman!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data Terhapus!',
                        text: 'Berhasil Menghapus Data Peminjaman',
                        showConfirmButton: true,
                    })
                }
            })
        }
    </script>

@include('logistik.alerts')

@endsection