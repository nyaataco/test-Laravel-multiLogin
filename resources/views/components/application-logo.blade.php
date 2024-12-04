@props(['width'])

<img 
{{ $attributes->merge([ 'width' => $width.'%' ]) }}
src="{{ asset('images/logo_text.png') }}" 
alt=""
>

