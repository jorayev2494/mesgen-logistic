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
        Schema::create('users', static function (Blueprint $table): void {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->integer('email_code')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->boolean('is_admin')->default(false);

            $table->string('position_en')->nullable();
            $table->string('position_ru')->nullable();
            $table->string('position_tk')->nullable();

            $table->boolean('is_active')->default(true);
            $table->integer('position')->nullable();

            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
