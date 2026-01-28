@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Kelola Buku</h1>
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Buku Baru
                </a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            @if($books->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Eksemplar</th>
                                <th>Tersedia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>
                                    @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="max-height: 50px; max-width: 40px;">
                                    @else
                                        <i class="fas fa-book text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $book->title }}</strong><br>
                                    <small class="text-muted">ISBN: {{ $book->isbn }}</small>
                                </td>
                                <td>{{ $book->author }}</td>
                                <td><span class="badge bg-info">{{ $book->category }}</span></td>
                                <td>{{ $book->total_copies }}</td>
                                <td>
                                    <span class="badge {{ $book->available_copies > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $book->available_copies }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.books.show', $book) }}" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center">
                    {{ $books->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Belum ada buku di katalog.
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm ms-2">
                        <i class="fas fa-plus"></i> Tambah Buku
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
