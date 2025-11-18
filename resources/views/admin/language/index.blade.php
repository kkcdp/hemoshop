@extends('admin.layouts.app')

@section('contents')
    <section class="section">
        <div class="section-header d-flex align-items-center mb-4">
            <h1 class="mx-4 my-2">{{ __('admin.Language') }}</h1>
        </div>

        <div class="card card-primary mx-4 ">
            <div class="card-header d-flex justify-content-between">
                <h4>{{ __('admin.All Languages') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>{{ __('admin.Language Name') }}</th>
                                <th>{{ __('admin.Language Code') }}</th>
                                <th>{{ __('admin.Default') }}</th>
                                <th>{{ __('admin.Status') }}</th>
                                <th>{{ __('admin.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $language)
                                <tr>
                                    <td>
                                        {{ $language->id }}
                                    </td>
                                    <td>{{ $language->name }}</td>
                                    <td>{{ $language->lang }}</td>

                                    <td>
                                        @if ($language->default == 1)
                                            <span class="badge bg-primary text-white">{{ __('admin.Default') }}</span>
                                        @else
                                            <span class="badge bg-warning text-white">{{ __('admin.No') }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($language->status == 1)
                                            <span class="badge bg-success text-white">{{ __('admin.Active') }}</span>
                                        @else
                                            <span class="badge bg-danger text-white">{{ __('admin.Inactive') }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.language.edit', $language->id) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.language.destroy', $language->id) }}"
                                            class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Destroy the existing DataTable
            // if ($.fn.DataTable.isDataTable('#table-1')) {
            //     $('#table-1').DataTable().destroy();
            // }
            // Reinitialize the DataTable
            $('#table-1').DataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
        });
    </script>
@endpush
