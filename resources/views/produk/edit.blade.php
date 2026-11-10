
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit Produk</h2>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk"
                           class="form-control"
                           value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                    @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori"
                           class="form-control"
                           value="{{ old('kategori', $produk->kategori) }}" required>
                    @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" min="0"
                           class="form-control"
                           value="{{ old('harga', $produk->harga) }}" required>
                    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" min="0"
                           class="form-control"
                           value="{{ old('stok', $produk->stok) }}" required>
                    @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                              rows="4">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label><br>
                    @if($produk->foto)
                        <img src="{{ asset('storage/'.$produk->foto) }}"
                             width="120" class="mb-2">
                    @else
                        <p>Belum ada foto.</p>
                    @endif

                    <input type="file" name="foto" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
