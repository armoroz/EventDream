<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }*/

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	 
	public function up()
	{
		Schema::create('product', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->decimal('price', 8, 2);
			$table->text('description')->nullable();
			$table->timestamps();
		});
	}	 
	 
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
