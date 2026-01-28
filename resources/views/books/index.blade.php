@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Katalog Buku</h1>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <form method="GET" action="{{ route('user.books.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-right">
            <select name="category" class="form-control d-inline-block w-auto" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Fiksi" {{ request('category') == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                <option value="Non-Fiksi" {{ request('category') == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                <option value="Pelajaran" {{ request('category') == 'Pelajaran' ? 'selected' : '' }}>Pelajaran</option>
                <option value="Referensi" {{ request('category') == 'Referensi' ? 'selected' : '' }}>Referensi</option>
            </select>
        </div>
    </div>
    
    <div class="row">
        @if($books->count() > 0)
            @foreach($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-book fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text text-muted">{{ $book->author }}</p>
                        <p class="card-text">
                            <small class="text-muted">ISBN: {{ $book->isbn }}</small><br>
                            <small class="text-muted">Kategori: {{ $book->category }}</small><br>
                            <small class="{{ $book->available_copies > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $book->available_copies > 0 ? 'Tersedia' : 'Tidak Tersedia' }} ({{ $book->available_copies }}/{{ $book->total_copies }})
                            </small>
                        </p>
                        @if($book->description)
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                        @endif
                        <div class="mt-auto">
                            <a href="{{ route('user.books.show', $book) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            @if($book->isAvailable() && auth()->check())
                                <form action="{{ route('user.borrow', $book) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin meminjam buku ini?')">
                                        <i class="fas fa-hand-holding"></i> Pinjam
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Tidak ada buku yang ditemukan.
                </div>
            </div>
        @endif
    </div>
    
    <div class="row">
        <div class="col-12">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
