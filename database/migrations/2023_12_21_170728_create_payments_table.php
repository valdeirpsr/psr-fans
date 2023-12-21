<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->bigInteger('model_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_cpf', 11);
            $table->string('code');
            $table->string('method');
            $table->string('status', 12);
            $table->timestamp('expired_at');
            $table->json('raw')->nullable()->default('{}');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
