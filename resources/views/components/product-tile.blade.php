{{-- Gambar produk: public/images/products/{id produk}.webp. Jika file belum ada, tampil blok warna + inisial. --}}
@props(['product', 'tall' => false])
@php
  $tints = [
    'laptop-pc' => '#DCE0FA', 'periferal' => '#FADDE0', 'gadget-audio' => '#D8EEF2',
    'jaringan-storage' => '#E6E0F7', 'aksesori-meja-kerja' => '#F9EBD2', 'buku-belajar' => '#DDF0DC',
  ];
  $bg = $tints[$product->category->slug ?? ''] ?? '#E0E2FB';
  $words = preg_split('/\s+/', trim($product->name));
  $initials = mb_strtoupper(mb_substr($words[0] ?? '', 0, 1).mb_substr($words[1] ?? '', 0, 1));
  $imagePath = 'images/products/'.$product->id.'.webp';
  $hasImage = file_exists(public_path($imagePath));
@endphp
<div {{ $attributes->merge(['class' => 'flex items-center justify-center overflow-hidden '.($tall ? 'h-80 rounded-[10px]' : 'h-44 rounded-t-[9px]')]) }}
     style="background: {{ $hasImage ? '#fff' : $bg }}">
  @if ($hasImage)
    <img src="{{ asset($imagePath) }}" alt="{{ $product->name }}" loading="lazy" class="h-full w-full object-contain p-2">
  @else
    <span class="ds-mono text-4xl font-bold" style="color: rgba(24,27,52,.28)">{{ $initials }}</span>
  @endif
</div>
