<script>
    // tinymce init
    // tinymce.init({
    //     selector: 'textarea#editor',
    //     height: 500,
    //     plugins: [
    //         'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    //         'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
    //         'insertdatetime', 'media', 'table', 'help', 'wordcount'
    //     ],
    //     toolbar: 'undo redo | blocks | ' +
    //         'bold italic backcolor | alignleft aligncenter ' +
    //         'alignright alignjustify | bullist numlist outdent indent | ' +
    //         'removeformat | help',
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    // });

    // tinymce init
    // tinymce.init({
    //     selector: 'textarea#short-editor',
    //     height: 300,
    //     plugins: [
    //         'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    //         'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
    //         'insertdatetime', 'media', 'table', 'help', 'wordcount'
    //     ],
    //     toolbar: 'undo redo | blocks | ' +
    //         'bold italic backcolor | alignleft aligncenter ' +
    //         'alignright alignjustify | bullist numlist outdent indent | ' +
    //         'removeformat | help',
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    // });

    // sweetalert init

    // $(function() {
    //     $('.delete').on('click', function(e) {
    //         e.preventDefault();
    //         const url = $(this).attr('href');

    //         Swal.fire({
    //             title: "Are you sure?",
    //             text: "You won't be able to revert this!",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#3085d6",
    //             cancelButtonColor: "#d33",
    //             confirmButtonText: "Yes, delete it!"
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     method: "DELETE",
    //                     url: url,
    //                     data: {
    //                         _token: '{{ csrf_token() }}'
    //                     },
    //                     success: function(response) {
    //                         if (response.status == 'success') {
    //                             window.location.reload();
    //                         }

    //                     },
    //                     error: function(xhr, status, error) {
    //                         console.log(error);
    //                     }
    //                 })

    //             }
    //         });
    //     });
    // })

    // notyf init
    var notyf = new Notyf({
        duration: 3000
    });
    // notyf.success('Success message!');

    // select2 init
    // $(document).ready(function() {
    //     $('.select2').select2();

    // });

    

    // Add csrf token in ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //sweetalert functions
    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();
        let deleteUrl = $(this).attr('href'); //grab route from href in xxx-xxx.php, delete btn route
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: deleteUrl,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.status == 'error') {
                            Swal.fire({
                                title: "Can not delete!",
                                text: "This category contain items can't  be deleted!",
                                icon: "error",
                                timer: 3000,
                            })
                        } else {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                timer: 3000,
                            });
                        }
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    },

                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            }
        })
    })





    // datepicker init
    document.addEventListener("DOMContentLoaded", function() {

        if (window.Litepicker) {
            document.querySelectorAll('.datepicker').forEach((elem) => {
                new Litepicker({
                    element: elem,
                    buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler.io/icons/icon/chevron-left -->
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1"><path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<!-- Download SVG icon from http://tabler.io/icons/icon/chevron-right -->
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1"><path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                });
            })
        }
    });
</script>
