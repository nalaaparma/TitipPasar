
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Tambah Produk</h2>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk"
                           class="form-control" value="{{ old('nama_produk') }}" required>
                    @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori"
                           class="form-control" value="{{ old('kategori') }}" required>
                    @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" min="0"
                           class="form-control" value="{{ old('harga') }}" required>
                    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" min="0"
                           class="form-control" value="{{ old('stok', 0) }}" required>
                    @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"
                              rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="foto" class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Format JPG, PNG, WEBP maksimal 2 MB.</small>
                    @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan Produk</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
