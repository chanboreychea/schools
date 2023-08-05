@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            {{-- <h5 class="m-0"><a href="" class="btn btn-success">Add Register</a></h5> --}}
            <form action="/admins/registers">

                <div class="row">
                    <div class="col">
                        <label for="start">Start Date</label>
                        <input type="date" id="start" name="startDate" class="form-control">
                    </div>
                    <div class="col">
                        <label for="end">End Date</label>
                        <input type="date" id="end" name="endDate" class="form-control">
                    </div>
                    <div class="col">
                        <label for="student">Total Records</label>
                        <div id="student" class="form-control">{{ $allRegister }}</div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="filter">Filter</label>
                        </div>
                        <div class="row">
                            <input type="submit" class="btn btn-success" value="Save">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="types">Register Types</label>
                        <select name="registerTypes" id="types" class="form-control">
                            <option value="">None</option>
                            <option value="1">National</option>
                            <option value="2">International</option>
                            <option value="3">Transfer</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">None</option>
                            <option value="1">Enroll</option>
                            <option value="0">Cancelled</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="studenttype">Student Types</label>
                        <select name="studenttype" id="studenttype" class="form-control">
                            <option value="">None</option>
                            <option value="Associate">Associate</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>

                </div>
                <br>
            </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Register Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registers as $key => $register)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $register->firstName }}</td>
                            <td>{{ $register->lastName }}</td>

                            @if ($register->gender == 'f')
                                <td>Female</td>
                            @else
                                <td>Male</td>
                            @endif

                            <td>{{ $register->dateOfBirth }}</td>

                            @if ($register->registerType == 1)
                                <td>National</td>
                            @elseif ($register->registerType == 2)
                                <td>International</td>
                            @else
                                <td>Tranfer</td>
                            @endif

                            @if ($register->status == 1)
                                <td><span class="text-success">Enroll</span></td>
                            @else
                                <td><span class="text-danger">Cancelled</span></td>
                            @endif

                            <td>
                                <div class="wr">
                                    <form action="/admins/register/{{ $register->id }}" method="GET"
                                        style="padding-right:5px ">
                                        <input type="submit" class="btn btn-info" value="Show">
                                    </form>

                                    <form action="/admins/register/{{ $register->id }}/edit" method="GET">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
