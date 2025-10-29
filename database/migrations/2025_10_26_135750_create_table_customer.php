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
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('address_line');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code', 10);
            $table->string('country');
            $table->enum('membership_type', ['Regular', 'Premium', 'VIP']);
            $table->date('registration_date');
            $table->date('last_purchase_date')->nullable();
            $table->decimal('total_spent', 10, 2)->default(0);
            $table->string('preferred_contact_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
