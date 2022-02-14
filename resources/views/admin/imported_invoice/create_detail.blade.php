@extends('admin.app')
@section('title') Admin - Imported Invoice - Create Detail @endsection
@section('content')

    <div class="table-title">
        <div class="row">
            <div class="col-sm-8">
                <h2>Tạo chi tiết hóa đơn nhập <b>Details</b></h2>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-info add-new-imported-invoice-detail"><i class="fa fa-plus"></i> Add
                    New</button>
            </div>
        </div>
    </div>
    {{-- form create detail --}}
    <form action="{{ route('admin.imported_invoice.create_detail_view') }}" method="POST" role="form"
        enctype="multipart/form-data">
        @csrf
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn nhập hàng</th>
                    <th>Mã sản phẩm/SKU</th>
                    <th>Tên sản phẩm</th>

                    <th>Số lượng nhập</th>
                    <th>Giá nhập</th>
                    <th>Giá bán lẻ</th>
                    <th>Giá bán sỉ</th>
                    <th>Ảnh minh họa</th>

                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($imported_inv_details as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->importedInvoiceID }}</td>
                        <td> {{ $item->productID }}</td>
                        <td> {{ $item->productName }}</td>
                        <td> {{ $item->quantity }}</td>
                        <td> {{ $item->imported_price }}</td>
                        <td> {{ $item->retail_price }}</td>
                        <td> {{ $item->wholesale_price }}</td>
                        <td> <img style="background:white" src="{{ $item->image }}" class="rounded" alt="Ảnh"
                                width="70" height="70">
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
