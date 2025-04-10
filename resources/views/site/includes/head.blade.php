<base href="{{ config('app.url') }}" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="Robots" content="index,follow">
<meta name="description" content="{{ $site->description }}">
<meta name="keywords" content="{{ $site->keywords }}">
<meta name="author" content="Lovatel Agência Digital">
<meta name="format-detection" content="telephone=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{ @Vite::asset('resources/assets/site/img/favicon.png') }}" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@vite([
    'resources/assets/site/css/style.css',
    'resources/assets/site/css/responsive.css',
    'resources/assets/site/css/ckeditor/ckeditorFront.css'
])
