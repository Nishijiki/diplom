<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->string('name')->after('user_id');
            $table->string('email')->after('name');
            $table->string('phone')->nullable()->after('email');
        });

        // Изменяем тип столбца status напрямую
        DB::statement("ALTER TABLE requests MODIFY status ENUM('new', 'in_progress', 'completed', 'rejected') DEFAULT 'new'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone']);
        });

        // Возвращаем старый тип столбца status
        DB::statement("ALTER TABLE requests MODIFY status ENUM('new', 'in_progress', 'resolved') DEFAULT 'new'");
    }
};
