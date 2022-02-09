@extends('admin.app')
@section('title') Admin - Imported Invoice - Create @endsection
@section('content')
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Tạo hóa đơn nhập hàng</h3>
            <div class="tile-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="exampleSelect1">Mã NCC</label>
                        <select class="form-control" id="exampleSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Mã nhân viên</label>
                        <select class="form-control" id="exampleSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-3">Tổng số lượng hàng hóa nhập</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Tổng số lượng hàng hóa nhập" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-3">Tổng tiền </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" placeholder="Tổng tiền" disabled />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Trạng thái</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="avaiabble" checked />Ok
                                </label>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="tile-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <a href="{{ route('admin.imported_invoice.createDetail') }}">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Tạo
                            </button>

                        </a>
                        <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Hủy</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
