@extends('admin.includes.master')
@section('content')
    <div class="wrapper">
        <!-- Navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Job</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update Job</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Job</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label for="inputName">Title</label>
                                        <input name="title" type="text" class="form-control"
                                            value="{{ $post->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputShortDescription">Short Description</label>
                                        <textarea name="short_description" class="form-control" rows="4">{{ $post->short_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ $post->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDesignation">Designation</label>
                                        <input name="designation" type="text" class="form-control"
                                            value="{{ $post->designation }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSalaryRange">Salary Range</label>
                                        <input name="salary_range" type="text" class="form-control"
                                            value="{{ $post->salary_range }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputLevel">Level</label>
                                        <select id="inputLevel" class="form-control custom-select" name="level">

                                            <option selected disabled>Select one</option>
                                            <option value="beginning" {{ $post->level == 'beginning' ? 'selected' : '' }}>
                                                Beginning
                                            </option>
                                            <option value="intermediate"
                                                {{ $post->level == 'intermediate' ? 'selected' : '' }}>
                                                Intermediate
                                            </option>
                                            <option value="expert" {{ $post->level == 'expert' ? 'selected' : '' }}>
                                                Expert
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperiance">Experiance</label>
                                        <input name="experiance" type="text" class="form-control"
                                            value="{{ $post->experiance }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputType">Type</label>
                                        <select name="type" id="inputType" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <option value="remote" {{ $post->type == 'remote' ? 'selected' : '' }}>
                                                Remote</option>
                                            <option value="onsite" {{ $post->type == 'onsite' ? 'selected' : '' }}>
                                                OnSite</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCompanyid">Company id</label>
                                        <input name="company_id" type="integer" class="form-control"
                                            value="{{ $post->company_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Created_by</label>
                                        <input name="created_by" type="integer" class="form-control"
                                            value="{{ $post->created_by }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select name="status" id="inputStatus" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <option value="open"{{$post->status=='open' ? 'selected' : ''  }} >Open</option>
                                            <option  value="close"{{$post->status=='close' ? 'selected' : ''  }} >Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Location</label>
                                        <input name="location" type="text" class="form-control"
                                            value="{{ $post->location }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Update Job"
                                                class="btn btn-success float-right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
    @endsection
