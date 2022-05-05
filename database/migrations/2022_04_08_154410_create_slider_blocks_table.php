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
        Schema::create('slider_blocks', static function (Blueprint $table) {
            $table->id();

            $table->string('icon');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_tk');

            $table->string('text_en');
            $table->string('text_ru');
            $table->string('text_tk');

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
        Schema::dropIfExists('slider_blocks');
    }
};
