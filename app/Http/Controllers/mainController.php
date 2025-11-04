<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\product;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderitem;
use Illuminate\Http\Request;

class mainController extends Controller
{
   public function about() {
       return view('about');
   }
   public function registerUser(Request $data) {
    $newuser=new user();
    $newuser->username=$data->username;
    $newuser->email=$data->email;
    $newuser->password=$data->password;
    $newuser->picture=$data->file('picture')->getClientOriginalName();
    $data->file('picture')->move('uploads/profiles',$newuser->Picture);
    $newuser->type="Customer";
    if( $newuser->save())
    {   
    return redirect('login')->with('success','Congratulation! User Registered Successfully');
    }
       return view('register');
   }

   public function updateUser(Request $data) 
   {
        $user=user::find(session()->get('id'));
        $user->username=$data->username;
        $user->password=$data->password;
        if($data->hasFile('picture'))
        {
            $user->picture=$data->file('picture')->getClientOriginalName();
            $data->file('picture')->move('uploads/profiles',$user->Picture);
        }
        if( $user->save())
        {   
        return redirect()->back()->with('success','Congratulation! Profile Updated Successfully');
        }
        return view('profile');
   }

    public function register() {
       return view('register');
   }
    public function login() {
       return view('login');
   }
    public function loginuser(Request $data) {
       $user=user::where('email',$data->email)
       ->where('password',$data->password)->first();
       if($user)
       {
            session()->put('id',$user->id);
            session()->put('type',$user->type);
            if($user->type=="Customer")
            {
                return redirect('/');
            }
            
        }
        else
            {
                return redirect('/login')->with('error','Invalid username or password');
            }
    }
    public function logout() {
        session()->forget('id');
        session()->forget('type');
        return redirect('/login');
   }


    public function index() {
        $allProducts=Product::all();
        // $hotSales=Product::where('type','sales')->get();
        // $bestSellers=Product::where('type','new-arrivals')->get();
   
       return view('index',compact('allProducts'));
   }
    public function blog() {
       return view('blog');
   }
   public function profile() {
    if(session()->has('id'))
    {
        $user=user::find(session()->get('id'));
        return view('profile',compact('user'));
    }
       return view('profile');
   }
   
   
    public function singleproduct($id) {
        $product=Product::find($id);
       return view('single-product',compact('product'));
   }
    public function cart() {
        $cartItem=DB::table('products')
        ->join('carts',"carts.product_id","products.id")
        ->select("products.title","products.price","products.picture","products.quantity as pquantity","carts.*")
        ->where("carts.user_id",session()->get('id'))
        ->get();
        
       return view('cart',compact('cartItem'));
   }
    public function shop() {
       return view('shop');
   }
    public function blogdetails() {
       return view('blog-details');
   }
   public function addtocart(Request $data) 
   {
    
        if(session()->has('id'))
        {   
        $cart=new Cart();
        $cart->product_id=$data->input('product_id');
        $cart->quantity=$data->input('quantity');
        $cart->user_id=session()->get('id');
        $cart->save();
        return redirect()->back()->with('success','Item is added to cart');
        }
        return redirect('login')->with('error','Kindly Login to add item to cart');
   }

   public function updatecart(Request $data) 
   {
    
        if(session()->has('id'))
        {   
        $cart=Cart::find($data->input('id'));
        $cart->quantity=$data->input('quantity');
        $cart->save();
        return redirect()->back()->with('success2','Item is updated in cart');
        }
        return redirect('login')->with('error','Kindly Login to add item to cart');
   }

   public function checkout(Request $data) 
   {
    
        if(session()->has('id'))
        {   
        $order=new order();
        $order->user_id=session()->get('id');
        $order->address=$data->input('address');
        $order->phone=$data->input('phone');
        $order->fullname=$data->input('fullname');
        $order->total_amount=$data->input('total');
        $order->status="Pending";
        if($order->save())
        {
            $cartItems=Cart::where('user_id',session()->get('id'))->get();
            foreach($cartItems as $item)
            {
                $orderitem=new orderitem();
                $orderitem->product_id=$item->product_id;
                $orderitem->quantity=$item->quantity;
                $product=Product::find($item->product_id);
                $orderitem->price=$product->price;
                $orderitem->order_id=$order->id;
                $orderitem->save();
                $item->delete();
            }
        }
        return redirect()->back()->with('success2','Your order has been placed successfully');
        }
        return redirect('login')->with('error','Kindly Login to add item to cart');
   }
   
   public function deletefromcart($id)
   {
    $deleteitem=Cart::find($id);
    if($deleteitem->delete())
    {
        return redirect()->back()->with('success','Item Deleted from cart');
    }
   }
}
