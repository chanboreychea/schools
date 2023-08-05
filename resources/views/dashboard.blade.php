@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="row">
        <div class="col">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">National Students</h3>
                </div>
                <div class="card-body">
                    <h3>{{ $national }}</h3><span>Records</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Interational Students</h3>
                </div>
                <div class="card-body">
                    <h3>{{ $international }}</h3><span>Records</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Transfer Students</h3>
                </div>
                <div class="card-body">
                    <h3>{{ $transfer }}</h3><span>Records</span>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="wrapperdash">
        <div class="dashboard">
            <span>{{ $national }}</span>
            <span>National Students</span>
        </div>
        <div class="dashboard">
            <span>{{ $international }}</span>
            <span>International Students</span>
        </div>
        <div class="dashboard">
            <span>{{ $transfer }}</span>
            <span>Transfer Students</span>
        </div>
    </div> --}}
@endsection
