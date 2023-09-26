<!DOCTYPE html>
<html lang="en">
<head>
  @include('header')
</head>

<body class="flex h-screen">
  @include('sidebar')

  <div class="flex-grow overflow-y-auto">
    @yield('content')
  </div>

  @include('footer')
</body>
</html>