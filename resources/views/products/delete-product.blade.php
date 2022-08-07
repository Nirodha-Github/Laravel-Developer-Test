@include('./../header')

<nav class="navbar navigation">
    <div class="container-fluid">
        <h2 class="navbar-brand">ABC Admin Dashboard</h2>
        <div class="d-flex">
            <a role="button" href="./../dashboard" name="back" class="btn btn-danger">Back to Home</a>
        </div>
    </div>
    <hr>
</nav>

<div class="container mt-5">
    <div class="row card">
        <div class="col-sm-12 card-body">
        @if(Session::has('success'))
            <h5 class="alert alert-info">{{ Session::get('success') }}</h5>
        @endif					                       
            </div>  
            
        </div>
    </div>
</div>
<footer class="footer">@2022 Copyright ABC Company</footer>      
@include('./../footer')