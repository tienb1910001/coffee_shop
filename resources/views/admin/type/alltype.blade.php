@extends('admin.master')
@section('content')
    <div class="col-md-12 col" style="max-width: 50%">
        <div class="mt-5 mb-3 d-flex justify-content-between">
            <h2 class="pull-left">Loại sản phẩm</h2>
            <a type="button" href="admin/type/add" class="btn btn-success"><i class="fa fa-plus"></i> Thêm </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tên loại</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($type as $ty)
                <tbody>
                    <tr>
                        <td> {{ $ty->name }} </td>
                        <td>
                            <a href="admin/type/update/{{ $ty->id }}" class="mr-3" title="Update Record"
                                data-toggle="tooltip"><span class="fa fa-pencil" style="color:#03AC13"></span></a>
                            <a class="mr-3" title="Delete Record" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><span class="fa fa-trash" style="color: red"></span></a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận xóa loại sản phẩm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <a href="admin/type/delete/{{ $ty->id }}" type="button" class="btn btn-primary">Xác
                                nhận</a>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>
@endsection
