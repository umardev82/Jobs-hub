@extends('Company.includes.master')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img id="output" class="profile-user-img img-fluid img-circle" src="{{ asset($company->logo) }}"
                            alt="User profile picture">
                    </div>



                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Name:</b> <a class="float-right">{{$company->name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <a class="float-right">{{$company->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>About</b> <a class="float-right">{{$company->about}}</a>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Profile</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">

                            <form class="form-horizontal" action="{{ route('Company.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="formFile" class="col-sm-2 col-form-label">Profile </label>
                                    <div class="col-sm-10">
                                        <input onchange="updateImg(event)" name="logo" class="form-control"
                                            type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $company->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" class="form-control"
                                            value="{{ $company->email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputAbout" class="col-sm-2 col-form-label">About</label>
                                    <div class="col-sm-10">
                                        <input name="about" type="text" class="form-control"
                                            value="{{ $company->about }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDetails" class="col-sm-2 col-form-label">Details</label>
                                    <div class="col-sm-10">
                                        <textarea name="details" class="form-control">{{ $company->details }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="password">

                            <form class="form-horizontal" action="{{ route('Company.profile.password.update') }}"
                                method="POST">
                                @csrf
                                @method('put')

                                <div class="form-group row">
                                    <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input id="old_password" name="old_password" type="password"
                                            class="form-control @if ($errors->has('old_password')) is-invalid @endif">
                                        @if ($errors->has('old_password'))
                                            <span class="error invalid-feedback">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input id="password" name="password" type="password"
                                            class="form-control @if ($errors->has('password')) is-invalid @endif">
                                        @if ($errors->has('password'))
                                            <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm New
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif">

                                        @if ($errors->has('password_confirmation'))
                                            <span
                                                class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

<script !src="">
    function updateImg(event) {
        console.log(event.target.files)
        let output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    }
</script>
