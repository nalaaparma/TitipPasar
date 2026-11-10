
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Daftar Produk</h2>
            <p class="text-muted">Kelola produk TitipPasar</p>
        </div>

        <a href="{{ route('produk.create') }}" class="btn btn-success">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            Periksa kembali data produk yang dimasukkan.
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($produk->foto)
                                    <img src="{{ asset('storage/'.$produk->foto) }}"
                                         width="65" height="65"
                                         style="object-fit: cover;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kategori }}</td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <a href="{{ route('produk.show', $produk->id) }}"
                                   class="btn btn-info btn-sm">Detail</a>

                                <a href="{{ route('produk.edit', $produk->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('produk.destroy', $produk->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada produk. Silakan tambahkan produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
