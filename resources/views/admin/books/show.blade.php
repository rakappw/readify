@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Detail Buku</h1>
                <div>
                    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    
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
            <h2>{{ $book->title }}</h2>
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
                <tr>
                    <td><strong>Dipinjam:</strong></td>
                    <td>{{ $book->total_copies - $book->available_copies }}</td>
                </tr>
            </table>
            
            @if($book->description)
                <div class="mb-3">
                    <h5>Deskripsi</h5>
                    <p>{{ $book->description }}</p>
                </div>
            @endif
            
            <div class="mb-3">
                <h5>Statistik Peminjaman</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->borrowings()->count() }}</h5>
                                <p class="card-text">Total Peminjaman</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->borrowings()->where('status', 'borrowed')->count() }}</h5>
                                <p class="card-text">Sedang Dipinjam</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->borrowings()->where('status', 'returned')->count() }}</h5>
                                <p class="card-text">Telah Dikembalikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
