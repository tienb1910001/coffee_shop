@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <div class="mt-5 mb-3 d-flex justify-content-between">
            <h2 class="pull-left">Thông tin sản phẩm</h2>
            <a href="admin/productadd" type="button" href="create" class="btn btn-success"><i class="fa fa-plus"></i> Thêm
                sản phẩm</a>
        </div>
        @if (Session::has('thanhcong'))
            <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
        @endif
        <div class="row">

            <div class="col">
                <form action="" method="GET">
                    <div class="input-group mt-5 mb-3 col-6">
                        <input type="search" class="form-control" name="search" aria-describedby="button-addon2"
                            placeholder="Nhập tên sản phẩm" />
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã loại</th>
                    <th>Giá size M</th>
                    <th>Giá size L</th>
                    <th></th>
                </tr>
            </thead>

            @foreach ($product as $pro)
                <tbody>
                    <tr>
                        <td> {{ $pro->name }} </td>
                        <td> {{ $pro->id_type }}</td>
                        <td> {{ number_format($pro->price_m) }} Đ</td>
                        <td> {{ number_format($pro->price_l) }} Đ</td>
                        <td>
                            <a href="admin/product/{{ $pro->id }}" class="mr-3" title="Chi tiết"><span
                                    class="fa fa-eye" style="color:#0134C6"></span></a>
                            <a href="admin/product/update/{{ $pro->id }}" class="mr-3" title="Update Record"><span
                                    class="fa fa-pencil" style="color:#03AC13"></span></a>
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Xác nhận xóa sản phẩm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <a href="admin/product/delete/{{ $pro->id }}" type="button" class="btn btn-primary">Xác
                                nhận</a>
                        </div>
                    </div>
                </div>
            </div>
        </table>

    </div>
@endsection
