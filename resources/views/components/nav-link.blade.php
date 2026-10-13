@props(['active'])
@php
  $classes = ($active ?? false)
    ? 'inline-flex items-center border-b-[3px] border-[#FF6B5E] px-1 pt-1 text-sm font-semibold text-white'
    : 'inline-flex items-center border-b-[3px] border-transparent px-1 pt-1 text-sm font-medium text-white/65 hover:text-white';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
