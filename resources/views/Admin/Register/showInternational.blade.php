@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h5 class="card-title">
                        <a class="btn btn-primary" href="/admins/registers">Back</a>
                    </h5>
                </div>
                <div class="col-md-1">
                    <h5 class="card-title"><a class="btn btn-danger" href="/admins/register-delete/{{ $register->id }}">Delete</a></h5>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h3>Student Details</h3>
                                <h6><b>Image</b></h6>
                                <img src="{{ asset('img/' . $register->img) }}" width="100px" alt="Image">
                                <br /><br>
                                <h6><b>User Name</b></h6>
                                <div>{{ $register->firstName . ' ' . $register->lastName }}</div>
                                <br />
                                <h6><b>DOB</b></h6>
                                <div>{{ $register->dateOfBirth }}</div>
                                <br />
                                <h6><b>Gender</b></h6>
                                @if ($register->gender == 'm')
                                    <div>Male</div>
                                @else
                                    <div>Female</div>
                                @endif
                                <br />
                                <h6><b>Register</b></h6>
                                @if ($register->registerType == 1)
                                    <h6>National</h6>
                                @elseif ($register->registerType == 2)
                                    <h6>International</h6>
                                @else
                                    <h6>Transfer</h6>
                                @endif
                                <br />
                                <h6><b>Email</b></h6>
                                <div>{{ $register->email }}</div>
                                <br />
                                <h6><b>Current Address</b></h6>
                                <div>{{ $register->currentAddress }}</div>
                                <br />
                                <h6><b>Status</b></h6>
                                @if ($register->status == 0)
                                    <div>Cancelled</div>
                                @else
                                    <div>Enroll</div>
                                @endif
                                <br />
                                {{-- <h6><b>Gender</b></h6>
                                    <div>{{ $item->gender }}</div> --}}
                                <br />
                            </div>
                            <div class="col">
                                <h3>Emergency Details</h3>
                                <div class="row">
                                    <div class="col">
                                        <h6><b>Name</b></h6>
                                        <div>{{ $register->emergencyName }}</div>
                                        <br />
                                        <h6><b>Relationship</b></h6>
                                        <div>{{ $register->emergencyRelationship }}</div>
                                        <br />
                                        <h6><b>Phone Number</b></h6>
                                        <div>{{ $register->emergencyPh }}</div>
                                        <br />
                                        <h6><b>Email</b></h6>
                                        <div>{{ $register->emergencyEmail }}</div>
                                        <br />
                                        <h6><b>Current Address</b></h6>
                                        <div>{{ $register->emergencyAddress }}</div>
                                        <br />
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">

                            <div class="col">
                                <h3>Academic Details</h3>
                                <h6><b>Major Preference</b></h6>
                                <div>{{ $register->majorPreference }}</div>
                                <br />
                                <h6><b>Register Date</b></h6>
                                <div>{{ $register->created_at }}</div>
                                <br />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Register Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actionbro</th>
                    </tr>
                </thead>
                @foreach ($register as $item)
                    <tbody>
                        <tr>

                            <th scope="row">{{$item->id }}</th>
                            <td>{{ $item->firstName }}</td>
                            <td>{{ $item->lastName }}</td>

                            @if ($item->gender == 'f')
                                <td>Female</td>
                            @else
                                <td>Male</td>
                            @endif

                            <td>{{ $item->dateOfBirth }}</td>

                            @if ($item->registerType == 1)
                                <td>National</td>
                            @elseif ($item->registerType == 2)
                                <td>International</td>
                            @else
                                <td>Tranfer</td>
                            @endif

                            @if ($item->status == 1)
                                <td>Enroll</td>
                            @else
                                <td>Cancel</td>
                            @endif
                            <td>
                                <div class="wr">
                                    <form action="/admins/register-delete/{{ $item->id }}" method="GET"
                                        style="padding-right:5px ">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                @endforeach

            </table>
        </div> --}}
    </div>
@endsection
