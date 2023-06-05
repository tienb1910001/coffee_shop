@extends('admin.master')
@section('content')
    <div class="col-md-12 col">
        <div class="mt-5 mb-3 d-flex justify-content-between">
            <h2 class="pull-left">Thông tin sản phẩm</h2>
            <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>
                <a href="admin/product/update/{{ $sanpham->id }}" style="color: #fff">Sửa thông tin</a>
            </button>
        </div>
        <form class="row g-3">
            <div class="col-12">
                <label for="inputName" class="form-label">Tên</label>
                <input type="text" class="form-control" id="inputName" value="{{ $sanpham->name }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="inputUnitPrice" class="form-label">Giá size M</label>
                <input type="text" class="form-control" id="inputUnitPrice" value="{{ $sanpham->price_m }}" disabled>
            </div>
            <div class="col-md-6">
                <label for="inputProPrice" class="form-label">Giá size L</label>
                <input type="text" class="form-control" id="inputProPrice" value="{{ $sanpham->price_l }}"
                    disabled>
            </div>
            <div class="col-md-6">
                <label for="inputTypePro" class="form-label">Loại sản phẩm</label>
                <input type="text" class="form-control" id="inputTypePro" value="{{ $loai }}" disabled>
            </div>
            <div class="col-md-3">
                
            </div>
            <div class="col-mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="text" id="imageUrl" value="{{$sanpham->image}}" disabled>
            </div>
            <div class="col-12">
                <label for="inputDescription" class="form-label">Mô tả chi tiết</label>
                <input class="form-control" id="inputDescription" style="height: 50px" value="{{ $sanpham->description }}" disabled></textarea>
            </div>
        </form>
    </div>
@endsection
