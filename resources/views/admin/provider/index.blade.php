@extends('admin.app')
@section('title')
    Admin - Provider
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-8">
            <h2>Tạo nhà cung cấp <b>Create</b></h2>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info add-new-provider"><i class="fa fa-plus"></i> Add
                New</button>
        </div>
    </div>
    <div style="overflow-x: auto;">
        <form action="{{ route('admin.provider.createProvider') }}" method="POST" role="form">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Provider ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->address }}</td>
                            <td> {{ $item->phone }}</td>
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
