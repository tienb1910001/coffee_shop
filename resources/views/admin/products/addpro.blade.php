@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <form action="admin/productadd" method="post" class="row g-3" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mt-5 mb-3 d-flex justify-content-between">
                <h2 class="pull-left" style="color:red;">Thêm sản phẩm</h2>
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
                <input type="text" class="form-control" id="inputName" name="inputName" required>
            </div>
            <div class="col-md-6">
                <label for="inputPriceM" class="form-label">Giá size M</label>
                <input type="text" class="form-control" id="inputPriceM" name="inputPriceM" required>
            </div>
            <div class="col-md-6">
                <label for="inputPriceL" class="form-label">Giá size L</label>
                <input type="text" class="form-control" id="inputPriceL" name="inputPriceL">
            </div>
            <div class="col-md-6">
                <label for="inputTypePro" class="form-label">Loại sản phẩm</label>
                <select class="form-select" id="inputTypePro" name="inputTypePro">
                    <option selected>Chọn loại</option>
                    @foreach ($loai as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="text" id="imageUrl" name="imageUrl">
            </div>
            <div class="col-12">
                <label for="inputDescription" class="form-label">Mô tả chi tiết</label>
                <textarea class="form-control" id="inputDescription" name="inputDescription" rows="3"></textarea>
            </div>
        </form>
    </div>
@endsection
