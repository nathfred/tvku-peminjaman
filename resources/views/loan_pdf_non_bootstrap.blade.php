<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>PDF</title>

    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

    {{-- <link rel="stylesheet" href="{{ asset('vendors/fontawesome/all.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('css/app-mazer.css') }}"> --}}

    <style>
        * {
          box-sizing: border-box;
        }
        
        /* Create two equal columns that floats next to each other */
        .col {
          float: left;
          width: 50%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-25 {
          float: left;
          width: 25%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-30 {
          float: left;
          width: 30%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-33 {
          float: left;
          width: 33.3%;
          /* padding: 10px; */
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-70 {
          float: left;
          width: 70%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-75 {
          float: left;
          width: 75%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }
        .col-100 {
          float: center;
          width: 100%;
          padding: 10px;
          /* height: 10px;  */
          /* height: 300px; Should be removed. Only for demonstration */
        }

        /* .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 10px; 
        } */
        
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table, th, td {
            border: 1px solid black;
        }

        /* HEADER TABLE */
        .header-left {
            font-weight: bold;
            width: 20%;
        }
        .header-right {
            width: 30%;
            text-align: center;
        }

        /* FOOTER TABLE */
        .footer-left {
            font-weight: bold;
            width: 7%;
        }
        .footer-right {
            width: 26%;
            text-align: center;
        }
        </style>

</head>

<body style="background-color: transparent;">
    <div class="border border-dark text-center p-2">
        <center>
            <h2>TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTORO</h2>
            <h4>Gedung E Lt.2 Kompleks UDINUS Jl. Nakula I/No.5-11 Semarang 50131</h4>
            <h4>Telp. (024)356-8491 Fax. (024)356-4645</h4>
        </center>
    </div>

    <div class="border border-dark text-center p-2">
        <center>
            <h3>DOKUMEN PEMINJAMAN LOGISTIK (ID : {{ $loan->id }})</h3>
        </center>
    </div>

    {{-- BARIS DIBAWAH HEADER --}}
    {{-- <div class="border border-dark p-2">
        <div class="row">
            <div class="column">
                <div class="row">
                    <div class="column">
                        <label>Pengembalian</label>
                    </div>
                    <div class="column">
                        @if ($loan->return == 1)
                            <label>Sudah Kembali</label>
                        @elseif ($loan->return === NULL || $loan->return == 0)
                            <label>Belum Kembali</label>
                        @else
                            <label>Tidak Diketahui</label>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label>Program</label>
                    </div>
                    <div class="column">
                        <label>{{ $loan->program }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label>Lokasi</label>
                    </div>
                    <div class="column">
                        <label>{{ $loan->location }}</label>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="row">
                    <div class="column">
                        <label>Tanggal Dibuat</label>
                    </div>
                    <div class="column">
                        <label>{{ $loan->created }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label>Tanggal Booking</label>
                    </div>
                    <div class="column">
                        <label>{{ $loan->book_date }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label>Jam Booking</label>
                    </div>
                    <div class="column">
                        <label>{{ $loan->book_time }}</label>
                    </div>
                </div>                
            </div>
        </div>
    </div> --}}

    {{-- HEADER TABLE --}}
    <table style="width:100%">
        <tr>
            <td class="header-left">Pengembalian</td>
            @if ($loan->return == 1)
                <td class="header-right">Sudah Kembali</td>
            @elseif ($loan->return === NULL || $loan->return == 0)
                <td class="header-right">Belum Kembali</td>
            @else
                <td class="header-right">Tidak Diketahui</td>
            @endif
            <td class="header-left">Tanggal Dibuat</td>
            <td class="header-right">{{ $loan->created }}</td>
        </tr>
        <tr>
            <td class="header-left">Program</td>
            <td class="header-right">{{ $loan->program }}</td>
            <td class="header-left">Tanggal Booking</td>
            <td class="header-right">{{ $loan->book_date }}</td>
        </tr>
        <tr>
            <td class="header-left">Lokasi</td>
            <td class="header-right">{{ $loan->location }}</td>
            <td class="header-left">Jam Booking</td>
            <td class="header-right">{{ $loan->book_time }}</td>
        </tr>
    </table>

    <div style="margin-top: 10px;">
        <div class="row border border-dark p-2 text-center d-flex justify-content-center">
            <div class="">
                <div class="col-25">
                    <input type="checkbox" name="division" value="Produksi" {{ ($loan->division == 'Produksi') ? 'checked' : '' }}>
                    <label for="division" style="font-weight: bold;"> Produksi </label>
                </div>
            </div>
            <div class="">
                <div class="col-25">
                    <input type="checkbox" name="division" value="News" {{ ($loan->division == 'News') ? 'checked' : '' }}>
                    <label for="division" style="font-weight: bold;"> News </label>
                </div>
            </div>
            <div class="">
                <div class="col-25">
                    <input type="checkbox" name="division" value="Studio" {{ ($loan->division == 'Studio') ? 'checked' : '' }}>
                    <label for="division" style="font-weight: bold;"> Studio </label>
                </div>
            </div>
            <div class="">
                <div class="col-25">
                    <input type="checkbox" name="division" value="Lain-lain" {{ ($loan->division == 'Additional') ? 'checked' : '' }}>
                    <label for="division" style="font-weight: bold;"> Lain-lain </label>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="">
        <div class="row">
            <div class="col-25 border border-dark p-2 text-center">
                Video
            </div>
            <div class="col-25 border border-dark p-2 text-center">
                Audio
            </div>
            <div class="col-25 border border-dark p-2 text-center">
                Lighting
            </div>
            <div class="col-25 border border-dark p-2 text-center">
                Lain-lain
            </div>
        </div>
    </div> --}}

    <table style="width:100%">
        <tr>
            <th>Video</th>
            <td>
                @foreach ($items as $item)
                    @if ($item->category == 'Video')
                        {{ $item->name }}
                        @if($item->code === NULL), 
                        @else [{{ $item->code }}], 
                        @endif
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Audio</th>
            <td>
                @foreach ($items as $item)
                    @if ($item->category == 'Audio')
                        {{ $item->name }}
                        @if($item->code === NULL), 
                        @else [{{ $item->code }}], 
                        @endif
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Lighting</th>
            <td>
                @foreach ($items as $item)
                    @if ($item->category == 'Lighting')
                        {{ $item->name }}
                        @if($item->code === NULL), 
                        @else [{{ $item->code }}], 
                        @endif
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Lain-lain</th>
            <td>
                @foreach ($items as $item)
                    @if ($item->category == 'Additional')
                        {{ $item->name }}
                        @if($item->code === NULL), 
                        @else [{{ $item->code }}], 
                        @endif
                    @endif
                @endforeach
            </td>
        </tr>
        
    </table>

    {{-- <div class="">
        <div class="row border border-dark">
            <div class="col-25 p-2 text-center">
                @foreach ($items as $item)
                    @if ($item->category == 'Video')
                        <div class="row">
                            <div class="col-70">
                                <label>{{ $item->name }}</label>
                            </div>
                            <div class="col-30" style="padding: 0px;">
                                <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-25 p-2 text-center">
                @foreach ($items as $item)
                    @if ($item->category == 'Audio')
                        <div class="row">
                            <div class="col-70">
                                <label>{{ $item->name }}</label>
                            </div>
                            <div class="col-30" style="padding: 0px;">
                                <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-25 p-2 text-center">
                @foreach ($items as $item)
                    @if ($item->category == 'Lighting')
                        <div class="row">
                            <div class="col-70">
                                <label>{{ $item->name }}</label>
                            </div>
                            <div class="col-30" style="padding: 0px;">
                                <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-25 p-2 text-center">
                @foreach ($items as $item)
                    @if ($item->category == 'Additional')
                        <div class="row">
                            <div class="col-70">
                                <label>{{ $item->name }}</label>
                            </div>
                            <div class="col-30" style="padding: 0px;">
                                <input type="text" id="{{ $item->id }}" class="form-control" name="{{ $item->id }}" value="{{ $item->code }}">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="border border-dark">
        <div class="row">
            <div class="col-33 p-2 text-center">
                <p style="font-weight: bold; text-align: center;">Requested</p>
                <div class="border border-dark d-inline-flex justify-content-center" style="width: 100px; height: 75px; margin-left: 90px;">
                    @if ($loan->req_signed == 1)
                        {{-- <i class="bi bi-person-check-fill" style="font-size: 4.4rem;"></i> --}}
                        <input type="checkbox" style="font-size: 4.4rem;" checked>
                    @else
                        {{-- <i class="" style="font-size: 4.4rem;"></i> --}}
                        <input type="checkbox" style="font-size: 4.4rem;">
                    @endif
                </div>
                <p style="text-align: center;">Produser/Ass.</p>
                {{-- <div class="row">
                    <div class="col-25">
                        <label>Nama :</label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->req_name }}</label>
                    </div>
                    <div class="col-25">
                        <label>HP : </label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->req_phone }}</label>
                    </div>
                </div> --}}
            </div>
            <div class="col-33 p-2 text-center">
                <p style="font-weight: bold; text-align: center;">Crew</p>
                <div class="border border-dark d-inline-flex justify-content-center" style="width: 100px; height: 75px; margin-left: 90px;">
                    @if ($loan->crew_signed == 1)
                        <input type="checkbox" style="font-size: 4.4rem;" checked>
                    @else
                        {{-- <i class="" style="font-size: 4.4rem;"></i> --}}
                        <input type="checkbox" style="font-size: 4.4rem;">
                    @endif
                </div>
                <p style="text-align: center;">{{ $loan->crew_division }}</p>
                {{-- <div class="row">
                    <div class="col-25">
                        <label>Nama :</label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->crew_name }}</label>
                    </div>
                    <div class="col-25">
                        <label>HP : </label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->crew_phone }}</label>
                    </div>
                </div> --}}
            </div>
            <div class="col-33 p-2 text-center">
                <p style="font-weight: bold; text-align: center;">Approval</p>
                <div class="border border-dark d-inline-flex justify-content-center" style="width: 100px; height: 75px; margin-left: 90px;">
                    @if ($loan->app_signed == 1)
                        <input type="checkbox" style="font-size: 4.4rem;" checked>
                    @else
                        {{-- <i class="" style="font-size: 4.4rem;"></i> --}}
                        <input type="checkbox" style="font-size: 4.4rem;">
                    @endif
                </div>
                <p style="text-align: center;">Logistik</p>
                {{-- <div class="row">
                    <div class="col-25">
                        <label>Nama :</label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->app_name }}</label>
                    </div>
                    <div class="col-25">
                        <label>HP : </label>
                    </div>
                    <div class="col-75">
                        <label>{{ $loan->app_phone }}</label>
                    </div>
                </div> --}}
            </div>
        </div>

        {{-- FOOTER TABLE --}}
        <table style="width:100%">
            <tr>
                <td class="footer-left">Nama</td>
                <td class="footer-right">{{ $loan->req_name }}</td>
                <td class="footer-left">Nama</td>
                @if($loan->crew_name === NULL)
                    <td class="footer-right">-</td>
                @else
                    <td class="footer-right">{{ $loan->crew_name }}</td>
                @endif
                <td class="footer-left">Nama</td>
                @if($loan->app_name === NULL)
                    <td class="footer-right">-</td>
                @else
                    <td class="footer-right">{{ $loan->app_name }}</td>
                @endif
            </tr>
            <tr>
                <td class="footer-left">HP</td>
                <td class="footer-right">{{ $loan->req_phone }}</td>
                <td class="footer-left">HP</td>
                @if($loan->crew_phone === NULL)
                    <td class="footer-right">-</td>
                @else
                    <td class="footer-right">{{ $loan->crew_phone }}</td>
                @endif
                <td class="footer-left">HP</td>
                @if($loan->app_phone === NULL)
                    <td class="footer-right">-</td>
                @else
                    <td class="footer-right">{{ $loan->app_phone }}</td>
                @endif
            </tr>
        </table>
    </div>
    

    {{-- <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>

    <script src="{{ asset('vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script> --}}
</body>

</html>