<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Запуск миграции.
     */
    public function up(): void
    {
        // Добавление пользователя
        User::create([
            'name' => 'Имя пользователя', // Укажите имя пользователя
            'email' => 'email@email',
            'password' => Hash::make('123'), // Хешируем пароль
        ]);
    }

    /**
     * Обратная миграция.
     */
    public function down(): void
    {
        // Удаление пользователя
        User::where('email', 'email@email')->delete();
    }
};