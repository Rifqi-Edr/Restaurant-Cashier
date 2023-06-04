<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;

class UserMakananController extends Controller
{

    public function index()
    {
        $makanans = Makanan::all();
        $minumans = Minuman::all();
        return view('user.makanan', compact('makanans'));
    }
    public function addToCart($id)
    {
        $Makanans = Makanan::findOrFail($id);
 
        $cart = session()->get('cartMakanan', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "nama_makanan" => $Makanans->nama_makanan,
                "harga_makanan" => $Makanans->harga_makanan,
                "quantity" => 1
            ];
        }
 
        session()->put('cartMakanan', $cart);
        return redirect()->back()->with('success', 'Makanans add to cart successfully!');
    }
    public function remove(Request $request, $id){
        $cart = session()->get('cartMakanan');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cartMakanan', $cart);
        }
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cartMakanan');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["subtotal"] = $cart[$request->id]["harga_makanan"] * $request->quantity;
            session()->put('cartMakanan', $cart);
            session()->flash('success', 'Cart successfully updated!');
            return response()->json([
                'harga_makanan' => $cart[$request->id]["harga_makanan"],
                'quantity' => $request->quantity
            ]);
        }
    }    
}
