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
        Schema::create('services', static function (Blueprint $table): void {
            $table->id();

            $table->string('media');

            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_tk');

            $table->text('text_en');
            $table->text('text_ru');
            $table->text('text_tk');
            $table->string('extension')->nullable();

            $table->boolean('is_active')->default(true);
            $table->integer('position')->nullable();

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
        Schema::dropIfExists('services');
    }
};
