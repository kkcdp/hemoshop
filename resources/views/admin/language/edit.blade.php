@extends('admin.layouts.app')

@section('contents')
    <section class="section">
        <div class="text-left px-5">
            <h2>{{ __('admin.Language') }}</h2>
        </div>
        <div class="card card-primary m-4">

            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{ __('admin.Edit Language') }}</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.Language') }}</label>
                        <select name="lang" id="language-select" class="form-control my-2">
                            <option value="">{{ __('admin.Select') }}</option>
                            @foreach (config('language') as $key => $lang)
                                <option @if ($language->lang === $key) selected @endif value="{{ $key }}">
                                    {{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Name') }}</label>
                        <input readonly name="name" value="{{ $language->name }}" type="text"
                            class="form-control my-2" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Slug') }}</label>
                        <input readonly name="slug" value="{{ $language->slug }}" type="text"
                            class="form-control my-2" id="slug">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Is it default?') }}</label>
                        <select name="default" id="" class="form-control my-2">
                            <option {{ $language->default === 0 ? 'selected' : '' }} value="0">{{ __('admin.No') }}
                            </option>
                            <option {{ $language->default === 1 ? 'selected' : '' }} value="1">{{ __('admin.Yes') }}
                            </option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Status') }}</label>
                        <select name="status" id="" class="form-control my-2">
                            <option {{ $language->status === 1 ? 'selected' : '' }} value="1">
                                {{ __('admin.Active') }}</option>
                            <option {{ $language->status === 0 ? 'selected' : '' }} value="0">
                                {{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-primary mt-3">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            })
        })
    </script>
@endpush
