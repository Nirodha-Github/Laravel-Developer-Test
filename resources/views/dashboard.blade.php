@include('header')

<nav class="navbar navigation">
    <div class="container-fluid">
        <h2 class="navbar-brand">ABC Admin Dashboard</h2>
        <div class="d-flex btn-group">
            <a role="button" href="./add-product" class="btn btn-primary">Add New Product +</a>
            <a role="button" href="./add-category" class="btn btn-dark">Add New category +</a>
        </div>
    </div> 
    <hr>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12 col-12 responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @if(!$products ->isEmpty())
                    @foreach($products as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->price}}</td>
                            <td class="btn-group">
                                <a role="button" class="btn btn-warning" href="show-product/{{$row->id}}">View</a>
                                <a role="button" class="btn btn-success" href="edit-product/{{$row->id}}">Edit</a>
                                <form action="{{route('products.delete-product',$row->id)}}" method="post">  
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this?');" type="submit" value="delete" class="btn btn-danger btn-xs">
                                    delete
                                </button>
                                </form>
                            </td>
                        </tr>  						
                    @endforeach
                @else
                    <tr>
                        <td class="text-center alert alert-secondary" colspan="6">No Products Data Found</td>
                    </tr>  
                @endif       
                </tbody>
            </table>   
        </div>
    </div>
</div>
<footer class="footer">@2022 Copyright ABC Company</footer>      

@include('footer')