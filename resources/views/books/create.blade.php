<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить книгу</title>
</head>
<body>
    <h1>Добавить новую книгу</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="author">Автор:</label>
        <input type="text" name="author" id="author" required>
        <br>
        <label for="title">Название:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="publication_year">Год выпуска:</label>
        <input type="number" name="publication_year" id="publication_year" required>
        <br>
        <label for="genre">Жанр:</label>
        <input type="text" name="genre" id="genre">
        <br>
        <label for="cover_image">Обложка:</label>
        <input type="file" name="cover_image" id="cover_image">
        <br>
        <label for="page_count">Количество страниц:</label>
        <input type="number" name="page_count" id="page_count" required>
        <br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>