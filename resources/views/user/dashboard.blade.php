@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Dashboard Siswa</h1>
            <p class="text-muted">Selamat datang, {{ auth()->user()->name }}!</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Buku Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeBorrowings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBorrowings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-history fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Terlambat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $overdueBorrowings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Katalog Buku</h6>
                    <a href="{{ route('user.books.index') }}" class="btn btn-sm btn-primary">
                        Lihat Semua <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $recentBooks = App\Models\Book::latest()->take(4)->get();
                        @endphp
                        @if($recentBooks->count() > 0)
                            @foreach($recentBooks as $book)
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $book->title }}</h6>
                                        <p class="card-text text-muted small">{{ $book->author }}</p>
                                        <p class="card-text">
                                            <small class="text-muted">Kategori: {{ $book->category }}</small><br>
                                            <small class="{{ $book->available_copies > 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $book->available_copies > 0 ? 'Tersedia' : 'Tidak Tersedia' }} ({{ $book->available_copies }}/{{ $book->total_copies }})
                                            </small>
                                        </p>
                                        <a href="{{ route('user.books.show', $book) }}" class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>Belum ada buku tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('user.books.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-search"></i> Cari Buku
                        </a>
                        <a href="{{ route('user.borrowings.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-history"></i> Riwayat Peminjaman
                        </a>
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-user"></i> Profil Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
