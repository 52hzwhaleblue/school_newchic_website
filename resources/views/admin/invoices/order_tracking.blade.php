@extends('admin.app')
@section('title') Theo dõi hóa đơn @endsection
@section('content')
<link  href="{{asset('backend/assets/css/order_tracking.css')}}" rel="stylesheet">
<div class="container">
<div style="color:green;text-align:center">
        <h3>Danh sách hóa đơn đang theo dõi</h3>
</div>
<div style="height:50px"></div>
<div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="d-flex my-4 flex-wrap">
                    <div class="box me-4 my-1 bg-light"> 
                            <div class="my-eye">
                                <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png" alt="">
                                <a href=""><i class="fa fa-eye"></i></a>
                            </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Đơn mới</div>
                            <div class="ms-auto number">{{$WaitingToAccept}}</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light">                         
                        <div class="my-eye">
                            <img src="https://www.freepnglogos.com/uploads/tick-png/check-mark-tick-vector-graphic-21.png" alt="">
                            <a href=""><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Đã xác nhận</div>
                            <div class="ms-auto number">{{$Confirmed}}</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> 
                        <div class="my-eye">
                            <img src="https://www.freepnglogos.com/uploads/logo-ifood-png/happy-ifood-logo-delivery-ifood-transparent-21.png" alt="">
                            <a href=""><i class="fa fa-eye"></i></a>
                        </div>                         
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Đang vận chuyển</div>
                            <div class="ms-auto number">{{$Delivery}}</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> 
                           
                        <div class="my-eye">
                        <img src="https://www.freepnglogos.com/uploads/thank-you-png/thank-you-png-testimonials-calm-order-professional-home-organizing-29.png" alt="">
                            <a href=""><i class="fa fa-eye"></i></a>
                        </div>    
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Thành công</div>
                            <div class="ms-auto number">{{$Success}}</div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection