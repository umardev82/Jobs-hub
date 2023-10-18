@extends('admin.includes.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Company Listing </h3>

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
                                <th>Status</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>About</th>
                                <th>Details</th>
                                <th>operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{Str::limit($item->about, 20) }}</td>
                                    <td>{{str::limit( $item->details,30 )}}</td>


                                    <td>
                                        <div class="row">
                                            <a class="btn btn-default mr-1" href="{{route('admin.company.show',['id'=>$item->id])}}">
                                                <i class="fas fa-eye "></i>
                                            </a>

                                            <form action="{{ route('admin.company.destroy', ['id' => $item->id]) }}"
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
