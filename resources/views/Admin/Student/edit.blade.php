@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a href="/product">Back</a></h5>
        </div>
        <div class="card-body">
            <form action="/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col">
                        <input type="text" value="{{ $product->name }}" name="name" class="form-control"
                            placeholder="Product Name">
                    </div>
                    <div class="col">
                        <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control"
                            placeholder="Quantity">
                    </div>
                    <div class="col">
                        <input type="text" value="{{ $product->price }}" name="price" class="form-control"
                            placeholder="Price">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="desc">Description</label>
                    <textarea name="description" id="desc" cols="137" rows="10">{{ $product->description }}</textarea>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Update">
                </div>

            </form>
        </div>
    </div>
@endsection
