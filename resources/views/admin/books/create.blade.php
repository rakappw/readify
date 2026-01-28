@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Tambah Buku Baru</h1>
            <p class="text-muted">Tambahkan buku baru ke katalog perpustakaan</p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                           id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('isbn') is-invalid @enderror" 
                           id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                    @error('isbn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('category') is-invalid @enderror" 
                            id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Fiksi" {{ old('category') == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                        <option value="Non-Fiksi" {{ old('category') == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                        <option value="Pelajaran" {{ old('category') == 'Pelajaran' ? 'selected' : '' }}>Pelajaran</option>
                        <option value="Referensi" {{ old('category') == 'Referensi' ? 'selected' : '' }}>Referensi</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="total_copies" class="form-label">Jumlah Eksemplar <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('total_copies') is-invalid @enderror" 
                           id="total_copies" name="total_copies" value="{{ old('total_copies', 1) }}" min="1" required>
                    @error('total_copies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Gambar Cover</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid @enderror" 
                           id="cover_image" name="cover_image" accept="image/*">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Maksimal: 2MB</small>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Buku
                    </button>
                    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
