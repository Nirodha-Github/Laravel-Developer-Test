@include('./../header')

<nav class="navbar navigation">
    <div class="container-fluid">
        <h2 class="navbar-brand">ABC Admin Dashboard</h2>
        <div class="d-flex">
            <a role="button" href="./../dashboard" name="back" class="btn btn-warning">Back to Home</a>
        </div>
    </div>
    <hr>
</nav>

<div class="container mt-5">
    <div class="row card">
        <h5 class="col-sm-12 card-header text-warning">Product Details</h5>
        <div class="col-sm-12 card-body">
            <div class="mb-3 mt-3 row">
                <p class="col-sm-5">Product Name:</p>
                <h6 class="col-sm-7">{{$product->name}}</h6>
            </div>
            <div class="mb-3 row">
                <p class="col-sm-5">Price:</p>
                <h6 class="col-sm-7">{{$product->price}}</h6>
            </div>
        
            <div class="mb-3 row">
                <p class="col-sm-5">Select Product Category:</p>
                <h6 class="col-sm-7">{{$category_name}}</h6>							                       
            </div>  
            
        </div>
    </div>
</div>
<footer class="footer">@2022 Copyright ABC Company</footer>      
@include('./../footer')