@extends('admin.app')
@section('title') Loại sản phẩm @endsection
@section('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="app-title">
        <div>
            <h1>Quản lý loại sản phẩm</h1>
            <p>Xin chào {{ Session::get('emp')->fullName }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="#">Quản lí loại sản phẩm</a></li>
        </ul>
    </div>
    <div class="col-sm-4">
        <button type="button" class="btn btn-info add-new-product-types"><i class="fa fa-plus"></i> Add
            New</button>
    </div>
    <form action="{{ route('admin.product_types.store') }}" method="POST" role="form"  enctype="multipart/form-data">
        @csrf
    <div class="container-fluid">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Mã loại sản phẩm</th>
                        <th> Tên loại </th>
                        <th> Trạng thái</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->type }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-pill badge-success">Còn hàng</span>
                                @endif
                            </td>
                            <td>
                                <button class="add fa fa-plus" type="submit">
                                    <a class="add" title="Add" data-toggle="tooltip">
    
                                    </a>
                                </button>
                                <a class="edit " title="Edit" data-toggle="tooltip">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="delete" href="{{ route('admin.product_types.delete', $item->id) }}" title="Delete" data-toggle="tooltip">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
@endsection
