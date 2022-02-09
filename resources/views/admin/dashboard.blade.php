@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')

  <div class="app-title">
    <div>
      <h1> Dashboard</h1>
        {{-- <p>Xin chào  {{Session::get('user')->fullName}} </p> --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
  <div class="row">
      {{-- tổng hóa đơn --}}
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon">
        <i class="icon fa fa-truck fa-3x"></i>
        <div class="info">
          <h4>Tổng hóa đơn</h4>
          <p><b>{{$countInv}}</b></p>
        </div>
    </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
          <i class="icon fa fa-truck fa-3x"></i>
          <div class="info">
            <h4>Doanh thu</h4>
            <p><b>{{number_format($sales)}}VND</b></p>
          </div>
      </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Nhân sự</h4>
                {{-- <p><b>{{$countUser}}</b></p> --}}
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
            <i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h4>Đánh giá</h4>
                <p><b>500</b></p>
            </div>
        </div>
    </div>


    </div>

@endsection
