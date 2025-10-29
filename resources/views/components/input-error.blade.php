@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span {{ $attributes->merge(['class' => 'text-danger']) }}>{{ $message }}</span>
        {{-- <span class='text-danger'>{{ $message }}</span> --}}
    @endforeach
@endif
