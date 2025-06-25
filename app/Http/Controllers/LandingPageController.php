<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('user');

        if ($request->filled('author')) {
            $query->where('author', 'ILIKE', "%{$request->author}%");
        }

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        if ($request->filled('uploaded_date')) {
            $query->whereDate('created_at', $request->uploaded_date);
        }

        $books = $query->latest()->paginate(9);

        return view('landing.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }
}
