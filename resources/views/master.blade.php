<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  {{-- Styles --}}
  @stack('styles')

</head>
<body class="bg-white text-black min-h-screen flex flex-col">

  <!-- Header -->
  @include('includes.header')

  <!-- Content: Centered -->
  <main class="flex-1 flex items-center justify-center">
    @yield('main-content')
  </main>

  <!-- Footer -->
  @include('includes.footer')

  {{-- Scripts --}}
  @include('includes.script')
  @stack('addon-script')

</body>
</html>