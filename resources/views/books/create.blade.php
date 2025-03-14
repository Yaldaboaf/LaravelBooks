<!-- resources/views/books/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="book-details">
        <h1>Добавить новую книгу</h1>
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="author">Автор:</label>
            <input type="text" name="author" id="author" required>

            <label for="title">Название:</label>
            <input type="text" name="title" id="title" required>

            <label for="publication_year">Год выпуска:</label>
            <input type="number" name="publication_year" id="publication_year" required>

            <label for="genre">Жанр:</label>
            <input type="text" name="genre" id="genre">

            <label for="cover_image">Обложка:</label>
            <input type="file" name="cover_image" id="cover_image">

            <label for="page_count">Количество страниц:</label>
            <input type="number" name="page_count" id="page_count" required>

            <label for="description">Описание:</label>
            <textarea name="description" id="description" rows="4"></textarea>

            <button type="submit" class="special-button">Сохранить</button>
        </form>

        <a href="{{ route('books.index') }}" class="back-link">Назад к списку книг</a>
    </div>
@endsection