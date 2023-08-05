@extends('Admin.Layout.master')

@section('contentBlock')
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a href="/admins/registers">Back</a></h5>
        </div>
        <div class="card-body">
            <form action="/admins/registers/{{ $register->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Student Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="firstname">First Name</label>
                                        <input type="text" value="{{ $register->firstName }}" id="firstname"
                                            name="firstname" class="form-control" placeholder="First Name">
                                        @error('firstname')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" id="lastname" value="{{ $register->lastName }}"
                                            name="lastname" class="form-control" placeholder="Last Name">
                                        @error('lastname')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        Gender:
                                    </div>
                                    @if ($register->gender == 'f')
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="gender" value="f" class="form-check-input"
                                                    checked>Female
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="gender" value="m"
                                                    class="form-check-input">Male
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    @else
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="gender" value="f"
                                                    class="form-check-input">Female
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" name="gender" value="m" class="form-check-input"
                                                    checked>Male
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                        <div class="col"></div>
                                    @endif
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="register">Register</label>
                                        <select class="form-control" id="register" name="status" value="">
                                            @if ($register->status == 1)
                                                <option value="1" selected>Enroll</option>
                                                <option value="0">Cancelled</option>
                                            @else
                                                <option value="1">Enroll</option>
                                                <option value="0" selected>Cancelled</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="dateofbirth">Date of Birth</label>
                                        <input type="date" value="{{ $register->dateOfBirth }}" id="dateofbirth"
                                            name="dateofbirth" class="form-control">
                                        @error('dateofbirth')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" value="{{ $register->email }}" id="email" name="email"
                                            class="form-control" placeholder="Email">
                                        @error('email')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="address">Address</label>
                                        <input type="text" value="{{ $register->currentAddress }}" id="address"
                                            name="address" class="form-control" placeholder="Address">
                                        @error('address')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Emergency Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ $register->emergencyName }}" id="name"
                                            name="name" class="form-control" placeholder="Name">
                                        @error('name')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="relationship">Relationship</label>
                                        <input type="text" id="relationship"
                                            value="{{ $register->emergencyRelationship }}" name="relationship"
                                            class="form-control" placeholder="Relationship">
                                        @error('relationship')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="phonenumber">Phone Number</label>
                                        <input type="text" id="phonenumber" value="{{ $register->emergencyPh }}"
                                            name="phonenumber" class="form-control" placeholder="Phone Number">
                                        @error('phonenumber')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="eemail">Email</label>
                                        <input type="email" value="{{ $register->emergencyEmail }}" id="eemail"
                                            name="eemail" class="form-control" placeholder="Emergency Email">
                                        @error('eemail')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="eaddress">Address</label>
                                        <input type="text" value="{{ $register->emergencyAddress }}" id="eaddress"
                                            name="eaddress" class="form-control" placeholder="Emergency Address">
                                        @error('eaddress')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Academic Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="majorpreference">Major Preference</label>
                                        <input type="text" value="{{ $register->majorPreference }}"
                                            name="majorpreference" id="majorpreference" class="form-control"
                                            placeholder="Major Preference">
                                        @error('majorpreference')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="registerdate">Register Date</label>
                                        <input type="date" value="{{ $reDate }}"
                                            name="registerdate" id="registerdate" class="form-control"
                                            placeholder="Register Date">
                                        @error('registerdate')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" class="btn btn-info" value="Update">
                </div>

            </form>
        </div>
    </div>
@endsection
