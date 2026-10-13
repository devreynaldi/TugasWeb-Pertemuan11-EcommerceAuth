@extends('layouts.shop')

@section('title', $product->name)

@section('content')
  <a href="{{ route('shop.index') }}" class="ds-muted ds-mono text-sm hover:underline">&lt; kembali ke katalog</a>

  <div class="mt-4 grid gap-8 lg:grid-cols-[1fr_22rem]">
    <div>
      <x-product-tile :product="$product" :tall="true" />

      <p class="ds-muted mt-6 text-sm font-medium">{{ $product->category->name }} &middot; <span class="ds-sku">DS-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</span></p>
      <h1 class="mt-1 text-3xl">{{ $product->name }}</h1>
      <p class="mt-4 max-w-prose leading-relaxed">{{ $product->description }}</p>

      <h2 class="mb-3 mt-10 text-xl">
        Ulasan
        @if ($product->reviews_avg_rating)
          <span class="ds-muted ds-mono ms-2 text-sm font-medium">★ {{ number_format($product->reviews_avg_rating, 1) }} dari {{ $product->reviews->count() }} ulasan</span>
        @endif
      </h2>

      <div class="space-y-3">
        @forelse ($product->reviews as $review)
          <div class="ds-card p-4 text-sm">
            <p class="font-semibold">{{ $review->user->name }} <span style="color: var(--ds-coral-dark)">{{ str_repeat('★', $review->rating) }}</span></p>
            <p class="ds-muted mt-1">{{ $review->comment }}</p>
          </div>
        @empty
          <p class="ds-muted text-sm">Belum ada ulasan.</p>
        @endforelse
      </div>
    </div>

    <aside class="ds-card h-fit p-6 lg:sticky lg:top-6">
      <span class="ds-price text-2xl">{{ $product->price_formatted }}</span>
      <p class="ds-muted mt-4 text-sm">Stok tersedia: {{ $product->stock }}</p>
      <p class="ds-muted mt-1 text-sm">Dijual oleh {{ $product->owner?->name ?? 'Dev Store' }}</p>
    </aside>
  </div>
@endsection
