<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = produk::paginate(5);

        return view('admin.produk', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga_produk' => 'required|numeric',
            'promo' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk harus berupa string.',
            'nama_produk.max' => 'Nama produk maksimal 25 karakter.',
            'harga_produk.required' => 'Harga produk wajib diisi.',
            'harga_produk.numeric' => 'Harga produk harus berupa angka.',
            'promo.required' => 'Promo wajib diisi.',
            'promo.numeric' => 'Promo harus berupa angka.',
            'foto.required' => 'Foto wajib diisi.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file jpeg, png, jpg, gif, atau svg.',
            'foto.max' => 'Foto maksimal 2048 KB.',
        ]);

        $fileName = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Membuat nama file unik
            $file->move(public_path('uploads'), $fileName); // Simpan ke direktori public/uploads
        }

        $produk = new produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->promo = $request->promo;
        $produk->foto = $fileName;
        $produk->save();

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id_produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga_produk' => 'required|numeric',
            'promo' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk harus berupa string.',
            'nama_produk.max' => 'Nama produk maksimal 25 karakter.',
            'harga_produk.required' => 'Harga produk wajib diisi.',
            'harga_produk.numeric' => 'Harga produk harus berupa angka.',
            'promo.required' => 'Promo wajib diisi.',
            'promo.numeric' => 'Promo harus berupa angka.',
            'foto.image' => 'Foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berupa file jpeg, png, jpg, gif, atau svg.',
            'foto.max' => 'Foto maksimal 2048 KB.',
        ]);


        $produk = produk::find($id_produk);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->promo = $request->promo;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Membuat nama file unik
            $file->move(public_path('uploads'), $fileName); // Simpan ke direktori public/uploads
            $produk->foto = $fileName;
        }
        $produk->update();

        return redirect()->route('produk')->with('success', 'Produk berhasil diubah.');
    }

    public function destroy($id_produk)
    {
        $produk = produk::find($id_produk);
        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus.');
    }

}
