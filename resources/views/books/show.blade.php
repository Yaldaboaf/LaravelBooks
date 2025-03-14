@extends('layouts.app')

@section('content')
    <div class="book-details">
        <h1>{{ $book->title }}</h1>
        <p><strong>Автор:</strong> {{ $book->author }}</p>
        <p><strong>Год публикации:</strong> {{ $book->publication_year }}</p>
        <p><strong>Жанр:</strong> {{ $book->genre }}</p>
        <p><strong>Количество страниц:</strong> {{ $book->page_count }}</p>
        <p><strong>Описание:</strong> {{ $book->description ?? 'Описание отсутствует' }}</p>

        @if($book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обложка книги {{ $book->title }}" class="book-cover">
        @else
            <p>Обложка отсутствует</p>
        @endif

        @auth
        <div class="book-actions">
            <a href="{{ route('books.edit', $book) }}" class="edit-button">Редактировать книгу</a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Удалить</button>
            </form>
        </div>
        @endauth

        <a href="{{ route('books.index') }}" class="back-link">Назад к списку книг</a>
    </div>
@endsection