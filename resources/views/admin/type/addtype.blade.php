@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <form action="admin/type/add" method="post" class="row g-3 w-50" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mt-5 mb-3 d-flex justify-content-between">
                <h2 class="pull-left" style="color:red;">Thêm loại sản phẩm</h2>
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
            <div class="col-12">
                <label for="inputName" class="form-label">Tên</label>
                <input type="text" class="form-control " id="inputName" name="inputName" required>
            </div>
        </form>
    </div>
@endsection
