<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('document_searches', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('document_number')->nullable();
            $table->date('document_date')->nullable();
            $table->text('keywords')->nullable();
            $table->string('user_ip');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_searches');
    }
}; 