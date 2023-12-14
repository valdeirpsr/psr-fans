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
            $table->decimal('plan_price')->unsigned();
            $table->integer('plan_period', false, 10)->unsigned();
            $table->string('payment_method', 25);
            $table->decimal('total')->unsigned()->comment('Valor total pago');
            $table->timestamp('expired_at');
            $table->string('forwarded_ip', 64)->nullable();
            $table->string('user_agent', 64)->nullable();
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
