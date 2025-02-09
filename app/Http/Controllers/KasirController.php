<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $kasir = kasir::where('id_level', 2)->paginate(perPage: 5);
        return view('admin.kasir', compact('kasir'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
        ]);

        $kasir = new kasir();
        $kasir->username= $request->username;
        $kasir->password = bcrypt($request->password);
        $kasir->nama_lengkap = $request->nama_lengkap;
        $kasir->id_level = 2;
        $kasir->save();

        return redirect()->route('kasir')
            ->with('success', 'Kasir created successfully.');
    }

    public function update(Request $request, $id_kasir)
    {
        $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
        ]);
        $kasir = kasir::find($id_kasir);
        $kasir->nama_lengkap = $request->nama_lengkap;
        $kasir->username = $request->username;
        $kasir->password = $request->password;


        $kasir->update();

        return redirect()->route('kasir')
            ->with('success', 'Kasir updated successfully');    
    }


    public function destroy($id)
    {
        $kasir = kasir::find($id);
        $kasir->delete();

        return redirect()->route('kasir')
            ->with('success', 'Kasir deleted successfully');
    }
}
