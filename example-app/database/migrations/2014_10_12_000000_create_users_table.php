<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('role')->default('user'); // По умолчанию роль "user"
            $table->timestamps();
        });
    
        // Добавление администратора
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
            'password' => Hash::make('password123'), // Пароль: password123
            'role' => 'admin',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}; 