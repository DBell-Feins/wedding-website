<?php

class Create_Base_Schema {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invitations', function($table)
    {
      $table->increments('id');
      $table->string('password');
      $table->string('rsvpid')->unique();
      $table->string('email')->nullable();
      $table->integer('seats');
      $table->timestamps();
    });

		Schema::create('people', function($table)
    {
      $table->increments('id');
      $table->integer('invitation_id');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('role');
      $table->boolean('attending')->nullable();
      $table->string('slug')->nullable();
      $table->text('description')->nullable();
      $table->text('quote')->nullable();
      $table->string('image_url')->nullable();
      $table->string('meal')->nullable();
      $table->string('alergies')->nullable();
      $table->timestamps();
    });

    Command::run(array('seed'));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('people');
		Schema::drop('invitations');
	}

}