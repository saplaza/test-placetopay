<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference',32);
            $table->string('description',255);
            $table->integer('bank')->unsigned();
            $table->integer('type_pay')->unsigned();
            $table->double('total_amount');
            $table->double('devolution_base');
            $table->double('tip_amount');
            $table->double('tax_amount');
            $table->string('document',12);
            $table->string('document_type',3);
            $table->string('first_name',60);
            $table->string('last_name',60);
            $table->string('company',60);
            $table->string('email_address',80);
            $table->string('address',100);
            $table->string('city',50);
            $table->string('province',50);
            $table->string('country',3);
            $table->string('phone',20);
            $table->string('mobile',20);
            $table->string('ip_address',15);
            $table->string('user_agent',255);
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
        Schema::dropIfExists('payment_references');
    }
}
