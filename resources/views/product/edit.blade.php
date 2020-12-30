<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <h1>Edit Data Product</h1>
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form action="/product/{{ $product->id }}/update" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3{{ $errors->has('product_code') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1" class="form-label">Product Code</label>
                            <input name="product_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code" value="{{ $product->product_code }}">
                            @if ($errors->has('product_code'))
                            <span class="help-block">{{ $errors->first('product_code') }}</span>
                            @endif
                        </div>
                        <div class="mb-3{{ $errors->has('product_name') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" value="{{ $product->product_name }}">
                            @if ($errors->has('product_name'))
                            <span class="help-block">{{ $errors->first('product_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3{{ $errors->has('stock') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input name="stock" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stock Number" value="{{ $product->stock }}">
                            @if ($errors->has('stock'))
                            <span class="help-block">{{ $errors->first('stock') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="file">Product Image</label>
                            <input type="file" name="product_image" class="form-control" onchange="previewFile(this)" value="{{ $product->product_image }}"/>
                            <img id="previewimg" style="max-width: 130px;margin-top:20px"/>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
