@extends('admin.layouts.app')

@section('contents')
    <section class="section">
        <div class="text-left px-5">
            <h2>Language</h2>
        </div>
        <div class="card card-primary m-4">

            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">All Languages</h3>
                <a href="{{ route('admin.language.create') }}" class="btn btn-md btn-primary">
                    <i class="ti ti-plus"></i> Create New</a>
            </div>

            <div class="card-body">

                <p class="text-secondary">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam deleniti fugit incidunt, iste, itaque
                    minima neque pariatur perferendis
                    sed suscipit velit vitae voluptatem.
                </p>
            </div>
            <!-- Card footer -->
            <div class="card-footer">

            </div>
        </div>
    </section>
@endsection
