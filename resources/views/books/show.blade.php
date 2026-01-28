@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded" alt="{{ $book->title }}">
            @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                    <i class="fas fa-book fa-5x text-muted"></i>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <h1>{{ $book->title }}</h1>
            <p class="text-muted">Oleh: {{ $book->author }}</p>
            
            <div class="mb-3">
                <span class="badge bg-primary">{{ $book->category }}</span>
                <span class="badge {{ $book->available_copies > 0 ? 'bg-success' : 'bg-danger' }}">
                    {{ $book->available_copies > 0 ? 'Tersedia' : 'Tidak Tersedia' }}
                </span>
            </div>
            
            <table class="table table-striped">
                <tr>
                    <td><strong>ISBN:</strong></td>
                    <td>{{ $book->isbn }}</td>
                </tr>
                <tr>
                    <td><strong>Kategori:</strong></td>
                    <td>{{ $book->category }}</td>
                </tr>
                <tr>
                    <td><strong>Total Eksemplar:</strong></td>
                    <td>{{ $book->total_copies }}</td>
                </tr>
                <tr>
                    <td><strong>Tersedia:</strong></td>
                    <td>{{ $book->available_copies }}</td>
                </tr>
            </table>
            
            @if($book->description)
                <div class="mb-3">
                    <h5>Deskripsi</h5>
                    <p>{{ $book->description }}</p>
                </div>
            @endif
            
            @if(auth()->check())
                @if($book->isAvailable())
                    <form action="{{ route('user.borrow', $book) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin meminjam buku ini?')">
                            <i class="fas fa-hand-holding"></i> Pinjam Buku
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary" disabled>
                        <i class="fas fa-times"></i> Tidak Tersedia
                    </button>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Login untuk Meminjam
                </a>
            @endif
            
            <a href="{{ route('user.books.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Katalog
            </a>
        </div>
    </div>
</div>
@endsection
