@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Автор: {{ $book->author }}</p>
    <p>Год публикации: {{ $book->publication_year }}</p>
    <p>Жанр: {{ $book->genre }}</p>
    <p>Количество страниц: {{ $book->page_count }}</p>

    @if($book->cover_image)
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Обложка книги {{ $book->title }}" style="max-width: 200px;">
    @else
        <p>Обложка отсутствует</p>
    @endif
    @auth
    <form action="{{ route('books.destroy', $book) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    @endauth
    <a href="{{ route('books.index') }}">Назад к списку книг</a>
@endsection