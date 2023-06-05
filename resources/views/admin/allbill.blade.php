@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <div class="mt-5 mb-3 d-flex justify-content-between">
            <h2 class="pull-left">Thông tin Hóa đơn</h2>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Tổng tiền</th>
                    <th>Vận chuyển</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($bill as $bi)
                <tbody>
                    <tr>
                        <td> {{ $bi->id }} </td>
                        <td> {{ $bi->total }} </td>
                        <td> {{ $bi->payment }} </td>
                        <td>
                            <a class="mr-3" title="Delete Record" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><span class="fa fa-trash" style="color: red"></span></a>
                        </td>
                    </tr>
                </tbody>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận xóa hoá đơn</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <a href="admin/bill/delete/{{ $bi->id }}" type="button" class="btn btn-primary">Xác
                                    nhận</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection
