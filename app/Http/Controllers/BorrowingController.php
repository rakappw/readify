<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $activeBorrowings = $user->borrowings()->where('status', 'borrowed')->count();
        $totalBorrowings = $user->borrowings()->count();
        $overdueBorrowings = $user->borrowings()->where('status', 'borrowed')
            ->where('due_date', '<', now())->count();
        
        return view('user.dashboard', compact('activeBorrowings', 'totalBorrowings', 'overdueBorrowings'));
    }

    public function index()
    {
        $borrowings = auth()->user()->borrowings()
            ->with('book')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('borrowings.index', compact('borrowings'));
    }

    public function borrow(Book $book)
    {
        if (!$book->isAvailable()) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
        }
        
        $existingBorrowing = auth()->user()->borrowings()
            ->where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->first();
            
        if ($existingBorrowing) {
            return back()->with('error', 'Anda sudah meminjam buku ini.');
        }
        
        Borrowing::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_date' => now(),
            'due_date' => now()->addDays(14),
            'status' => 'borrowed'
        ]);
        
        $book->decrement('available_copies');
        
        return back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function return(Borrowing $borrowing)
    {
        if ($borrowing->user_id !== auth()->id()) {
            abort(403);
        }
        
        if ($borrowing->status !== 'borrowed') {
            return back()->with('error', 'Buku sudah dikembalikan.');
        }
        
        $borrowing->update([
            'returned_date' => now(),
            'status' => 'returned'
        ]);
        
        $borrowing->book->increment('available_copies');
        
        return back()->with('success', 'Buku berhasil dikembalikan!');
    }
}
