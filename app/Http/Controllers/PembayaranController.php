<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function prosesPembayaran(Request $request)
    {
        $total = $request->input('total');
        DB::table('transaksi')->insert(['total' => $total]);
        // return redirect()->back()->with('success', 'Transaksi berhasil');
        session()->forget('cartMakanan');
        session()->forget('cartMinuman');

        return redirect()->intended(route('makanan'));
    }
}
