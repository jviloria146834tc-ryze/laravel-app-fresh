<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')->orWhere('author', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        $books = $query->get();
    
        $genres = Book::select('genre')->distinct()->pluck('genre');

        return view('books.index', compact('books', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title'          => 'required|string|max:255',
        'author'         => 'required|string|max:255',
        'description'    => 'required',
        'genre'          => 'required',
        'published_year' => 'required|integer',
        'isbn'           => 'required|unique:books,isbn',
        'pages'          => 'required|integer',
        'language'       => 'required',
        'publisher'      => 'required',
        'price'          => 'required|numeric',
        'is_available'   => 'boolean',
        ]);

        $validated['is_available'] = $request->has('is_available');

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
        'title'          => 'required|string|max:255',
        'author'         => 'required|string|max:255',
        'description'    => 'required',
        'genre'          => 'required',
        'published_year' => 'required|integer',
        'isbn'           => 'required|unique:books,isbn,' . $book->id,
        'pages'          => 'required|integer',
        'language'       => 'required',
        'publisher'      => 'required',
        'price'          => 'required|numeric',
        'is_available'   => 'boolean',
        ]);

        $validated['is_available'] = $request->has('is_available');

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book removed from inventory.');
    }
}
