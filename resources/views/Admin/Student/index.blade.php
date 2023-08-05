@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a href="" class="btn btn-success">Add Register</a></h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp

                    <tbody>
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>name</td>
                            <td>qty</td>
                            <td>price</td>
                            <td>descript</td>
                            <td>
                                <div class="wr">
                                    <form action="" method="GET" style="padding-right:5px ">
                                        <input type="submit" class="btn btn-info" value="Show">
                                    </form>

                                    <form action="" method="GET">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>


            </table>
        </div>
    </div>
@endsection
