@include('./../header')

<nav class="navbar navigation">
    <div class="container-fluid">
        <h2 class="navbar-brand">ABC Admin Dashboard</h2>
        <div class="d-flex">
            <a role="button" href="./../dashboard" class="btn btn-success">Back to Home</a>
        </div>
    </div>
    <hr>
</nav>

<div class="container mt-5">
    <div class="row card">
        <h5 class="col-sm-12 card-header text-success">Update Product Details</h5>
        <div class="col-sm-12 card-body">
        @if(Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
            <form action="{{route('products.edit-product',$product->id)}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="name" value="{{$product->name}}" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" class="form-control" id="price" value="{{$product->price}}" placeholder="Enter password" name="price">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Select Product Category:</label>
                    <select class="form-select" id="category" name="category_id">
                        @foreach ($category as $item)
                            @if($item->name == $category_name)
                                <option selected value="{{ $category_id }}">{{ $category_name }}</option>	
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>	
                            @endif
                        @endforeach					                      
                    </select>
                </div>
                <button type="submit" name="editProductBtn" class="btn btn-success">Update</button>      
            </form>
        </div>
    </div>
</div>
<footer class="footer">@2022 Copyright ABC Company</footer>      
@include('./../footer')