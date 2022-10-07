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
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->foreignIdFor(\App\Models\Order::class);
            $table->foreignIdFor(\App\Models\Employee::class);
            $table->smallInteger('i_status');
            $table->smallInteger('i_amount');
            $table->smallInteger('i_quantity');
            $table->string('i_payment_method');
            $table->dateTime('i_paying_date');
            $table->dateTime('i_placing_date');
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
        Schema::dropIfExists('invoices');
    }
};
