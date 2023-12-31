@extends('Company.includes.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Job Listing </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Designation</th>
                                <th>Level</th>
                                <th>Experiance</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Location</th>
                                <th>operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->experiance }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->location }}</td>

                                    <td>
                                        <div class="row">
                                            <a class="btn btn-default mr-1" href="{{route('Company.post.show', ['id' => $item->id])}}">
                                                <i class="fas fa-eye "></i>
                                            </a>
                                            <a class="btn btn-default mr-1"
                                                href="{{ route('Company.post.edit', ['id' => $item->id]) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('Company.post.destroy', ['id' => $item->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit"><i
                                                        class="fas fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
