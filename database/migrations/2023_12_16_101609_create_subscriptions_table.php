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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('plan_name', 25);
            $table->decimal('plan_price');
            $table->integer('plan_period')->unsigned();
            $table->decimal('total');
            $table->date('expired_at');
            $table->string('forwarded_ip');
            $table->string('user_agent');
            $table->timestamps();

            $table->index(['user_id', 'expired_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
