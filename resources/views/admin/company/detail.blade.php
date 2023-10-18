@extends('admin.includes.master')
@section('content')
<div class="card card-text">
    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <h1 class="text-center">About</h1>
                @foreach ($company as $item)
                    <p>{{ $item->about }}</p>
                @endforeach
                <h1 class="text-center"> Details</h1>
                @foreach ($company as $item)
                    <p>{{ $item->details }}</p>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    @foreach ($company as $item)
                        <h1 class="text-center">Company Details</h1>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name:</b>
                                <p class="float-right">{{ $item->name }}</p>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b>
                                <p class="float-right">{{ $item->email }}</p>
                            </li>


                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
