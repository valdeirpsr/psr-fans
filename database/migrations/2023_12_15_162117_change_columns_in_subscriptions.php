<?php

use App\Enums\PaymentStatus;
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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('customer_name')->after('user_id');
            $table->string('customer_email')->after('customer_name');
            $table->string('customer_cpf')->after('customer_email');

            $table->string('payment_status', 20)->default(PaymentStatus::PENDING)->after('payment_method');

            $table->string('user_agent', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('customer_email');
            $table->dropColumn('customer_cpf');
            $table->dropColumn('payment_status');

            $table->string('user_agent', 64)->nullable()->change();
        });
    }
};
