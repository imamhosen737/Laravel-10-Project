<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="mt-5 row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('product_save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Product_name">Product Name</label>
                        <input type="product_name" class="form-control" id="product_name" name="product_name"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if (!empty($products))
                {{-- @dd($products) --}}
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>@mdo</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>
