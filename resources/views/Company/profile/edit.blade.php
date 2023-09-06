@extends('Company.includes.master')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>

            @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('Company.dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="card-body">

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('Company.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-3">
                            <img src="{{asset($company->logo)}}" id="output" alt="" class="img-thumbnail img-circle img-size-64">
                        </div>
                        <div class="form-group row">
                            <label for="formFile" class="col-sm-2 col-form-label">profile </label>
                            <div class="col-sm-10">
                                <input onchange="updateImg(event)" name="logo" class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" value="{{$company->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" value="{{$company->email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAbout" class="col-sm-2 col-form-label">About</label>
                            <div class="col-sm-10">
                                <input name="about" type="text" class="form-control" value="{{$company->about}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDetails" class="col-sm-2 col-form-label">Details</label>
                            <div class="col-sm-10">
                               <textarea  name="details"   class="form-control">{{$company->details}}</textarea>
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
        </div>
    </div>
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
