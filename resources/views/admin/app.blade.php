<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/main.css') }}" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/assets/css/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/assets/css/font-awesome-4.7.0/css/font-awesome.css') }}" />


    {{-- Css của Imported Invoice --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/imp_inv.css') }}">

    {{-- Css của Imported Invoice Details --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/css/imp_inv_detail.css') }}">


    <title>@yield('title')</title>
</head>

<body class=" app sidebar-mini rtl">

    @include('admin.partials.header')
    {{-- @include('admin.partials.navbar') --}}
    @if(Session::get('emp')->type == 'admin')
        @include('admin.partials.navbar')
    @endif
    @if(Session::get('emp')->type == 'NV thanh toán')
        @include('admin.partials.navbar_payment')
    @endif
    @if(Session::get('emp')->type == 'NV kiểm kho')
        @include('admin.partials.navbar_inventory')
    @endif
    <main class="app-content">
        @yield('content')
    </main>

    {{-- include scripts provider | script thêm dòng mới --}}
    @include('admin.provider.partials.scripts')

    {{-- include scripts employee | script thêm dòng mới --}}
    @include('admin.employee.partials.scripts')

    {{-- script của imported invoice --}}
    @include('admin.imported_invoice.partials.scripts')

    <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/pace.min.js') }}"></script>



</body>

</html>
