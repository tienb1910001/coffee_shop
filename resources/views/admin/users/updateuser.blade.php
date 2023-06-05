@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <form action="admin/user/update/{{ $user->id }}" method="post" class="row g-3">
            <div class="mt-5 mb-3 d-flex justify-content-between">
                <h2 class="pull-left" style="color:red;">Cập nhật người dùng</h2>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Xác nhận</button>
            </div>
            <div class="col-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            <p>{{ $err }}</p>
                        @endforeach
                    </div>
                @endif
                @if (Session::has('thanhcong'))
                    <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
                @endif
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-6">
                <label for="inputFullName" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="inputFullName" name="inputFullName" value="{{ $user->full_name }}">
                    
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail" name="inputEmail"
                    value="{{ $user->email }}" >
            </div>
            <div class="col-md-3">
                <label for="inputPhone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="inputPhone" name="inputPhone"
                    value="{{ $user->phone }}">
            </div>
            <div class="col-md-3">
                <label for="inputAddress" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="{{ $user->address }}">
            </div>
        </form>
    </div>
@endsection
