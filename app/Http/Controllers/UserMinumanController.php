<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;

class UserMinumanController extends Controller
{

    public function index()
    {
        $minumans = Minuman::all();
        $makanans = Makanan::all();
        return view('user.minuman', compact('minumans'));
    }

    public function addToCart($id)
    {
        $minumans = Minuman::findOrFail($id);
 
        $cart = session()->get('cartMinuman', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "nama_minuman" => $minumans->nama_minuman,
                "harga_minuman" => $minumans->harga_minuman,
                "quantity" => 1
            ];
        }
 
        session()->put('cartMinuman', $cart);
        return redirect()->back()->with('success', 'Minu$minumans add to cart successfully!');
    }
            
    public function remove(Request $request, $id){
        $cart = session()->get('cartMinuman');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cartMinuman', $cart);
        }
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cartMinuman');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["subtotal"] = $cart[$request->id]["harga_minuman"] * $request->quantity;
            session()->put('cartMinuman', $cart);
            session()->flash('success', 'Cart successfully updated!');
            return response()->json([
                'harga_minuman' => $cart[$request->id]["harga_minuman"],
                'quantity' => $request->quantity
            ]);
        }
    }  
}
