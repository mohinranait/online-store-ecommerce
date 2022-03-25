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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('sort_description')->nullable();
            $table->text('details')->nullable();
            $table->text('otherinformation')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('quentity')->default(5);
            $table->integer('regularprice')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('tags')->nullable();
            $table->integer('is_fiture')->default(2)->comment('1=offer active , 2=in-active');
            $table->integer('status')->default(1)->comment('1=active,2=in-active');
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
        Schema::dropIfExists('products');
    }
};
