<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Layout katalog publik (bisa diakses tanpa login). Halaman terautentikasi memakai <x-app-layout>. --}}
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Katalog') · Dev Store</title>
  @include('partials.theme')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">
  <header style="background: var(--ds-ink)">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3.5 sm:px-6 lg:px-8">
      <x-brand :href="route('shop.index')" :dark="true" />

      <nav class="flex items-center gap-3 text-sm">
        @auth
          <a href="{{ route('dashboard') }}" class="font-semibold text-white/85 hover:text-white">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="font-medium text-white/65 hover:text-white">Keluar</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="font-medium text-white/85 hover:text-white">Masuk</a>
          <a href="{{ route('register') }}" class="ds-btn ds-btn-coral !py-1.5">Daftar</a>
        @endauth
      </nav>
    </div>
  </header>

  <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
    <x-flash />
    @yield('content')
  </main>

  <footer class="mt-10 border-t" style="border-color: var(--ds-line)">
    <div class="ds-muted mx-auto max-w-7xl px-4 py-6 text-sm sm:px-6 lg:px-8">
      Dev Store &mdash; pengiriman ke seluruh Indonesia, garansi toko 7 hari.
    </div>
  </footer>
</body>
</html>
