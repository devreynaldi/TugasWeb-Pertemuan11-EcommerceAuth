@props(['href' => '/', 'dark' => false])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2.5']) }} aria-label="Dev Store">
  <x-application-logo class="h-8 w-8" />
  <span class="ds-display text-lg leading-none" style="color: {{ $dark ? '#FFFFFF' : 'var(--ds-ink)' }}">Dev Store</span>
</a>
