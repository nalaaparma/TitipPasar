
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Detail Produk</h2>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            @if($produk->foto)
                <img src="{{ asset('storage/'.$produk->foto) }}"
                     alt="{{ $produk->nama_produk }}"
                     style="width: 220px; max-height: 220px; object-fit: cover;"
                     class="mb-3">
            @endif

            <h3>{{ $produk->nama_produk }}</h3>
            <p><strong>Kategori:</strong> {{ $produk->kategori }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $produk->stok }}</p>
            <p><strong>Deskripsi:</strong> {{ $produk->deskripsi ?: '-' }}</p>

            <a href="{{ route('produk.edit', $produk->id) }}"
               class="btn btn-warning">Edit</a>

            <a href="{{ route('produk.index') }}"
               class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
