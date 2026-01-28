<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'isbn' => '9786022910457',
                'description' => 'Novel tentang perjuangan anak-anak Belitung dalam mengejar mimpi.',
                'category' => 'Fiksi',
                'total_copies' => 5,
                'available_copies' => 5
            ],
            [
                'title' => 'Sang Pemimpi',
                'author' => 'Andrea Hirata',
                'isbn' => '9786022910464',
                'description' => 'Kelanjutan dari Laskar Pelangi tentang perjuangan Arai.',
                'category' => 'Fiksi',
                'total_copies' => 3,
                'available_copies' => 3
            ],
            [
                'title' => 'Matematika untuk SMA Kelas X',
                'author' => 'Tim Guru Matematika',
                'isbn' => '9786021234567',
                'description' => 'Buku pegangan matematika untuk kelas X SMA.',
                'category' => 'Pelajaran',
                'total_copies' => 10,
                'available_copies' => 10
            ],
            [
                'title' => 'Fisika Dasar',
                'author' => 'Dr. Budi Santoso',
                'isbn' => '9786022345678',
                'description' => 'Pengantar fisika dasar untuk tingkat SMA.',
                'category' => 'Pelajaran',
                'total_copies' => 8,
                'available_copies' => 8
            ],
            [
                'title' => 'Sejarah Indonesia',
                'author' => 'Prof. Ahmad Wijaya',
                'isbn' => '9786023456789',
                'description' => 'Sejarah Indonesia dari masa pra-aksara hingga modern.',
                'category' => 'Pelajaran',
                'total_copies' => 6,
                'available_copies' => 6
            ],
            [
                'title' => 'Kamus Besar Bahasa Indonesia',
                'author' => 'Badan Bahasa',
                'isbn' => '9786024567890',
                'description' => 'Kamus resmi Bahasa Indonesia terlengkap.',
                'category' => 'Referensi',
                'total_copies' => 4,
                'available_copies' => 4
            ],
            [
                'title' => 'Ensiklopedia Sains',
                'author' => 'Tim Ilmuwan',
                'isbn' => '9786025678901',
                'description' => 'Ensiklopedia lengkap tentang ilmu pengetahuan.',
                'category' => 'Referensi',
                'total_copies' => 3,
                'available_copies' => 3
            ],
            [
                'title' => 'Biografi Soekarno',
                'author' => 'Dr. Sutrisno',
                'isbn' => '9786026789012',
                'description' => 'Biografi lengkap presiden pertama Indonesia.',
                'category' => 'Non-Fiksi',
                'total_copies' => 5,
                'available_copies' => 5
            ]
        ];
        
        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
