<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Minuman;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $makanans = Makanan::all();
        $minumans = Minuman::all();
        return view('pegawai.menu', compact('makanans', 'minumans'));
    }
    public function addPage() {
        return view('add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  

        $request->gambar->move(public_path('images'), $imageName);

        if ($request->jenis == 'Makanan') {
            Makanan::create([
                'nama_makanan' => $request->nama,
                'kategori_makanan' => $request->kategori,
                'harga_makanan' => $request->harga,
                'gambar_makanan' => $imageName,
            ]);
        } else {
            Minuman::create([
                'nama_minuman' => $request->nama,
                'kategori_minuman' => $request->kategori,
                'harga_minuman' => $request->harga,
                'gambar_minuman' => $imageName,
            ]);
        }
        return redirect('/menu');
    }
    public function edit($jenis, $id)
    {
        if ($jenis == 'makanan') {
            $menu = Makanan::find($id);
        } else {
            $menu = Minuman::find($id);
        }
        return view('edit', compact('menu', 'jenis'));
    }
    public function update(Request $request, $jenis, $id)
    {
        if ($jenis == 'makanan') {
            $menu = Makanan::findOrFail($id);
            $menu->nama_makanan = $request->input('nama');
            $menu->kategori_makanan = $request->input('kategori');
            $menu->harga_makanan = $request->input('harga');
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar_name = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images'), $gambar_name);
                $menu->gambar_makanan = $gambar_name;
            }
        } else {
            $menu = Minuman::findOrFail($id);
            $menu->nama_minuman = $request->input('nama');
            $menu->kategori_minuman = $request->input('kategori');
            $menu->harga_minuman = $request->input('harga');
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambar_name = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images'), $gambar_name);
                $menu->gambar_minuman = $gambar_name;
            }
        }


        $menu->save();

        //return redirect(route('pegawai.daftar'));
        return redirect('/menu')->with('success', 'Data berhasil diperbarui!');
    }
    public function deleteMakanan($id)
    {
        $makanan = Makanan::find($id);
        $makanan->delete();

        return redirect()->back();
    }
    public function deleteMinuman($id)
    {
        $minuman = Minuman::find($id);
        $minuman->delete();

        return redirect()->back();
    }
}
