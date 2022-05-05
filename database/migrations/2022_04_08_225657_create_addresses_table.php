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
        Schema::create('addresses', static function (Blueprint $table): void {
            $table->id();

            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_tk');
            $table->integer('country_id')->unsigned();
            $table->integer('position')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreign('country_id')->on('users')->references('id')->cascadeOnDelete();

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
        Schema::dropIfExists('addresses');
    }
};
