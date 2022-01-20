<script src="{{ asset('js/sweetalert2.js') }}"></script>

{{-- SweetAlert2 New : CDN (V11) --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

{{-- @if (Session::has('new_user_id'))
    <script>
        var new_user_id = '<%= Session["new_user_id"] %>';
        var new_user_id2 = sessionStorage.getItem("new_user_id");
        Swal.fire({
            icon: 'success',
            title: 'User ID : ' + new_user_id,
            text: 'Berhasil Buat User Baru : ' + new_user_id2,
            showConfirmButton: true,
        })
    </script>
@endif --}}

@if (Session::has('message') && Session::get('message') == 'user-not-found')
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'User Salah',
            text: 'Data User Tidak Ditemukan',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-create-user')
    <script>
        var new_user_id = '{{ Session::get('new_user_id');}}';
        Swal.fire({
            icon: 'success',
            title: 'User ID : ' + new_user_id,
            text: 'Berhasil Membuat User Baru, Silahkan Register Employee Bila Perlu',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-update-user')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Update',
            text: 'Berhasil Update Data User',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-update-user-password')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Update Password',
            text: 'Password Baru Tersimpan!',
            showConfirmButton: true,
        })
    </script>
@elseif (Session::has('message') && Session::get('message') == 'success-delete-user')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Menghapus',
            text: 'Berhasil Menghapus Data User',
            showConfirmButton: true,
        })
    </script>
@endif
