@extends('admin.app')
@section('title') Admin-product @endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="row">
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
                        <th>Loại sản phẩm</th>
                        <th>Số lượng nhập</th>
                        <th>Giá nhập</th>
                        <th>Giá bán lẻ</th>
                        <th>Giá bán sỉ</th>
                        <th>Ảnh minh họa</th>
                        <th>Màu sắc</th>
                        <th>Kích thước</th>
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
                            <td> <img style="background:white"
                                    src="{{ asset('backend/assets/img/products/' . $item->image) }}" class="rounded"
                                    alt="Ảnh" width="70" height="70">
                            </td>
                            <td> {{ $item->color }}</td>
                            <td> {{ $item->size }}</td>



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
    </div>


@endsection
