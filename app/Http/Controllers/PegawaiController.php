<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->search;
        
        if(!empty($search)) {
            $data = User::where('nama', 'LIKE', '%'.$search.'%')
                ->orWhere('id', 'like', '%'.$search.'%');
        } else {
            $data = User::all();
        }

        //
        //$data = User::all();
        return view('pegawai.daftar')->with( [
            'data'=>$data,
            'search'=>$search,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'level' => $request->input('level')
        ];

        User::create($data);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return '<h1> Saya siswa dari controller dengan id $id</h1>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('id', $id)->first();
        //return view('User/index')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'level' => $request->input('level')
        ];

        User::where('id', $id)->update($data);
        return redirect('/user')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect('/user')->with('success', 'berhasil');
    }
}
