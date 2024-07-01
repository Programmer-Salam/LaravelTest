<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('players');
            $table->string('commission_type');
            $table->decimal('commission_rate', 8, 2);
            $table->string('currency');
            $table->string('network_type');
            $table->string('network_link');
            $table->text('affiliate_note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('affiliates');
    }
}
