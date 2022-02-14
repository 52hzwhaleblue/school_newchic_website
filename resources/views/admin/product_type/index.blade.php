@extends('admin.app')
@section('title') Loại sản phẩm @endsection
@section('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="app-title">
        <div>
            <h1>Quản lí sản phẩm</h1>
            <p>Xin chào {{ Session::get('emp')->fullName }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="#">Quản lí loại sản phẩm</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-4  text-white">
            <a href="{{ route('admin.product.create.index') }}" class="btn btn-success">Tạo loại sản phẩm</a>

        </div>
    </div>
    <div class="container-fluid">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Mã loại sản phẩm</th>
                        <th> Tên loại </th>
                        <th>Sửa </th>
                        <th> Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->type }}</td>

                            <td>
                                <a class="btn btn-success" href="">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('admin.product.delete', $item->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
@endsection
