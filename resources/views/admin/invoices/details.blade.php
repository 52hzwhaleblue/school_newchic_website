@extends('admin.app')
@section('title') Chi tiết hóa đơn @endsection
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            @foreach($invoices as $item)
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-uppercase">Chi tiết hóa đơn bán hàng
                            @if($item->status==1||$item->status==2||$item->status==3||$item->status==4)
                             (Đơn hàng trong quá trình theo dõi)
                            @endif
                        </h6>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Cửa hàng:</span><span class="ml-1">Trái cây</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Ngày lập:</span><span class="ml-1">{{$item->dateCreated}}</span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Mã hóa đơn:</span><span class="ml-1">{{$item->id}}</span></div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Thanh toán:</span>
                           @if($item->isPaid==1)
                             <i class="fa fa-check"><span class="ml-1"></span></i>
                           @endif
                           @if($item->isPaid==0)
                           <i class="fa fa-close"><span class="ml-1"></span></i>
                           @endif
                        </div>
                    </div>
                    <div class="col-md-6 text-right mt-3">
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Người đặt:</span>
                            <span class="ml-1">{{$item->fullName}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Số điên thoại:</span>
                            <span class="ml-1">{{$item->shippingPhone}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Người nhận:</span>
                            <span class="ml-1">{{$item->shippingName}}</span>
                        </div>
                        <div class="billed">
                            <span class="font-weight-bold text-uppercase">Địa chỉ:</span>
                            <span class="ml-1">{{$item->shippingAddress}}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="success">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <td>Hình ảnh</td>
                                    <th>Giá bán / Kg</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>          
                              @foreach($invoice_details as $dt)  
                                                   
                                <tr>
                                    <td>{{$dt->name}}</td>
                                    <td>
                                        <img src="{{asset('backend/assets/img/products/'.$dt->image)}}" alt=""
                                        width='50px' height='50px'>
                                    </td>
                                    <td>{{$dt->price}}</td>
                                    <td>{{$dt->quantity}}</td>
                                    <td>
                                        {{$dt->price * $dt->quantity}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{$item->total}}đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right mb-3">
                    <a  href="{{route('admin.invoice')}}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection