<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PageController extends Controller
{
    public function getIndex()
    {
        $new_product = Products::where('new', 1)->paginate(4);
        return view('page.index', compact('new_product'));
    }

    public function getAllProduct(Request $req)
    {
        $search = $req->input('search_product');
        if ($search) {
            $product = Products::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->get();
        } else {
            $product = Products::all();
        }
        return view('page.allproduct', compact('product'));
    }

    public function getProduct($id)
    {
        $sanpham = Products::where('id', $id)->first();
        $new_product = Products::where('new', 1)->paginate(4);
        return view('page.product', compact('sanpham', 'new_product'));
    }

    public function getContact()
    {
        return view('page.contact');
    }

    public function getAddCart(Request $req, $id)
    {
        $product = Products::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        if($req->size == 'M'){
            $price = $product->price_m;
            $size = 'M';
            
        }else {
            $price = $product->price_l;
            $size = 'L';
        }
        $cart->add($product, $id, $price, $size);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout()
    {
        return view('page.order');
    }


    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $bill = new Bill;
        $bill->date_order = date('Y-m-d');
        $bill->id_user = Auth::user()->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email.',
                'email.email' => 'Email không đúng định dạng.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu dài hơn 6 kí tự.',
                'password.max' => 'Mật khẩu ít hơn 20 kí tự.'
            ]
        );
        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            return redirect()->back()->with(['flag' => 'success', 'thongbao' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'thongbao' => 'Đăng nhập không thành công']);
        }
    }

    public function getSignup()
    {
        return view('page.signup');
    }

    public function postSignup(Request $req,)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:users,email',
                'fullname' => 'required',
                'phone' => 'required|min:10|max:10',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email.',
                'email.email' => 'Không đúng định dạng email.',
                'email.unique' => 'Email đã có người sử dụng.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu nhiều hơn 6 kí tự.',
                'password.max' => 'Mật khẩu ít hơn 20 kí tự.',
                're_password.same' => 'Mật khẩu không trùng khớp.'
            ]
        );
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->re_password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('page');
    }
    public function getInfoUser($id){
        $user = User::where('id', $id)->first();
        return view('page.info',compact('user'));
    }
    public function postInfoUser(Request $req,$id){
        
        $user = User::findOrFail($id);
        $user->full_name = $req->fullname;
        $user->password = Hash::make($req->re_password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Cập nhật thành công');
    }
}
