<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function () {
        // alert();

        $(document).on('click', '.add_product', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            console.log(name + price);



            $.ajax({
                url: "{{ route('add.product') }}",
                method: 'post',
                data: { name: name, price: price }, //name->database field name:name->let name=$('#name').val();
                success: function (res) {
                    // $('.successMsg').append('<span class="text-success">Data Insert Success</span>');
                    if (res.status = 'success') {
                        // $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Added", "success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function (err) {
                    /*  console.log(err)
                      console.log(err.responseJSON)
                      console.log(err.responseJSON.errors)
                      $.each(err.responseJSON.errors, function(key, value){
                          $('.errorMsg').append('<p class="text-danger">'+value+'</p>');
                      }); */

                    let formError = err.responseJSON.errors
                    console.log(formError)

                    for (let error in formError) {
                        // console.log(error)
                        $('.' + error + '_err').html(formError[error][0]);
                        // $('.'+ error).html(formError[error][0]);
                    }
                }

            });
        });
        // show product value in update form
        $(document).on('click', '.update_product_form', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            console.log($(this).data())

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });


        // Update Product Data

        $(document).on('click', '.update_product', function (e) {
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();

            console.log(up_name + up_price)

            $.ajax({
                url: "{{ route ('update.product') }}",
                method: "post",
                data: {
                    up_id: up_id,
                    up_name: up_name,  // up_name->index:up_name-> up_id = $('#up_id').val();
                    up_price: up_price
                },
                success: function (res) {
                    // $('.updateMsg').append('<span class="text-success">Update Data Insert</span>')
                    if (res.status = 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Updated", "success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function (err) {
                    let formError = err.responseJSON.errors;
                    console.log(formError)
                    for (let error in formError) {
                        console.log(error)
                        $('.' + error + '_err').html(formError[error][0]);
                    }
                }
            });

        });

        //delete data

        $(document).on('click', '.delete_product', function (e) {
            e.preventDefault();

            let product_id = $(this).data('id');

            console.log(product_id);
            // alert(product_id);

            if (confirm("Are you sure to delete product????")) {
                $.ajax({
                    url: "{{ route ('delete.product') }}",
                    method: "post",
                    data: {
                        product_id: product_id,
                    },
                    success: function (res) {
                        // $('.updateMsg').append('<span class="text-success">Update Data Insert</span>')
                        // $('.deleteMsg').append('<span class="tyext-success">Product Successfully Deleted</span>')
                        if (res.status = 'success') {
                            $('.table').load(location.href + ' .table');

                            Command: toastr["success"]("Product Deleted", "success")
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    },
                });
            }
        });

        //pagination 
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            // let page = $(this).attr('href').split('page=')[1];
            let page = $(this).attr('href').split('page=')[1];

            console.log(page)

            // product(page);
            $.ajax({
                url: '/pagination/paginate-data?page=' + page,
                success: function (res) {
                    // console.log(res)
                    $('.table-data').html(res);
                    // console.log($('.table-data' ).html(res))
                }
            })
        });

        //search product
        $(document).on('keyup', function(e){
            e.preventDefault();

            let search_string = $('#search').val();

            console.log(search_string);

            $.ajax({
                url: "{{ route('search.product') }}",
                method: "GET",
                data: {
                    search_string: search_string
                },
                success: function(res){
                    console.log(res)
                    $('.table-data').html(res);

                    if(res.status == 'nothing_found'){
                        $('.table-data').html('<span class="text-danger">Nothing Found</span>')
                    }
                }
            })
        });

        // function product(page) {
        //     $.ajax({
        //         url: '/pagination/paginate-data?page=' + page,
        //         success: function (res) {
        //             $('.table-data').html(res);
        //         }
        //     })
        // }


        // $(document).on('click', '.pagination a', function(e){
        //     e.preventDefault();

        //     let page = $(this).attr('href').split('page=')[1]; 

        //     let pagee = $(this).attr('href').split('page=')[1]

        //     productt(pagee);
        // })

        // $.ajax({
        //     url:'/pagination-paginate?page=' + pagee

        //     success: function(res){
        //         $('.table-group').html()
        //     }
        // })
    });
</script>