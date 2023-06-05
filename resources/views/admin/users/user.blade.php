@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <div class="mt-5 mb-3 d-flex justify-content-between">
            <h2 class="pull-left">Thông tin sản phẩm</h2>
            <button type="button"class="btn btn-success"><i class="fa fa-edit"></i>
                <a href="admin/user/update/{{ $user->id }}" style="color: #fff">Sửa thông tin</a>
            </button>
        </div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputFullName" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="inputFullName" value="{{ $user->full_name }}" disabled>
            </div>
            
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail" value="{{ $user->email }}" disabled>
            </div>
           
            <div class="col-md-3">
                <label for="inputPhone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="inputPhone" value="{{ $user->phone }}" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="inputAddress" value="{{ $user->address }}" disabled>
            </div>
        </form>
    </div>
@endsection
