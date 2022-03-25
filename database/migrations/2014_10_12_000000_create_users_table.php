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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('cuntry')->nullable();
            $table->integer('destrict_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('address')->nullable();
            $table->integer('zipcode')->nullable();
            $table->text('image')->nullable();
            $table->integer('role')->default(2)->comment('1=Admin , 2=User');
            $table->integer('status')->default(1)->comment('1=Active , 2=In-Active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
