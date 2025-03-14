<!-- resources/views/books/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать книгу</title>
</head>
<body>
    <h1>Редактировать книгу</h1>
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="author">Автор:</label>
        <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        <br>
        <label for="title">Название:</label>
        <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        <br>
        <label for="publication_year">Год выпуска:</label>
        <input type="number" name="publication_year" id="publication_year" value="{{ $book->publication_year }}" required>
        <br>
        <label for="genre">Жанр:</label>
        <input type="text" name="genre" id="genre" value="{{ $book->genre }}">
        <br>
        <label for="cover_image">Обложка:</label>
        <input type="file" name="cover_image" id="cover_image">
        <br>
        <label for="page_count">Количество страниц:</label>
        <input type="number" name="page_count" id="page_count" value="{{ $book->page_count }}" required>
        <br>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>