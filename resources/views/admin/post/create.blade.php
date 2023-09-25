@extends('admin.includes.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Job</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputShortDescription">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputDesignation">Designation</label>
                            <input name="designation" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputSalaryRange">Salary Range</label>
                            <input name="salary_range" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputLevel">Level</label>
                            <select name="level" id="inputLevel" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option>Beginning</option>
                                <option>Intermediate</option>
                                <option>Expert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputExperiance">Experiance</label>
                            <input name="experiance" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputType">Type</label>
                            <select name="type" id="inputType" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option>Remote</option>
                                <option>OnSite</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputCompanyid">Company id</label>
                            <input name="company_id" type="integer" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Created_by</label>
                            <input name="created_by" type="integer" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select name="status" id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option>Open</option>
                                <option>Close</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Location</label>
                            <input name="location" type="text" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Create new Job"
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

@endsection
