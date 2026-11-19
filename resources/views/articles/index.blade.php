@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <section class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <h2 style="margin: 0;">Daftar Artikel</h2>
            <a href="{{ route('articles.create') }}" class="btn">+ Artikel Baru</a>
        </div>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($articles->isNotEmpty())
            <ul class="article-list">
                @foreach ($articles as $article)
                    <li class="article-item">
                        <div>
                            <a href="{{ route('articles.show', $article) }}" style="font-weight: 600;">
                                {{ $article->title }}
                            </a>
                            <div class="muted">oleh {{ $article->user->name }}</div>
                        </div>

                        @if ($article->user_id === auth()->id())
                            <div class="article-actions">
                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-soft">Edit</a>
                                <form action="{{ route('articles.destroy', $article) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            {{ $articles->links('pagination::default') }}
        @else
            <p class="muted" style="margin-top: 1rem; margin-bottom: 0;">Belum ada artikel.</p>
        @endif
    </section>
@endsection