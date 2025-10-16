@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-4 border-reviewborder bg-reviewborder focus:border-reviewborder focus:ring-reviewborder focus:bg-review rounded-md shadow-sm']) }}>
