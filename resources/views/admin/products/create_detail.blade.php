@extends('admin.app')
@section('title')
    Admin - Product Detail - Create Detail
@endsection
@section('content')
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2>Tạo chi tiết sản phẩm <b>Details</b></h2>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-info add-new-product-detail"><i class="fa fa-plus"></i> Add
                    New</button>
            </div>
        </div>
    </div>
    {{-- form create product detail --}}
    <form action="{{ route('admin.product_detail.store') }}" method="POST" role="form"
        enctype="multipart/form-data">
        @csrf
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th> {{-- truy vấn từ productID --}}
                    <th>SKU</th>
                    <th>Giá </th> {{-- truy vấn tu productID --}}
                    <th>Số lượng</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Hình ảnh</th>
                    <th>Loại sản phẩm</th>
                    <th>Nhà cung cấp</th>
                    <th>Trạng thái</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($datas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->productID }}</td>
                        <td> {{ $item->SKU }}</td>
                        <td> {{ $item->price }}</td>
                        <td> {{ $item->quantity }}</td>
                        <td> {{ $item->size }}</td>
                        <td> {{ $item->color }}</td>
                        <td> <img style="background:white" src="{{ $item->image }}" class="rounded" alt="Ảnh"
                                width="70" height="70">
                        </td>
                        <td> {{ $item->typeID }}</td>
                        <td> {{ $item->providerID }}</td>
                        <td> 
                            @if ($item->status == 1)
                            <span class="badge badge-pill badge-success">Còn hàng</span>
                        @endif
                        </td>

                        <td>
                            <button class="add_imp_inv_detail fa fa-plus" type="submit">
                                <a class="add_imp_inv_detail" title="Add" data-toggle="tooltip"></a>
                            </button>
                            <a class="edit " title="Edit" data-toggle="tooltip">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.imp_inv_detail.delete', $item->id) }}" class="delete"
                                title="Delete" data-toggle="tooltip">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection
