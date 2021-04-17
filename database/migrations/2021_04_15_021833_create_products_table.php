<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->integer('category_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('date_time')->useCurrent();
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('delete_flag')->comment('0 = existing \n 1 = deleted')->default(0);
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
}