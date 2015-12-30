<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title');
            $table->integer('organization_id');
            $table->string('status')->default("Initial Request");
            $table->string('contact_email');
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->boolean('publish')->default(0);
            $table->boolean('rental')->default(0);
            $table->text('notes');
            $table->boolean('billable')->default(1);
			$table->timestamps();
		});

        Schema::create('events_dates', function(Blueprint $table){
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('startdate')->nullable();
            $table->integer('enddate')->nullable();
            $table->integer('calldate')->nullable();
            $table->integer('strikedate')->nullable();
            $table->string('description')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('events_roles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('user_id');
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('events_locations', function(Blueprint $table){
            $table->increments('id');
            $table->integer('events_dates_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('events_comments', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('event_id');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('events_blackouts', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->integer('event_id');
            $table->integer('startdate');
            $table->integer('enddate');
            $table->timestamps();
        });

        Schema::create('events_equipment', function(Blueprint $table){
            $table->increments('id');
            $table->integer('equipment_id');
            $table->integer('event_id');
            $table->timestamps();
        });

        Schema::create('events_attachments', function(Blueprint $table){
            $table->increments('id');
            $table->text('path');
            $table->integer('event_id');
            $table->string('name');
            $table->text('local_path');
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
		Schema::drop('events');
        Schema::drop('events_dates');
        Schema::drop('events_roles');
        Schema::drop('events_locations');
        Schema::drop('events_comments');
        Schema::drop('events_blackouts');
        Schema::drop('events_equipment');
        Schema::drop('events_attachments');
	}

}
