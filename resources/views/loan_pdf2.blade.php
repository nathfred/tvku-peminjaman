<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dokumen Peminjaman Logistik</title>

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app-mazer.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/export.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="shortcut icon" href="{{ asset('img/tvku_favicon.png') }}" type="image/x-icon">
</head>
<body>
    <style>
        img {
            position: absolute;
        }
        #table2{
            border: none;
            border-collapse: collapse;
        }
        #table1{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,td{
            padding: 5px;
        }
        </style>
        <img src="{{ asset('img/tvku_logo_spp.jpg') }}" style="height: auto; width: 100px;">
        <table id="table2" style="width: 100%" align="center">
            <tr>
                <td style="line-height: 1.2em; align=center; padding-left: 110px;">
                    <span style="line-height:1.6; font-weight:bold;	font-size: 16px;">
                        PT. TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTORO
                    </span>
                    <p style="margin: 0px; padding: 0px;">Jl.Nakula I No.5-11 Semarang</p>
                </td>
            </tr>
        </table>
        <center>
            <h3 style="margin-bottom: 0px; padding-bottom:0px;"><b><u>DATA PEMINJAMAN</u></b></h3>
            @if ($assignment->type == 'Berbayar')
                <p style="margin-top: 0px; padding-top:0px;">No. {{ $assignment->nspp }}/SPP-D/{{ $assignment->month_roman }}/TVKU/{{ $assignment->year }}</p>
            @elseif ($assignment->type == 'Barter')
                <p style="margin-top: 0px; padding-top:0px;">No. {{ $assignment->nspp }}/BARTER/SPP-D/{{ $assignment->month_roman }}/TVKU/{{ $assignment->year }}</p>
            @elseif ($assignment->type == 'Free')
                <p style="margin-top: 0px; padding-top:0px;">No. {{ $assignment->nspp }}/FREE/SPP-D/{{ $assignment->month_roman }}/TVKU/{{ $assignment->year }}</p>
            @else
                <p style="margin-top: 0px; padding-top:0px;">No. {{ $assignment->nspp }}/SPP-D/{{ $assignment->month_roman }}/TVKU/{{ $assignment->year }}</p>
            @endif
        </center>

</body>
</html>