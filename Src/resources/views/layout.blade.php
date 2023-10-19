<!DOCTYPE html>
<html lang="en">
<head>
  @include('header')
</head>

<body class="flex h-screen overflow-hidden">
  @include('sidebar')

  <div class="flex-grow overflow-y-auto bg-gray-50">
    @include('alert')

    @yield('content')
  </div>

  @include('footer')
</body>
</html>