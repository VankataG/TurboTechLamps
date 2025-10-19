<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'TurboTechLamps')</title>
  <meta name="theme-color" content="#0b0e12">
  @vite(['resources/css/home.css', 'resources/js/home.js'])
</head>
<body class="ttl-body">
  <header class="ttl-header">
    <a class="ttl-logo" href="/">TurboTechLamps</a>
    <nav class="ttl-nav">
      <a href="/catalog">Catalog</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </nav>
  </header>

  @yield('content')

  <footer class="ttl-footer">
    <span>© {{ date('Y') }} TurboTechLamps — hand-crafted from real turbochargers.</span>
  </footer>
</body>
</html>
