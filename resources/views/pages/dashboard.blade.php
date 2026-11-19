@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0;">Dashboard</h2>
        <p style="margin-bottom: 0.25rem;">Selamat datang, <strong>{{ $user->name }}</strong></p>
        <p class="muted" style="margin-bottom: 0;">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
    </section>

    <section class="row" style="margin-top: 1.15rem;">
        <div class="card" style="background-color: #f9fcff;">
            <h3 style="margin-top: 0;">Total Artikel</h3>
            <p style="font-size: 2rem; font-weight: 700; color: #1d4ed8; margin: 0.25rem 0;">{{ $totalArticles }}</p>
            <p class="muted" style="margin-bottom: 0;">Jumlah seluruh artikel yang ada di sistem.</p>
        </div>

        <div class="card" style="background-color: #f9fcff;">
            <h3 style="margin-top: 0;">Artikel Kamu</h3>
            <p style="font-size: 2rem; font-weight: 700; color: #1d4ed8; margin: 0.25rem 0;">{{ $myArticles }}</p>
            <p class="muted" style="margin-bottom: 0;">Artikel yang dibuat oleh akun kamu.</p>
        </div>

        <div class="card" style="background-color: #f9fcff;">
            <h3 style="margin-top: 0;">Aksi Cepat</h3>
            <ul style="margin: 0; padding-left: 1.15rem; display: grid; gap: 0.4rem;">
                <li><a href="{{ route('articles.create') }}">+ Tambah Artikel Baru</a></li>
                <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel</a></li>
                <li><a href="{{ route('home') }}">Lihat Halaman Home</a></li>
            </ul>
        </div>
    </section>

    <section class="card" style="margin-top: 1.15rem;">
        <h3 style="margin-top: 0;">Artikel Terbaru</h3>

        @if ($latestArticles->isNotEmpty())
            <div class="row">
                @foreach ($latestArticles as $article)
                    <article class="card" style="background-color: #f9fcff;">
                        <div style="display: flex; gap: 0.9rem; align-items: flex-start;">
                            <img src="{{ $article->image_url }}"
                                 alt="Thumbnail {{ $article->title }}"
                                 style="width: 110px; height: 78px; object-fit: cover; border-radius: 8px; flex-shrink: 0;">

                            <div>
                                <h4 style="margin: 0 0 0.25rem;">
                                    <a href="{{ route('articles.show', $article) }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>

                                <p class="muted" style="margin: 0 0 0.4rem;">
                                    oleh {{ $article->user->name }}
                                    <span> &bull; </span>
                                    <span>{{ $article->created_at->format('d M Y') }}</span>
                                </p>

                                <p style="margin: 0;">
                                    {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                                </p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="muted" style="margin-bottom: 0;">Belum ada artikel yang bisa ditampilkan.</p>
        @endif
    </section>

    <section class="card" style="margin-top: 1.15rem;">
        <h3 style="margin-top: 0;">Info Akun</h3>
        <ul style="margin: 0 0 0.5rem; padding-left: 1.15rem;">
            <li><strong>Nama:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>
        <p class="muted" style="margin-bottom: 0;">
            Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
        </p>
    </section>
@endsection