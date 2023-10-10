<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
<meta name="theme-color" content="#000000" />

<link rel="stylesheet" href="/assets/fontawesome/css/all.css">
<link rel="shortcut icon" href="./assets/img/favicon.ico" />
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />


<title> {{ $title }} </title>
@vite('resources/css/app.css')

@yield('header')