<?php

class Create_People {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('people', function($table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('role')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
        Command::run(array('seed'));
        
        /*Schema::create('rsvp', function($table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email');
            $table->boolean('attending');
            $table->timestamp();
        });*/
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('people');
	}

}