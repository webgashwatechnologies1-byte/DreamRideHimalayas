<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
    <title>Pages Manager -  @yield('title', 'CMS')</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="/app/css/app.css">
    <link rel="stylesheet" href="/app/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/app/css/map.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="/assets/images/dreamridelogo.webp">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/dreamridelogo.webp">
  {!! ToastMagic::styles() !!}

</head>
<body>
<div class="preload preload-container">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>
{{-- <header>
    <h2>Admin Dashboard</h2>
    <nav>
        <a href="{{ route('admin.pages.index') }}" style="color: #fff; margin-right: 15px;">All Pages</a>
        <a href="{{ route('admin.pages.create') }}" style="color: #fff;">Add Page</a>
    </nav>
</header> --}}

<div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>
  {!! ToastMagic::scripts() !!}

@include('admin.partials.scripts')
@stack('scripts')


</body>
</html>
