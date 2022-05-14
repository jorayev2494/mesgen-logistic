<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', static function (Blueprint $table): void {
            $table->id();

            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_tk')->nullable();

            $table->text('text_en');
            $table->text('text_ru');
            $table->text('text_tk');
            $table->text('extension')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id')->nullOnDelete();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->on('blog_categories')->references('id')->nullOnDelete();

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
        Schema::dropIfExists('blogs');
    }
};
