@props(['disabled' => false])
<input @disabled($disabled) {{ $attributes->merge(['class' => 'ds-field text-sm shadow-sm']) }}>
