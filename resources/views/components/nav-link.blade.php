@props(['active' => false])

<a {{ $attributes }}
    class=" {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} {{ $active ? 'rounded-md px-3 py-2 text-sm font-medium' : 'block rounded-md px-3 py-3 text-base font-medium' }}"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
