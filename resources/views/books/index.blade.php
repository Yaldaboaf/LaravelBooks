@extends('layouts.app')

@section('content')
<div class='main'>
    <form method="GET" action="{{ route('books.index') }}">
        <input type="text" name="author" placeholder="Автор" value="{{ request('author') }}">
        <input type="number" name="publication_year" placeholder="Год выпуска" value="{{ request('publication_year') }}">
        <input type="text" name="genre" placeholder="Жанр" value="{{ request('genre') }}">
        <select name="sort_by">
            <option value="">Сортировать по</option>
            <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Название</option>
            <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>Автор</option>
            <option value="publication_year" {{ request('sort_by') == 'publication_year' ? 'selected' : '' }}>Год выпуска</option>
        </select>
        <select name="sort_direction">
            <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
            <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>По убыванию</option>
        </select>

        <button type="submit" class='special-button'>Применить</button>
    </form>
    <div class='books-container'>
        
        @foreach ($books as $book)
            <div class="book-element">
                @if($book->cover_image)
                    <a href="{{ route('books.show', $book) }}">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обложка книги {{ $book->title }}" style="max-width: 200px;">
                    </a>
                @else
                    <p>Обложка отсутствует</p>
                @endif
                <a href="{{ route('books.show', $book) }}">
                    <strong>{{ $book->title }}</strong>
                </a> Автор: {{ $book->author }}
                
                @auth
                    <a href="{{ route('books.edit', $book) }}">Редактировать</a>
                @endauth
            </div>
        @endforeach
        
    @auth
        <button href="{{ route('books.create') }}" class='special-button'>Добавить новую книгу</button>
    @endauth
    </div>
</div>

    {{ $books->links('vendor.pagination.custom') }}
@endsection