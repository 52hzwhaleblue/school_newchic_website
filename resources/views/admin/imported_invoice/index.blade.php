@extends('admin.app')
@section('title') Admin - Imported Invoice @endsection
@section('content')
    <h1>Hóa đơn nhập hàng</h1>

    <div class="col-sm-4">
        <button type="button" class="btn btn-info add-new-imported-invoice"><i class="fa fa-plus"></i> Add
            New</button>
    </div>



    <form action="{{ route('admin.imported_invoice.createHDN') }}" method="POST" role="form">
        @csrf
        <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>Mã hóa đơn nhập hàng</th>
                    <th>Mã nhân viên</th>
                    <th>Mã nhà cung cấp</th>
                    <th>Tổng số lượng nhập</th>
                    <th>Tổng tiền hóa đơn nhập</th>
                    <th>Ngày nhập hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->employeeID }}</td>
                        <td> {{ $item->providerID }}</td>
                        <td> {{ $item->totalQuantity }}</td>
                        <td> {{ $item->totalPrice }}</td>
                        <td> {{ $item->importedDate }}</td>
                        <td>
                            @if ( $item->status ==1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary">
                                <a style="color:white" href="{{ route('admin.imported_invoice.create_detail_view') }}">
                                    create detail
                                </a>
                            </button>
                        </td>

                        <td>
                            <button class="add fa fa-plus" type="submit">
                                <a class="add" title="Add" data-toggle="tooltip">

                                </a>
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
    </form>


    {{-- hiện chi tiết hóa đơn nhập --}}

    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <a style="color:white" href="{{ route('admin.imported_invoice.create_detail_view') }}">
            create detail
        </a>

    </button> --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div style="width:900px" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo chi tiết hóa đơn nhập hàng
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new-imported-invoice-detail"><i
                                class="fa fa-plus"></i> Add
                            New</button>
                    </div>
                    {{-- form create detail --}}
                    <form action="{{ route('admin.imported_invoice.create_detail_view') }}" method="POST" role="form">

                        @csrf
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn nhập hàng</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng (Kg) </th>
                                    <th>Đơn giá/(Kg)</th>
                                    <th>Đơn vị(Kg)</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($imported_inv_details as $item)
                                    <tr>
                                        <td> {{ $item->importedInvoiceID }}</td>
                                        <td> {{ $item->productID }}</td>
                                        <td> {{ $item->productName }}</td>
                                        <td> {{ $item->quantity }}</td>
                                        <td> {{ $item->price }}</td>
                                        <td> {{ $item->unit }}</td>
                                        <td> hhh</td>
                                        <td>
                                            <button class="add_imp_inv_detail fa fa-plus" type="submit">
                                                <a class="add_imp_inv_detail" title="Add" data-toggle="tooltip"></a>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
