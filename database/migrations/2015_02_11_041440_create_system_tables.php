<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_types', function(Blueprint $table){
            $table->increments('id');
            $table->string('type');
        });

        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('user_type');
            $table->foreign('user_type')->references('id')->on('user_types');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('faculties', function( Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('code', 10);
        });

        Schema::create('schools', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('code', 10);
            $table->unsignedInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculties');
        });

		Schema::create('courses', function(Blueprint $table){
            $table->increments('id');
            $table->text('description');
            $table->string('code', 10);
            $table->string('name');
            $table->unsignedInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
        });

        Schema::create('assignments', function(Blueprint $table){
           $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->text('filepath');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::create('submissions', function(Blueprint $table){
           $table->increments('id');
            $table->text('filepath');
            $table->dateTime('time');
            $table->unsignedInteger('assignment_id');
            $table->foreign('assignment_id')->references('id')->on('assignments');
        });

        Schema::create('user_submissions', function(Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('submissions');
        });

        Schema::create('user_courses', function(Blueprint $table){
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::drop('user_types');
        Schema::drop('faculties');
        Schema::drop('schools');
		Schema::drop('courses');
        Schema::drop('assignments');
        Schema::drop('submissions');
        Schema::drop('user_submissions');
        Schema::drop('user_courses');
	}

}