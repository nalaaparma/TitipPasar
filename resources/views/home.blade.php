@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section class="hero-section">
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <span class="eyebrow"><i class="bi bi-stars me-1"></i>Belanja pasar lebih praktis</span>
                <h1 class="display-4 fw-bold mt-3">Pasar dekat,<br><span class="text-green">belanja makin mudah.</span></h1>
                <p class="lead text-secondary mt-3">TitipPasar membantu kamu mendapatkan sayur, buah, dan kebutuhan harian tanpa harus repot ke pasar.</p>
                <a href="#produk" class="btn btn-brand btn-lg mt-2">Jelajahi Produk <i class="bi bi-arrow-right ms-2"></i></a>
                <div class="hero-note mt-4"><i class="bi bi-check-circle-fill me-2"></i>Praktis · Segar · Terpercaya</div>
            </div>
            <div class="col-lg-6">
                <div class="hero-art">
                    <div class="hero-circle"></div>
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=1000&q=85" alt="Sayuran segar" class="hero-image">
                    <div class="floating-card"><i class="bi bi-truck"></i><div><strong>Belanja praktis</strong><small class="d-block text-muted">Kebutuhan harianmu</small></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5" id="kategori">
    <div class="section-heading">
        <div><span class="eyebrow">PILIH SESUAI KEBUTUHAN</span><h2 class="fw-bold mt-2">Kategori Pilihan</h2></div>
        <span class="text-muted">Temukan kebutuhanmu</span>
    </div>
    <div class="row g-3 mt-2">
        @foreach ([
            ['Sayuran','bi-flower1','category-green'],
            ['Buah-buahan','bi-apple','category-orange'],
            ['Bahan Pokok','bi-basket','category-yellow'],
            ['Daging & Ikan','bi- fish','category-pink']
        ] as $category)
        <div class="col-6 col-md-3">
            <a class="category-card text-decoration-none" href="#produk">
                <span class="category-icon {{ $category[2] }}"><i class="bi {{ str_replace(' ','',$category[1]) }}"></i></span>
                <strong>{{ $category[0] }}</strong><small class="text-muted">Lihat produk</small>
            </a>
        </div>
        @endforeach
    </div>
</section>

<section class="products-section py-5" id="produk">
    <div class="container">
        <div class="section-heading">
            <div><span class="eyebrow">PILIHAN HARI INI</span><h2 class="fw-bold mt-2">Produk Segar</h2></div>
            <span class="text-muted small">Contoh tampilan produk</span>
        </div>
        <div class="row g-4 mt-2">
            @php
                $products = [
                    ['Bayam Segar','Sayuran','Rp5.000','https://images.unsplash.com/photo-1576045057995-568f588f82fb?auto=format&fit=crop&w=700&q=80'],
                    ['Wortel','Sayuran','Rp8.000','https://images.unsplash.com/photo-1445282768818-728615cc910a?auto=format&fit=crop&w=700&q=80'],
                    ['Apel Merah','Buah-buahan','Rp18.000','https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=700&q=80'],
                    ['Tomat Segar','Sayuran','Rp7.000','https://images.unsplash.com/photo-1546094096-0df4bcaaa337?auto=format&fit=crop&w=700&q=80'],
                ];
            @endphp
            @foreach($products as $product)
            <div class="col-6 col-lg-3">
                <article class="product-card h-100">
                    <img src="{{ $product[3] }}" alt="{{ $product[0] }}" class="product-image">
                    <div class="p-3">
                        <small class="text-muted">{{ $product[1] }}</small>
                        <h5 class="fw-semibold mt-1">{{ $product[0] }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="price">{{ $product[2] }}</strong>
                            <button class="btn btn-add" type="button" aria-label="Tambah {{ $product[0] }}"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        <p class="small text-muted mt-3 mb-0">*Produk dan harga di atas hanya contoh desain. Nantinya dapat dihubungkan ke database.</p>
    </div>
</section>

<section class="container py-5">
    <div class="cta-box">
        <div><span class="eyebrow text-white-50">TITIPPASARAPP</span><h2 class="fw-bold text-white mt-2">Kebutuhan pasar dalam genggaman.</h2><p class="text-white-50 mb-0">Mulai jelajahi produk pilihan hari ini.</p></div>
        <a href="#produk" class="btn btn-light rounded-pill px-4">Lihat Produk</a>
    </div>
</section>
@endsection
