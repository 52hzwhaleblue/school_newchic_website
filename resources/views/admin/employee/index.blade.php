@extends('admin.app')
@section('title')
    Admin - Employee
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8">
            <h2>Tạo nhân viên <b>Create</b></h2>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info add-new-employee"><i class="fa fa-plus"></i> Add
                New</button>
        </div>
    </div>

    <div style="overflow-x: auto;">
        <form action="{{ route('admin.employee.createEmployee') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr class="success">
                        <th>Employee ID</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Type</th>
                        <th>Avatar</th>
                        <th>Status</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->username }}</td>
                            <td> {{ $item->fullName }}</td>
                            <td> {{ $item->email }}</td>
                            <td> {{ $item->phone }}</td>
                            <td> {{ $item->address }}</td>
                            <td> {{ $item->salary }}</td>
                            <td> {{ $item->type }}</td>
                            <td>
                                <img width="70px" height="60px"
                                    src=" {{ asset('backend/assets/img/avatar/' . $item->avatar) }} " alt="">
                            </td>
                            <td>
                                @if ( $item->status ==1)
                                <span class="badge badge-pill badge-success">Active</span>
                                @endif
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
    </div>
@endsection
