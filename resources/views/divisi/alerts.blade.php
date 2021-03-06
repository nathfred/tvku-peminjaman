<script src="{{ asset('js/sweetalert2.js') }}"></script>

{{-- Employee Controller --}}
@if (Session::has('message') && Session::get('message') == 'loan-not-found')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Peminjaman Salah!',
            text: 'Data Peminjaman Tidak Ditemukan',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-submit-loan')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Disubmit!',
            text: 'Data Peminjaman Berhasil Disubmit',
            showConfirmButton: true,
        })
    </script>

{{-- Logistik Controller --}}
@elseif (Session::has('message') && Session::get('message') == 'success-delete-loan')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Menghapus Peminjaman!',
            text: 'Berhasil Menghapus Data Peminjaman',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-create-loan')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Membuat Peminjaman!',
            text: 'Berhasil Membuat Peminjaman Baru',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-edit-loan')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Merubah Peminjaman!',
            text: 'Berhasil Merubah Data Peminjaman',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-set-code')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Apporoval Logistik!',
            text: 'Kode Barang & Approval Diberikan',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-create-item')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Membuat Barang!',
            text: 'Barang Baru Terdaftar',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'item-not-found')
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Barang Tidak Ditemukan!',
            text: 'Terjadi Kesalahan, ID Tidak Ditemukan',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-edit-item')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Edit Barang!',
            text: 'Data Barang Diubah',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-delete-item')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Hapus Barang!',
            text: 'Data Barang Terhapus',
            showConfirmButton: true,
        })
    </script>

@endif
