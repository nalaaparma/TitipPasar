<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // READ: Menampilkan semua produk
    public function index()
    {
        $produks = Produk::latest()->get();

        return view('produk.index', compact('produks'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // CREATE: Menyimpan produk
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan detail produk
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.show', compact('produk'));
    }

    // Menampilkan form edit
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    // UPDATE: Memperbarui produk
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }

            $data['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // DELETE: Menghapus produk
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
