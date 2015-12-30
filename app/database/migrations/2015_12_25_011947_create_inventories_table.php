<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->integer('quantity');
            $table->text('location')->nullable();
            $table->text('current_location')->nullable();
            $table->integer('purchase_date')->nullable();
            $table->text('purchase_from')->nullable();
            $table->integer('warranty_expiration')->nullable();
            $table->integer('rental_price')->nullable();
            $table->text('serial_numbers');
            $table->text('organization_id');
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
		Schema::drop('inventories');
	}

}
