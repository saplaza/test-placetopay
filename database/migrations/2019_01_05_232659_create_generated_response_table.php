<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratedResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generated_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_reference_id')->unsigned();
            $table->string('status',30);
            $table->string('trazability_code',40);
            $table->integer('transaction_cycle');
            $table->integer('transaction_id');
            $table->string('session_id',32);
            $table->string('bank_currency',3);
            $table->float('bank_factor');
            $table->integer('response_code');
            $table->string('response_reason_code',3);
            $table->string('response_reason_text',255);
            $table->timestamp('date_register');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generated_responses');
    }
}
