@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a href="/product">Back</a></h5>
        </div>
        <div class="card-body">
            <form action="/product" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="col">
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                    </div>
                    <div class="col">
                        <input type="text" name="price" class="form-control" placeholder="Price" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="desc">Description</label>
                    <textarea name="description" id="desc" cols="137" rows="10" required></textarea>
                </div>
                <br>
                <div class="row">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection
