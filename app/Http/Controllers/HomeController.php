<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //


    public function home()
    {
        $data = product::paginate(5);
        $user = auth()->user();
        if(!$user) {
            return view('home',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('home',compact('data','count'));
    }

    public function about()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('about',compact('data'));            
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('about',compact('data','count'));
    }

    public function product()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('product',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('product',compact('data','count'));
    }

    // public function service()
    // {
    //     return view('service');
    // }

    // public function blog()
    // {
    //     return view('blog');
    // }

    public function contact()
    {
        $data = product::all();
        $user = auth()->user();
        if(!$user) {
            return view('contact',compact('data'));
        }
        $count = cart::where('phone',$user->phone)->count();
        return view('contact',compact('data','count'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }



    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addproduct()
    {
        return view('admin.addproduct');
    }
    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            $product = product::find($id);

            $cart = new cart;

            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();

            return back()->with('message','Product Added to Cart');

        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart()
    {
        $user = auth()->user();
        $cart=cart::where('phone',$user->phone)->get();
        $count = cart::where('phone',$user->phone)->count();
        return view('showcart',compact('count','cart'));
    }

        public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted from Cart');
    }

    public function confirmorder(Request $request)
    {
        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $email=$user->email;
        $address=$user->address;

        foreach($request->productname as $key=>$productname)
        {
            $order = new order;

            $order -> product_name=$request->productname[$key];
            $order -> price=$request->price[$key];
            $order -> quantity=$request->quantity[$key];
            $order -> name=$name;
            $order -> phone=$phone;
            $order -> email=$email;
            $order -> address=$address;
            $order -> status="not delivered";

            $order->save();
        }

        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Order Successful');
    }
}
