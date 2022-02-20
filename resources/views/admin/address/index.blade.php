@extends('admin.app')
@section('title')
    Admin-Account
@endsection
@section('content')
    <div class="page-wrapper">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <h1>Dan sách địa chỉ khách hàng</h1>
        <div class="row">
            <div class="col-sm-4 text-white">
                <form class="d-flex" method="GET" action="{{ route('admin.account.search') }}">
                    <input class="form-control me-2" name="keyWord" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="col-sm-4 text-white">
                <div class="dropdown dropend">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        Lựa chọn
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Tất cả</a></li>
                        <li><a class="dropdown-item" href="">Nhân viên mới vào</a></li>
                        <li><a class="dropdown-item" href="">Nhân viên đang hoạt động</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th> Mã người dùng </th>
                        <th> Tên người nhận </th>
                        <th>Phone</th>
                        <th>Tên đường</th>
                        <th>Thành phố</th>
                        <th>Quận/Huyện</th>
                        <th>Phường/Xã</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>

                            <td> {{ $item->id }}</td>
                            <td> {{ $item->userID }}</td>
                            <td> {{ $item->reciver }}</td>
                            <td> {{ $item->phone }}</td>
                            <td> {{ $item->street }}</td>
                            <td> {{ $item->city }}</td>
                            <td> {{ $item->disctrict }}</td>
                            <td> {{ $item->ward }}</td>
                            <td> {{ $item->status }}</td>



                            <td>
                                <a class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.account.delete', $item->id) }}"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    </div>
    </div>
@endsection
