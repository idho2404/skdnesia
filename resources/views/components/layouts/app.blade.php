<!DOCTYPE html>
<html lang="en" class="dark"> <!-- Tambahkan class="dark" by default -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'Maranatha' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="{{ $bodyClass ?? 'bg-maranatha-dark dark:bg-gray-900' }}">

  <!-- Global Components -->
  <x-loading />
  <x-notification />

  <!-- Main Content -->
  {{ $slot }}

  @stack('scripts')
</body>

</html>