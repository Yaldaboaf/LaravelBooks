<?php

namespace App\Actions;

use App\Models\Book;
use Illuminate\Http\Request;

class BookActions
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

        return $query->paginate(10);
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

        return Book::create($validatedData);
    }

    public function show(Book $book)
    {
        return $book;
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
        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();
    }
}