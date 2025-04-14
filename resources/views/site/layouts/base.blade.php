<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('site.includes.head')

    <title>@yield('title')</title>

    @yield('pageLinks')

    {!! (!isset($_COOKIE['analytics']) || $_COOKIE['analytics'] == "Y") ? $site->codigos_head : null !!}
</head>

<body>
    {!! (!isset($_COOKIE['analytics']) || $_COOKIE['analytics'] == "Y") ? $site->codigos_body : null !!}

    @include('site.includes.header')

    @yield('conteudo')

    @include('site.includes.footer')
    @include('site.includes.login')

    @yield('pageScripts')

    {!! (!isset($_COOKIE['analytics']) || $_COOKIE['analytics'] == "Y") ? $site->codigos_footer : null !!}
</body>

</html>
