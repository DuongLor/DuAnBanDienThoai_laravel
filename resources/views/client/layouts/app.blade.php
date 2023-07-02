<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  @include('client.layouts.link_header')

  @yield('css_header_custom')

</head>

<body>
  @include('client.layouts.navbar')

  @yield('content')
 
  @include('client.layouts.footer')

  @yield('js_footer_custom')

  @include('client.layouts.link_footer')

</body>

</html>