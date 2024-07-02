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
        Schema::create('affiliate_comissions', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->integer('minimum_rate');
            $table->integer('maximum_rate');
            $table->text('description');
            $table->string('deposit_rule');
            $table->json('deposit_included_methods'); // Use JSON type
            $table->string('withdraw_rule');
            $table->json('withdraw_included_methods'); // Use JSON type
            $table->string('deduction_rule');
            $table->json('deduction_included_methods'); // Use JSON type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_comissions');
    }
};
