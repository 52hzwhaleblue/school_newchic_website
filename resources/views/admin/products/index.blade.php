@extends('admin.app')
@section('title') Sản phẩm @endsection
@section('content')


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<div class="app-title">
    <div>
      <h1>Quản lí sản phẩm</h1>
        <p>Xin chào {{Session::get('emp')->fullName}} </p>
    </div>
    <ul class="app-breadcrumb breadcrumb">

      <li class="breadcrumb-item"><i class="fa fa-home" aria-hidden="true"></i></li>
      <li class="breadcrumb-item"><a href="#">Quản lí sản phẩm</a></li>
    </ul>
  </div>
<div class="row">
<div class="col-sm-4  text-white">
        <a href="{{route('admin.product.create.index')}}" class="btn btn-success">Tạo sản phẩm</a>

    </div>
    </div>
    <div class="container-fluid">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Tên sản phẩm</th>
                        <th> Số lượng TK </th>
                        <th> Giá </th>
                        <th> Mô tả </th>
                        <th> Ảnh minh họa</th>
                        <th> Đơn vị tính</th>
                        <th>Trạng thái </th>
                        <th>Sửa </th>
                        <th> Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->stock }}</td>
                            <td> {{ $item->price }}</td>
                            <td> {{ $item->description }}</td>

                            <td> 
                                <img style="background:white"
                                    src="{{ asset('backend/assets/img/products/'.$item->image) }}"
                                    class="rounded" alt="Ảnh" width="70" height="70"> 
                            </td>
                            <td> {{ $item->unit }}</td>
                            <td>  @if ( $item->status ==1)
                                <span class="badge badge-pill badge-success">Còn hàng</span>
                                @endif</td>
                            <td>
                                <a class="btn btn-success" href="">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger"
                                    href="{{ route('admin.product.delete', $item->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
@endsection
