@extends('admin.app')
@section('title')
    Sản phẩm
@endsection
@section('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="app-title">
        <div>
            <h1>Quản lí sản phẩm</h1>
            <p>Xin chào {{ Session::get('emp')->fullName }} </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">

            <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="#">Quản lí sản phẩm</a></li>
        </ul>
    </div>
    <div class="col-sm-4">
        <button type="button" class="btn btn-info add-new-product"><i class="fa fa-plus"></i> Add
            New</button>
    </div>

    {{-- form create product  --}}
    <form action="{{ route('admin.product.store') }}" method="POST" role="form"  enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="container mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <h5>STT</h5>
                            </th>
                            <th>
                                <h5> Tên sản phẩm</h5>
                            </th>
                            <th>
                                <h5>Giá</h5>
                            </th>
                            <th>
                                <h5>Giá so sánh</h5>
                            </th>
                            <th>
                                <h5>Hình ảnh</h5>
                            </th>
                            <th>
                                <h5>Trạng thái</h5>
                            </th>
                            <th>
                                <h5>Chi tiết</h5>
                            </th>
                            <th>
                                <h5>Action</h5>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td> {{ $item->id }}</td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->price }}</td>
                                <td> {{ $item->price_high }}</td>
                                <td>
                                    <img style="background:white" src="{{ $item->image }}" class="rounded" alt="Ảnh"
                                        width="70" height="70">
                                </td>
                              
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-pill badge-success">Còn hàng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <a style="color:white" href="{{ route('admin.product_detail.ProductDetailView', $item->id)  }}">
                                            create detail
                                        </a>
                                    </button>
                                </td>
                                <td>
                                    <button class="add fa fa-plus" type="submit">
                                        <a class="add" title="Add" data-toggle="tooltip"> </a>
                                    </button>
                                    <a class="edit " title="Edit" data-toggle="tooltip">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="delete" title="Delete" data-toggle="tooltip">
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
    </form>
@endsection
