@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Dashboard Admin</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Peminjaman Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $activeBorrowings }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-holding fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
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
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peminjaman Terbaru</h6>
                </div>
                <div class="card-body">
                    @if($recentBorrowings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pengguna</th>
                                        <th>Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBorrowings as $borrowing)
                                    <tr>
                                        <td>{{ $borrowing->user->name }}</td>
                                        <td>{{ $borrowing->book->title }}</td>
                                        <td>{{ $borrowing->borrowed_date->format('d/m/Y') }}</td>
                                        <td>
                                            @if($borrowing->status == 'borrowed')
                                                <span class="badge badge-primary">Dipinjam</span>
                                            @elseif($borrowing->status == 'returned')
                                                <span class="badge badge-success">Dikembalikan</span>
                                            @else
                                                <span class="badge badge-warning">Terlambat</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Belum ada data peminjaman.</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus"></i> Tambah Buku
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('admin.books.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-list"></i> Kelola Buku
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="{{ route('admin.borrowings') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-hand-holding"></i> Kelola Peminjaman
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="btn btn-success btn-block">
                                <i class="fas fa-chart-bar"></i> Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
