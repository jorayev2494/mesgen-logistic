<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table): void {
            $table->id();

            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_tk');

            $table->string('value');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->on('countries')->references('id')->cascadeOnDelete();

            $table->integer('position')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
