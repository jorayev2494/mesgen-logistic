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
        Schema::create('work_hours', static function (Blueprint $table): void {
            $table->id();

            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_tk');

            $table->string('from');

            $table->string('to');
            
            $table->bigInteger('country_id')->index();
            $table->foreign('country_id')->on('countries')->references('id')->onDelete('set null');

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
        Schema::dropIfExists('work_hours');
    }
};
