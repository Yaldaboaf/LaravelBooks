<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\BookActions;
use App\Models\Book;

class BookController extends Controller
{
    protected $bookActions;

    public function __construct(BookActions $bookActions)
    {
        $this->bookActions = $bookActions;
    }

    public function index(Request $request)
    {
        $books = $this->bookActions->index($request);
        return view('books.index', compact('books'))->with('links', $books->links('vendor.pagination.custom'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->bookActions->store($request);
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
        $this->bookActions->update($request, $book);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $this->bookActions->destroy($book);
        return redirect()->route('books.index');
    }
}
