@props(['name', 'image'])

<div style="background-image: url({{ $image }}); background-size: cover; background-position: center center;"
    {{ $attributes->merge(['id' => 'image-preview', 'class' => 'ms-2 mb-3']) }}>
    <label for="image-upload" id="image-label">Choose File</label>
    <input type="file" name="{{ $name }}" id="image-upload" />
    <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
</div>
