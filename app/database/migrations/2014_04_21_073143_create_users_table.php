<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table
                ->string('email',320)
                ->nullable()
                ->default(null);
            $table
                ->string('password', 64)
                ->nullable()
                ->default(null);
            $table
                ->dateTime("created_at")
                ->nullable()
                ->default(null);
            $table
                ->dateTime("updated_at")
                ->nullable()
                ->default(null);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
