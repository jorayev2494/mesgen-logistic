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
        Schema::create('user_socials', static function (Blueprint $table): void {
            $table->id();

            $table->string('slug');
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('position')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();

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
        Schema::dropIfExists('user_socials');
    }
};
