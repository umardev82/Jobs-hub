@extends('admin.includes.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Company Listing </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Company Listing </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Company Listing </h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">

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
                                                <td>{{ $item->status}}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->about }}</td>
                                                <td>{{ $item->details }}</td>


                                                <td>
                                                    <div class="row">
                                                        <a class="btn btn-default mr-1" href="">
                                                            <i class="fas fa-eye "></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('admin.company.destroy', ['id' => $item->id]) }}"
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



            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
