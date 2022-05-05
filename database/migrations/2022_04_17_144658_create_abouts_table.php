<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('abouts', static function (Blueprint $table): void {
            $table->id();

            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_tk')->nullable();

            $table->string('text_en')->nullable();
            $table->string('text_ru')->nullable();
            $table->string('text_tk')->nullable();
            $table->string('extension')->nullable();

            $table->string('media')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
