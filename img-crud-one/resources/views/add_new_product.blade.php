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
                            <h2>{{ __('Add New Product') }}</h2>
                        </div>
                        <div>
                        {{--    <a href="{{ route('all.product') }}" class="btn btn-dark">{{ __('Add New Product') }}</a>  --}}
                            <a href="{{ route('all.product') }}" class="btn btn-dark">Go Product</a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('msg'))
                            <p class="text-success">{{Session::get('msg')}}</p>
                        @endif
                        <form action="{{ route('store.product') }}" method="post" enctype= multipart/form-data>
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Product Image</label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Product Name">
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
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