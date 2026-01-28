<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalUsers = User::where('role', 'user')->count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();
        $overdueBorrowings = Borrowing::where('status', 'borrowed')
            ->where('due_date', '<', now())->count();
        
        $recentBorrowings = Borrowing::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers', 
            'activeBorrowings',
            'overdueBorrowings',
            'recentBorrowings'
        ));
    }
    
    public function borrowings()
    {
        $borrowings = Borrowing::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.borrowings', compact('borrowings'));
    }
    
    public function returnBook(Borrowing $borrowing)
    {
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
