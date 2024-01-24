<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>{{ __('Laravel 9 Image Crud') }}</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2>{{ __('Laravel 9 Image Crud') }}</h2>
                        </div>
                        <div>
                          <a href="{{ route('add.product') }}" class="btn btn-dark">{{ __('Add New Product') }}</a> 
                          {{--    <a href="{{ route('add.product') }}" class="btn btn-dark">Add New Product</a>  --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('No') }}</th>
                                    <th>{{ __('Product Image') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productData as $key=>$product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img style="width: 150px" src="{{ asset ('images/products/'.$product->image) }}" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a href="{{ route('edit.product', $product->id) }}" class="btn btn-success btn-sm">{{ __('Edit') }}</a>
                                        <a href="" class="btn btn-success btn-sm">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>