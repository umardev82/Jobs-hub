@extends('admin.includes.master')
@section('content')
    <div class="card card-text">
        <div class="row">
            <div class="col-md-8">
                <div class="card-body">
                    <h1 class="text-center">Description</h1>
                    @foreach ($post as $item)
                        <p>{{ $item->description }}</p>
                    @endforeach
                    <h1 class="text-center"> Short Description</h1>
                    @foreach ($post as $item)
                        <p>{{ $item->short_description }}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        @foreach ($post as $item)
                            <h1 class="text-center">Job Details</h1>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Title:</b>
                                    <p class="float-right">{{ $item->title }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Designation:</b>
                                    <p class="float-right">{{ $item->designation }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Salary Range</b>
                                    <p class="float-right">{{ $item->salary_range }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Level</b>
                                    <p class="float-right">{{ $item->level }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Experiance</b>
                                    <p class="float-right">{{ $item->experiance }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Type</b>
                                    <p class="float-right">{{ $item->type }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <p class="float-right">{{ $item->status }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Location</b>
                                    <p class="float-right">{{ $item->location }}</p>
                                </li>

                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
