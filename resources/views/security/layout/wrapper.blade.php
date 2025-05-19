@php
    if (!session()->has('id_user')) {
        header('Location: ' . url('security/login'));
        exit;
    }

    if (request()->is('security/user') && session('unit_id') != 5) {
        header('Location: ' . url('security/dashboard'));
        exit;
    }

@endphp
@include('security/layout/head')
@include('security/layout/header')
@include('security/layout/menu')
@include($content)
@include('security/layout/footer')