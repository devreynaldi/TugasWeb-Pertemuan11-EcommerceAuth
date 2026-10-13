@props(['active'])
@php
  $classes = ($active ?? false)
    ? 'block w-full border-l-4 border-[#FF6B5E] bg-white/10 py-2 ps-3 pe-4 text-start text-base font-semibold text-white'
    : 'block w-full border-l-4 border-transparent py-2 ps-3 pe-4 text-start text-base font-medium text-white/65 hover:bg-white/5 hover:text-white';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
