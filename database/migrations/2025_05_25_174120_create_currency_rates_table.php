<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyRatesTable extends Migration
{
    public function up()
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Дата курса
            $table->decimal('eur', 8, 2); // Курс евро
            $table->decimal('usd', 8, 2); // Курс доллара
            $table->decimal('gbp', 8, 2); // Курс фунта стерлингов
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_rates');
    }
};
