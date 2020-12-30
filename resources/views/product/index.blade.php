<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h1>Table Products</h1>
                    <!-- Buttonnya Create Product -->
                    <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create Product
                    </button>     
                </div>
                
                <table class="table table-hover">
                    <tr>
                        <th>Code</th>
                        <th>Product name</th>
                        <th>Stock</th>
                        <th>Product image</th>
                        <th>Edit/Delete</th>
                    </tr>
                    @foreach($data_product as $product)
                    <tr>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->product_image }}</td>
                        <td>
                            <a href="/product/{{$product->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/product/{{$product->id}}/delete" class="btn btn-danger btn-sm"onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
                    <!-- Pop upnya Create Product -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/product/create" method="POST">
                                    {{ csrf_field() }}
                                    <div class="mb-3{{ $errors->has('product_code') ? 'has-error' : '' }}"> 
                                        <label for="exampleInputEmail1" class="form-label">Product Code</label>
                                        <input name="product_code" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code">
                                        @if ($errors->has('product_code'))
                                            <span class="help-block">{{ $errors->first('product_code') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3{{ $errors->has('product_name') ? 'has-error' : '' }}">
                                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                        <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name">
                                        @if ($errors->has('product_name'))
                                        <span class="help-block">{{ $errors->first('product_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3{{ $errors->has('stock') ? 'has-error' : '' }}">
                                        <label for="exampleInputEmail1" class="form-label">Stock</label>
                                        <input name="stock" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stock Number">
                                        @if ($errors->has('stock'))
                                        <span class="help-block">{{ $errors->first('stock') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="file">Product Image</label>
                                        <input type="file" name="product_image" class="form-control" onchange="previewFile(this)"/>
                                        <img id="previewimg" style="max-width: 130px;margin-top:20px"/>
                                    </div>

                            </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
