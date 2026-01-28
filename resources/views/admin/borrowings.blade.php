@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Kelola Peminjaman</h1>
            <p class="text-muted">Daftar semua peminjaman buku di perpustakaan</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            @if($borrowings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Pengguna</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tenggat</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($borrowings as $borrowing)
                            <tr>
                                <td>
                                    <strong>{{ $borrowing->user->name }}</strong><br>
                                    <small class="text-muted">{{ $borrowing->user->email }}</small>
                                </td>
                                <td>
                                    <strong>{{ $borrowing->book->title }}</strong><br>
                                    <small class="text-muted">{{ $borrowing->book->author }}</small>
                                </td>
                                <td>{{ $borrowing->borrowed_date->format('d/m/Y') }}</td>
                                <td>{{ $borrowing->due_date->format('d/m/Y') }}</td>
                                <td>
                                    @if($borrowing->returned_date)
                                        {{ $borrowing->returned_date->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($borrowing->status == 'borrowed')
                                        @if($borrowing->isOverdue())
                                            <span class="badge bg-danger">Terlambat</span>
                                        @else
                                            <span class="badge bg-primary">Dipinjam</span>
                                        @endif
                                    @else
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @endif
                                </td>
                                <td>
                                    @if($borrowing->status == 'borrowed')
                                        <form action="{{ route('admin.borrowings.return', $borrowing) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                                                <i class="fas fa-undo"></i> Kembalikan
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center">
                    {{ $borrowings->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Belum ada data peminjaman.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
