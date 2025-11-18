<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard</title>
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{-- <link href="./dist/libs/jsvectormap/dist/jsvectormap.css?1750026893" rel="stylesheet" /> --}}
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/global/upload-preview/upload-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link href="{{ asset('assets/admin/css/tabler.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <!-- END GLOBAL MANDATORY STYLES -->

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jqc-1.12.4/dt-1.13.1/datatables.min.css"/> --}}

    <!-- BEGIN CUSTOM FONT -->
    <style>
        @import url("https://rsms.me/inter/inter.css");
    </style>
    <!-- END CUSTOM FONT -->
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/dist/css/main.css') }}" /> --}}
    @stack('styles')
</head>

<body>
    <!-- BEGIN GLOBAL THEME SCRIPT -->
    <script src="{{ asset('assets/admin/js/tabler-theme.min.js') }}"></script>
    <!-- END GLOBAL THEME SCRIPT -->
    <div class="page">

        <!--  BEGIN SIDEBAR  -->
        @include('admin.layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN HEADER  -->
        @include('admin.layouts.header')
        <!--  END HEADER  -->

        <div class="page-wrapper">

            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                @yield('contents')
            </div>
            <!-- END PAGE BODY -->

            <!--  BEGIN FOOTER  -->
            @include('admin.layouts.footer')
            <!--  END FOOTER  -->
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/tooltip.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/modules/moment.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/js/stisla.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/global/upload-preview/upload-preview.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>

    <script src="{{ asset('assets/admin/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"> --}}
    {{-- </script> --}} // šitais bojā visu
    <script src="{{ asset('assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /** Handle Dynamic delete **/
        $(document).ready(function() {

            $('.delete-item').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        console.log(url);
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data) {
                                if (data.message === 'success') {
                                    // console.log("Preparing to show success:", data
                                    //     .message);
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {

                                    Swal.fire({
                                        title: 'Error!',
                                        text: data.message,
                                        icon: 'error',
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                })
            })
        })
    </script>


    @include('admin.layouts.scripts')
    @stack('scripts')
</body>

</html>
