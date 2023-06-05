<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Products;
use App\Models\User;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Products
    public function getIndex(Request $req)
    {
        $search = $req->input('search');
        if ($search) {
            $product = Products::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $product = Products::all();
        }
        return view('admin.products.allproduct', compact('product'));
    }

    public function addProduct()
    {
        $loai = Type::all();
        return view('admin.products.addpro', compact('loai'));
    }
    public function postProduct(Request $req)
    {
        $this->validate(
            $req,
            [
                'inputName' => 'required',
                'inputPriceM' => 'required',

            ],
            [
                'inputName.required' => 'Vui lòng nhập tên sản phẩm',
                'inputPriceM.required' => 'Nhập giá của sản phẩm',
            ]
        );
        $product = new Products();
        $product->name = $req->inputName;
        $product->price_m = $req->inputPriceM;
        $product->price_l = $req->inputPriceL;
        $product->id_type = $req->inputTypePro;
        $product->image = $req->imageUrl;
        $product->description = $req->inputDescription;
        $product->new = 1;
        $product->save();
        return redirect()->back()->with('thanhcong', 'Thêm thành công');
    }

    public function getProduct($id)
    {
        $sanpham = Products::where('id', $id)->first();
        $loai = Type::select('type_products.name')
            // ->join('products', 'products.id_type', '=', 'type_products.id')
            ->where('type_products.id', $sanpham->id_type)
            ->distinct()->get();
        return view('admin.products.product', compact('sanpham', 'loai'));
    }

    public function getUpdate($id)
    {
        $sanpham = Products::where('id', $id)->first();
        $loai = Type::all();
        return view('admin.products.updatepro', compact('sanpham', 'loai'));
    }

    public function postUpdate(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'inputName' => 'required',
                'inputPriceM' => 'required',
            ],
            [
                'inputName.required' => 'Vui lòng nhập tên sản phẩm',
                'inputPriceM.required' => 'Nhập giá của sản phẩm',
            ]
        );

        $product = Products::findOrFail($id);
        // $imageUrl->move('source\image\product',$imageUrl->getClientOriginalName());

        $product->name = $req->inputName;
        $product->price_m = $req->inputPriceM;
        $product->price_l = $req->inputPriceL;
        $product->image = $req->imageUrl;
        $product->id_type = $req->inputTypePro;
        $product->description = $req->inputDescription;
        $product->save();
        return redirect()->back()->with('thanhcong', 'Cập nhật thành công');
    }

    public function getDelete($id)
    {
        Products::where('id', $id)->first()->delete();
        return redirect()->back()->with('thanhcong', 'Xóa thành công');
    }

    // User
    public function getUser(Request $req)
    {
        $search = $req->input('search');

        if ($search) {
            $user = User::query()
                ->where('full_name', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $user = User::all();
        }

        return view('admin.users.alluser', compact('user'));
    }

    public function getInfoUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.user', compact('user'));
    }

    public function getUpdateUs($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.updateuser', compact('user'));
    }

    public function postUpdateUs(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'inputFullName' => 'required',
                'inputEmail' => 'required',
                'inputPhone' => 'required',
                'inputAddress' => 'required',
            ],
            [
                'inputFullName.required' => 'Vui lòng nhập tên họ và tên',
                'inputEmail.required' => 'Nhập email',
                'inputPhone.required' => 'Nhập số điện thoại',
                'inputAddress.required' => 'Nhập địa chỉ',
            ]
        );
        $user = User::findOrFail($id);
        $user->full_name = $req->inputFullName;
        $user->email = $req->inputEmail;
        $user->phone = $req->inputPhone;
        $user->address = $req->inputAddress;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Cập nhật thành công');
    }
    public function getDeleteUs($id)
    {
        User::where('id', $id)->first()->delete();
        return redirect()->back()->with('thanhcong', 'Xóa thành công');
    }

    // Type Products
    public function getType()
    {
        $type = Type::all();
        return view('admin.type.alltype', compact('type'));
    }
    public function addType()
    {
        return view('admin.type.addtype');
    }
    public function postAddType(Request $req)
    {
        $this->validate(
            $req,
            [
                'inputName' => 'required',
            ],
            [
                'inputName.required' => 'Vui lòng nhập tên loại',
            ]
        );
        $type = new Type();
        $type->name = $req->inputName;
        $type->save();
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    public function updateType($id)
    {
        $type = Type::where('id', $id)->first();
        return view('admin.type.updatetype', compact('type'));
    }
    public function postUpdateType(Request $req, $id)
    {
        $this->validate(
            $req,
            [
                'inputName' => 'required',
            ],
            [
                'inputName.required' => 'Vui lòng nhập tên loại',
            ]
        );
        $type = Type::findOrFail($id);
        $type->name = $req->inputName;
        $type->save();
        return redirect()->back()->with('thanhcong', 'Cập nhật thành công');
    }

    public function getDeleteType($id)
    {
        Type::where('id', $id)->first()->delete();
        return redirect()->back()->with('thanhcong', 'Xóa thành công');
    }

    // Bill
    public function getBill()
    {
        $bill = Bill::all();
        return view('admin.allbill', compact('bill'));
    }

    public function getDeleteBill($id)
    {
        Bill::where('id', $id)->first()->delete();
        return redirect()->back()->with('thanhcong', 'Xóa thành công');
    }

}
