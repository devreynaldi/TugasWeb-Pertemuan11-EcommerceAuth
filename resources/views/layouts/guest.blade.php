<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Dev Store') }}</title>
  @include('partials.theme')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
  <div class="grid min-h-screen lg:grid-cols-[1fr_1fr]">
    <aside class="hidden flex-col justify-between p-12 lg:flex" style="background: var(--ds-ink)">
      <x-brand :href="route('shop.index')" :dark="true" />
      <div>
        <div class="ds-mono max-w-md rounded-lg p-5 text-sm leading-7" style="background: var(--ds-ink-soft); color: #D7DAF5">
          <p><b style="color: var(--ds-coral)">$</b> devstore login</p>
          <p style="color: #9CA3E8">&gt; memuat pesanan Anda…</p>
          <p style="color: #9CA3E8">&gt; 54 produk siap dikirim</p>
        </div>
        <p class="ds-display mt-8 max-w-sm text-3xl leading-tight text-white">Peralatan kerja untuk para pembuat kode.</p>
      </div>
      <p class="text-xs text-white/50">&copy; {{ date('Y') }} Dev Store</p>
    </aside>

    <div class="flex flex-col items-center justify-center px-6 py-10">
      <x-brand :href="route('shop.index')" class="mb-8 lg:hidden" />
      <div class="ds-card w-full max-w-md px-7 py-7 shadow-sm">
        {{ $slot }}
      </div>
    </div>
  </div>
</body>
</html>
