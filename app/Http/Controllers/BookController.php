<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        if ($request->filled('publication_year')) {
            $query->where('publication_year', $request->input('publication_year'));
        }

        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->input('genre') . '%');
        }

        if ($request->filled('sort_by')) {
            $query->orderBy($request->input('sort_by'), $request->input('sort_direction', 'asc'));
        }

        $books = $query->paginate(1);

        return view('books.index', compact('books'))->with('links', $books->links('vendor.pagination.custom'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'genre' => 'nullable|string|max:100',
            'cover_image' => 'nullable|image',
            'page_count' => 'required|integer',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $validatedData['cover_image'] = $path;
        }

        Book::create($validatedData);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $coverImage = null;

        return view('books.show', compact('book', 'coverImage'));
    }


    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }


    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'genre' => 'nullable|string|max:100',
            'cover_image' => 'nullable|image',
            'page_count' => 'required|integer',
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index');
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
