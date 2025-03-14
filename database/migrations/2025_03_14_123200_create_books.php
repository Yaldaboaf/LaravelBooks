<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('books')->insert([
            [
                'author' => 'Михаил Шолохов',
                'title' => 'Тихий Дон',
                'publication_year' => 1928,
                'genre' => 'Роман',
                'cover_image' => 'covers/cover1__w820.jpg',
                'page_count' => 500
            ],
            [
                'author' => 'Александр Блок',
                'title' => 'Роковые Яйца',
                'publication_year' => 1925,
                'genre' => 'Фантастика',
                'cover_image' => 'covers/images.png',
                'page_count' => 300
            ],
            [
                'author' => 'Мигель де Сервантес',
                'title' => 'Дон Кихот',
                'publication_year' => 1605,
                'genre' => 'Роман',
                'cover_image' => 'covers/720dd5fc-486f-4f9c-a3a2-395742120f24.jpg',
                'page_count' => 600
            ],
            [
                'author' => 'Владимир Набоков',
                'title' => 'Лолита',
                'publication_year' => 1955,
                'genre' => 'Роман',
                'cover_image' => 'covers/42872371-9a59-4270-b37c-c355c75dc115.jpg',
                'page_count' => 400
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
