@extends('layouts.shop')

@section('title', 'Katalog')

@section('content')
  {{-- Baris perintah: menampilkan filter yang sedang aktif --}}
  <div class="ds-term mb-6" role="status">
    <b>$</b> devstore ls <i>--kategori=</i>{{ request('kategori') ?: 'semua' }}
    @if (request('q')) <i>--cari=</i>"{{ request('q') }}" @endif
    <i>--total=</i>{{ $products->total() }}
  </div>

  <div class="grid gap-8 lg:grid-cols-[15rem_1fr]">
    <aside>
      <form method="GET" action="{{ route('shop.index') }}" class="mb-5 flex gap-2">
        @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk…" aria-label="Cari produk"
               class="ds-field w-full text-sm">
        <button class="ds-btn shrink-0">Cari</button>
      </form>

      <h2 class="ds-muted mb-2 px-3 text-xs font-semibold">Kategori</h2>
      <ul class="flex flex-wrap gap-1 lg:flex-col">
        <li>
          <a href="{{ route('shop.index') }}" class="ds-cat" @unless (request('kategori')) aria-current="true" @endunless>
            <span>Semua produk</span>
          </a>
        </li>
        @foreach ($categories as $category)
          <li>
            <a href="{{ route('shop.index', ['kategori' => $category->slug]) }}" class="ds-cat"
               @if (request('kategori') === $category->slug) aria-current="true" @endif>
              <span>{{ $category->name }}</span>
              <span class="ds-mono ds-muted text-xs">{{ $category->products_count }}</span>
            </a>
          </li>
        @endforeach
      </ul>
    </aside>

    <section>
      <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @forelse ($products as $product)
          <a href="{{ route('shop.show', $product) }}" class="ds-card flex flex-col transition hover:border-[#4338CA]">
            <x-product-tile :product="$product" />
            <div class="flex flex-1 flex-col p-4">
              <div class="flex items-center justify-between gap-2">
                <p class="ds-muted text-xs font-medium">{{ $product->category->name }}</p>
                <span class="ds-sku">DS-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</span>
              </div>
              <h2 class="mt-1.5 flex-1 text-[15px] font-bold leading-snug" style="letter-spacing: -0.01em">{{ $product->name }}</h2>
              <div class="mt-4 flex items-center justify-between gap-2">
                <span class="ds-price text-sm">{{ $product->price_formatted }}</span>
                <span class="ds-muted text-xs">
                  Stok {{ $product->stock }}
                  @if ($product->reviews_avg_rating) &middot; ★ {{ number_format($product->reviews_avg_rating, 1) }} @endif
                </span>
              </div>
            </div>
          </a>
        @empty
          <p class="ds-card col-span-full border-dashed p-10 text-center ds-muted">
            Tidak ada produk yang cocok. <a href="{{ route('shop.index') }}" class="ds-link">Lihat semua produk</a>.
          </p>
        @endforelse
      </div>

      <div class="mt-8">{{ $products->links() }}</div>
    </section>
  </div>
@endsection
