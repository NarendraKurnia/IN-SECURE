<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- jQuery -->
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }} "></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
</head>
<style>
   body.login-page {
    background: url('{{ asset('umum/images/foto-up3sbb.jpeg') }}') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .login-box {
    width: 100%;
    max-width: 400px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 20px;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.18);
  }

  .login-logo a {
    color: #ffffff;
    font-weight: bold;
    font-size: 28px;
    text-shadow: 1px 1px 3px #000;
    text-align: center;
    display: block;
    margin-bottom: 20px;
  }

  .card {
    background: transparent;
    border: none;
  }

  .login-card-body {
    background: transparent;
    padding: 10px 20px;
    border-radius: 10px;
  }

  .login-box-msg {
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 500;
  }

  .form-control {
    border-radius: 10px;
    border: 1px solid #ccc;
    padding: 10px;
    background: rgba(255, 255, 255, 0.8);
  }

  .input-group-text {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid #ccc;
    border-left: none;
    border-radius: 0 10px 10px 0;
  }

  .btn-primary {
    background: linear-gradient(90deg, #7b2ff7, #f107a3);
    border: none;
    font-weight: bold;
    letter-spacing: 1px;
    border-radius: 8px;
  }

  .btn-primary:hover {
    opacity: 0.9;
  }

  .alert {
    background: rgba(255, 0, 0, 0.1);
    color: #fff;
    border-radius: 8px;
  }

  .text-center a {
    color: #ffffff;
    text-decoration: underline;
  }

  .text-center a:hover {
    text-decoration: none;
  }

  label {
    color: #fff;
  }

  .icheck-primary input[type="checkbox"] {
    accent-color: #7b2ff7;
  }
</style>
<body class="hold-transition login-page">

@include($content)

<script>
tinymce.init({
  selector: '.simple',
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<?php 
$sek  = date('Y');
$awal = $sek-100;
?>
<script>
  // notifikasi jika sukses
<?php if(Session::get('sukses')) { ?>
  Swal.fire({
    title: 'Berhasil!',
    text: "{{ Session::get('sukses') }}",
    icon: 'success',
    confirmButtonText: 'Ok, Terimakasih'
});
<?php } ?> 
// notifikasi jika gagal
<?php if(Session::get('warning')) { ?>
  Swal.fire({
    title: 'Oopsss..!',
    text: "{{ Session::get('warning') }}",
    icon: 'warning',
    confirmButtonText: 'Coba Lagi'
});
<?php } ?> 

  // Popup Delete
  $(document).ready(function() {
    // Event handler untuk link dengan class 'delete-link'
    $('.delete-link').on('click', function(e) {
      e.preventDefault(); //mencegah aksi default link

      var href = $(this).attr('href'); //Mendapatkan URL dari href link

      // Menampilkan konfirmasi dengan SweetAlert2
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor:  '#d33',
        confirmButtonText:  'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((reslut) => {
        if    (result.isConfirmed) {
          // Jika pengguna menkonfirmasi, lanjutkan ke URL penghapusan
          window.location.href;
        }    
      })
    })
   })

</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>