a@extends('admin.app')
@section('title')
    Tạo sản phẩm
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container">
        <form action="{{ route('admin.product.create.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter tên sản phẩm" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá bán :</label>
                <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
            </div>
            <div class="mb-3 mt-3">
                <label for="type" class="form-label">Chọn loại:</label>
                <select class="form-select" id="type" name="type">
                    @foreach ($data as $item)
                        <option>{{ $item->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Nhập số lượng vào kho:</label>
                <input type="number" class="form-control" id="stock" placeholder="Enter stock" name="stock">
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">Đơn vị tính:</label>
                <input type="text" class="form-control" id="unit" placeholder="Enter unit" name="unit">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh:</label>
                <input type="file" class="form-control" placeholder="Chọn ảnh" name="image">
            </div>
            <div class="mb-3 mt-3">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
