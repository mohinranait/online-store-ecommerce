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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("amount")->nullable();
            $table->text("address")->nullable();
            $table->string("transaction_id")->nullable();
            $table->string("currency")->nullable();
            $table->integer("user_id")->nullable();
            $table->string("ip_address")->nullable();            
            $table->integer("cuntry")->nullable();
            $table->integer("division_id")->nullable();
            $table->integer("district_id")->nullable();
            $table->text("massage")->nullable();
            $table->integer("is_paid")->default(0)->comment('0=COD, 1=SSL'); 
            $table->strict('post_code')->nullable();
            $table->integer("status")->default(0)->comment('0=prossasing, 1=Hole , 2=delevery , 3=cancle'); 
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
        Schema::dropIfExists('orders');
    }
};
